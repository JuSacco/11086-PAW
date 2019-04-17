<?php
namespace UNLu\PAW\Controladores;
use UNLu\PAW\Libs\VIstaHTML;
use UNLu\PAW\Modelos\dbConnection;
use UNLu\PAW\Modelos\Turnos;

class Reservar extends \UNLu\PAW\Libs\Controlador{   
    
    public function cargar(){
		
    }
    public function agregar(){
        $conn = new dbConnection("./modelos/supersecret.json");
        $turnos = new Turnos($conn);
        $img = $turnos->uplImage();
		$datos = array('nombre'=>$_POST['nombre'],
						'email'=>$_POST['email'],
						'tel'=>$_POST['tel'],
						'edad'=>$_POST['edad'],
						'calzado'=>$_POST['calzado'],
						'altura'=>$_POST['altura'],
						'fecnac'=>$_POST['fecnac'],
						'fecturno'=>$_POST['fecturno'],
						'pelo'=>$_POST['pelo'],
						'hora'=>$_POST['hora'],
						'img'=>$img);
        $lastId = $turnos->addTurno($datos);
		$info = "";
		if ($lastId != null)
			$info = $turnos->showTurno($lastId);
        $this->pasarVariableAVista('datos', $info);
    }
}
