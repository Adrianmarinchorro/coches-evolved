<?php

namespace App\controller;

use Monolog\Level;
use Monolog\Logger;
use App\model\Coche;
use Monolog\Handler\StreamHandler;
use Symfony\Component\HttpFoundation\Response;
use App\database\conector;

class CocheController
{

    var $coches;


    function __construct()
    {
    }

    public function index()
    {


        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('./logs/01.log', Level::Warning));

        $log->warning('He entrado en el controlador');
        $log->error('Ha habido un error.');

        $dbConection = (new conector)();
        $coches = $dbConection->select('coche', [
            'id',
            'marca',
            'modelo',
            'color',
            'matricula'
        ]);

        foreach ($coches as  $car) {
            $this->coches[] = Coche::fromArray($car); // llamar estaticamnente un metodo
        }

        $rowset = $this->coches;

        require("src/view/listadoCoches.php");
    }

    public function crearCoche()
    {


        require "./src/view/crearCoche.php";
    }

    public function insertCoche()
    {
        $dbConection = (new conector)();
        $var = $dbConection->insert('coche', [
            'marca' => $_POST['marca'],
            'modelo' => $_POST['modelo'],
            'color' => $_POST['color'],
            'matricula' => $_POST['matricula']
        ]);

        dd($var);

        sleep(3);

        header('Location: /');
    }

    public function deleteCoche(int $id)
    {

        $dbConection = (new conector)();

        $dbConection->delete('coche', ['id' => $id]);

        echo 'Se ha borrado correctamente el coche con id: ' . $id;

        sleep(3);

        header('Location: /');
    }

    public function modificarCoche(int $id)
    {

        $dbConection = (new conector)();


        $var = $dbConection->update(
            'coche',
            [
                'marca' => $_POST['marca'],
                'modelo' => $_POST['modelo'],
                'color' => $_POST['color'],
                'matricula' => $_POST['matricula']
            ],
            [
                'id' => $id
            ]
        );

        if($var->rowCount() > 0){
            echo 'Se ha modificado el vehiculo con id: ' . $id;
        } else {
            echo 'No se ha modificado la informacion del vehiculo con id: ' . $id;
        }

        sleep(3);

        header('Location: /');

    }

    public function verCoche(int $id)
    {

        $dbConection = (new conector)();

        $car =  $dbConection->select(
            'coche',
            '*',
            ['id' => $id]
        );


        if (isset($car)) { // comprueba si un array esta instanciado y con datos

            $coche = new Coche(
                id: $car[0]['id'],
                marca: $car[0]['marca'],
                modelo: $car[0]['modelo'],
                color: $car[0]['color'],
                matricula: $car[0]['matricula']
            );

            $row = $coche;

            require("src/view/verCoche.php");
        } else {
            $this->index();
        }
    }
}
