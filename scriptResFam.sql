DROP TABLE telefono;
DROP TABLE familiar;
DROP TABLE direccion;

DROP TABLE anciano_tel_familiar_direccion;


CREATE TABLE telefono (
	id_telefono		int(9) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
	telefono 		VARCHAR(45) NOT NULL
);

ALTER TABLE telefono AUTO_INCREMENT = 10000;

CREATE TABLE direccion (
	id_direccion	int(9) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	direccion 		VARCHAR(60) NOT NULL
);

ALTER TABLE direccion AUTO_INCREMENT = 20000;


CREATE TABLE familiares (
	id_familiares int(9) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombres_familiares VARCHAR(60) NOT NULL

);

ALTER TABLE familiar AUTO_INCREMENT = 30000;

CREATE TABLE anciano_tel_familiar_direccion (

	cedula_anciano 	VARCHAR(45),
	id_fam		int(9),
	id_tel	int(9),
	id_dir	int(9)


);

ALTER TABLE anciano_tel_familiar_direccion
ADD FOREIGN KEY (cedula_anciano) REFERENCES anciano (cedula_anciano);

ALTER TABLE anciano_tel_familiar_direccion
ADD FOREIGN KEY (id_tel) REFERENCES telefono (id_telefono);

ALTER TABLE anciano_tel_familiar_direccion
ADD FOREIGN KEY (id_dir) REFERENCES direccion (id_direccion);


ALTER TABLE anciano_tel_familiar_direccion
ADD FOREIGN KEY (id_fam) REFERENCES familiares (id_familiares);







