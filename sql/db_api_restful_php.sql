DROP DATABASE IF EXISTS db_api_restful_php;
CREATE DATABASE db_api_restful_php;
USE db_api_restful_php;

CREATE TABLE usuario(
  id_usuario int(11) primary key auto_increment not null,
  nombre varchar(50) not null,
  apellido varchar(50) not null
);
INSERT INTO usuario (id_usuario, nombre, apellido) VALUES
(1, 'Esteban', 'Quito'),
(2, 'Daniel', 'Murillo'),
(3, 'Nayib', 'Calleja');

