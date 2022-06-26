<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOSUR - empresa</title>
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
                <th>NIT</th>
                <th>Nombre de<br> la empresa</th>
                <th>Valor en <br> bitcoins</th>
                <th>Gremio asociado</th>
            </tr>
        </thead>
        <tbody>

            <?php
                // Se llama a la consulta select
                require('select_e.php');

                // Se pregunta si hay una respuesta dicha consulta
                if($resultE){
                    // Se itera por cada una de las tuplas (filas) del resultado de la consulta
                    foreach($resultE as $tupla_empresa){                         
            ?>
            <tr>
                <td><?=$tupla_empresa['NIT'];?></td>   
                <td><?=$tupla_empresa['nombre'];?></td>   
                <td><?=$tupla_empresa['valor_en_bitcoins_de_la_empresa'];?></td>   
                <td><?=$tupla_empresa['id_gremio'];?></td>   

                <!-- Eliminación -->
                <td>
                    <form action="delete_e.php" method="POST">
                        <input type="text" name="NIT" value=<?=$tupla_empresa['NIT'];?> >
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

    <form action="insert_e.php"method="post">
         

                
    <label>NIT</label>
    <input type="text" name="nit" id="nit" >

    <label>Nombre de la empresa</label>
    <input type="text" name="nombre_emp" id="nombre_emp" >

    <label>Valor en bitcoins</label>
    <input type="text" name="valo_bit" id="valo_bit" >

    <!-- Código para el gremio asociado  -->

    <label>Gremio Asociado</label>
    <!-- <input type="text" name="gre_aso" id="gre_aso" > -->
    <select name="gre_aso">
        <?php
            // Se llama a la consulta select
            require('../gremio/select_g.php');

            // Se pregunta si hay una respuesta dicha consulta
            if($resultG){
                // Se itera por cada una de las tuplas (filas) del resultado de la consulta
                foreach($resultG as $tupla_gremio){ 
                    $value = $tupla_gremio['nombre_gremio'];    
        ?>
            <option value="<?php echo $value;?>" > <?php echo $tupla_gremio['nombre_gremio'];?></option>
        
        <?php
                }
            }
        ?>
    </select>


    <input type="submit" class="btn btn-primary" value="insertar">
    <a href="chofer.php" class="btn btn-success">Reiniciar</a>

    </form>




</body>
</html>
