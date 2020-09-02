<?php 


        include_once('conexion/db.php');
        $glosa= $_POST['glosa'];
        $origen= $_POST['origen'];
        $destino=$_POST['destino'];
        $tipo=$_POST['tipo'];

    $nombre_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    require 'conexion/db.php';

    //mysql_select_db($database_oficios,$oficios);

    $query_ultimo_oficio= "SELECT n_folio FROM oficios WHERE id_folio=
    (SELECT MAX(id_folio) FROM oficios)";

     $recordset_ultimo_oficio=mysqli_query($conn,$query_ultimo_oficio) or die(mysql_error());
     $ultimo_oficio= mysqli_fetch_assoc($recordset_ultimo_oficio);
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
                                        trim('$_POST[glosa]'),
                                        trim('$_POST[origen]'),
                                        trim('$_POST[destino]'),
                                        trim('$_POST[tipo]'),
                                        '$nombre_host',
                                        $anoactual)";  
                 
               if (mysqli_query ($conn,$insertaoficio)){
                   header("Location:index.php");
                
               }
               
             else{
                 echo "Error al Insertar Oficio: ".mysql_error();
                 echo "<br>";            
                 echo "$insertaoficio";
                   }
        
    

            
    	
 ?>

