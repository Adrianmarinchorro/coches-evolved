<?php

namespace App\controller;

use Monolog\Level;
use Monolog\Logger;
use App\model\Usuario;
use Monolog\Handler\StreamHandler;
use Symfony\Component\HttpFoundation\Response;
use App\database\conector;
use Medoo\Medoo;

class UsuarioController
{

    var $usuario;
    private Medoo $dbCon;

    function __construct()
    {
        $this->dbCon = (new conector)();
    }

    public function index()
    {


        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('./logs/01.log', Level::Warning));

        $log->warning('He entrado en el controlador');
        $log->error('Ha habido un error.');

      
        $usuario = $this->dbCon->select('usuario', [
            'id',
            'username',
            'nombrecompleto',
            'pass',
            'email',
            'estado'
        ]);

        foreach ($usuario as  $user) {
            $this->usuario[] = Usuario::fromArray($user);
        }

        $rowset = $this->usuario;

        require("src/view/listadoUsuario.php");
    }

    public function create()
    {
        require "./src/view/crearUsuario.php";
    }

    public function insert()
    {
        $var = $this->dbCon->insert('usuario', [
            'username' => $_POST['username'],
            'nombrecompleto' => $_POST['nombrecompleto'],
            'pass' => $_POST['pass'],
            'email' => $_POST['email'],
            'estado' => '1',
        ]);

        sleep(3);

        header('Location: /usuarios');
    }

    public function delete(int $id)
    {
        $this->dbCon->delete('usuario', ['id' => $id]);

        echo 'Se ha borrado correctamente el usuario con id: ' . $id;

        sleep(3);

        header('Location: /usuarios');
    }

    public function modify(int $id)
    {
        $var = $this->dbCon->update(
            'usuario',
            [
                'username' => $_POST['username'],
                'nombrecompleto' => $_POST['nombrecompleto'],
                'pass' => $_POST['pass'],
                'email' => $_POST['email'],
                'estado' => $_POST['estado'],
            ],
            [
                'id' => $id
            ]
        );

        if($var->rowCount() > 0){
            echo 'Se ha modificado el usuario con id: ' . $id;
        } else {
            echo 'No se ha modificado la informacion del usuario con id: ' . $id;
        }

        sleep(3);

        header('Location: /usuarios');

    }

    public function show(int $id)
    {
        $user =  $this->dbCon->select(
            'usuario',
            '*',
            ['id' => $id]
        );


        if (isset($user)) { // comprueba si un array esta instanciado y con datos

            $usuario = new Usuario(
                id: $user[0]['id'],
                username: $user[0]['username'],
                nombreCompleto: $user[0]['nombrecompleto'],
                pass: $user[0]['pass'],
                email: $user[0]['email'],
                estado: $user[0]['estado'],
            );

            $row = $usuario;

            require("src/view/verUsuario.php");
        } else {
            $this->index();
        }
    }
}
