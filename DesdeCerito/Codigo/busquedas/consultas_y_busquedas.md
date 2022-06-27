# Consultas y busquedas

## Consultas

```
El primer botón debe mostrar el nombre del gremio y la cedula de cada uno de
los gremios que cumple todas las siguientes condiciones: 
-	Conforma a una empresa
-	Tiene sumavalor >1000, 
-	Está constituido por al menos 3 choferes
-	La empresa que conforma no está constituida por ningún chofer.
```

```sql
SELECT nombre_gremio, ced_presidente_gremio FROM gremio 
WHERE 
      chofer.empresa > (SELECT capacidad
                      FROM administrador 
                      WHERE administrador.nombre_usuario = curso.admin_supervisa
                    )
      AND curso.admin_supervisa = (SELECT admin_supervisor
                                FROM profesor
                                WHERE curso.profesor_ensenia = profesor.nombre_usuario
                                   );
```

```
El segundo botón debe mostrar el número de identificación y el salario de cada uno de los choferes que cumple todas las siguientes condiciones: 

-	tiene un salario mayor que el valor en bitcoins de la empresa rival con la que este asociado
-	y además el gremio con el que está asociado, también está asociado(el gremio) con la empresa rival a la que esta asociada el chofer.
```

```sql
SELECT codigo, cantidad_estudiantes FROM curso 
WHERE 
      cantidad_estudiantes > (SELECT capacidad
                      FROM administrador 
                      WHERE administrador.nombre_usuario = curso.admin_supervisa
                    )
      AND curso.admin_supervisa = (SELECT admin_supervisor
                                FROM profesor
                                WHERE curso.profesor_ensenia = profesor.nombre_usuario
                                   );
```