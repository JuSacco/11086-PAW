3. Realice las modificaciones necesarias para que el script del punto anterior reciba los datos mediante
el método GET. ¿Qué diferencia nota? ¿Cuándo es conveniente usar cada método? Consejo: Utilice las
herramientas de desarrollador de su Navegador (Pestaña Red) para observar las diferencias entre las
diferentes peticiones.

La diferencia es que los datos con GET se ven en la URL de la pagina. Lo cual no es conveniente para utilizar 
si la informacion que se esta pasando al servidor es sensible. En caso de usar GET el usuario podría modificar
facilmente (desde la URL) los parametros que son enviados al servidor.
Generalmente se utiliza GET para la obtencion de recursos, a diferencia de POST que es mayormente utilizado
para persistir datos en el servidor.
