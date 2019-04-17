<?php
	namespace UNLu\PAW\Modelos;
	Class Turnos{
		private $conn;
		public function __construct($conn) {
			$this->conn = $conn;
		}

		function fillAllTurnos(){
			$sql = "SELECT * FROM turnos";
			$datos = null;
			foreach ($this->conn->db->query($sql) as $row) {
				$str = "<tr> <td> ".$row['fec_turno']."</td>";
				$str .= "<td> ".$row['horario_turno']." </td>";
				$str .= "<td> ".$row['nombre']."</td>";
				$str .= "<td> ".$row['telefono']."</td>";
				$str .= "<td>".'<a href="'.'/tp4/mvc/index/administracion/mostrar/'.$row['id'].'"'.">Ver Ficha</a> </td>";
				$str .= "<td>".'<a href="'.'/tp4/mvc/index/administracion/modificar/'.$row['id'].'"'.">Modificar</a> </td>";
				$str .= "<td>".'<a href="'.'/tp4/mvc/index/administracion/borrar/'.$row['id'].'"'.">Borrar</a> </td> </tr>";
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
		function uplImage(){
			$tmp_name = $_FILES["imagen"]["tmp_name"];
			$directorio = "./imagenes";
			$name = basename($_FILES["imagen"]["name"]);
			$maxSize = 10000000;

			if((!file_exists("$directorio/$name")) &&
			(move_uploaded_file($tmp_name, "$directorio/$name")) &&
			($_FILES["imagen"]["size"] <= $maxSize)){
				$res = "$directorio/$name";
			}else{
				$res = "";
			}
		return $res;
		}
		function addTurno($datos){
			$sql = "INSERT INTO `turnos`(`id`, `nombre`, `mail`, `telefono`, `edad`, `talla`, `altura`, `fec_nac`, `color_pelo`, `fec_turno`, `horario_turno`, `url_diagnostico`) 
			VALUES (NULL, :nombre, :email, :tel, :edad, :calzado, :altura, :fecnac, :pelo, :fecturno, :hora, :img)";
			$stmt = $this->conn->db->prepare($sql)->execute($datos);	
			return $this->conn->db->lastInsertId();		
		}

		function update($id, $datos){
			$sql = "UPDATE `turnos`
					SET `id`=:id,
						`nombre`=:nombre,
						`mail`=:email,
						`telefono`=:tel,
						`edad`=:edad,
						`talla`=:calzado,
						`altura`=:altura,
						`fec_nac`=:fecnac,
						`color_pelo`=:pelo,
						`fec_turno`=:fecturno,
						`horario_turno`=:hora,
						`url_diagnostico`=:img 
					WHERE id=:id";
			$datos['id'] = $id;
			$stmt = $this->conn->db->prepare($sql)->execute($datos);	
			return $stmt;		
		}
		function delete($id){
			$sql = "DELETE FROM `turnos` WHERE id=$id";
			$datos['id'] = $id;
			$stmt = $this->conn->db->prepare($sql)->execute($datos);	
			return $stmt;		
		}
	}
?>