# Base de datos

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
     
	placa_bus VARCHAR(7) bus,
    placa_taxi VARCHAR(7) taxi,

        CHECK(
        (placa_bus IS NULL and placa_taxi IS NOT NULL) 
        OR
        (placa_bus IS NOT NULL and placa_taxi IS NULL )
        ),
	
	id_gremio VARCHAR(30) REFERENCES gremio(nombre_gremio) ON DELETE CASCADE,
	id_empresa_rival INT(30) REFERENCES empresa_rival(NIT) ON DELETE CASCADE,
    )ENGINE = InnoDB;
```

### Insersiones

```sql
INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`placa_bus`,`placa_taxi`,`id_gremio`,`id_empresa_rival`) 
VALUES(1010112181,'Cesar','','Ospina','','2000-01-21','2026-05-19','2894825','O+','1000000','FCL-801',NULL,'LosCimbichi','9657845');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`placa_bus`,`placa_taxi`,`id_gremio`,`id_empresa_rival`) 
VALUES(73897598,'Ronald','','McDonald','','1987-08-14','2026-07-22','5705215','A-','1200000','KJK-528',NULL,'LosCimbichi','3691478');

INSERT INTO `chofer`
(`numero_identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`fecha_de_naciemiento`,`fecha_expiracion_pase`,`telfono_celular`,`tipo_sangre`,`salario`,`placa_bus`,`placa_taxi`,`id_gremio`,`id_empresa_rival`) 
VALUES(58978102,'Walter','Hartwell','White','Heisenberg','1967-12-24','2026-07-22','2992789','O-','1150000',NULL,'KIZ-599','Los Pollos','5236987');

```

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
INSERT INTO `gremio` (`nombre_gremio`,`ced_presidente_gremio`,`telefono_del_gremio`) VALUES('LosCimbichi',1020874972,3027209700);

INSERT INTO `gremio` (`nombre_gremio`,`ced_presidente_gremio`,`telefono_del_gremio`) VALUES('LosGanplank',39453267,3192163065);

INSERT INTO `gremio` (`nombre_gremio`,`ced_presidente_gremio`,`telefono_del_gremio`) VALUES('LosPollos',1001863269,3002501769);
```

## Relación empresa rival

### Estructura 

```sql
CREATE TABLE empresa(
	NIT INT(10) PRIMARY KEY,
	nombre VARCHAR(30) NOT NULL,
	valor_en_bitcoins_de_la_empresa INT(5)
		CHECK(valor_en_bitcoins_de_la_empresa > 0),
	id_gremio VARCHAR(30) UNIQUE REFERENCES gremio ON DELETE CASCADE
);
```

### Insersiones

```sql
INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(9657845,'Fracture', 6,'LosCimbichi');

INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(5236987,'Haven', 10,'LosGanplank');

INSERT INTO `empresa` (`NIT`,`nombre`,`valor_en_bitcoins_de_la_empresa`,`id_gremio`) VALUES(3691478,'Icebox', 3,'LosPollos');


```



--- Primera Consulta --- 

SELECT DISTINCT NIT,nombre
FROM empresa,chofer as c 
WHERE 
    NIT IN (SELECT DISTINCT id_empresa_rival
    FROM chofer
    WHERE chofer.id_gremio IS NOT NULL AND chofer.id_empresa_rival = empresa.NIT
    GROUP BY id_empresa_rival
    HAVING SUM(salario)>1000 AND COUNT(*)>=3)
;

--- Segunda Consulta ---

SELECT DISTINCT numero_identificacion, salario
FROM chofer,gremio, empresa
WHERE
salario > gremio.telefono_del_gremio
AND
chofer.id_gremio = gremio.nombre_gremio
AND 
chofer.id_empresa_rival = empresa.NIT
AND
empresa.id_gremio = chofer.id_gremio
;

