<?php
	namespace UNLu\PAW\Modelos;
	Class Turnos{
		private $conn;
		public function __construct($conn) {
			$this->conn = $conn;
		}

		function fillAllTurnos(){
			$sql = "SELECT * FROM turnos";
			$datos;
			foreach ($this->conn->db->query($sql) as $row) {
				$str = "<tr> <td> ".$row['fec_turno']."</td>";
				$str .= "<td> ".$row['horario_turno']." </td>";
				$str .= "<td> ".$row['nombre']."</td>";
				$str .= "<td> ".$row['telefono']."</td>";
				$str .= "<td>".'<a href="'.'/tp4/mvc/index/administracion/mostrar/'.$row['id'].'"'.">Ver Ficha</a> </td> </tr>";
				$datos[] = $str;
			}
			return $datos;
		}
		function showTurno($id){
			$sql = "SELECT * FROM turnos WHERE id=$id";
			$datos;
			foreach ($this->conn->db->query($sql) as $data) {				
				$datos['id'] = $data['id'];
				$datos['nombre']=$data['nombre'];
				$datos['email']=$data['mail'];
				$datos['tel']=$data['telefono'];
				$datos['edad']=$data['edad'];
				$datos['calzado']=$data['talla'];
				$datos['altura']=$data['altura'];
				$datos['fecnac']=$data['fec_nac'];
				$datos['fecturno']=$data['fec_turno'];
				$datos['pelo']=$data['color_pelo'];
				$datos['hora']=$data['horario_turno'];
				$datos['image']=$data['url_diagnostico'];
			}
			return $datos;
		}
/*
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
*/
		public function getInfo(){
			return $this->info;
		}
	}
?>