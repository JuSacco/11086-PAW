<?php

	function validadorDatos(){
		$errores = "";
			#preg_match: Busca un patron en un string, si lo encuentra devuelve true. 
			#"/^[a-zA-Z ]*$/": Expresion regular para buscar letras y espacios
		$fecturno = $_POST['fecturno'];
		if ((strlen($_POST['nombre']) < 1) || (!preg_match("/^[a-zA-Z ]*$/",$_POST['nombre']))){
			$errores .= "Nombre invalido -";
		}
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errores .= "Mail invalido -";
		}
		if((strlen($_POST['tel']) < 5) || (!preg_match("/^[0-9 +]*$/",$_POST['tel']))){
			$errores .= "Telefono invalido -";
		}
		if(($_POST['edad']<0) || ($_POST['edad']>150) || (!preg_match("/^[0-9]*$/",$_POST['tel']))){
			$errores .= "Edad invalida -";
		}
		if((($_POST['calzado']<=20) || ($_POST['calzado']>=45) || (!preg_match("/^[0-9]*$/",$_POST['calzado']))) && ($_POST['calzado'] != '')){
			$errores .= "Calzado invalido -";
		}
		if(($_POST['altura']<=0) || ($_POST['altura']>=230) || (!preg_match("/^[0-9]*$/",$_POST['altura']))){
			$errores .= "Altura invalida -";
		}
		$fecnac = explode('-', $_POST['fecnac']);
		if ((!checkdate($fecnac[1], $fecnac[2], $fecnac[0])) || ($fecnac[0]>2019)){
			$errores .= "Fecha invalida -";
		}
		$tipoPelo = ['rubio','castanio','no tiene','morocho'];
		$pelo[0] = $_POST['pelo'];
		$pelo = array_intersect($pelo,$tipoPelo);
		if(sizeof($pelo) == 0){
			$errores .= "Pelo invalido -";
		}
		$fecturno = explode('-', $_POST['fecturno']);
		if ((!checkdate($fecturno[1], $fecturno[2], $fecturno[0]))){
			$errores .= "Fecha invalida -";
		}
		if($_POST['hora']!=''){
			$hora = explode(':', $_POST['hora']);
			if ( ($hora[0]<'08' || $hora[0]>'17') || ($hora[1]<'00' || $hora[1]>'59') || (($hora[1] % 15) != '0')){
				$errores .= "Hora invalida -";
			}
		}
		return $errores;
	}
	
	function cargarImg(){
		$tmp_name = $_FILES["imagen"]["tmp_name"];
		$directorio = './imagenes';
		$name = basename($_FILES["imagen"]["name"]);

		if((!file_exists("$directorio/$name")) && (move_uploaded_file($tmp_name, "$directorio/$name"))){
			$res = "$directorio/$name";
		}else{
			$res = "";
		}
		return $res;
	}
	
	function registrarTurno($img){
		$id = 0;
		$array = array('id'=>$id,
						'nombre'=>$_POST['nombre'],
						'email'=>$_POST['email'],
						'tel'=>$_POST['tel'],
						'edad'=>$_POST['edad'],
						'calzado'=>$_POST['calzado'],
						'altura'=>$_POST['altura'],
						'fecnac'=>$_POST['fecnac'],
						'fecturno'=>$_POST['fecturno'],
						'pelo'=>$_POST['pelo'],
						'hora'=>$_POST['hora'],
						'image'=>$img);
		//Asigno el id del turno
		if(file_exists('data.json')){
			$fileContents = file_get_contents('data.json');
			$json = json_decode($fileContents, true);
			if ($json != "")
				$array['id'] = count($json);
			else
				$array['id'] = $id;
		}
		$json[] = $array;
		file_put_contents('data.json', json_encode($json,JSON_PRETTY_PRINT, FILE_APPEND));
		return $array;
	}

	$errores = validadorDatos();
	echo $errores;
	$cargaImg = cargarImg();


	if (strlen($cargaImg)>0)
		$imagen = '<img src="' . $cargaImg . '" width="200px">';
	else 
		$imagen = "Error en la carga de imagen";

	$data = registrarTurno($cargaImg);
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
	$url = '"' . "llenarTurnos.php?id=$id" . '"';
	include "resumenTurno.html";
	
?>