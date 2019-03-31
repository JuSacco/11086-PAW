<?php
	function cargarDatos(){
		$fileContents = file_get_contents('data.json');
		$json = json_decode($fileContents, true);
		foreach($json as $data){
			echo '<tr>';
			foreach($data as $k=>$v){
				if($k =="fecturno")
					$fecha = $v;
				if($k =="hora")
					$hora = $v;
				if($k =="nombre")
					$nombre = $v;
				if($k =="tel")
					$tel = $v;
				if($k =="id")
					$id = $v;
			}
			echo "<td>$fecha</td>";
			echo "<td>$hora</td>";
			echo "<td>$nombre</td>";
			echo "<td>$tel</td>";
			echo "<td><a href=" . '"' . "ficha.php?cargarFicha=" . "$id" .'"'. '> Link a ficha</a></td>';
			echo '</tr>';
		}
	}
	
	include "administracion.html";
?>