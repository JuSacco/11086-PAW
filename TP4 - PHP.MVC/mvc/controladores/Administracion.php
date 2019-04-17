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
    public function modificar($id){
        $conn = new dbConnection("./modelos/supersecret.json");
        $turnos = new Turnos($conn);
        $info = $turnos->showTurno($id);
        $this->pasarVariableAVista('datos', $info);
    }
    public function update($id){
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
        $info = $turnos->update($id, $datos);
        $this->pasarVariableAVista('info', $info);
        $this->pasarVariableAVista('datos', $datos);
    }
    public function borrar($id){
        $conn = new dbConnection("./modelos/supersecret.json");
        $turnos = new Turnos($conn);
        $info = $turnos->delete($id);
        $this->listar();
       // $this->pasarVariableAVista('datos', $info);
    }
}
