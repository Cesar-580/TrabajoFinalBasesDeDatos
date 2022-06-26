<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOSUR - Chofer</title>
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
                <th>Numero <br> identificacion</th>
                <th>Primer <br> nombre</th>
                <th>Segundo <br> nombre</th>
                <th>Primer <br>apellido</th>
                <th>Segundo<br>apellido</th>
                <th>Fecha de<br>naciemiento</th>
                <th>Fecha expiracion <br>del pase</th>
                <th>Telfono <br> celular</th>
                <th>Tipo <br>sangre</th>
                <th>Salario</th>
                <th>Placa <br>bus</th>
                <th>Placa <br>taxi</th>
                <th>Gremio <br> Asociado</th>
                <th>Empresa <br> rival <br> sospechosa</th>
            </tr>
        </thead>
        <tbody>

            <?php
                // Se llama a la consulta select
                require('select_c.php');

                // Se pregunta si hay una respuesta dicha consulta
                if($resultC){
                    // Se itera por cada una de las tuplas (filas) del resultado de la consulta
                    foreach($resultC as $tupla_resultante){                         
            ?>
            <tr>
                <td><?=$tupla_resultante['numero_identificacion'];?></td>   
                <td><?=$tupla_resultante['primer_nombre'];?></td>   
                <td><?=$tupla_resultante['segundo_nombre'];?></td>   
                <td><?=$tupla_resultante['primer_apellido'];?></td>   
                <td><?=$tupla_resultante['segundo_apellido'];?></td>   
                <td><?=$tupla_resultante['fecha_de_naciemiento'];?></td>   
                <td><?=$tupla_resultante['fecha_expiracion_pase'];?></td>   
                <td><?=$tupla_resultante['telfono_celular'];?></td>   
                <td><?=$tupla_resultante['tipo_sangre'];?></td>   
                <td><?=$tupla_resultante['salario'];?></td>   
                <td><?=$tupla_resultante['placa_bus'];?></td>   
                <td><?=$tupla_resultante['placa_taxi'];?></td>   
                <td><?=$tupla_resultante['id_gremio'];?></td>  
                <td><?=$tupla_resultante['id_empresa_rival'];?></td> 
                
                <!-- Eliminación -->
                <td>
                    <form action="delete_c.php" method="POST">
                        <input type="text" name="numero_identificacion" value=<?=$tupla_resultante['numero_identificacion'];?> >
                        <button title="eliminar" type="submit">X</button>
                    </form>
                </td>
                

                <!-- Editar -->
                <?php
                    echo $tupla_resultante['tipo_sangre'];
                ?>
                <td>
                <form action="chofer.php" method="GET">
                    <input type="text" name="n_id"hidden value=<?=$tupla_resultante['numero_identificacion'];?> >
                    <input type="text" name="p_nombre"hidden value=<?=$tupla_resultante['primer_nombre'];?> >
                    <input type="text" name="s_nombre" hidden value=<?=$tupla_resultante['segundo_nombre'];?> >
                    <input type="text" name="p_ape"hidden value=<?=$tupla_resultante['primer_apellido'];?> >
                    <input type="text" name="s_ape" hidden value=<?=$tupla_resultante['segundo_apellido'];?> >
                    <input type="date" name="f_nac"hidden value=<?=$tupla_resultante['fecha_de_naciemiento'];?> min="1950-01-01" max="2050-12-31" >
                    <input type="date" name="f_exp"hidden value=<?=$tupla_resultante['fecha_expiracion_pase'];?> min="2022-06-25" max="2050-12-31" >
                    <input type="text" name="tel" hidden value=<?=$tupla_resultante['telfono_celular'];?> >
                    <select name="t_sangre" hidden>
                        <option value=<?=$tupla_resultante['tipo_sangre'];?>> <?=$tupla_resultante['tipo_sangre'];?></option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B-">B-</option>
                        <option value="B+">B+</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB+">AB-</option>
                    </select>
                    <input type="text" name="salario" hidden value=<?=$tupla_resultante['salario'];?> >
                    <input type="text" name="p_bus" hidden value=<?=$tupla_resultante['placa_bus'];?>  >
                    <input type="text" name="p_taxi" hidden value=<?=$tupla_resultante['placa_taxi'];?> >
                    <select name="gre_aso" hidden>
                        <option value=<?=$tupla_resultante['id_gremio'];?> > <?=$tupla_resultante['id_gremio'];?></option>
                        <option value="" >Ninguno</option>
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
                    <select name="empre_r" hidden>
                                <option value=<?=$tupla_resultante['id_empresa_rival'];?> > <?=$tupla_resultante['id_empresa_rival'];?></option>
                                <option value="" >Ninguno</option>
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
    <!-- Update -->
    <?php
        if(isset($_GET["n_id"])){

    ?>
    <form action="update_c.php" class="form-group" method="POST">
    <!-- <form action="chofer.php" class="form-group" method="GET"> -->
    <!-- <form action="" class="form-group" method="post"> -->
    Editar<br>
    <label>Numero identificacion</label>
    <input type="text" readonly name="n_id" id="n_id" value=<?=$_GET["n_id"];?>>

    <label>Primer nombre</label>
    <input type="text" name="p_nombre" id="p_nombre" value=<?=$_GET["p_nombre"];?>>

    <label>Segundo nombre</label>
    <input type="text" name="s_nombre" id="s_nombre" value=<?=$_GET["s_nombre"];?>>

    <label>Primer apellido</label>
    <input type="text" name="p_ape" id="p_ape" value=<?=$_GET["p_ape"];?>>

    <label>Segundoapellido</label>
    <input type="text" name="s_ape" id="s_ape" value=<?=$_GET["s_ape"];?>>

    <label>Fecha de naciemiento</label>
    <input type="date" ide="f_nac" name="f_nac"
       min="1950-01-01" max="2004-01-01"value=<?=$_GET["f_nac"];?>>

    <label>Fecha expiracion del pase</label>
  
    <input type="date" id="f_exp" name="f_exp"
       value="2022-06-25"
       min="2022-06-25" max="2050-12-31"value=<?=$_GET["f_exp"];?>>

    <label>Telfono celular</label>
    <input type="text" name="tel" id="tel" value=<?=$_GET["tel"];?>>

    <label>Tipo sangre</label>
    
    <select name="t_sangre">
        <option value=<?=$_GET["t_sangre"];?>><?=$_GET["t_sangre"];?></option>
        <option value="A-">A-</option>
        <option value="A+">A+</option>
        <option value="B-">B-</option>
        <option value="B+">B+</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB+">AB-</option>
    </select>

    <label>Salario</label>
    <input type="text" name="salario" id="salario" value=<?=$_GET["salario"];?>>

    <label>Placa bus</label>
    <input type="text" name="p_bus" id="p_bus" value=<?=$_GET["p_bus"];?>>

    <label>Placa taxi</label>
    <input type="text" name="p_taxi" id="p_taxi" value=<?=$_GET["p_taxi"];?>>


    <!-- Código para el gremio asociado  -->

    <label>Gremio Asociado</label>
    <!-- <input type="text" name="gre_aso" id="gre_aso" > -->
    <select name="gre_aso">
        <option value=<?=$_GET["gre_aso"];?>><?=$_GET["gre_aso"];?></option>
        <option value="" >Nunguno</option>
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

    <!-- Código para el empresa  asociado  -->

    <label>Empresa rival sospechosa</label>
    <select name="empre_r">
        <option value=<?=$_GET["empre_r"];?>><?=$_GET["empre_r"];?></option>
        <option value="" >Nunguna</option>
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


    <input type="submit" class="btn btn-primary" value="Actualizar">
    <a href="chofer.php" class="btn btn-success">Reiniciar</a>

    </form>
    

            <?php
    // Insert normal
                }else{ 
            ?>


    <form action="insert_c.php" class="form-group" method="post">
    <!-- <form action="" class="form-group" method="post"> -->
        

                
    <label>Numero identificacion</label>
    <input type="text" name="n_id" id="n_id" >

    <label>Primer nombre</label>
    <input type="text" name="p_nombre" id="p_nombre" >

    <label>Segundo nombre</label>
    <input type="text" name="s_nombre" id="s_nombre" >

    <label>Primer apellido</label>
    <input type="text" name="p_ape" id="p_ape" >

    <label>Segundoapellido</label>
    <input type="text" name="s_ape" id="s_ape" >

    <label>Fecha de naciemiento</label>
    <input type="date" ide="f_exp" name="f_nac"
       value="2000-01-20"
       min="1950-01-01" max="2004-01-01">

    <label>Fecha expiracion del pase</label>
  
    <input type="date" id="f_exp" name="f_exp"
       value="2022-06-25"
       min="2022-06-25" max="2050-12-31">

    <label>Telfono celular</label>
    <input type="text" name="tel" id="tel" >

    <label>Tipo sangre</label>
    
    <select name="t_sangre">
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B-">B-</option>
        <option value="B+">B+</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB+">AB-</option>
    </select>

    <label>Salario</label>
    <input type="text" name="salario" id="salario" >

    <label>Placa bus</label>
    <input type="text" name="p_bus" id="p_bus" >

    <label>Placa taxi</label>
    <input type="text" name="p_taxi" id="p_taxi" >


    <!-- Código para el gremio asociado  -->

    <label>Gremio Asociado</label>
    <!-- <input type="text" name="gre_aso" id="gre_aso" > -->
    <select name="gre_aso">
    <option value="" >Nunguno</option>
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

    <!-- Código para el empresa  asociado  -->

    <label>Empresa rival sospechosa</label>
    <select name="empre_r">
    <option value="" >Nunguna</option>
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


    <input type="submit" class="btn btn-primary" value="insertar">
    <a href="chofer.php" class="btn btn-success">Reiniciar</a>

    </form>
        <?php
        }
        ?>
</body>
</html>