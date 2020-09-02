<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<head>
		


<!-- Fucking Popper previous Jquery-->
<script src="js/popper.min.js"></script>

<!-- Jquery -->	
<script src="js/jquery.min.js"></script>


<!-- Fileinput  krajee-->
<script src="js/fileinput.js"></script>
<script src="js/es.js"></script>
<link rel="stylesheet" href="css/fileinput.css"/>

<!--Datepicker bootstrap-->
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap-datepicker.es.min.js"></script>
<link href="css/bootstrap-datepicker.css" rel="stylesheet"/>

<!-- Viewport -->	
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<!-- Bootstrap -->
<link rel="stylesheet" href="js/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<link href="js/font-awesome.min.css" rel="stylesheet">


<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="js/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>


<!-- Datatables exportar -->
<script type="text/javascript" charset="utf8" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/buttons.print.min.js"></script>
<!-- Fin librerias Datatables Exportar -->


<!--Estilos CSS-->
<link rel="stylesheet" href="css/estilo.css">

<!--Scripts-->
<script src="js/eventos.js"></script>


<!-- Alertify -->
	<!-- JavaScript -->
<script src="js/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="css/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="css/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<!-- Fin alertify -->



<!-- Inicializa Datatables -->
		<script>

		$(document).ready( function () {

// Buscador por inputs header
    $('#tabladatos thead tr').clone(true).appendTo( '#tabladatos thead' );
    $('#tabladatos thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
//init datatables
			 var table=$('#tabladatos')
				.addClass( 'nowrap' )
				.DataTable( {
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
				"buttons": ['excel'],
				"order": [[ 1, "desc" ]],
				"pageLength": 12,
				"deferRender": true,
				"dom": '<"top"f>rt<"bottom"lipB><"clear">',
				"language": {
				"searchPlaceholder": "Buscar por cualquier criterio",
	            "lengthMenu": "Mostrar _MENU_ filas por página",
	            "zeroRecords": "No se encontró filas",
	            "info": "Página _PAGE_ de _PAGES_",
	            "infoEmpty": "No hay registros disponibles",
	            "infoFiltered": "(Filtrado de _MAX_ total de filas)",
	            "sSearch":         "Buscar:",
	            "oPaginate": {
	                   "sFirst":    "Primero",
       		           "sLast":     "Último",
            	       "sNext":     "Siguiente",
                	   "sPrevious": "Anterior"
                },
        			},
					responsive: true,
					columnDefs: [
						{ targets: [ 1 ], visible: false, searchable: false}
					]
				} );

//fin init datatbles




		} );//fin document.ready


	
		</script>
		



		
		<?php
			define('NUM_ITEMS_BY_PAGE', 15);
			require 'conexion/db.php';
			$query="SELECT * FROM oficios  ORDER BY fecha_solicitud DESC";
			
			$resultado=mysqli_query($conn, $query);

			$querytotal="SELECT count(*) as total_filas FROM oficios";
			$resultadototal=mysqli_query($conn, $querytotal);
			$total_filas=mysqli_fetch_assoc($resultadototal);
			$num_total_rows=$total_filas['total_filas'];
			
		?>   


		<title>Mantenedor de Oficios</title>
	</head>	

		<body>
			<div class="container-fluid">
				<h2 class="text-center">Mantenedor de Oficios</h2>
			</div>

			<!-- Comienzo mantenedores -->





		
<!-- Carga de datos en la tabla -->
<div class="container-fluid">
		<table  id="tabladatos" class="table table-hover table-striped container table-sm order-column compact">  
		  <thead>  
		    <tr class="active table-primary">  
		      <th>N° Oficio</th>
		      <th>Indice</th>	
		      <th>F.Ingreso</th>
		      <th>Detalle</th>  
		      <th>Origen</th>
		      <th>Destino</th>
		      <th>Tipo</th>
		      <th>PC Solicitante</th>
		      <th>F.Despacho</th>
		      <td><img src="images/doc_titulo.svg" style="width:25px"/></td>
		      <td><img src="images/editar_titulo.svg" style="width:25px"/></td>
			</tr>  
		  </thead> 

		   <tbody>  
		
			<?php
			if ($num_total_rows > 0) {
			    $page = false;
			    
			    $result = $conn->query('SELECT * FROM oficios  ORDER BY fecha_solicitud DESC');
			 
			    if ($result->num_rows > 0) {
			        echo '<tr class="table  table-sm">';
			        while ($row = $result->fetch_assoc()) {
			            echo '<td>'.'<strong>'.$row['n_folio'].'-'.$row['ano'].'</strong>'.'</td>';
			            echo '<td>'.$row['id_folio'].'</td>';
			            echo '<td>'.strftime("%d-%m-%Y %H:%M:%S", strtotime($row['fecha_solicitud'])).'</td>';
			            echo '<td>'.$row['glosa_oficio'].'</td>';
			            echo '<td>'.$row['origen'].'</td>';
				        echo '<td>'.$row['destino'].'</td>';
				        echo '<td>'.$row['tipo'].'</td>';
				        echo '<td>'.$row['ip_solicitante'].'</td>';
						if ( $row['fecha_despacho']) {
				        	echo '<td>'.strftime("%d-%m-%Y", strtotime($row['fecha_despacho'])).'</td>';
				        }
				        else{
				        echo '<td>'.''.'</td>';
				        }
				        
				        if ($row['documento']!=NULL) {
							echo '<td><a href="files/'.$row['documento'].'" target="_blank"><img src="images/doc.svg" style="width:22px"/></a></td>';
				        }
				        else{
				        echo '<td>'.''.'</td>';	
				        }
				        
					echo '<td ><a  href="#" class="edid"  data-toggle="modal" data-target="#confirm-update" ><img class="eimg" src="images/editar.svg" style="width:20px"  onclick="oficioEditar('.$row['id_folio'].','.$row['n_folio'].',\''.$row['glosa_oficio'].'\',\''.$row['origen'].'\',\''.$row['destino'].'\',\''.$row['tipo'].'\',\''.strftime("%d-%m-%Y", strtotime($row['fecha_despacho'])).'\')"/></a></td>';


			        	echo '</tr>';    
				        
				        } //cierre while

			        } //cierre segundo if
			    
			    
			} //cierre primer if

		    ?>
		</tbody>
		</table>
				

</div>

<!--  modal Editar-->			
<div class="modal fade" id="confirm-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            
                <div class="modal-header  bg-light mb-3">
                    <h4 class="modal-title" id="myModalLabel">Editar Oficio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				      <div class="modal-body" id="editar">
				
<!-- formulario editar -->
				<form id="eoficio" action="edoficio.php" method="post" enctype="multipart/form-data" >
					
					<input type="hidden" id="idoficio" name="idoficio">

					<input type="hidden" class="form-control form-group" id="enoficio2" name="enoficio2" >
					
					<input type="text" class="form-control form-group" id="enoficio" name="enoficio" disabled>

					<input type="text" class="form-control form-group" id="eglosa" name="eglosa"  required>

					<input type="text" class="form-control form-group" id="eorigen" name="eorigen"   maxlength="50" required>

					<input type="text" class="form-control form-group" id="edestino" name="edestino"  maxlength="50" required>
					
					<select id="etipo" name="etipo"  class="form-control mb-3" required>
						<option value="Ordinario">Ordinario</option>
						<option value="Exhorto">Exhorto</option>
						<option value="Administrativo">Administrativo</option>
						<option value="Otro">Otro</option>
					</select>


             <div class="input-group form-group">
						<input  type="text" id="edatepicker3" name="eanio" class="form-control form-group"  required >
						<label for="edatepicker3">
						<span class="input-group-text" id="basic-addon2" for="edatepicker3" >

							<i class="fa fa-calendar" style="font-size:24px" for="edatepicker3"></i>
						</span>
						</label>
					</div>
								
					<input id="einput" class="file" name="einput" type="file" data-show-preview="false" data-language="es" data-show-remove="false" data-show-cancel="false" data-show-upload="false" data-required="false" data-allowed-file-extensions='["doc", "docx","pdf"]' data-msg-placeholder="Subir o reemplazar archivo">

          <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="button btn" class="btn btn-success" id="btnedtoficio">Editar</button>
                     <!--<button  type="submit" class="btn btn-success btn-ok">Editar</button>-->
                </div>
              </form>

            </div>
        </div>
    </div>
</div>
</div>
			<!-- Fin modal editar -->


<div class="footer">
  <p class="rights fixed-bottom"><a href="mailto:mmujica@pjud.cl">Desarrollado por Marcelo Mujica</a></p>
</div>

	</body>		
</html>
