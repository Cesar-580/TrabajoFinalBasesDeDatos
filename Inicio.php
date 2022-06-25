<!-- En esta pagina puede encontrar mas informacion acerca de la estructura de un documento html 
    http://www.iuma.ulpgc.es/users/jmiranda/docencia/Tutorial_HTML/estruct.htm-->
    <!DOCTYPE html>
<html lang="en">
<!--cabezera del html -->

<head>
    <!--configuraciones basicas del html-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--titrulo de la pagina-->
    <title>inicio</title>
    <!--CDN de boostraps: Libreria de estilos SCSS y CSS para darle unas buena apariencia a la aplicacion
    para mas informacion buscar documentacion de boostraps en: https://getbootstrap.com/docs/4.3/getting-started/introduction/ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
</head>

<body>
    <!--Barra de navegacion-->
    <ul class="nav">
        <li class="nav nav-pills">
            <a class="nav-link active" href="index.html">inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="./gremios/gremio.php">Gremios</a>
        </li>


    </ul>

    <div class="container">
        <div class="row">
            <div class="col-1">
                <b>Tutoriales</b>
            </div>
            <div class="col-4">
                <ul>
                    <li>
                        <a href=" https://youtu.be/im1pVV2txiQ" target="_blank">Instalacion Wamp Server</a>
                    </li>
                    <li>
                        <a href="https://youtu.be/65GKEwnAAHg" target="_blank">Creacion de una Base de datos MySQL</a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/watch?v=HShH7XdLNC4&list=PLnWAzeXp9V4lX35XTr0EDG0tCJLHevnhO"
                            target="_blank">Curso
                            corto HTML+PHP+MYQL</a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="row">
            <div class="col-1">
                <b>
                    Html
                </b>
            </div>
            <div class="col-4">
                <ul>
                    <li>
                        <a href="http://fpsalmon.usc.es/genp/doc/cursos/html/estructura.html" target="_blank">Estructura
                            de un documento HTML</a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/watch?v=rbuYtrNUxg4" target="_blank">Curso basico</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <b>Boostraps</b>
            </div>
            <div class="col-4">
                <ul>
                    <li>
                        <a href="https://getbootstrap.com/docs/4.3/getting-started/introduction/">Documentacion</a>
                    </li>
                </ul>
            </div>


        </div>
        <div class="row">
            <div class="col-1">
                <b>Jquery</b>
            </div>
            <div class="col-4">
                <ul>
                    <li>
                        <a href="https://www.arkaitzgarro.com/jquery/capitulo-3.html">Documentacion</a>
                    </li>
                </ul>
            </div>


        </div>

       

    </div>



</body>

</html>