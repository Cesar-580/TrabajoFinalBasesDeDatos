<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOSUR - Chofer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
    <!-- Sección indice -->
    <section>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">COOSUR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.html">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../chofer/chofer.php">Chofer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../empresa_rival/empresa.php">Empresa rival</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../gremio/gremio.php">Gremio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../busquedas/busquedas.php">Busquedas</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section> 


    <!-- Mostrar las tuplas creadas en Chofer -->
    </div>
<br>
    
    <div class="col-6 px-2">
    <table class="table border-rounded">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Numero <br> identificacion</th>
                <th scope="col">Primer <br> nombre</th>
                <th scope="col">Segundo <br> nombre</th>
                <th scope="col">Primer <br>apellido</th>
                <th scope="col">Segundo<br>apellido</th>
                <th scope="col">Fecha de<br>naciemiento</th>
                <th scope="col">Fecha expiracion <br>del pase</th>
                <th scope="col">Telfono <br> celular</th>
                <th scope="col">Tipo <br>sangre</th>
                <th scope="col">Salario</th>
                <th scope="col">Gremio <br> Asociado</th>
                <th scope="col">Empresa <br> rival <br> sospechosa</th>
                <th scope="col" colspan="2">Opciones</th>
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
                <td><?=$tupla_resultante['id_gremio'];?></td>  
                <td><?=$tupla_resultante['id_empresa_rival'];?></td> 
                
                <!-- Eliminación -->
                <td>
                    <form action="delete_c.php" method="POST">
                        <input type="text" hidden name="numero_identificacion" value=<?=$tupla_resultante['numero_identificacion'];?> >
                        <button class="btn btn-danger" title="eliminar" type="submit"><i
                                            class="fas fa-trash-alt">X</i></button>
                    </form>
                
                
                    </td>
                <!-- Editar -->
                <?php
                    // echo $tupla_resultante['tipo_sangre'];
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


                        <button class="btn btn-primary" title="editar" type="submit"> <i
                        class="btn btn-primary">Edit</i></button>
                                            
                    </form>
                </td>
            </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
    </div></div><br>





    

    <!-- Inserción de elementos -->
    <!-- Update -->
    <?php
        if(isset($_GET["n_id"])){

    ?>

    

<div class="col-6 px-2">
        <div class="card">
            <div class="card-body">

    <form action="update_c.php" class="form-group" method="POST">
    <!-- <form action="chofer.php" class="form-group" method="GET"> -->
    <!-- <form action="" class="form-group" method="post"> -->
    Editar<br>
    <div class="form-group">
        <label for="">Numero identificacion</label>
        <input type="text" readonly class="form-control"  required  name="n_id" id="n_id" value=<?=$_GET["n_id"];?>>
    </div>

        
    <div class="form-group">
        <label for="">Primer nombre</label>
        <input type="text" class="form-control" required  name="p_nombre" id="p_nombre" value=<?=$_GET["p_nombre"];?>>  
    </div>

    <div class="form-group">
        <label for="">Segundo nombre</label>
        <input type="text" class="form-control" name="s_nombre" id="s_nombre" value=<?=$_GET["s_nombre"];?>>   
    </div>

    <div class="form-group">
    <label for="">Primer apellido</label>
    <input type="text"class="form-control"  required  name="p_ape" id="p_ape" value=<?=$_GET["p_ape"];?>>
    </div>
    
    <div class="form-group">
    <label for="">Segundoapellido</label>
    <input type="text"class="form-control"  name="s_ape" id="s_ape" value=<?=$_GET["s_ape"];?>>
    </div>
    
    <div class="form-group">
    <label for="">Fecha de naciemiento</label>
    <input type="date" ide="f_nac" name="f_nac" required 
       min="1950-01-01" max="2004-01-01"value=<?=$_GET["f_nac"];?>>
    </div>
    
       <div class="form-group">
    <label for="">Fecha expiracion del pase</label>
  
    <input type="date" id="f_exp" name="f_exp" required 
       value="2022-06-25"
       min="2022-06-25" max="2050-12-31"value=<?=$_GET["f_exp"];?>>
    </div>
    
       <div class="form-group">
    <label for="">Telfono celular</label>
    <input type="text" class="form-control" required  name="tel" id="tel" value=<?=$_GET["tel"];?>>
    </div>
    
    <div class="form-group">
    <label for="">Tipo sangre</label>
    
    <select name="t_sangre" required >
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
    </div>
    
    <div class="form-group">
    <label for="">Salario</label>
    <input type="text" class="form-control"  required name="salario" id="salario" value=<?=$_GET["salario"];?>>
    </div>
    

    <!-- Código para el gremio asociado  -->
    
    <div class="form-group">
    <label for="">Gremio Asociado</label>
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
    </div>

    <!-- Código para el empresa  asociado  -->
    
    <div class="form-group">
    <label for="">Empresa rival sospechosa</label>
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
    </div>


    <input type="submit" class="btn btn-primary" value="Actualizar">
    <a href="chofer.php" class="btn btn-danger">Reiniciar</a>

    </form>
    </div></div></div>

            <?php
    // Insert normal
                }else{ 
            ?>
    <div class="col-6 px-2">
        <div class="card">
            <div class="card-body">
                <form action="insert_c.php" class="form-group" method="POST">
                    <div class="form-group">
                        <label for="Numero identificacion">Numero identificacion</label>
                        <input type="text" name="n_id" id="n_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Primer nombre</label>
                        <input type="text" name="p_nombre" id="p_nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Segundo nombre</label>
                        <input type="text" name="s_nombre" id="s_nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Primer apellido</label>
                        <input type="text" name="p_ape" id="p_ape" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Segundo apellido</label>
                        <input type="text" name="s_ape" id="s_ape" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha de naciemiento</label>
                        <input type="date" ide="f_nac" name="f_nac" value="2000-01-20" min="1950-01-01" max="2004-01-01" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Fecha expiracion del pase</label>
                        <input type="date" id="f_exp" name="f_exp" value="2022-06-25" min="2022-06-25" max="2050-12-31" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Telfono celular</label>
                        <input type="text" name="tel" id="tel" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tipo sangre</label>
                        <select name="t_sangre" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="B+">B+</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB+">AB-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Salario</label>
                        <input type="text" name="salario" id="salario" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Gremio Asociado</label>
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
                    </div>
                    
                    <div class="form-group">
                        <label for="">Empresa Asociado</label>
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
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <a href="personas.php" class="btn btn-danger">descartar</a>
                        

                    </div>

                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <form action="insert_c.php" class="form-group" method="post">
    <!-- <form action="" class="form-group" method="post"> -->
     
    <!-- <label></label>
    <input type="text"  >

    <label>Segundo nombre</label>
    <input type="text" name="s_nombre" id="s_nombre" > -->

    <!-- <label>Primer apellido</label>
    <input type="text" name="p_ape" id="p_ape" >

    <label>Segundoapellido</label>
    <input type="text" name="s_ape" id="s_ape" > -->

    <!-- <label>Fecha de naciemiento</label>
    <input type="date" ide="f_exp" name="f_nac"
       value="2000-01-20"
       min="1950-01-01" max="2004-01-01"> -->

    <!-- <label>Fecha expiracion del pase</label>
  
    <input type="date" id="f_exp" name="f_exp"
       value="2022-06-25"
       min="2022-06-25" max="2050-12-31">

    <label>Telfono celular</label>
    <input type="text" name="tel" id="tel" > -->

    <!-- <label>Tipo sangre</label>
    
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


     Código para el gremio asociado  

    <label>Gremio Asociado</label> -->
    <!-- <input type="text" name="gre_aso" id="gre_aso" > -->
    

    <!-- Código para el empresa  asociado  -->

    


    <!-- <input type="submit" class="btn btn-primary" value="insertar">
    <a href="chofer.php" class="btn btn-success">Reiniciar</a> -->

    
</body>
</html>