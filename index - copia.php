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
				"buttons": ['excel', 'pdf'],
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
						{ targets: [2, -3], className: 'dt-body-left' }
					]
				} );

//fin init datatbles




		} );//fin document.ready


	
		</script>
		




	<!--			<?php
					define('NUM_ITEMS_BY_PAGE', 15);
					require 'conexion/db.php';
					$query="SELECT * FROM sentencia ORDER BY id_oficio DESC";
					
					$resultado=mysqli_query($conn, $query);

					$querytotal="SELECT count(*) as total_filas FROM sentencia";
					$resultadototal=mysqli_query($conn, $querytotal);
					$total_filas=mysqli_fetch_assoc($resultadototal);
					$num_total_rows=$total_filas['total_filas'];
					
				?> -->


		<title>Buscador de Sentencias</title>
	</head>	

		<body>
			<div class="container-fluid">
				<h2 class="text-center">Buscador de sentencias</h2>
			</div>

			<!-- Comienzo mantenedores -->


<!--  Ingreso sentencias-->
			<div class="container ">
				
				

				<div class="modal fade " id="ingresaoficio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				    <!-- Aca va el div para modificar el ancho del modal -->
				    <div class="modal-content">
				      
				      <div class="modal-header  bg-light mb-3">
							<h5>Ingrese datos de sentencia</h5>
				        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        	  <span aria-hidden="true">&times;</span>
				       		 </button>
				      </div>
				      
				      <div class="modal-body" id="inserta">
			
<!-- Formulario ingreso -->

				<form id="ffolio" action="ingsentencia.php" method="post" enctype="multipart/form-data" >
							
								
								<input type="text" class="form-control form-group" name="rit"  placeholder="Rol Corte" pattern="[0-9]{1,4}" maxlength="4" required>
								
						 		<div class="input-group form-group">
									<input  id="datepicker2" class="form-control form-group" name="anio" placeholder="Año" required>
										<label for="datepicker2">
											<span class="input-group-text" id="basic-addon2" for="datepicker2" >
												
												<i class="fa fa-calendar" style="font-size:24px"></i>
											</span>
										</label>
								</div>
			

					<select name="redactor" id="redactor" class="form-control mb-3" required>
						<option value="">Redactor</option>
					</select>

					<select name="integrante1" id="integrante1"  class="form-control mb-3" required>
						<option value="">Integrante1</option>
					</select>	
					<select name="integrante2" id="integrante2"  class="form-control mb-3" required>
						<option value="">Integrante2</option>
					</select>

					<!-- Select materias -->
					<select name="materia" id="materia" class="form-control mb-3" required >
														<option  name="" value="" style="color:grey">Seleccione Materia</option>
														<?php 
														 include "conexion/db.php";
														 $querymateria="Select distinct materia from materia";
														 if ($resultado = mysqli_query($conn,$querymateria)){
														 		while($campomateria=mysqli_fetch_array($resultado)){
														 			$materia=$campomateria['materia'];
														 			echo '<option value="'.$materia.'">'.$materia.'</option>';
														 		}

														 }

														?>
					</select>



					<div  id="submateria"></div> <!-- Carga el select con las submaterias  dependiendo de materia-->
								
					<select name="estado" id="estado" class="form-control mb-3" required>
						<option value="">Estado sentencia</option>
						<option value="Pendiente">Pendiente</option>
						<option value="Confirmada">Confirmada</option>
						<option value="Rechazada">Rechazada</option>
					</select>
					
					<input id="input-b2" class="file" name="input-b2" type="file" data-show-preview="false" data-language="es" data-show-remove="false" data-show-cancel="false" data-show-upload="false" data-required="true" data-allowed-file-extensions='["doc", "docx","pdf"]'>



					 <div class="modal-footer">
				       		<button id="btnagregar" type="button bnt" class="btn btn-primary">Agregar</button>
				     </div>
						</form>


					<div id="resultadoinsert"></div> <!-- Eliminar -->
				      </div>
				     
				    </div>
				    <!-- aca va el div para modificar el ancho del modal -->
				  </div>
				</div>
			
			
			</div><!-- cierre div -->


