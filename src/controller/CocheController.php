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

        $this->coches = [
            1 => new Coche(1, "1234LLL", "Seat", "Leon", "Negro"),
            2 => new Coche(2, "2121", "peugeot", "2008", "blanco"),
            3 => new Coche(3, "123112", "Toyota", "Corola", "negro")
        ];
    }

    public function index()
    {
        

        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('./logs/01.log', Level::Warning));

        $log->warning('He entrado en el controlador');
        $log->error('Ha habido un error.');

        $rowset = $this->coches;

        require("src/view/listadoCoches.php");
    }

    public function deleteCoche(int $id){
        
        $dbConection = (new conector)();

        $dbConection->delete('coche',['id'=>$id]);

        echo 'Se ha borrado correctamente el coche con id: ' . $id;

    }

    public function verCoche(int $id)
    {
        if (array_key_exists($id, $this->coches)) {

            $row = $this->coches[$id];

            require("src/view/verCoche.php");
        } else {
            $this->index();
        }
    }
}
