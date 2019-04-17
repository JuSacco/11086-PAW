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
				<a href="../../administracion/listar">Volver</a>
			</nav>
		</header>
		<form id="formulario" action="../../administracion/update/<?php echo $datos['id']; ?>" method="POST" enctype="multipart/form-data">
		  *Nombre paciente: <input type="text" name="nombre" value="<?php echo $datos['nombre']; ?>" required><br>
		  *Email: <input type="email" name="email" value="<?php echo $datos['email']; ?>" required><br>
		  *Telefono: <input type="tel" name="tel" value="<?php echo $datos['tel']; ?>" required><br>
		  Edad: <input type="number" name="edad" value="<?php echo $datos['edad']; ?>"><br>
		  Talla de calzado: <input type="number" min="20" max="45" name="calzado" value="<?php echo $datos['calzado']; ?>"><br>
		  Altura: <input type="range" name="altura" id="altura" value="<?php echo $datos['altura']; ?>" min="110" max="230" oninput="alturaOut.value = altura.value"><output name="alturaOut" id="alturaOut"><?php echo $datos['altura']; ?></output>cm<br>
		  *Fecha de nacimiento: <input type="date" name="fecnac" value="<?php echo $datos['fecnac']; ?>" required><br>
		  Color de pelo: 
		  <select form="formulario" name="pelo">
			<option value="rubio"<?php if($datos['pelo'] == "rubio"){echo 'selected="selected"';}; ?>>Rubio</option>
			<option value="castanio"<?php if($datos['pelo'] == "castanio"){echo 'selected="selected"';}; ?>>Castaño</option>
			<option value="morocho"<?php if($datos['pelo'] == "morocho"){echo 'selected="selected"';}; ?>>Morocho</option>
			<option value="no tiene"<?php if($datos['pelo'] == "no tiene"){echo 'selected="selected"';}; ?>>No Tiene</option>
		  </select>
		  <br>
		  *Fecha del turno: <input type="date" name="fecturno" value="<?php echo $datos['fecturno']; ?>" required><br>
		  Horario del turno: <input type="time" name="hora" min="8:00" max="17:00" step="900" value="<?php echo $datos['hora']; ?>"><br>
		 <?php if($datos['image'] !== '') echo ' Imagen diagnostico: <img src="'.$datos['image'].'"><br>';?> 
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