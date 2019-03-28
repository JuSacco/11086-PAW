<?php
	#preg_match: Busca un patron en un string, si lo encuentra devuelve true. 
	#"/^[a-zA-Z ]*$/": Expresion regular para buscar letras y espacios
	$errores = "";
	$fecturno = $_GET['fecturno'];
	if ((strlen($_GET['nombre']) < 1) || (!preg_match("/^[a-zA-Z ]*$/",$_GET['nombre']))){
		$errores .= "Nombre invalido -";
	}
	if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
		$errores .= "Mail invalido -";
	}
	if((strlen($_GET['tel']) < 5) || (!preg_match("/^[0-9 +]*$/",$_GET['tel']))){
		$errores .= "Telefono invalido -";
	}
	if(($_GET['edad']<0) || ($_GET['edad']>150) || (!preg_match("/^[0-9]*$/",$_GET['tel']))){
		$errores .= "Edad invalida -";
	}
	if(($_GET['calzado']<=20) || ($_GET['calzado']>=45) || (!preg_match("/^[0-9]*$/",$_GET['calzado']))){
		$errores .= "Calzado invalido -";
	}
	if(($_GET['altura']<=0) || ($_GET['altura']>=230) || (!preg_match("/^[0-9]*$/",$_GET['altura']))){
		$errores .= "Altura invalida -";
	}
	$fecnac = explode('-', $_GET['fecnac']);
	if ((!checkdate($fecnac[1], $fecnac[2], $fecnac[0])) || ($fecnac[0]>2019)){
		$errores .= "Fecha invalida -";
	}
	$tipoPelo = ['rubio','castanio','no tiene','morocho'];
	$pelo[0] = $_GET['pelo'];
	$pelo = array_intersect($pelo,$tipoPelo);
	if(sizeof($pelo) == 0){
		$errores .= "Pelo invalido -";
	}
	$fecturno = explode('-', $_GET['fecturno']);
	if ((!checkdate($fecturno[1], $fecturno[2], $fecturno[0]))){
		$errores .= "Fecha invalida -";
	}
	if($_GET['hora']!=''){
		$hora = explode(':', $_GET['hora']);
		var_dump($hora);
		if ( ($hora[0]<'08' || $hora[0]>'17') || ($hora[1]<'00' || $hora[1]>'59') || (($hora[1] % 15) != '0')){
			$errores .= "Hora invalida -";
		}
	}
	echo $errores;
	
	$nombre = $_GET['nombre'];
	$email = $_GET['email'];
	$tel = $_GET['tel'];
	$edad = $_GET['edad'];
	$calzado = $_GET['calzado'];
	$altura = $_GET['altura'];
	$fecnac = $_GET['fecnac'];
	$fecturno = $_GET['fecturno'];
	$pelo = $_GET['pelo'];
	$hora = $_GET['hora'];
	
	include "resumenTurno.html";
?>