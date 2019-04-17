<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Solicitud de turno medico</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<header>
			<h1>Sistema de turnos medicos</h1>
			<nav>
				<a href="../../administracion/listar">Administracion</a>
			</nav>
		</header>
		<h2><?php if($info){echo 'Turno modificado correctamente';}else{echo 'Hubo un problema en la modificacion';}?></h2>
		<h3>Resumen de turno</h1>
		<ul>
			<li>Nombre: <?php echo $datos['nombre'] ?></li>
			<li>Email: <?php  echo $datos['email'] ?></li>
			<li>Telefono: <?php echo $datos['tel'] ?></li>
			<li>Edad: <?php echo $datos['edad']?></li>
			<li>Talla: <?php echo $datos['calzado'] ?></li>
			<li>Altura: <?php echo $datos['altura'] ?></li>
			<li>Fecha de nacimiento: <?php echo $datos['fecnac'] ?> </li>
			<li>Color de pelo: <?php echo $datos['pelo'] ?></li>
			<li>Fecha del turno: <?php echo $datos['fecturno']?> </li>
			<li>Hora del turno: <?php echo $datos['hora'] ?> </li>
			<li>Diagnostico: <?php if($datos['img']!= ''){echo '<img src="../../../'.$datos['img'].'">';}?> </li>
		</ul>
	</body>
</html>
