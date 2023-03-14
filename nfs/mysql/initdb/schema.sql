CREATE DATABASE IF NOT EXISTS `db-lamp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db-lamp`;

CREATE TABLE IF NOT EXISTS cliente(
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	PRIMARY KEY (id)
	);

CREATE TABLE IF NOT EXISTS producto(
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	precio INT(4) NOT NULL,
	PRIMARY KEY (id)
	);


CREATE TABLE IF NOT EXISTS pedido(
	id INT NOT NULL AUTO_INCREMENT,
	id_cliente INT NOT NULL,
	id_producto INT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_cliente) REFERENCES cliente(id),
	FOREIGN KEY (id_producto) REFERENCES producto(id)
	);

INSERT INTO cliente(id, nombre, email) VALUES (null, 'Maria Vega González', 'maria@example.com');
INSERT INTO cliente(id, nombre, email) VALUES (null, 'Francisca Ralcor Gomez', 'paqui@example.com');
INSERT INTO cliente(id, nombre, email) VALUES (null, 'Antonio Corlan Dot', 'antonio@example.com');
INSERT INTO cliente(id, nombre, email) VALUES (null, 'Ivan Lopez Casa', 'ivan@example.com');
INSERT INTO cliente(id, nombre, email) VALUES (null, 'Bego Flor Ruiz', 'bego@example.com');

INSERT INTO producto(id, nombre, precio) VALUES (null, 'Televisor', 1000);
INSERT INTO producto(id, nombre, precio) VALUES (null, 'Cascos', 150);
INSERT INTO producto(id, nombre, precio) VALUES (null, 'Portatil', 2000);
INSERT INTO producto(id, nombre, precio) VALUES (null, 'Nevera', 1500);
INSERT INTO producto(id, nombre, precio) VALUES (null, 'Mueble', 300);











