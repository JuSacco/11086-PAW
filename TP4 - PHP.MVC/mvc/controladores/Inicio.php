<?php
namespace UNLu\PAW\Controladores;
use UNLu\PAW\Libs\VIstaHTML;

class Inicio extends \UNLu\PAW\Libs\Controlador{   

    public function index(){       
        $this->pasarVariableAVista('variable', 'valor');
    }
    
    public function agregar(){
        $this->pasarVariableAVista('miVariable', 'XXXXXXX');
    }
}
