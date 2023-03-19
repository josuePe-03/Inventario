<?php


require('fpdf/fpdf.php');

require('../dbConnection.php');


    $equipo = (isset($_POST['equipo']))?$_POST['equipo']:"";
    $marcaModelo = (isset($_POST['marcaModelo']))?$_POST['marcaModelo']:"";
    $noSerie = (isset($_POST['noSerie']))?$_POST['noSerie']:"";
    $hospital = (isset($_POST['hospital']))?$_POST['hospital']:"";
    $responsable = (isset($_POST['responsable']))?$_POST['responsable']:"";
	$tipoIncidencia = (isset($_POST['tipoIncidencia']))?$_POST['tipoIncidencia']:"";
    $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $fechaAtencion = (isset($_POST['fechaAtencion']))?$_POST['fechaAtencion']:"";
    $fechaProbable = (isset($_POST['fechaProbable']))?$_POST['fechaProbable']:"";
    $fechaSolucion = (isset($_POST['fechaSolucion']))?$_POST['fechaSolucion']:"";
    $referencia = (isset($_POST['referencia']))?$_POST['referencia']:"";
    $multiplefile = $_FILES['multipleFile']['name'];    

	// Upload multiple image in Database using PHP MYSQL

	//VERIFICACION EXISTENCIA
	$verificar_equipo = mysqli_query($con,"SELECT * FROM incidencia WHERE referencia='$referencia'");
	if(mysqli_num_rows($verificar_equipo) > 0){
    echo'
    
    <script>

    alert("Este equipo ya existe");
	window.history.go(-1);
    </script>
    
    ';
    exit();
}

	if (!empty($_FILES['multipleFile']['name']) ) {

	

		foreach ($multiplefile as $name => $value) {
			
			$allowImg = array('png','jpeg','jpg','gif');	

			$fileExnt = explode('.', $multiplefile[$name]);

			$fileTmp = $_FILES['multipleFile']['tmp_name'][$name];
					
			$newFile = 	rand(). '.'. $fileExnt[1];

			$target_dir = '../uploads/'.$newFile; 

			if (in_array($fileExnt[1], $allowImg)) {

				if ($_FILES['multipleFile']['size'][$name] > 0 && $_FILES['multipleFile']['error'][$name]== 0) {
					
					if (move_uploaded_file($fileTmp, $target_dir)) {
                       
						$query  = "INSERT INTO `incidencia` (`id`, `equipo`, `marca_modelo`, `no_serie`, `fecha`, `hospital`, `responsable`, `tipo_incidencia`,`descripccion`, `imagen`, `referencia`, `fechaAtencion`, `fechaProbable`, `fechaSolucion`) VALUES (NULL, '$equipo', '$marcaModelo', '$noSerie', current_timestamp(), '$hospital','$responsable','$tipoIncidencia','$descripcion', '$newFile', '$referencia', '$fechaAtencion', '$fechaProbable', '$fechaSolucion');";
						mysqli_query($con, $query);
                        $sql="SELECT * from incidencia where referencia like '$referencia'";//SE BUSCA LA CONSULTA CON EL ID
                        $result=mysqli_query($con,$sql);
                        
					}
				}
			}
		}
	}	

while($ver=mysqli_fetch_row($result)){ //MIENTRAS MUESTRA CON VARIABLE VER

$pdf=new FPDF();
$pdf->Addpage('L','Letter');
$pdf->Ln();

$pdf->SetFont('Times','B',15);
$pdf->Cell(30,10,'HOSPITAL:',0,0,'L');
$pdf->Cell(155,10,$ver[5],0,0,'L');
$pdf->Ln();

$pdf->SetFont('Times','B',12);
$pdf->Cell(29,10,'No de Reporte:',0,0,'L');
$pdf->Cell(155,10,$ver[0] ,0,0,'L');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Times','B',13);
$pdf->Cell(21,10,'EQUIPO:','TL',0,'L');
$pdf->Cell(84,10,$ver[1],'TR',0,'L');
$pdf->Cell(19,10,'FECHA:','TL',0,'L');
$pdf->Cell(61,10,$ver[4],'TR',1,'L');
$pdf->Cell(47,10,'MARCA Y MODELO:','TL',0,'L');
$pdf->Cell(58,10,$ver[2],'TR',0,'L');
$pdf->Cell(37,10,'RESPONSABLE:','TLB',0,'L');
$pdf->Cell(43,10,$ver[5],'TRB',1,'L');
$pdf->Cell(32,10,'No DE SERIE:','TLB',0,'L');
$pdf->Cell(73,10,$ver[3],'TRB',1,'L');
$pdf->SetFont('Times','B',14);


$images = '../uploads/'. $ver[9];

$pdf->Cell(125,7,'DESCRIPCION:',0,0,'L');
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->Cell(185,9,$ver[8],0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(100,5, $pdf->Image('../uploads/'.$ver[9]), 0,0,'C');

$pdf->Ln(7);

}

$pdf->Output('my_file.pdf','D'); // send to browser and display
?>
