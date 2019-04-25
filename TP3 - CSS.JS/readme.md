# TP3 - CSS & JavaScript
		
## 1) ¿Qué significa que los estilos se apliquen en cascada? ¿cómo aplica la herencia de estilos?
	
Significa que los elementos, dentro de un documento CSS, en los niveles bajos de la jerarquía 
heredan los estilos asignados a los elementos en los niveles más altos. 
La herencia se aplica de modo que si tenemos la siguiente estructura:
```html
	<section>
		<p>Hola mundo!</p>
	</section>
```
Y aplicamos:
```css
	section {
		font-size: 20px;
	} 
```
	El texto del elemento <p> se mostrará con un tamaño de 20 pixeles, esto es, debido a que el elemento
	<p> es hijo del elemento <section> y, por lo tanto, hereda sus estilos.
			
			
## 2) ¿Por qué es necesario utilizar un CSS de Reset?
			
	Es necesario porque los navegadores dan estilos por defecto a diferentes elementos HTML.
	En la mayoría de los casos, estos estilos no solo son diferentes de lo que necesitamos,
	sino que además pueden afectar de forma negativa a nuestro diseño.
	Por ejemplo, los navegadores asignan márgenes a los elementos que usamos frecuentemente
	en nuestro documento, como el elemento <p>. El elemento "<body>" también genera un
	margen alrededor de su contenido, lo que hace imposible extender otros elementos hasta los
	límites de la ventana del navegador. Como si esto fuera poco, la forma en la que se configuran
	los elementos por defecto difiere de un navegador a otro, especialmente cuando
	consideramos ediciones de navegadores antiguas que aún se encuentran en uso. Para poder
	crear un diseño coherente, cualquiera que sea el dispositivo en el que se abre, tenemos que
	resetear algunos de los estilos por defecto, o todos.
				
## 3) ¿Qué es el CSS box model?
		
Es un conjunto de reglas que determinan cómo se van a mostrar las cajas en pantalla (cada
elemento se representa como una caja rectangular), el espacio que ocupan, y cómo se organizan
en la página considerando el espacio disponible.
Actualmente hay varios modelos de cajas disponibles, con el modelo de caja tradicional y el
modelo de caja flexible considerados como estándar. 
	
	Modelo de caja tradicional:
		El modelo de caja tradicional establece que los elementos pueden 
		flotar a cada lado de la ventana y compartir espacio en la misma línea
		con otros elementos, sin importar su tipo. 
		
	Modelo de caja flexible:
		El modelo de caja flexible resuelve los problemas del modelo de caja tradicional de una
		manera elegante. Este modelo aprovecha las herramientas que usa el modelo de caja
		tradicional, como el posicionamiento absoluto y las columnas, pero en lugar de hacer flotar los 
		elementos organiza las cajas usando contenedores flexibles. Un contenedor flexible es un
		elemento que convierte su contenido en cajas flexibles. En este nuevo modelo, cada grupo de
		cajas debe estar incluido dentro de otra caja que es la encargada de configurar sus
		características
				
## 4) ¿Cuál es el código que hay que insertar en una hoja de estilo para poder usar WebFonts?
	
El codigo es:
```css
@font-face {
  font-family: "myFont";
  src: url("myFont.woff");
}
```

## 5) ¿Qué son y para qué sirven los pseudoElementos?

Son palabras claves precedidas por "::", estas pueden ser agregadas al final de los selectores 
para seleccionar una parte determinada de un elemento. Cada pseudoElemento tiene un comportamiento
y caracteristicas diferentes. 
### PseudoElementos:

#### ::after
	Crea un pseudo-elemento que es el ultimo hijo de el elemento seleccionado. A menudo es usado para agregar 
	contenido cosmetico con la propiedad "content" de css.
	Ejemplo:
```css
/* Agregar una flecha despues de los links */
a::after {
  content: "→";
}
```

#### ::before
	Crea un pseudo-elemento que es el primer hijo de el elemento seleccionado. A menudo es usado para agregar 
	contenido cosmetico con la propiedad "content" de css.
	Ejemplo:
