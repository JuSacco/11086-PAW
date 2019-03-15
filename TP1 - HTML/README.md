# TP1 - HTML
	Preguntas teoricas
	1¿Qué es un lenguaje de marcado? ¿Cuál es su utilidad? ¿Qué es un tag? ¿Qué es un atributo? 
Un lenguaje de marcas es un lenguaje que consiste en dar organización a un documento incorporando etiquetas. Su utilidad esta en que anota el texto de modo que una computadora pueda manipularlo e interpretarlo. 
Los tag o etiquetas en HTML son fragmentos de texto rodeados por corchetes angulares < >, que tienen funciones y usos específicos de modo que el navegador pueda interpretar correctamente el contenido.
Un atributo es un código de forma nombre_atributo=”valor” que nos sirve para especificar detalles de la etiqueta dentro de la cual están escritos. Cada etiqueta tiene atributos específicos los cuales podrían ser el color del texto, el color de fondo, ancho y alto, la ruta de una imagen o recurso, etc.

2. ¿Cuál es la utilidad de HTML? ¿Qué conjunto mínimo de tags debe contener un documento elaborado en este lenguaje? Describa brevemente su utilidad.
La utilidad del HTML es efinir el contenido y organización de como estará conformada una pagina web.
<!DOCTYPE html>: Indica el tipo de documento que es.
<html>: Define el inicio de codigo html
<head>: Define la cabecera, donde se encontrará informacion sobre el documento, que generalmente, no es mostrada en el cuerpo de la pagina.
<body>: Define el cuerpo o contenido principal del documento. Esta es la parte que se muestra en el navegador.

3. ¿Cuál es la utilidad e importancia de los enlaces o links entre páginas? ¿Qué significa hipertexto? ¿Un link solo puede apuntar a otra página? ¿Qué importancia tiene esto último?
La utilidad radica en que dentro de un texto se puede enlazar a otros textos o recursos por estos enlaces. Un hipertexto es un texto que no está limitado a ser lineal, es un texto que contiene enlaces a otros textos. No solo un link puede apuntar a otra pagina, tambien puede apuntar a un recurso de la misma pagina. La importancia es que nos otorga una navegabilidad y múltiples paginas/recursos en un solo sitio.

4. ¿Qué es el Rendering Engine de un Browser? ¿Cuál es el que utiliza cada uno de los 5 browsers más conocidos (Chrome, Firefox, Safari, IE-Edge, Opera)? ¿Cuál es la importancia de conocer cada uno de ellos en la construcción de un sitio?
Es un software que toma el codigo HTML y CSS; lo interpreta y lo muestra ya formateado en pantalla. Google Chrome utiliza Blink; Mozila Firefox utiliza Gecko; Safari utiliza WebKit; IE-Edge utiliza Trident; Opera utiliza Presto. La importancia de conocerlos es fundamental para saber si el codigo que nosotros escribimos será correctamente interpretado por el navegador, existen paginas como https://caniuse.com/ en la que podemos ver si determinado codigo es soportado o no por los navegadores.