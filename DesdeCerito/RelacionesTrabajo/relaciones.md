# Creación de todas las relaciones.

## Para las fechas tener en cuenta:

![TiposDatosDeFechas](img/DATE_DATETIME_TIMESTAMP%2C.JPG)
![TiposDatosDeFechas_2](img/DATE_DATETIME_TIMESTAMP_2.JPG)

---

## Relación matricula

<center>

![RelaciónMatricula](img/matricula.png)
</center>

```sql
CREATE TABLE matricula(
			placa_identificacion VARCHAR(7) PRIMARY KEY
				CHECK (placa_identificacion LIKE '___'||'-'||'___'),
			fecha_vencimiento_seguro DATE NOT NULL,
			modelo VARCHAR(10) NOT NULL,
			lugar_compra_vehiculo VARCHAR(15) NOT NULL,
			marca VARCHAR(10) NOT NULL,
			tipo VARCHAR(1) NOT NULL 
    			CHECK(tipo in('T','B'))
			);
```

## Relación despachador

<center>

![RelaciónDespachador](img/despachador.jpg)

</center>

```sql
CREATE TABLE despachador(
			 numero_identificacion NUMBER(15) PRIMARY KEY,
			 primer_nombre VARCHAR(10) NOT NULL,
			 segundo_nombre VARCHAR(10),
			 primer_apellido VARCHAR(10) NOT NULL,
			 segundo_apellido VARCHAR(10),NUMBER
			 fecha_nacimiento DATE,
    		 edad NUMBER(2) NOT NULL 
                CHECK(edad>18),
			 telfono_celular NUMBER(10) UNIQUE NOT NULL
			 );
```

## Relación destino

<center>

![RelaciónDestino](img/destino.png)

</center>

```sql
CREATE TABLE destino(
		     codigo NUMBER(10) PRIMARY KEY,
		     coordenada_GPS VARCHAR(30) NOT NULL,
	                 fecha DATETIME,
		     direccion_destino VARCHAR(30),
		     hora_llegada TIMESTAMP
		     );
```

## Relación mecánico

<center>

![RelaciónMecánico](img/mecanico.png)

</center>

```sql
CREATE TABLE mecanico(
	 	      numero_identificacion NUMBER(15) PRIMARY KEY,
		      primer_nombre VARCHAR(10) NOT NULL,
		      segundo_nombre VARCHAR(10),
		      primer_apellido VARCHAR(10) NOT NULL,
		      segundo_apellido VARCHAR(10),
		      lugar_estudios VARCHAR(20) NOT NULL,
		      
    		  tipo_sangre VARCHAR(3) NOT NULL 
    			CHECK(tipo_sangre IN ('A+','A-','B-','B+','0+','0-','AB+','AB-')),

    		  seguro_vida NUMBER(1) NOT NULL 
    			CHECK(seguro_vida IN(0,1)),
    
    		  edad NUMBER(2) NOT NULL 	
    			CHECK(edad>18),
		      tipo_mecanico VARCHAR(4) NOT NULL 
    			CHECK(tipo_mecanico IN('Taxi','Bus'))
		      );
```

## Relación chofer

<center>

![RelaciónMecánico](img/chofer.png)

</center>

```sql
CREATE TABLE chofer(
	numero_identificacion NUMBER(15) PRIMARY KEY,
	primer_nombre VARCHAR(10) NOT NULL,
	segundo_nombre VARCHAR(10),
	primer_apellido VARCHAR(10) NOT NULL,
	segundo_apellido VARCHAR(10),

	fecha_expiracion_pase DATE NOT NULL,
	telfono_celular NUMBER(10) UNIQUE NOT NULL,
    tipo_sangre VARCHAR(3) NOT NULL 
        CHECK(tipo_sangre IN ('A+','A-','B-','B+','0+','0-','AB+','AB-')), 

    placa_bus REFERENCES bus,
    placa_taxi REFERENCES taxi,

        CHECK(
        (placa_bus IS NULL and placa_taxi IS NOT NULL) 
        OR
        (placa_bus IS NOT NULL and placa_taxi IS NULL )
        )
    );
```

## Relación Bus

<center>

![RelaciónMecánico](img/bus.png)

</center>

```sql
CREATE TABLE bus(
    placa_de_identificacion VARCHAR(7) PRIMARY KEY REFERENCES matricula(placa_identificacion),

    numero_de_pasajeros_de_pie_permitidos NUMBER(3),
    numero_de_asientos NUMBER(3) NOT NULL,
    fecha_de_compra DATE NOT NULL,
    fecha_de_ultimo_mantenimiento DATE,
    valor de compra NUMBER(3) NOT NULL,
    
);
```


