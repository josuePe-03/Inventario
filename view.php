<?php include("template/cabecera.php")?>

<?php 
 
 $servidor= "localhost";
 $usuario= "id19957035_base";
 $password = "G22LfD[fst\p|+td";
 $nombreBD= "id19957035_hospital";
 $conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
 if ($conexion->connect_error) {
     die("la conexión ha fallado: " . $conexion->connect_error);
 }

if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}

?>

<body>
    <div id="contenedor">
        <!--Navegador-->
        <div id="navegacion">
            <nav id="navbar-example3" class="navbar navbar-light bg-white flex-column">
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
                <div id="mostrar" class=" mt-2">
                    <div class="container ">
                        <!--<form method="POST">-->
                            <!--Cabecera-->
                            <nav class="navbar navbar-light">
                                <div class="container-fluid">
                                    <h1>Tabla Incidentes</h1>
                                    <form class="d-flex" method="POST">
                                        <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search"id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                </div>
                            </nav>
                            <!--Filtros-->
                            <?php
                                        if ($_POST['buscar'] == ''){ $_POST['buscar'] = ' ';}
                                        $aKeyword = explode(" ", $_POST['buscar']);
                                        
                                       
                                        if ($_POST["buscar"] == ''){ 

                                                $query ="SELECT * FROM incidencia ";
                                        }else{
                    
                                                $query ="SELECT * FROM incidencia ";
                                        }
                                
                                        if ($_POST["buscar"] != '' ){ 
                                                $query .= "WHERE (equipo LIKE LOWER('%".$aKeyword[0]."%') OR no_Serie LIKE LOWER('%".$aKeyword[0]."%')) ";
                                        
                                        for($i = 1; $i < count($aKeyword); $i++) {
                                           if(!empty($aKeyword[$i])) {
                                               $query .= " OR equipo LIKE '%" . $aKeyword[$i] . "%' OR no_Serie LIKE '%" . $aKeyword[$i] . "%'";
                                           }
                                         }
                                
                                        }
                                        $sql = $conexion->query($query);

                                        $numeroSql = mysqli_num_rows($sql);
                                                              
                            ?>
                            <!--Inicia Tabla-->
                            <div id="scroll">
                                <table class="table mb-3">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Equipo</th>
                                            <th>Marca/Modelo</th>      
                                            <th>Numero de Serie</th>  
                                            <th>Fecha</th>  
                                            <th>Responsable</th>  
                                            <th>Hospital</th>  
                                            <th>Tipo Incidencia</th>
                                            <th>Descripcion</th>
                                            <th>Fecha Atencion</th>
                                            <th>Fecha Probable</th>
                                            <th>Fecha Solucion</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form method="POST">
                                        <?php While($rowSql = $sql->fetch_assoc()) {   ?>
                                        <tr>
                                            <td> <?php echo $rowSql['id']; ?></td>
                                            <td> <?php echo $rowSql['equipo']; ?></td>
                                            <td> <?php echo $rowSql['marca_modelo']; ?></td>
                                            <td> <?php echo $rowSql['no_serie']; ?></td>
                                            <td> <?php echo $rowSql['fecha']; ?></td>
                                            <td> <?php echo $rowSql['responsable']; ?></td>
                                            <td> <?php echo $rowSql['hospital']; ?></td>
                                            <td> <?php echo $rowSql['tipo_incidencia']; ?></td>
                                            <td> <?php echo $rowSql['descripccion']; ?></td>
                                            <td> <?php echo $rowSql['fechaAtencion']; ?></td>
                                            <td> <?php echo $rowSql['fechaProbable']; ?></td>
                                            <td> <?php echo $rowSql['fechaSolucion']; ?></td>
                                            <td></td>
                                        </tr>
                                        <?php } ?>  
                                        </form>                                              
                                    </tbody>
                                </table>
                            </div> 
                            <!--Termina Tabla-->
                        <!--</form>-->
                    </div>
                </div>    
            </div><br><!--Termina-->
        </div>    
    </div>    
</body>    
<?php include("template/cabecera.php")?>
