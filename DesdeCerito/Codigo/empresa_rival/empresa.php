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
        <a href="../busquedas/busquedas.php">Busquedas</a>
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
                        <input type="text" hidden name="NIT" value=<?=$tupla_empresa['NIT'];?> >
                        <button title="eliminar" type="submit">X</button>
                    </form>
                </td>

                <!-- Editar -->
                <td>
                    <!-- <form action="empresa.php" method="GET">

                        <button title="editar" type="submit">E</button>
                        
                    </form> -->

                    <form action="empresa.php" method="GET">
                    <input type="text" hidden name="NIT" value=<?=$tupla_empresa['NIT'];?> >
                    <input type="text" hidden name="nombre" value=<?=$tupla_empresa['nombre'];?> >
                    <input type="text" hidden name="valo_bit"  value=<?=$tupla_empresa['valor_en_bitcoins_de_la_empresa'];?> >      
                    <select name="id_gremio" hidden>
                                <option value=<?=$tupla_empresa['id_gremio'];?> > <?=$tupla_empresa['id_gremio'];?></option>
                                <option value="Ninguno" >Ninguno</option>
                    <?php
                        // Se llama a la consulta select
                        require('../empresa_rival/select_e.php');

                        // Se pregunta si hay una respuesta dicha consulta
                        if($resultE){
                            // Se itera por cada una de las tuplas (filas) del resultado de la consulta
                            foreach($resultE as $tupla_empresa){ 
                                $valueE = $tupla_empresa['NIT'];    
                    ?>
                        <option value="<?php echo $valueE;?>" > <?php echo $tupla_empresa['NIT'];?></option>
                    
                    <?php
                            }
                        }
                    ?>
                </select>


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
    <?php

            if(isset($_GET['NIT'])){
    ?>
    <form action="update_e.php"method="post">
    <!-- <form action="empresa.php"method="GET"> -->
     
     <label>NIT</label>
     <input type="text" readonly name="NIT" value=<?=$_GET['NIT']?>>
 
     <label>Nombre de la empresa</label>
     <input type="text" name="nombre" value=<?=$_GET['nombre']?>>
 
     <label>Valor en bitcoins</label>
     <input type="text" name="valo_bit" value=<?=$_GET['valo_bit']?>>
 
     <!-- Código para el gremio asociado  -->
 
     <label>Gremio Asociado</label>
     <!-- <input type="text" name="gre_aso" id="gre_aso" > -->
     <select name="gre_aso">
        <option value=<?=$_GET['id_gremio']?> > <?=$_GET['id_gremio']?></option>
        <option value="Ninguno" >Ninguno</option>
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
 
 
     <input type="submit" class="btn btn-primary" value="Actualizar">
     <a href="empresa.php" class="btn btn-success">Reiniciar</a>
 
     </form>





                <?php
            }else{
                ?>


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
    <option value="Ninguno" >Ninguno</option>
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
    <a href="empresa.php" class="btn btn-success">Reiniciar</a>

    </form>

            <?php
            }
            ?>


</body>
</html>
