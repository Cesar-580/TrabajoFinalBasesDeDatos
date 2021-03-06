# Base de datos

## Relación gremio

### Estructura 

```sql
CREATE TABLE gremio(
	nombre_gremio VARCHAR(30) PRIMARY KEY,
	ced_presidente_gremio INT(15) UNIQUE NOT NULL,
	telefono_del_gremio BIGINT(20) UNIQUE NOT NULL
)ENGINE = InnoDB;
```

### Insersiones

```sql
INSERT INTO `gremio` (`nombre_gremio`,`ced_presidente_gremio`,`telefono_del_gremio`) VALUES('Durotar',2365478,259);

INSERT INTO `gremio` (`nombre_gremio`,`ced_presidente_gremio`,`telefono_del_gremio`) VALUES('Futbolist',1566954,23);

INSERT INTO `gremio` (`nombre_gremio`,`ced_presidente_gremio`,`telefono_del_gremio`) VALUES('Kamurocho',1258921,39);

INSERT INTO `gremio` (`nombre_gremio`,`ced_presidente_gremio`,`telefono_del_gremio`) VALUES('LO',123123123,89);

INSERT INTO `gremio` (`nombre_gremio`,`ced_presidente_gremio`,`telefono_del_gremio`) VALUES('Lordaeron',8763551,86);

INSERT INTO `gremio` (`nombre_gremio`,`ced_presidente_gremio`,`telefono_del_gremio`) VALUES('LosChimbichi',1020874972,45);

INSERT INTO `gremio` (`nombre_gremio`,`ced_presidente_gremio`,`telefono_del_gremio`) VALUES('LosGangplank',39453267,78);

INSERT INTO `gremio` (`nombre_gremio`,`ced_presidente_gremio`,`telefono_del_gremio`) VALUES('POO',123,123);

INSERT INTO `gremio` (`nombre_gremio`,`ced_presidente_gremio`,`telefono_del_gremio`) VALUES('Tristram',447896,28);

```

## Relación empresa rival

### Estructura 

```sql
CREATE TABLE empresa(
	NIT INT(15) PRIMARY KEY,
	nombre VARCHAR(10) NOT NULL,
	valor_en_bitcoins_de_la_empresa INT(5) NOT NULL
		CHECK(valor_en_bitcoins_de_la_empresa > 0),
	id_gremio VARCHAR(30) UNIQUE,
    FOREIGN KEY fk_idGremio(id_gremio) REFERENCES gremio(nombre_gremio) ON DELETE CASCADE
 )ENGINE = InnoDB;
```

### Insersiones

```sql
INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(58005,'Bind',1,'LO');

INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(3691478,'Icebox',3,NULL);

INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(5236987,'Haven',10,'LosGangplank');

INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(9657845,'Fracture',10,'Durotar');

INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(12312312,'Pockinki',3,NULL);

INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(124578963,'Ventormenta',7,Null);

INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(321659875,'Trildrasil',7,Null);

INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(478965489,'Lordaeron',7,"Tristram");

INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(1651651,'Breeze',7,'POO');

INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(598876963,'Kabuchico',7,"Kamurocho");

INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(789123124,'Split',2,NULL);
```



## Relación chofer

### Estructura 

```sql
CREATE TABLE chofer(
	numero_identificacion INT(15) PRIMARY KEY,
	primer_nombre VARCHAR(10) NOT NULL,
	segundo_nombre VARCHAR(10),
	primer_apellido VARCHAR(10) NOT NULL,
	segundo_apellido VARCHAR(10),
	fecha_de_naciemiento DATE NOT NULL,
	fecha_expiracion_pase DATE NOT NULL,
	telfono_celular INT(10) UNIQUE NOT NULL,
    tipo_sangre VARCHAR(3) NOT NULL 
        CHECK(tipo_sangre IN ('A+','A-','B-','B+','O+','O-','AB+','AB-')), 
	
	salario INT(4) NOT NULL
		CHECK(salario > 0),
	
	id_gremio VARCHAR(30),
    FOREIGN KEY fk_idGremio(id_gremio) REFERENCES gremio(nombre_gremio) ON DELETE CASCADE,
    
	id_empresa_rival INT(30),
    FOREIGN KEY fk_idEmpresaRival(id_empresa_rival) REFERENCES empresa(NIT) ON DELETE CASCADE
    )ENGINE = InnoDB;
```

### Insersiones

```sql
INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(1,'Fabio','r','Casas','d','2000-01-20','2022-06-25','987','A+','115','LosGangplank','58005');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(2,'2','2','2','2','1999-01-02','2022-06-25','2323','B+','123','POO','58005');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(98,'a','a','a','a','2000-01-20','2022-06-25','123','B+','123','POO',NULL);

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(123,'Fabio','','Casas','','2000-01-20','2022-06-25','1231231','O-','800','LosGangplank','58005');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(501,'Prueba B1','','asd','','2000-01-29','2022-07-01','27524','O-','300','LO','321659875');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(789,'Luis','','Arenas','Tamayo','2000-01-20','2022-06-25','32163291','B+','300','LosGangplank','5236987');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(1234,'Ramiro','','Portillo','','2000-01-21','2022-06-25','46519651','O-','900','LosGangplank','9657845');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(58978102,'Walter','Hartwell','White','Heisenberg','1967-12-24','2022-06-25','2992789','O-','115','Tristram','9657845');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(73897598,'Ronald','','McDonald','','2000-11-08','2022-06-25','5705215','A-','1200','LosChimbichi','5236987');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(123456789,'Hernan','','Arias','','2000-01-30','2022-06-25','44980959','B-','800','LosGangplank','5236987');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(1010112181,'Cesar','','Ospina','','2000-06-22','2022-06-25','2894825','O+','300','LosChimbichi','9657845');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(78956601566,'Deckard','','Kain','','1987-07-20','2022-07-28','7509863','A-','333','Tristram','9657845');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(14569872,'Arthas','','Menethil','','2001-08-30','2022-08-10','8967896','O-','700','Tristram','5236987');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(16569132,'Maokai','','Velez','','1998-05-03','2022-08-03','4305896','AB+','459','Lordaeron','321659875');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`id_gremio`,`id_empresa_rival`) 
VALUES(164616906,'Kazuma','','Kiryu','','1981-02-10','2022-12-10','8966996','AB-','1200','Kamurocho','5236987');
```


