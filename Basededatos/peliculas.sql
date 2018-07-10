create database peliculas;
use peliculas;

create table registro(
	id int auto_increment primary key not null,
    nombre varchar(70) not null,
    cantidad int(16) not null,
    fecha date not null
);
