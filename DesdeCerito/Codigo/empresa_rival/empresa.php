<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOSUR - empresa</title>
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
    


    <br>

    <!-- Mostrar las tuplas creadas en Chofer -->
    <div class="col-6 px-2">
    <table class="table border-rounded">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NIT</th>
                <th scope="col">Nombre de<br> la empresa</th>
                <th scope="col">Valor en <br> bitcoins</th>
                <th scope="col">Gremio asociado</th>
                <th scope="col" colspan="2">Opciones</th>
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
                        <button class="btn btn-danger" title="eliminar" type="submit">X</button>
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


                        <button class="btn btn-primary" title="editar" type="submit">Edit</button>
                    </form>
                </td>
            </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
    <div>




























    <!-- Inserción de elementos -->
    <?php

            if(isset($_GET['NIT'])){
    ?>

<div class="col-6 px-2">
        <div class="card">
            <div class="card-body">
                
    <form class="form-group" action="update_e.php"method="post">
    <!-- <form action="empresa.php"method="GET"> -->
     
    <div class="form-group">
        <label for="">NIT</label>
        <input type="text" class="form-control" readonly name="NIT" value=<?=$_GET['NIT']?>>
    </div>
    
    <div class="form-group">
        <label for="">Nombre de la empresa</label>
        <input type="text" class="form-control" name="nombre" value=<?=$_GET['nombre']?>>
    </div>            

    <div class="form-group">
        <label for="">Valor en bitcoins</label>
        <input type="text" class="form-control" name="valo_bit" value=<?=$_GET['valo_bit']?>>
    </div>
     <!-- Código para el gremio asociado  -->
 
     <div class="form-group">
     <label for="">Gremio Asociado</label>
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
     </div>
            
     <div class="form-group">
     <input type="submit" class="btn btn-primary" value="Actualizar">
     <a href="empresa.php" class="btn btn-success">Reiniciar</a>
            </div>
     </form>
     </div></div></div>




                <?php
            }else{
                ?>

    <div class="col-6 px-2">
        <div class="card">
            <div class="card-body">


    <form action="insert_e.php" class="form-group" method="post" >
    
    <div class="form-group">
        <label for="">NIT</label>
        <input type="text" class="form-control" name="nit" id="nit" >
    </div>
    
    
    <div class="form-group">
    <label for="">Nombre de la empresa</label>
    <input type="text" class="form-control" name="nombre_emp" id="nombre_emp" >
            </div>

    <div class="form-group">
    <label for="">Valor en bitcoins</label>
    <input type="text" class="form-control" name="valo_bit" id="valo_bit" >
    </div>

    <!-- Código para el gremio asociado  -->
    <div class="form-group">
    <label for="">Gremio Asociado</label>
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
        </div>
        <div class="form-group">
    <input type="submit" class="btn btn-primary" value="insertar">
    <a href="empresa.php" class="btn btn-success">Reiniciar</a>
        </div>
    </form>

            <?php
            }
            ?>


</body>
</html>
