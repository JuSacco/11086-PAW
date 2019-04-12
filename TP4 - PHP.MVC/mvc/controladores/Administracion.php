<?php
namespace UNLu\PAW\Controladores;
use UNLu\PAW\Libs\VIstaHTML;
use UNLu\PAW\Modelos\dbConnection;
use UNLu\PAW\Modelos\Turnos;

class Administracion extends \UNLu\PAW\Libs\Controlador{   

    public function listar(){
        $conn = new dbConnection("./modelos/supersecret.json");
        $turnos = new Turnos($conn);
        $info = $turnos->fillAllTurnos();
        $this->pasarVariableAVista('datos', $info);
    }
    public function mostrar($id){
        $conn = new dbConnection("./modelos/supersecret.json");
        $turnos = new Turnos($conn);
        $info = $turnos->showTurno($id);
        $this->pasarVariableAVista('datos', $info);
    }
}