<!-- Cierre ingreso de sentencias  -->


		
<!-- Carga de datos en la tabla -->
<div class="container">
		<table  id="tabladatos" class="table table-hover table-striped container table-sm order-column compact">  
		  <thead>  
		    <tr class="active table-primary">  
		      <!-- <th>F.Ingreso</th> -->
		      <th>RIT</th>  
		      <th>Año</th>
		      <th>Materia</th>
		      <th>Submateria</th>
		      <th>Redactor</th>
		      <th>Integrante1</th>
		      <th>Integrante2</th>
			  	<th>Estado</th>
		      <td><img src="images/doc_titulo.svg" style="width:25px"/></td>
		      
			</tr>  
		  </thead> 

		   <tbody>  
		
			<?php


			if ($num_total_rows > 0) {
			    $page = false;
			 
			    
			    $result = $conn->query('SELECT * FROM sentencia ORDER BY fechaingreso DESC');

			 
			    if ($result->num_rows > 0) {
			        echo '<tr class="table  table-sm">';
			        while ($row = $result->fetch_assoc()) {
			            //echo '<td>'.strftime("%d-%m-%Y", strtotime($row['fechaingreso'])).'</td>';
			            echo '<td>'.$row['rit'].'</td>';
			            echo '<td>'.$row['anio'].'</td>';
			            echo '<td>'.$row['materia'].'</td>';
			            echo '<td>'.$row['submateria'].'</td>';
				        echo '<td>'.$row['ministro1'].'</td>';
				        echo '<td>'.$row['ministro2'].'</td>';
				        echo '<td>'.$row['ministro3'].'</td>';
				        echo '<td>'.$row['estado'].'</td>';
			            
			            //Abrir doc
			            echo '<td><a href="documentos/'.$row['documento'].'" target="_blank"><img src="images/doc.svg" style="width:22px"/></a></td>';
			            
			            
						

			            /* <button class="btn btn-default" data-href="/delete.php?id=54" data-toggle="modal" data-target="#confirm-delete">Delete record #54</button>*/

			            //echo '<td ><a id="eliminar" href="documentos/'.$row['documento'].'" target="_blank"><img src="images/borrar.svg" style="width:20px"/></a></td>';
			            //echo '<td>'.$row['documento'].'</td>';
			        	echo '</tr>';    
				        }
			    
			    }
		echo "</tbody>"; //cierre tbody
		echo "</table>";
				
    			
			}

			?>
</div>

<!--  modal Editar-->			
<div class="modal fade" id="confirm-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            
                <div class="modal-header  bg-light mb-3">
                    <h4 class="modal-title" id="myModalLabel">Editar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				      <div class="modal-body" id="editar">
				
<!-- formulario editar -->
				<form id="efolio" action="edsentencia.php" method="post" enctype="multipart/form-data" >
					
					<input type="hidden" id="id" name="id">

					<input type="text" class="form-control form-group" id="erit" name="erit" placeholder="Rol Corte" pattern="[0-9]{1,4}" maxlength="4"   >
								
					<div class="input-group form-group">
						<input  type="text" id="edatepicker2" name="eanio" class="form-control form-group"  >
						<label for="edatepicker2">
						<span class="input-group-text" id="basic-addon2" for="edatepicker2" >

							<i class="fa fa-calendar" style="font-size:24px" for="edatepicker2"></i>
						</span>
						</label>
					</div>

					<select name="eredactor" id="eredactor" class="form-control mb-3" required>
						<option value="">Redactor</option>
					</select>

					<select name="eintegrante1" id="eintegrante1"  class="form-control mb-3" required>
						<option value="">Integrante1</option>
					</select>	
					<select name="eintegrante2" id="eintegrante2"  class="form-control mb-3" required>
						<option value="">Integrante2</option>
					</select>
				

					<!-- Select materias -->
				<select name="emateria" id="emateria" class="form-control mb-3" required >
					<option  name="" value="" style="color:grey">Seleccione Materia</option>
								<?php 
								 include "conexion/db.php";
								 $querymateria="Select distinct materia from materia";
								 if ($resultado = mysqli_query($conn,$querymateria)){
								 		while($campomateria=mysqli_fetch_array($resultado)){
								 			$materia=$campomateria['materia'];
								 			echo '<option value="'.$materia.'">'.$materia.'</option>';
								 		}

								 }

								?>
					</select>


					<select name="esubmateria" id="esubmateria" class="form-control mb-3" required>
					</select>
					<!-- <div  id="esubmateria"></div>  --><!-- Carga el select con las submaterias -->
								
					<select name="eestado" id="eestado" class="form-control mb-3" required>
						<option value="">Estado sentencia</option>
						<option value="Firme">Firme</option>
						<option value="Pendiente">Pendiente</option>
						<option value="Confirmada">Confirmada</option>
						<option value="Rechazada">Rechazada</option>
					</select>
								
					<input id="einput" class="file" name="einput" type="file" data-show-preview="false" data-language="es" data-show-remove="false" data-show-cancel="false" data-show-upload="false" data-required="false" data-allowed-file-extensions='["doc", "docx","pdf"]' data-msg-placeholder="Reemplazar archivo(opcional)">

          <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
											<button type="button btn" class="btn btn-success" id="btneditar">Editar</button>
                     <!-- <a class="btn btn-success btn-ok">Editar</a> -->
                </div>
              </form>

            </div>
        </div>
    </div>
</div>
</div>
			<!-- Fin modal delete -->




<!--  modal delete -->			
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                </div>
            
                <div class="modal-body">
                    <p>Esta a punto de eliminar.</p>
                    <p>Esta seguro que desea hacerlo?</p>
                    <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Borrar</a>
                </div>
            </div>
        </div>
    </div>

			<!-- Fin modal delete -->

<!-- Scripy llama a eliminar el registro -->
 <script>
       
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });


    </script>
<!-- Fin script llama  eliminar -->

<div class="footer">
	<p class="rights" ><a href="mailto:mmujica@pjud.cl">Desarrollado por Marcelo Mujica</a></p>
</div>

	</body>		
</html>
