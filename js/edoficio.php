<?php 
//var_dump($_POST);

 
 $idoficio=$_POST['idoficio'];
 $enoficio= $_POST['enoficio'];
 $eglosa= $_POST['eglosa'];
 $eorigen= $_POST['edestino'];
 $etipo= $_POST['etipo'];
 $efechadespacho= $_POST['edatepicker3'];



if ($_POST['idoficio']) {

				
				include_once('conexion/db.php');
        
        
    if ($_FILES['einput']['name'] !="") {
        $nombredoc=$_FILES['einput']['name'];
        $directorio = 'documentos/';
        $tempdoc=$_FILES['einput']['tmp_name'];
        $prefijodoc=date("d.m.y-");

        $finaldoc=$directorio.$prefijodoc.$nombredoc;
        
        //move_uploaded_file($tempdoc, $directorio.$prefijodoc.$nombredoc);
        move_uploaded_file($tempdoc, $finaldoc);
          $qedita="UPDATE oficios set 
          
          glosa='$eglosa',
          origen='$eorigen',
          destino='$edestino',
          tipo='$etipo',
          fecha_despacho='$efechadespacho',
          documento='$prefijodoc$nombredoc'
          where id_oficio=$idoficio";

          echo $qedita;
          echo "con subir archivo";

        }// fin del if    

        else{
          $qedita="UPDATE oficios set 
          
          glosa='$eglosa',
          origen='$eorigen',
          destino='$edestino',
          tipo='$etipo',
          fecha_despacho='$efechadespacho',
          where id_oficio=$idoficio";

          echo $qedita;
          echo "sin subir archivo";
        }
        


        if(mysqli_query($conn,$qedita)){
                echo "Actualizado OK";
                header("Location:mant_oficios.php");
              }
        else{
               echo "Falló edicion, intentelo denuevo o contactese con el Webmaster mmujica@pjud.cl";
               header("Location:mant_oficios.php");
            }

} //fin isste id
else
{
    echo "no entra a al if";
   // header("Location:mant_sentencias.php");
}
      
 ?>

