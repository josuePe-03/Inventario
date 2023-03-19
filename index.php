<?php include("template/cabecera.php")?>

<?php 

    $accion = (isset($_POST['accion']))?$_POST['accion']:"";

    switch($accion){
        
            //Boton Agregar
            case "boton1":
                echo "<script> window.location.href='insert.php'; </script>";
                break;
            //Boton Mostrar
            case "boton2":
                echo "<script> window.location.href='view.php'; </script>";
                break;
            //Boton Proporcionar
            case "boton1":
                echo "<script> window.location.href='proporcionar.php'; </script>";
                break;
    }
?>

<body>
    <div id="contenedor">
        <!--Navegador-->
        <div id="navegacion">
            <nav id="navbar-example3" class="navbar navbar-light bg-white flex-column">
                <div class="container">
                    <a class="navbar-brand" href="#">Hospital Dashboard</a>
                    <nav id="nav" class="nav nav-pills flex-column">
                        <a style="color:black;" class="nav-link" href="#incidencias">Incidencias</a>
                    </nav>
                </div>
            </nav>
        </div>
        <!--Contenido-->
        <div id="content">
            <div id="principio">
                <div class="container">
                    <h3>Dashboard</h3>
                </div>
            </div>
            <div id="incidencias" class="bg-light">
                <div id="contentS">
                    <div class="container">
                        <h3>Welcomen</h3>
                        <h6>Hospital Admin</h6>
                    </div>
               </div>
               <br>
            <div id="botones">
                <div class="container d-flex justify-content-center mb-2">
                    <form action="" method="POST">
                    <button type="submit" name="accion" value="boton1" class="boton1 me-4 btn btn-primary btn-lg">Añadir Incidencia</button>
                    <button type="submit" name="accion" value="boton2" class="boton2 me-4 btn btn-secondary btn-lg">Mostrar Incidencias</button>
                    <button type="submit" name="accion" value="boton3" class="boton3 btn btn-secondary btn-lg">Propocionar Incidencias</button>
                    </form>
            </div>
            </div>
        </div>
    </div>

<?php include("template/pie.php")?>