# TEST SUPERMARKET

Aplicación para la visualizacion del inventario, login para vendedores, y funcionalidades para la modificación 
de los productos (agregar, eliminar, editar).


### Pasos para la ejecucion del proyecto

1. Tener la carpeta del proyecto en **C:\wamp64\www**
2. Iniciar **wamp server** y tener los servicios ejecutándose.
3. Dirigirse a **phpMyAdmin** y crear la base de datos usando.
el archivo db.sql localizado en la carpeta db del proyecto.
4. Insertar un vendedor en la base de datos el cual se usará para posteriormente iniciar sesión una vez ejecutado el proyecto.
5. Ir al archivo conexión en **includes/conexion.php** y configurarlo con el username y password usadas para phpMyAdmin y el nombre de la base de datos creada en el paso 3.
6. Dirigirse al navegador y colocar la ruta **http://localhost/test-supermarket/index.php**  
7. La primera pagina no mostrara las funciones del vendedor, para ello se debe iniciar sesión ingresando los datos (el correo y contraseña que se inserto en la base de datos en el punto 4) en el formulario de la parte derecha.
8. Una vez iniciada la sesión se mostrará el listado de productos, la opción de eliminar. y editar, también un formulario para agregar nuevos productos 
en la parte derecha.
9. Dar clic en el botón de cerrar sesión para volver a la vista del cliente.
