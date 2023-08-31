<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
</head>
<body>
	<!-- SideBar -->
	<?php
		include('sidebar.php');
	?>
	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-menu"></i></a>
				</li>
				<li>
					<a href="#!" class="btn-modal-help">
						<i class="zmdi zmdi-help-outline"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Registro <small>Materias</small></h1>
			</div>
			<p class="lead">Podemos administrar los datos de los materias, así como también hacer las actualizaciones correspondientes de los mismas y su respectiva eliminación!</p>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#new" data-toggle="tab">Nuevo</a></li>
					  	<li><a href="#listEst" data-toggle="tab">Lista</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
									    <form action="registrosMaterias.php" method="post">
									    	<fieldset>Datos de Materia</fieldset>
											<div class="form-group">
										    <label class="control-label">Docente</label>
										        <select class="form-control" name="docente">
<?php
include('config/index.php');
try {
  $stmt= $connection->prepare('SELECT * FROM usuarios where nivel_acceso = 2');
  $stmt->execute();
  while($row = $stmt->fetch()) {
echo "<option value=".$row['Id'].">". $row['pnombre'] . " ". $row['snombre'] ." ". $row['papellido'] ." ". $row['sapellido'] ."</option>"; 
  }
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>
										        </select>
										    </div>
									    	<div class="form-group label-floating">
											  <label class="control-label">Nombre</label>
											  <input class="form-control" type="text" name="nombre">
											</div>
											<div class="form-group label-floating">
											<label class="control-label">Descripción</label>
											  <TEXTAREA class="form-control" name="descripcion"></TEXTAREA>
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Créditos</label>
											  <input class="form-control" type="text" name="creditos">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Grupo</label>
											  <input class="form-control" type="text" name="grupo">
											</div>
										    <p class="text-center">
										    	<button type="submit" class="btn btn-info btn-raised btn-sm" name="registro"><i class="zmdi zmdi-floppy"></i> Registar</button>
										    </p>
									    </form>
									</div>
								</div>
							</div>
						</div>
					  	<div class="tab-pane fade" id="listEst">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">Docente</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">Descripción</th>
											<th class="text-center">Créditos</th>
											<th class="text-center">Grupo</th>
											<th class="text-center">Editar</th>
											<th class="text-center">Eliminar</th>
										</tr>
									</thead>
									<?php

try {
  $stmt= $connection->prepare('SELECT * FROM materia');
  $stmt->execute();
  while($row = $stmt->fetch()) {
?>
<tbody>
<tr>
<td>
	<?php 
	$ids=$row['docente'];
	try {
  		$stm= $connection->prepare('SELECT * FROM usuarios where Id='.$ids);
  		$stm->execute();
  		while($ro = $stm->fetch()) {
  		echo $ro['pnombre'] . " " . $ro['snombre'] . " " . $ro['papellido'] . " " . $ro['sapellido'];
  		}
  	} catch(PDOException $e) {
  		echo 'Error: ' . $e->getMessage();
	}
	?>
	
</td>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['descripcion']; ?></td>
<td><?php echo $row['creditos']; ?></td>
<td><?php echo $row['grupo']; ?></td>
<td><a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
<td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
  </tr>
  </tbody>
  <?php
  }
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>	
								</table>
								<ul class="pagination pagination-sm">
								  	<li class="disabled"><a href="#!">«</a></li>
								  	<li class="active"><a href="#!">1</a></li>
								  	<li><a href="#!">2</a></li>
								  	<li><a href="#!">3</a></li>
								  	<li><a href="#!">4</a></li>
								  	<li><a href="#!">5</a></li>
								  	<li><a href="#!">»</a></li>
								</ul>
							</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Notifications area 
	<section class="full-box Notifications-area">
		<div class="full-box Notifications-bg btn-Notifications-area"></div>
		<div class="full-box Notifications-body">
			<div class="Notifications-body-title text-titles text-center">
				Notifications <i class="zmdi zmdi-close btn-Notifications-area"></i>
			</div>
			<div class="list-group">
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-triangle"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">17m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				    </div>
			  	</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-octagon"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">15m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				    </div>
			  	</div>
			  	<div class="list-group-separator"></div>
				<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-help"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">10m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
				</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-info"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">8m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
			  	</div>
			</div>

		</div>
	</section>-->

	<!-- Dialog help -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Dialog-Help">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    	<h4 class="modal-title">Funcionalidad</h4>
			    </div>
			    <div class="modal-body">
			        <p>
			        	Este sistema busca solventar las necesidades de la institución, optimizando los procesos relacionados a la entrada y salida de los estudiantes. Esta aplicación web contará con un diseño agradable de fácil utilización y con una gama de herramientas que permitirá realizar las tareas rápidamente!
			        </p>
			    </div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Ok</button>
		      	</div>
		    </div>
	  	</div>
	</div>
	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>