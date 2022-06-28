# Consultas y busquedas

## Consultas

Sea sumavalor la suma de los salarios de todos los choferes asociados a una empresa.

### Primera consulta

El primer botón debe mostrar el NIT y el nombre de la empresa de cada una de las empresas que cumple todas las siguientes condiciones: El gremio asociado (a la empresa) es no NULO:

- Tiene sumavalor >1000
- Está constituido por al menos 3 choferes
- El gremio que lo tiene conformado no está constituido por ningún chofer.

```sql
SELECT DISTINCT NIT,nombre 
FROM empresa
WHERE 
empresa.id_gremio IS NOT NULL AND empresa.id_gremio NOT IN (SELECT id_gremio FROM chofer) AND NIT IN (
    SELECT chofer.id_empresa_rival 
    FROM chofer
    WHERE chofer.id_empresa_rival IS NOT NULL
	GROUP BY chofer.id_empresa_rival
    HAVING SUM(chofer.salario)> 1000 AND COUNT(*)>=3
	);
```

### Segunda consulta


El segundo botón debe mostrar el número de identificación y el salario de cada uno de los choferes que cumple todas las siguientes condiciones:

- Tiene un salario mayor que el teléfono del gremio con la que este asociado
- Además la empresa con el que está asociado, también está asociada con el gremio aL que esta asociado el chofer.


```sql
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
```

### Primera busqueda

Dos fechas f1 y f2 (cada fecha con día, mes y año), f2 ≥ f1 y un número entero n, n ≥ 0. Se debe mostrar el nombre del gremio y el teléfono del gremio de todos los gremios que tiene asociados exactamente n choferes nacidos en dicho rango de fechas [f1, f2].

```sql
if($num > 0){
    $queryB1 = "SELECT DISTINCT nombre_gremio,telefono_del_gremio
    FROM gremio, chofer
    WHERE chofer.id_gremio = gremio.nombre_gremio 
    AND chofer.id_gremio IS NOT NULL
    AND chofer.fecha_de_naciemiento >= '$fecha1'
    AND chofer.fecha_de_naciemiento <= '$fecha2'
    GROUP BY chofer.id_gremio
    HAVING COUNT(*) = $num;
";
}else{
    $queryB1 = "SELECT DISTINCT nombre_gremio,telefono_del_gremio 
    FROM gremio
    WHERE gremio.nombre_gremio NOT IN ( 
        SELECT chofer.id_gremio FROM chofer 
        WHERE chofer.fecha_de_naciemiento >= '$fecha1'
        AND chofer.id_gremio IS NOT NULL
        AND chofer.fecha_de_naciemiento <= '$fecha2' 
        GROUP BY chofer.id_gremio 
        HAVING COUNT(*) > 0 );";        
}
```

## Segunda busqueda

Dos números enteros n1 y n2, n1 ≥ 0, n2 > n1. Se debe mostrar el nit y el nombre de todas las empresas rivales que tienen asociados entre n1 y n2 choferes (intervalo cerrado [n1, n2]).

```sql
if($NMiC > 0){
    $queryB2 = "SELECT DISTINCT NIT,nombre
    FROM empresa,chofer
    WHERE 
    chofer.id_empresa_rival = NIT
    AND chofer.id_empresa_rival IS NOT NULL
    GROUP BY chofer.id_empresa_rival
    HAVING COUNT(*) >= $NMiC AND COUNT(*) <= $NMaC ;
    ";
}else{
    $queryB2 = "SELECT DISTINCT NIT,nombre FROM empresa 
    WHERE NIT NOT IN ( 
    SELECT chofer.id_empresa_rival FROM chofer 
    WHERE chofer.id_empresa_rival IS NOT NULL
    GROUP BY chofer.id_empresa_rival 
    HAVING COUNT(*) > $NMaC)";
}
```