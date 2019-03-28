<?php
	#preg_match: Busca un patron en un string, si lo encuentra devuelve true. 
	#"/^[a-zA-Z ]*$/": Expresion regular para buscar letras y espacios
	$errores = "";
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
	if(($_POST['calzado']<=20) || ($_POST['calzado']>=45) || (!preg_match("/^[0-9]*$/",$_POST['calzado']))){
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
		var_dump($hora);
		if ( ($hora[0]<'08' || $hora[0]>'17') || ($hora[1]<'00' || $hora[1]>'59') || (($hora[1] % 15) != '0')){
			$errores .= "Hora invalida -";
		}
	}
	echo $errores;
	
	var_dump($_POST);
	$tmp_name = $_FILES["imagen"]["tmp_name"];
	echo $tmp_name; 
	$directorio = './imagenes';
	$name = basename($_FILES["imagen"]["name"]);
	echo "$directorio/$name";
	if(move_uploaded_file($tmp_name, "$directorio/$name")){
		echo "exito";
	}
	
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$edad = $_POST['edad'];
	$calzado = $_POST['calzado'];
	$altura = $_POST['altura'];
	$fecnac = $_POST['fecnac'];
	$fecturno = $_POST['fecturno'];
	$pelo = $_POST['pelo'];
	$hora = $_POST['hora'];
	$imagen = "$directorio/$name";
	include "resumenTurno.html";
?>