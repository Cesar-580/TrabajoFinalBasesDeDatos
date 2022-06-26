<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOSUR - Gremio</title>
</head>
<body>
    
    <!-- Sección indice -->
    <section>
        <h1>Trabajo de base de datos</h1>
        <a href="../index.html">inicio</a>
        <a href="../chofer/chofer.php">Chofer</a>
        <a href="../empresa_rival/empresa.php">Empresa rival</a>
        <a href="../gremio/gremio.php">Gremio</a>
    </section>
    
    <!-- Mostrar las tuplas creadas en Chofer -->
    
    <table>
        <thead>
            <tr>
                <th>Nombre gremio</th>
                <th>Cedula del presidente <br> del gremio</th>
                <th>Telefono del gremio</th>
            </tr>
        </thead>
        <tbody>

            <?php
                // Se llama a la consulta select
                require('select_g.php');

                // Se pregunta si hay una respuesta dicha consulta
                if($resultG){
                    // Se itera por cada una de las tuplas (filas) del resultado de la consulta
                    foreach($resultG as $tupla_gremio){                         
            ?>
            <tr>
                <td><?=$tupla_gremio['nombre_gremio'];?></td>   
                <td><?=$tupla_gremio['ced_presidente_gremio'];?></td>   
                <td><?=$tupla_gremio['telefono_del_gremio'];?></td>   
                

                <!-- Eliminación -->
                <td>
                    <form action="delete_g.php" method="POST">
                        <input type="text" name="nombre_gremio" value=<?=$tupla_gremio['nombre_gremio'];?> >
                        <button title="eliminar" type="submit">X</button>
                    </form>
                </td>

                <td>
                    <form action="empresa.php" method="GET">

                        <button title="editar" type="submit">E</button>
                    </form>
                </td>
            </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>


    <!-- Inserción de elementos -->

    <form action="insert_g.php"method="post">
     
    <label>Nombre gremio</label>
    <input type="text" name="nombre_gre" id="nombre_gre" >

    <label>Cedula del presidente del gremio</label>
    <input type="text" name="ced_presi" id="ced_presi" >

    <label>Telefono del gremio</label>
    <input type="text" name="telf_pre" id="telf_pre" >

    <input type="submit" class="btn btn-primary" value="insertar">
    <a href="chofer.php" class="btn btn-success">Reiniciar</a>

    </form>


</body>
</html>
