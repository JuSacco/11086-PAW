<?php
namespace UNLu\PAW\Controladores;
use UNLu\PAW\Libs\VIstaHTML;
use UNLu\PAW\Modelos\Cargar;
class Administracion extends \UNLu\PAW\Libs\Controlador{   

    public function listar(){
       // require_once($_SERVER["DOCUMENT_ROOT"].'/tp4/mvc/modelos/llenarTurnos.php');
        $c = new Cargar();
        $turnos = $c->getInfo();
        $this->pasarVariableAVista('datos', $turnos);
    }
}
