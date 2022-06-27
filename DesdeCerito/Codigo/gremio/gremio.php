<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOSUR - Gremio</title>
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
    <div class="col-6 px-2">
    <table class="table border-rounded">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre gremio</th>
                <th scope="col">Cedula del presidente <br> del gremio</th>
                <th scope="col">Telefono del gremio</th>
                <th scope="col" colspan="2">Opciones</th>
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
                        <input type="text" hidden name="nombre_gremio" value=<?=$tupla_gremio['nombre_gremio'];?> >
                        <button title="eliminar" class="btn btn-danger" type="submit">X</button>
                    </form>
                </td>
                
                <!-- Actualizar -->

                <td>
                    <form action="gremio.php" method="GET">
                    <input type="text" hidden name="nombre_gre" value=<?=$tupla_gremio['nombre_gremio'];?> >
                    <input type="text" hidden name="ced_presi" value=<?=$tupla_gremio['ced_presidente_gremio'];?> >
                    <input type="text" hidden name="telf_pre" value=<?=$tupla_gremio['telefono_del_gremio'];?> >

                    <button title="editar" class="btn btn-primary" type="submit">Edit</button>
                    </form>
                </td>
            </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
    </div>





    <div class="col-6 px-2">
        <div class="card">
            <div class="card-body">
    <?php
        if(isset($_GET['nombre_gre'])){
    ?>
    <form class="form-group" action="update_g.php"method="POST">
     
     <label for="">Nombre gremio</label>
     <input type="text" readonly class="form-control" name="nombre_gre" value=<?=$_GET['nombre_gre']?> >
 
     <label for="">Cedula del presidente del gremio</label>
     <input type="text" class="form-control" name="ced_presi" value=<?=$_GET['ced_presi']?> >
 
     <label for="">Telefono del gremio</label>
     <input type="text" class="form-control" name="telf_pre" value=<?=$_GET['telf_pre']?> >
 
     <input type="submit" class="btn btn-primary" value="Actualizar">
     <a href="gremio.php" class="btn btn-success">Reiniciar</a>
 
     </form>
     </div></div></div>

    <?php
        }else{
    ?>

    <!-- Inserción de elementos -->
    <div class="col-6 px-2">
        <div class="card">
            <div class="card-body">

    <form class="form-group" action="insert_g.php"method="POST">

    <div class="form-group">
    <label for="">Nombre gremio</label>
    <input type="text" class="form-control" name="nombre_gre" id="nombre_gre" >       
    </div>

    <div class="form-group">
    <label for="">Cedula del presidente del gremio</label>
    <input type="text" class="form-control" name="ced_presi" id="ced_presi" >
    </div>

    <div class="form-group">
    <label for="">Telefono del gremio</label>
    <input type="text" class="form-control" name="telf_pre" id="telf_pre" >
    </div>

    <div class="form-group">
    <input type="submit" class="btn btn-primary" value="insertar">
    <a href="chofer.php" class="btn btn-success">Reiniciar</a>
    </div>
    </form>
    <?php
}
    ?>
</div></div></div>
</body>
</html>
