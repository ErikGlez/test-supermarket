CREATE DATABASE test-supermarket;

use test-supermarket;

CREATE TABLE vendedores(
id  int(255) auto_increment not null,
nombre varchar(100) not null,
apellidos varchar(100) not null,
correo varchar(255) not null,
contrasena varchar(100) not null,
CONSTRAINT pk_vendedor PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE productos(
id  int(255) auto_increment not null,
nombre varchar(100) not null,
descripcion varchar(250) not null,
stock decimal(15,2)not null,
precio decimal(15,2) not null,
CONSTRAINT pk_producto PRIMARY KEY(id)
)ENGINE=InnoDb;


CREATE TABLE ventas(
id int(255) auto_increment not null,
nombre varchar(100) not null,
apellidos varchar(100) not null,
domicilio varchar(100) not null,
correo varchar(255) not null,
telefono varchar(255) not null,
total decimal(15,2) not null,
fecha datetime not null,
CONSTRAINT pk_venta PRIMARY KEY(id)
)ENGINE=InnoDb;


CREATE TABLE detalles(
id  int(255) auto_increment not null,
id_venta int(255) not null,
id_producto int(255) not null,
cantidad decimal(15,2) not null,
subTotal decimal (15,2) not null,
CONSTRAINT pk_detalle PRIMARY KEY(id),
CONSTRAINT FK_ventaDetalle FOREIGN KEY (id_venta)
    REFERENCES ventas(id),
CONSTRAINT FK_productoDetalle FOREIGN KEY (id_producto)
    REFERENCES productos(id)
)ENGINE=InnoDb;



 