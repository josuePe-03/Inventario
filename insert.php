<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<body>
    <div id="contenedor">
        <!--Navegador-->
        <div id="navegacion">
            <nav id="navbar-example3" class="navbar navbar-light bg-light flex-column">
                <div class="container">
                    <a class="navbar-brand" href="#">Hospital Dashboard</a>
                    <nav id="nav" class="nav nav-pills flex-column">
                        <a style="color:black;" class="nav-link" href="index.php">Inicio</a>
                        <a style="color:black;" class="nav-link" href="insert.php">Añadir Incidencia</a>
                        <a style="color:black;" class="nav-link" href="view.php">Mostrar Incidencia</a>
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
            <!--Contenedor 2-->
            <div id="segundo">
                <!--Agregar-->
                <div id="agregar" class="mt-2">
                    <div id="contentS">
                        <div class="container">
                            <form method="POST" id="form" action="doc/index.php" enctype="multipart/form-data">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-2 mb-0">
                                            <label for="txtID"class="">Linea de Pago:</label>
                                            <input type="text" required class="form-control mb-2 mt-2" name="equipo" id="equipo" >
                                        </div>
                                        <div class="col-md-2 mb-0">
                                            <label for="txtID">Marca/Modelo:</label>
                                            <input type="text" required class="form-control mb-2 mt-2" name="marcaModelo" id="marcaModelo"  >
                                        </div>
                                        <div class="col-md-2 mb-0">
                                            <label for="txtID">Numero de serie:</label>
                                            <input type="text" required class="form-control mb-2 mt-2" name="noSerie" id="noSerie" >
                                        </div>
                                        <div class="col-md-3 mb-0">
                                            <label for="txtID">Hospital:</label>
                                            <input type="text" required class="form-control mb-2 mt-2" name="hospital" id="hospital"  >
                                        </div>
                                        <div class="col-md-3 mb-0">
                                            <label for="txtID">Responsable:</label>
                                            <input type="text" required class="form-control mb-2 mt-2" name="responsable" id="responsable"  >
                                        </div>
                                    </div>                                    
                                </div> 
                                <!--Columna 2-->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 mb-0">
                                            <label for="txtID">Descripcion:</label>
                                            <input type="text" required class="form-control mb-2 mt-2" name="descripcion" id="descripcion" >
                                        </div>
                                        <div class="col-md-3 mb-0">
                                            <label for="txtID" class="mb-3" >Tipo Incidencia:</label>
                                            <input type="text" class="form-control" name="tipoIncidencia" id="tipoIncidencia"  multiple>
                                        </div>
                                        <div class="col-md-3 mb-0">
                                            <label for="txtID" class="mb-3" >Imagen:</label>
                                            <input type="file" class="form-control" name="multipleFile[]" id="multipleFile"  multiple>
                                        </div>
                                    </div>                                    
                                </div>
                                  <!--Columna 3-->
                                  <div class="container mb-3">
                                    <div class="row">
                                        <div class="col-md-3 mb-0">
                                            <label for="txtID">Fecha de Atencion:</label>
                                            <input type="date" required class="form-control mb-2 mt-2" name="fechaAtencion" id="fechaAtencion" min="2022-12-01" >
                                        </div>
                                        <div class="col-md-3 mb-0">
                                            <label for="txtID">Fecha Probable:</label>
                                            <input type="date" required class="form-control mb-2 mt-2" name="fechaProbable" id="fechaProbable" >
                                        </div>
                                        <div class="col-md-3 mb-0">
                                            <label for="txtID">Fecha de Solucion:</label>
                                            <input type="date" required class="form-control mb-2 mt-2" name="fechaSolucion" id="fechaSolucion" >
                                        </div>
                                        <div class="col-md-3 mb-0">
                                            <label for="txtID">Referencia</label>
                                            <input type="text" class="form-control mb-2 mt-2" name="referencia" id="referencia" >
                                        </div>
                                    </div>                                    
                                </div>
                                <!--Botones-->      
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3 mb-1">
                                            <button type="submit" name="accion" value="Agregar" class="btn btn-danger btn-sm">Agregar</button>                      
                                            <button type="button" onClick="refresh();" class="btn btn-danger btn-sm">Refresh</button>                              
                                        </div>
                            </form>
                        </div>
                    </div>   
                </div><br><!--Termina-->
            </div>
        </div>    
    </div>    
    
    <script type="text/javascript">
    function refresh()
    {
    document.getElementById("form").reset();
    }
    </script>
<?php include("template/cabecera.php")?>

