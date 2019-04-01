<?php
	function cargarDatos($nroTurno){
		$fileContents = file_get_contents('data.json');
		$json = json_decode($fileContents, true);
		foreach($json as $data){
			foreach($data as $k=>$v){
				if(($k =="id")&&($v == $nroTurno)){
					$array = array('id'=>$data['id'],
						'nombre'=>$data['nombre'],
						'email'=>$data['email'],
						'tel'=>$data['tel'],
						'edad'=>$data['edad'],
						'calzado'=>$data['calzado'],
						'altura'=>$data['altura'],
						'fecnac'=>$data['fecnac'],
						'fecturno'=>$data['fecturno'],
						'pelo'=>$data['pelo'],
						'hora'=>$data['hora'],
						'image'=>$data['image']);
				}
			}
		}
		return $array;
	}
	if (isset($_GET['id'])){
		$nroTurno = $_GET['id'];
		$data = cargarDatos($nroTurno);
		$id = $data['id'];
		$email = $data['email'];
		$tel = $data['tel'];
		$edad = $data['edad'];
		$calzado = $data['calzado'];
		$fecnac = $data['fecnac'];
		$altura = $data['altura'];
		$pelo = $data['pelo'];
		$fecturno = $data['fecturno'];
		$hora = $data['hora'];
		$nombre = $data['nombre'];
		$imagen = '<img src="' . $data['image'] . '" width="200px">';
		$url = '"' . "llenarTurnos.php?id=$id" . '"';
		include "resumenTurno.html";
	}else{
		echo "<h1>No seleccionaste un turno!</h1>";
		echo '<a href="llenarTurnos.php">Volver</a>';
	}
?>
