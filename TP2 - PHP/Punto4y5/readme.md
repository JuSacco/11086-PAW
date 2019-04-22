4. Agregue al formulario un campo que permita adjuntar una imagen, y que la etiqueta del campo sea
Diagnóstico. El campo debe validar que sea un tipo de imagen valido (.jpg o .png) y será optativo. La
imagen debe almacenarse en un subdirectorio del proyecto y también debe mostrarse al usuario al
mostrar el resumen del turno del ejercicio 2. ¿Qué sucede si 2 usuarios cargan imágenes con el mismo
nombre de imagen? ¿Qué mecanismo implementar para evitar que un usuario sobrescriba una imagen
con el mismo nombre?

	Si al cargar una imagen ya hay otra que posee el mismo nombre el sistema la sobreescribirá. 
	Se puede utilizar la funcion file_exists que recibe como parametro la ruta y checkea si ya existe
	un archivo con el mismo nombre. Se podría renombrar la imagen y dar un nombre unico

5. Utilice las herramientas para desarrollador del navegador y observe cómo fueron codificados por el
navegador los datos enviados por el navegador en los dos ejercicios anteriores. ¿Qué diferencia nota?

	Cuando se realiza el request de la imagen se recibe por GET codificada con el esquema de codificacion
	multipart/form-data y cuando se recibe el resumen del turno se recibe por POST. 
