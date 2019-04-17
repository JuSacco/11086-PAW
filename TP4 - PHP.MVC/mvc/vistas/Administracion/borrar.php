<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Panel administracion de turnos medicos</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<header>
			<h1>Sistema de turnos medicos</h1>
			<nav>
				<a href="/tp4/mvc">Volver</a>
			</nav>
		</header>
		<table border="simple">
			<thead>
				<th>Fecha del turno</th>
				<th>Hora del turno</th>
				<th>Nombre del paciente</th>
				<th>Telefono</th>
				<th>Ficha del turno</th>
				<th>Modificar</th>
				<th>Borrar</th>
			</thead>
			<tbody>
				<?php if($datos != null)foreach($datos as $d){echo $d;} ?>
			</tbody>
		</table>
	</body>
</html>