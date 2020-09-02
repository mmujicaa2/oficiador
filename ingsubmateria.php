<?php 
        include_once('conexion/db.php');
        $materia= $_POST['nmateria'];
        $submateria= $_POST['nsubmateria'];
        
        $qinserta="INSERT INTO materia (materia,submateria) VALUES('$materia','$submateria')";
                
                //echo $qinserta;

            if(mysqli_query($conn,$qinserta)){
                    header("Location:mant_submaterias.php?materia=$materia");
                }
            else{
                    echo "Falló insercion, intentelo denuevo o contactese con el Webmaster mmujica@pjud.cl";
                }
    	
 ?>

