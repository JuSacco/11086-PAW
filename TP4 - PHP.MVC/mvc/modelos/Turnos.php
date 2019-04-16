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
		function uplImage(){
			$tmp_name = $_FILES["imagen"]["tmp_name"];
			$directorio = "./imagenes";
			$name = basename($_FILES["imagen"]["name"]);

			if((!file_exists("$directorio/$name")) && (move_uploaded_file($tmp_name, "$directorio/$name"))){
				$res = "$directorio/$name";
			}else{
				$res = "";
			}
		return $res;
		}
		function addTurno($datos){
			/*
			$nombre = $datos['nombre'];
			$email = $datos['email'];
			$tel = $datos['tel'];
			$edad = $datos['edad'];
			$calzado = $datos['calzado'];
			$altura = $nombre = $datos['altura'];
			$fec_nac = $datos['fecnac'];
			$fec_turno = $datos['fecturno'];
			$hora = $datos['hora'];
			$image = $datos['image'];
			$pelo = $datos['pelo'];
			$sql = "INSERT INTO turnos (id, nombre, mail, telefono, edad, calzado, altura, fec_nac, fec_turno, horario_turno, url_diagnostico, color_pelo) VALUES ('NULL','$nombre', '$email', '$tel', '$edad', '$calzado', '$altura', '$fec_nac', '$fec_turno', '$hora', '$image', '$pelo')";
			if ($this->conn->db->query($sql) === TRUE){
				return $this->conn->db->lastInsertId();
			}
			*/
			$sql = "INSERT INTO `turnos` (`id`, `nombre`, `mail`, `telefono`, `edad`, `calzado`, `altura`, `fec_nac`, `fec_turno`, `horario_turno`, `url_diagnostico`, `color_pelo`) 
			VALUES ('' ,:nombre, :email, :tel, :edad, :calzado, :altura, :fecnac:, :fecturno, :hora, :image, :pelo)";
			$stmt = $this->conn->db->prepare($sql)->execute($datos);
			$error = $this->conn->db->errorInfo();
			var_dump($error);
		}
	}
?>