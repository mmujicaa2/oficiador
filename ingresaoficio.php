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
				"order": [[ 0, "desc" ]],
				"pageLength": 12,
				"deferRender": true,
				"dom": '<"top"f>rt<"bottom"ip><"clear">',
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
						{ targets: [2, -3], className: 'dt-body-left' }
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
				<h2 class="text-center">Generador de Oficios</h2>
			</div>

			<!-- Comienzo mantenedores -->


<!--  Ingreso sentencias-->
			<div class="container">
				
				<div class="form-group">
					<button type="button"  class="btn btn-primary btn-lg col-lg" data-toggle="modal" data-target="#ingresaoficio">Solicita N° Oficio</button>
				</div>

				<div class="modal fade " id="ingresaoficio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				    <!-- Aca va el div para modificar el ancho del modal -->
				    <div class="modal-content">
				      
				      <div class="modal-header  bg-light mb-3">
							<h5>Ingrese datos de oficio</h5>
				        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        	  <span aria-hidden="true">&times;</span>
				       		 </button>
				      </div>
				      
				      <div class="modal-body" id="inserta">
			
<!-- Formulario ingreso -->

				<form id="ffolio" action="ingoficio.php" method="post" enctype="multipart/form-data" >
							
								
					<input type="text" class="form-control form-group" name="glosa"  placeholder="Detalle oficio (RIT-año breve descripción)"  required>
					<input type="text" class="form-control form-group" name="origen"  placeholder="Origen (Unidad y/o Funcionario)" required>
					<input type="text" class="form-control form-group" name="destino"  placeholder="Destino (Entidad y/o Persona)" required>
					
					<select name="tipo" id="tipo" class="form-control mb-3" required>
						<option value="">Ordinario</option>
						<option value="Pendiente">Exhorto</option>
						<option value="Firme">Administrativo</option>
						<option value="Confirmada">Otro</option>
					</select>
					
					
					 <div class="modal-footer">
				       		<button id="btnagregar" type="button bnt" class="btn btn-primary">Agregar</button>
				     </div>
						</form>


					
				      </div>
				     
				    </div>
				    <!-- aca va el div para modificar el ancho del modal -->
				  </div>
				</div>
			
			
			</div><!-- cierre div -->


		
<!-- Carga de datos en la tabla -->
<div class="container-fluid">
		<table  id="tabladatos" class="table table-hover table-striped container table-sm order-column compact">  
		  <thead>  
		    <tr class="active table-primary">  
		      <th>N° Oficio</th>
		      <th>F.Ingreso</th>
		      <th>Detalle</th>  
		      <th>Origen</th>
		      <th>Destino</th>
		      <th>Tipo</th>
		      <th>PC Solicitante</th>
		      <td><img src="images/doc_titulo.svg" style="width:25px"/></td>
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
			            echo '<td>'.$row['fecha_solicitud'].'</td>';
			            echo '<td>'.$row['glosa_oficio'].'</td>';
			            echo '<td>'.$row['origen'].'</td>';
				        echo '<td>'.$row['destino'].'</td>';
				        echo '<td>'.$row['tipo'].'</td>';
				        echo '<td>'.$row['ip_solicitante'].'</td>';
				        
				        if ($row['documento']!=NULL) {
							echo '<td><a href="files/'.$row['documento'].'" target="_blank"><img src="images/doc.svg" style="width:22px"/></a></td>';
				        }
				        else{
				        echo '<td>'.''.'</td>';	
				        }
				        
			        	echo '</tr>';    
				        
				        } //cierre while

			        } //cierre segundo if
			    
			    
			} //cierre primer if

		    ?>
		</tbody>
		</table>
				

</div>


<div class="footer">
	<p class="rights"><a href="mailto:mmujica@pjud.cl">Desarrollado por Marcelo Mujica</a></p>
</div>

	</body>		
</html>
