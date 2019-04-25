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
	en nuestro documento, como el elemento "<p>". El elemento "<body>" también genera un
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
		
		
		