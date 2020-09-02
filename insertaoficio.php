<?php 
 include_once('conexion/db.php');
        $rit= $_POST['rit'];
        $anio= $_POST['anio'];
        
        $= $_POST['origen'];
        $destino= $_POST['destino'];
        $descripcion= $_POST['descripcion'];
		$tipo= $_POST['tipo'];

		$qinserta="INSERT INTO oficios (letra,rit,anio,origen,destino,descripcion,tipo) VALUES('$letra','$rit','$anio','$origen','$destino','$descripcion','$tipo')";
        if(mysqli_query($conn,$qinserta)){
         header("Location:index.php");

        }
        else{
        echo "Falló insercion";
        echo "<br>";
        echo $qinserta;
        }
    	
 ?>

