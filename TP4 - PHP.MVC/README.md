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