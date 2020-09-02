<?php 


        include_once('conexion/db.php');
        $glosa= $_POST['glosa'];
        $origen= $_POST['origen'];
        $destino=$_POST['destino'];
        $tipo=$_POST['tipo'];
        
$nombre_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    mysql_select_db($database_oficios,$oficios);

    $query_ultimo_oficio= "SELECT n_folio FROM oficios WHERE id_folio=
    (SELECT MAX(id_folio) FROM oficios)";
     $recordset_ultimo_oficio=mysql_query($query_ultimo_oficio,$oficios) or die(mysql_error());
     $ultimo_oficio= mysql_fetch_assoc($recordset_ultimo_oficio);
     $sgte=$ultimo_oficio['n_folio']+1;
  
        
    $horaactual= date ("Y-m-d H:i:s");
    $anoactual= date("Y");
    
    $insertaoficio="INSERT INTO oficios (n_folio,
                                        glosa_oficio,
                                        origen,
                                        destino,
                                        tipo,
                                        ip_solicitante,
                                        ano)                                
                                    VALUES
                                        ($sgte,
                                        ucase(trim('$_POST[materia]')),
                                        ucase(trim('$_POST[origen]')),
                                        ucase(trim('$_POST[destino]')),
                                        '$_POST[tipo]',
                                        '$nombre_host',
                                        $anoactual)";  
                 
               if (mysql_query ($insertaoficio)){
                    //$a= mysql_insert_id();
                    echo "<script language=JavaScript> alert 
                    ('Oficio Nº $sgte-$anoactual fue agregado.'); </script>";
                    unset($_POST['materia']);
                    echo "<script> actualiza_frame(); </script>";   
                
               }
               
             else{
                 echo "Error al Insertar Oficio: ".mysql_error();
                 echo "<br>";            
                 echo "$insertaoficio";
                   }
        
    }

            
    	
 ?>

