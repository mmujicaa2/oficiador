<?php 
header('Content-type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');

//var_dump($_POST);

 
 $idoficio=$_POST['idoficio'];
 $noficio=$_POST['enoficio2'];
 $eglosa= $_POST['eglosa'];
 $eorigen= $_POST['eorigen'];
 $edestino= $_POST['edestino'];
 $etipo= $_POST['etipo'];
 $efechadespacho= $_POST['eanio'];
//STR_TO_DATE('$_POST[fdespacho]','%d-%m-%Y')
 //fecha_despacho='$efechadespacho',

  //echo $enoficio;
        
//$absoluto=$ruta.$archivounicode;


if ($_POST['idoficio']) {


				
				include_once('conexion/db.php');
        
        
    if ($_FILES['einput']['name'] !="") {

        
        //$archivo=($_FILES['einput']['name']);
        $nombredoc=$_FILES['einput']['name'];
        

        $extension = pathinfo($nombredoc, PATHINFO_EXTENSION);
        //echo $extension;        

        //$nombredoc = iconv('windows-1256', 'utf-8', $archivo);


        //$nombredoc = mb_convert_encoding($archivo, "UTF-8", "auto");


        //$nombredoc=$_FILES['einput']['name'];
        $directorio = 'files/';
        $sufijo=date("-Y");
        $archivo_y_extension=$noficio.'.'.$extension;

        $tempdoc=$_FILES['einput']['tmp_name'];
        

        //$finaldoc=$directorio.$prefijodoc.$archivo_y_extension;
        $finaldoc=$directorio.$noficio.$sufijo.'.'.$extension;
        //echo $finaldoc;
       // echo '<br>';
        
        //move_uploaded_file($tempdoc, $directorio.$prefijodoc.$nombredoc);
        move_uploaded_file($tempdoc, $finaldoc);
          $qedita="UPDATE oficios set 
          
          glosa_oficio='$eglosa',
          origen='$eorigen',
          destino='$edestino',
          tipo='$etipo',
          fecha_despacho=STR_TO_DATE('$_POST[eanio]','%d-%m-%Y'),
          documento='$noficio$sufijo.$extension'
          where id_folio=$idoficio";

          //echo '<br>';
         // echo $qedita;
          //echo '<br>';
         // echo "con subir archivo";

        }// fin del if    

        else{
          $qedita="UPDATE oficios set 
          
          glosa_oficio='$eglosa',
          origen='$eorigen',
          destino='$edestino',
          tipo='$etipo',
          fecha_despacho=STR_TO_DATE('$_POST[eanio]','%d-%m-%Y')
          where id_folio=$idoficio";

          //echo $qedita;
         // echo "sin subir archivo";
        }
        


        if(mysqli_query($conn,$qedita)){
                echo "Actualizado OK";
                header("Location:mant_oficios.php");
              }
        else{
               echo "Falló edicion, intentelo denuevo o contactese con el Webmaster mmujica@pjud.cl";
               //header("Location:mant_oficios.php");
            }

} //fin isste id
else
{
    //echo "no entra a al if";
   // header("Location:mant_sentencias.php");
}
      
 ?>

