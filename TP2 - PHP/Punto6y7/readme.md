¿Cómo relaciona la imagen del turno con los datos del turno? Comente alternativas que evaluó y
opción elegida.

	Cuando se persiste un turno se guarda toda la informacion en un array, y luego lo codifico en JSON.
	Dentro de la informacion que se guarda esta la ruta donde fue guardada la imagen. Cuando se necesita
	mostrar el "Diagnostico" se invoca con '<img src="' . $cargaImg . '" width="200px">'; siendo 
	$cargaImg la ruta de la imagen.
	Se investigo persistir en json y serialize, los resultados fueron a favor de guardar en json; no solo
	por que es universal a diversos lenguajes, sino tambien, en benchmarks arroja un porcentaje altisimo de 
	performance comparado con serialize de php.

	[Benchmark json vs serialize](!https://cdn-images-1.medium.com/max/1600/1*ZFTjN5iSqzRhPg-P-t9YXQ.jpeg)
		
