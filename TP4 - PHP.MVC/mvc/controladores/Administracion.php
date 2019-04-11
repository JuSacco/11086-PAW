<?php
namespace UNLu\PAW\Controladores;
use UNLu\PAW\Libs\VIstaHTML;

class Administracion extends \UNLu\PAW\Libs\Controlador{   

    public function listar(){
        $this->pasarVariableAVista('miVariable', 'XXXXXXX');
    }
}
