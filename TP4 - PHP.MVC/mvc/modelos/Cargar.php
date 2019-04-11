<?php
	namespace UNLu\PAW\Modelos;
	Class Cargar{
		private $info;

		public function __construct() {
			$this->info = "";
			$this->info = $this->cargarDatos();

		}
		function cargarDatos(){
			$fileContents = file_get_contents($_SERVER["DOCUMENT_ROOT"].'/tp4/mvc/modelos/data.json');
			$json = json_decode($fileContents, true);
			if ($json != ""){
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
					$str = "<td>$fecha</td>";
					$str .= "<td>$hora</td>";
					$str .= "<td>$nombre</td>";
					$str .= "<td>$tel</td>";
					$str .= "<td><a href=" . '"' . "ficha.php?id=" . "$id" .'"'. '> Link a ficha</a></td>';
					$str .= '</tr>';
				}
				return $str;
			}
		}
		public function getInfo(){
			return $this->info;
		}
	}
?>