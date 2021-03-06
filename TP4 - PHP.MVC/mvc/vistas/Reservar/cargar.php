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
				<a href="../../">Volver</a>
			</nav>
		</header>
		<form id="formulario" action="../../index/reservar/agregar" method="POST" enctype="multipart/form-data">
		  *Nombre paciente: <input type="text" name="nombre" required><br>
		  *Email: <input type="email" name="email" required><br>
		  *Telefono: <input type="tel" name="tel" required><br>
		  Edad: <input type="number" name="edad"><br>
		  Talla de calzado: <input type="number" min="20" max="45" name="calzado"><br>
		  Altura: <input type="range" name="altura" id="altura" value="160" min="110" max="230" oninput="alturaOut.value = altura.value"><output name="alturaOut" id="alturaOut">160</output>cm<br>
		  *Fecha de nacimiento: <input type="date" name="fecnac" required><br>
		  Color de pelo: 
		  <select form="formulario" name="pelo">
			<option value="rubio">Rubio</option>
			<option value="castanio">Castaño</option>
			<option value="morocho">Morocho</option>
			<option value="no tiene">No Tiene</option>
		  </select>
		  <br>
		  *Fecha del turno: <input type="date" name="fecturno" required><br>
		  Horario del turno: <input type="time" name="hora" min="8:00" max="17:00" step="900"><br>
		  Diagnostico: <input type="file" name="imagen" accept=".jpg,.png">
		  <input type="submit"><input type="reset"><br>
		</form>
		<span>Los campos marcados con * son obligatorios</span>
	</body>
</html>

<!-- 
a. Nombre del paciente (obligatorio)
b. Email (obligatorio)
c. Teléfono (obligatorio)
d. Edad
e. Talla de calzado (desde 20 a 45 enteros)
f. Altura (usando la herramienta de deslizador)
g. Fecha de nacimiento (obligatorio)
h. Color de pelo (Usando un elemento select con las opciones que usted considere adecuadas)
i. Fecha del turno (obligatorio)
j. Horario del turno (Entre las 8:00 hasta las 17:00 con turnos cada 15 minutos)
k. 2 botones: Enviar y Limpiar.
-->