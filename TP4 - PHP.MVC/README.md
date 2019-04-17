# TP2 - PHP

	1) Instale el Sistema Gestor de Bases de Datos MySQL y las extensiones necesarias para poder
	interactuar con la misma desde PHP. Documente brevemente los pasos realizados y como verificó
	que el driver se instaló correctamente (vía phpinfo y vía un script de prueba).
	
		#PHPinfo()
			En el navegador ir a http://localhost/?phpinfo=-1 (en mi caso, generalmente el path es: http://localhost/phpinfo.php ),
			Luego en la seccion de Configuracion si todo se instaló correctamente encontraremos:
				#mysqli y pdo_mysql: 
					Extensiones que son parte de la libreria mysqlnd o libmysqlclient.
				#mysqlnd: 
					Es la libreria que integra php por defecto desde la distribucion de php 5.3.0.
					Se recomienda usar esta en vez de libmysqlclient, ya que ofrece caracteristicas como conexiones inactivas y
					caché de consultas 
			
			
		#Script
			El script de prueba que se utilizo, fue un listador de las tablas que contenía la bd information_schema. 
			Dicho script se encuentra adjunto en esta carpeta bajo el nombre "testMysql.php"
	
	
	2) Genere un objeto que construya y gestione la conexión a la base de datos. El objeto debe permitir
	vía constructor la provisión de los datos de acceso. Los datos de acceso deben estar en un archivo
	de  configuración específico y fuera del control de versiones.
		
		El comando para quitar el archivo de control de versiones es: 
		git rm --cached <archivoAQuitar>
	
	
	3) Extienda el sistema de gestión de turnos médicos para que los datos sean persistidos sobre una
	base de datos. La generación del número de turno debe hacerse vía motor de base de datos. ¿Que
	cambios hubo que realizar para la generación del id?
			
		Cuando se creo la tabla de 'turnos' se creó un campo id con la opcion activada AUTOINCREMENT,
		luego para agregar turnos en el atributo id se le pasó NULL, el SGBD al recibir este valor
		le asigna el ultimo id que ingreso +1.
		#Ejemplo de query:
			$sql = "INSERT INTO `turnos`(**`id`**, `nombre`, `mail`, `telefono`, `edad`, `talla`, `altura`, `fec_nac`, `color_pelo`, `fec_turno`, `horario_turno`, `url_diagnostico`) 
			VALUES (**NULL**, :nombre, :email, :tel, :edad, :calzado, :altura, :fecnac, :pelo, :fecturno, :hora, :img)";
			
	4) Modifique el sistema para permitir que las imágenes sean persistidas sobre la base de datos. El
	software debe permitir cargar imágenes de hasta 10 MB.
		
		#Condicion
			$maxSize = 10000000;
			if ($_FILES["imagen"]["size"] <= $maxSize){}
			
	5) ¿Qué es un motor de persistencia ORM (Object-Relational Mapping; Mapeo objeto-relacional)?
	¿Qué problemática resuelve? Realice una evaluación de cuánto le costaría modificar el código para
	implementar uno en el sistema de turnos por usted desarrollado. Si para realizar la evaluación
	necesita elegir un producto particular, aclarelo.
		
		#Que es ORM: 
			Es un modelo de programación que permite mapear las estructuras de una base de datos relacional (Firebird, SQL Server, MySQL, etc.),
			sobre una estructura lógica de entidades (Clases del proyecto) con el objetivo de simplificar y acelerar el desarrollo de nuestras aplicaciones.
			Las estructuras de la base de datos relacional quedan vinculadas con las entidades lógicas o base de datos virtual definida en el ORM,
			de tal modo que las acciones CRUD (Create, Read, Update, Delete) a ejecutar sobre la base de datos física se realizan de forma indirecta por medio del ORM.
		
		#Que problemas resuelve:
			Además de mapear los objetos sobre estructuras de bases de datos relacional, los ORMs sirven para liberarnos de la escritura o generación manual de código SQL
			para realizar las queries o consultas y gestionar la persistencia de datos en la base de datos.
			Utilizando un ORM este mapeo será automático, es más, será independiente de la base de datos que estemos utilizando en ese momento
			pudiendo tambien cambiar de motor de base de datos según las necesidades del proyecto.
		
		#Costo de implementar un ORM:
			Se puede implementar a un costo muy bajo, con algunas modificaciones minimas en el Objeto(ya que de un principio no estaba pensado para ORM) y
			luego con algunas modificaciones en el funcionamiento de el CRUD, actualmente son consultas SQL manuales.
			
			#Implementacion con Propel
				1. Descarga desde git:  $ git clone git://github.com/propelorm/Propel2 vendor/propel
				2. Crear un esquema y describir la estructura de clases en XML: schema.xml
					#Ejemlo:
						<?xml version="1.0" encoding="UTF-8"?>
						<database name="dbturnos" defaultIdMethod="native">
						  <table name="turnos" phpName="Turnos">
							<column name="id" type="integer" required="true" primaryKey="true" autoIncrement="true"/>
							<column name="nombre" type="varchar" size="50" required="true" />
							<column name="mail" type="varchar" size="40" required="true" />
							<column name="telefono" type="varchar" size="40" required="true"/>
							<column name="fecturno" type="date" required="true"/>
						  </table>
						</database>
				3.Construir el modelo ("Propel.php"): Se creará un archivo con la configuracion necesaria para hacer funcionar el framework
					#Ejemplo: propel.php:
						<?php
							return [
								'propel' => [
									'database' => [
										'connections' => [
											'dbturnos' => [
												'adapter'    => 'mysql',
												'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
												'dsn'        => 'mysql:host=localhost;dbname=my_db_name',
												'user'       => 'my_db_user',
												'password'   => 's3cr3t',
												'attributes' => []
											]
										]
									],
									'runtime' => [
										'defaultConnection' => 'dbturnos',
										'connections' => ['dbturnos']
									],
									'generator' => [
										'defaultConnection' => 'dbturnos',
										'connections' => ['dbturnos']
									]
								]
							];
						?>
				4.Generar el codigo SQL del esquema: Entrar en la carpeta que contiene el propel.ext y schema.xml y ejecutar: $ propel sql:build
				5.Generar el modelo de clases: En la misma carpeta ejecutar: $ propel model:build
				Una vez realizado esto, Propel creará 3 clases php para cada tabla en la db. 
					Clase de modelo(Model class): Representa a una fila en la db.
					Clase de mapeo(Tablemap class): Ofrece constantes y métodos estáticos principalmente para compatibilidad con versiones anteriores de Propel.
					Clase de consulta(Query class): Se utiliza para operar en una tabla: recuperar y actualizar filas.
				Las anteriores clases se crearán vacias, pero heredarán de clases base que se encuentran en el directorio Generated-classes/Base/
				Estas clases vacias se llaman Stub classes
				6.Compilar la configuracion de tiempo de ejecucion: Por cuestiones de performance, propel prefiere usar una version de php en vez de estar
				leyendo desde el archivo de configuracion cada vez que lo necesita. Por lo tanto hay que compilar la version de php de la configuracion con el
				siguiente comando: $ propel config:convert
				Este comando lee la configuracion en tiempo de ejecucion y genera un script php relativo que puede ser encontrado en generated-conf/config.php
					
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
