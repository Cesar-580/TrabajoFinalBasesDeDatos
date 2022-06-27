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

<br>

    <div class="col-5 px-5">
    <div class="card">
            <div class="card-body">
    
            <div class="col-12">
            
        <!-- <form action="primeraBusqueda.php"  method="POST">
            <div class="form-group"
                <label for="">Número de choferes nacidos</label>
                <input type="number" name="numero" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Fecha 1</label>
                <input type="date" name="fechaInicio" class="form-control" value="2022-06-25" min="1950-01-01" max="2050-12-31">
            </div>

            <label for="">Fecha 2</label>
            <input type="date" name="fechaFin" class="form-control" value="2022-06-25" min="1950-01-01" max="2050-12-31">
            </div>
            <div class="form-group">

                <input type="submit" class="btn btn-primary" value="Guardar">

        </form> -->

        <form action="primeraBusqueda.php" method="POST">
            <input type="number" name="n">
            <input type="date" name="n2">
            <input type="date" name="n3">
            <input type="submit" value="Guardar">
        </form>
           

            

        </div>

        <div class="col-12">

            <!-- Primera busqueda -->
            <?php
            // Se llama a la consulta select
            require('primeraBusqueda.php');

            if(isset($result_b)){
            ?>

            <div class="form-group">
                <table class="table border-rounded">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre del gremio</th>
                        <th scope="col">Telefono del gremio</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                        // Se pregunta si hay una respuesta dicha consulta
                        if($result_b){
                            // Se itera por cada una de las tuplas (filas) del resultado de la consulta
                            foreach($result_b as $busqueda1){                         
                    ?>

                    <tr>
                        <td><?=$busqueda1['nombre_gremio'];?></td>
                        <td><?=$busqueda1['telefono_del_gremio'];?></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
                </table>

                </div>
                
                        <?php
                    }
                    ?>

            </div>
    </div>
    </div>
    </div>
<br>













<div class="col-5 px-5">
    <div class="card">
        <div class="form-group">
            <table class="table border-rounded">
                <tr>
                    <td>
                        <center>
                            <form action="busquedas.php" method="GET">
                                <input type="text" hidden name="a" value="1">
                                <button class="btn btn-light" title="editar" type="submit">Primera consulta</button>
                            </form>
                    </td>
                    <td>
                        <center>
                            <form action="busquedas.php"  method="GET">
                            <input type="text" hidden name="a" value="2">
                                <button class="btn btn-light" title="editar" type="submit">Segunda consulta</button>
                            </form>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Primera consulta -->

        <?php
            if(isset($_GET['a']) AND $_GET['a'] == 1){
        ?>

        <div class="form-group">
        <table class="table border-rounded">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Numero <br> identificacion</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
        <?php
                // Se llama a la consulta select
                require('primeraConsulta.php');

                // Se pregunta si hay una respuesta dicha consulta
                if($resultC1){
                    // Se itera por cada una de las tuplas (filas) del resultado de la consulta
                    foreach($resultC1 as $tupla_resultante){                         
            ?>

            <tr>
                <td><?=$tupla_resultante['NIT'];?></td>
                <td><?=$tupla_resultante['nombre'];?></td>
            </tr>
            <?php
                    }
                }
            ?>
        </tbody>
        </table>

        </div>
        
                <?php
            }
            ?>
    
    <!-- Segunda consulta -->
            <!-- Primera consulta -->

        <?php
            if(isset($_GET['a']) AND $_GET['a'] == 2){
        ?>

        <div class="form-group">
        <table class="table border-rounded">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Numero <br> identificacion</th>
                <th scope="col">Salario</th>
            </tr>
        </thead>
        <tbody>
        <?php
                // Se llama a la consulta select
                require('segundaConsulta.php');

                // Se pregunta si hay una respuesta dicha consulta
                if($resultC2){
                    // Se itera por cada una de las tuplas (filas) del resultado de la consulta
                    foreach($resultC2 AS $tupla_C2){                         
            ?>

            <tr>
                <td><?=$tupla_C2['numero_identificacion'];?></td>
                <td><?=$tupla_C2['salario'];?></td>
            </tr>
            <?php
                    }
                }
            ?>
        </tbody>
        </table>

        </div>
        
                <?php
            }
            ?>


    
    </div>
</div>

    </body>
</html>