```css
/* Agregar un corazon antes de los links */
a::before {
  content: "♥";
}
```

#### ::first-letter
	Es un pseudo-elemento que aplica estilo a la primer letra de la primer linea en un elemento de tipo block,
	pero solo lo hará cuando no este precedido por otro contenido como imagenes, o tablas en linea.
	Ejemplo:
```css
/* Selecciona la primer letra de <p> */
p::first-letter {
  font-size: 130%;
}
```

#### ::first-line
	Es un pseudo-elemento que aplica estilos a la primer linea de un elemento de tipo block. 
	Ejemplo:
```css
/* Selecciona la primer linea de <p> */
p::first-line {
  color: red;
}
```	

#### ::selection
	Es un pseudo-elemento que aplica estilos a una parte del documento que fue seleccionada por el usuario
	(haciendo clic y deslizando el mouse para seleccionar un texto)
	Ejemplo:
```css
/* La seleccion será de color cyan */
::selection {
  background-color: cyan;
}
```		

#### ::backdrop
	Este pseudo-elemento es una caja que se muestra inmediatamente debajo del elemento 
	(y sobre el elemento inmediatamente inferior de la pila, si es que hay), dentro de dicha capa superior.
	Es un pseudo-elemento que se puede utilizar para crear un fondo que oculte el documento subyacente detras de 
	la pila de la capa superior.
	Este pseudo-elemento solo es compatible con algunos navegadores. 
	Dentro de los navegadores mas importantes que no lo soportan esta:
	Google chrome, Opera, Safari, Android webview
	
	
## 6) ¿Cómo se calcula la prioridad de una regla CSS? Expresarlo como una fórmula matemática.
La prioridad de la regla será calculada con el "peso" que esta tenga. La regla de mayor peso prevalecerá sobre la de menor peso.
		Se calcula como: 
```		
Peso = ABC -> Donde:
	A = Cantidad de selectores de ID (Selectores que acceden al atributo 'id' del elemento mediante #).
	B = Cantidad de selectores de CLASE (Selectores que acceden al atributo 'class' del elemento mediante '.').
	C = Cantidad de selectores de HTML (Selectores que acceden al tag html).
```
Ejemplos:
```css
/* A=1; B=1; C=1 => Peso= 111*/
#menu .principal div {
  /* Propiedades */
}
```	
```css
/* A=1; B=0; C=1 => Peso= 101*/
#menu div {
  /* Propiedades */
}
```	
```css
/* A=0; B=1; C=1 => Peso= 11*/
.principal div {
  /* Propiedades */
}
```	
```css
/* A=0; B=0; C=3 => Peso= 3*/
ul li a {
  /* Propiedades */
}
```	
```css
/* A=1; B=1; C=1 => Peso= 113*/
#menu .principal div ul li {
  /* Propiedades */
}
```	
```css
/* A=1; B=3; C=1 => Peso= 131*/
#menu .principal .alternativo .movil div {
  /* Propiedades */
}
```	

## 7) ¿Qué es el view port? ¿Cómo se configura? ¿qué problema soluciona?
El viewport o area de visualizacion representa la parte del navegador donde se muestran nuestras paginas web.
Para configurar y forzar al navegador a definir el tamaño del area de visualizacion igual al tamaño real de la pantall, tenemos que declarar el elemento < meta > 
en la cabecera de nuestros documentos con el nombre viewport y valores que determinan el ancho y la escala que queremos ver. Los valores requeridos son: width e 
initial-scale para declarar el ancho del area de visualizacion y su escala. 

El problema que soluciona es el de normalizar la visualizacion de algunso dispositivos que asignan un ancho de, por ejemplo, 980px al area de visualizacion, sin importar
su tamaño real o el tamaño real de la pantalla. Esto significa que las Media Queries de nuestras hojas de estilo verán un ancho de
980 píxeles cuando en realidad el tamaño del área de visualización es totalmente diferente. 

Ejemplo:
```html
<!DOCTYPE html>
<html lang="es">
<head>
 ...
 <meta name="viewport" content="width=device-width, initial-scale=1">
 ...
</head>
<body>
	...
</body>
</html> 
```