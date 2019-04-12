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
				<a href="administracion.html">Administracion</a>
				<a href="resumenturno.html">Ficha del turno</a>
			</nav>
		</header>
		<table border="simple">
			<thead>
				<th>Fecha del turno</th>
				<th>Hora del turno</th>
				<th>Nombre del paciente</th>
				<th>Telefono</th>
				<th>Ficha del turno</th>
			</thead>
			<tbody>
				<?php foreach($datos as $d){echo $d;} ?>
			</tbody>
		</table>
	</body>
</html>