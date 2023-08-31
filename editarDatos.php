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
			  <h1 class="text-titles"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Editar <small>Datos</small></h1>
			</div>
			<p class="lead">Podemos editar los datos de los usuario, así como también hacer las actualizaciones correspondientes de los mismos y su respectiva eliminación!</p>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#new" data-toggle="tab">Edición</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
									    <form action="editarRegistros.php" method="post">
									    	<fieldset>Datos</fieldset>
									    	<?php
											include('config/index.php');
											try {
  											$stmt= $connection->prepare('SELECT * FROM usuarios where Id = ' . $_GET['id']);
  											$stmt->execute();
  											while($row = $stmt->fetch()) {
											?>
											<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
											<input type="hidden" name="acceso" value="<?php echo $row['nivel_acceso']; ?>">
									    	<div class="form-group label-floating">
											  <label class="control-label">Cédula</label>
											  <input class="form-control" type="text" name="username" value="<?php echo $row['usuario']; ?>">
											</div>
									    	<div class="form-group label-floating">
											  <label class="control-label">Primer nombre</label>
											  <input class="form-control" type="text" name="pnombre" value="<?php echo $row['pnombre']; ?>">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Segundo nombre</label>
											  <input class="form-control" type="text" name="snombre" value="<?php echo $row['snombre']; ?>">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Primer apellido</label>
											  <input class="form-control" type="text" name="papellido" value="<?php echo $row['papellido']; ?>">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Segundo apellido</label>
											  <input class="form-control" type="text" name="sapellido" value="<?php echo $row['sapellido']; ?>">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Dirección</label>
											  <input class="form-control" name="direccion" value="<?php echo $row['direccion']; ?>">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">E-mail</label>
											  <input class="form-control" type="text" name="correo" value="<?php echo $row['correo']; ?>">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Teléfono</label>
											  <input class="form-control" type="text" name="telefono" value="<?php echo $row['telefono']; ?>">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Contraseña</label>
											  <input class="form-control" type="password" name="password">
											</div>
											<div class="form-group">
										        <label class="control-label">Género</label>
										        <select class="form-control" name="genero">
										          <option value="1">Masculino</option>
										          <option value="2">Femenino</option>
												  <option value="3">Otro</option>
										        </select>
										    </div>
											<div class="form-group">
										      <label class="control-label">Foto</label>
										      <div>
										        <input type="text" readonly="" class="form-control" placeholder="Selecionar...">
										        <input type="file" name="foto">
										      </div>
										    </div>
										    <p class="text-center">
										    	<button type="submit" class="btn btn-info btn-raised btn-sm" name="registro"><i class="zmdi zmdi-floppy"></i> Guardar</button>
										    	<?php
  												}
												} catch(PDOException $e) {
												  echo 'Error: ' . $e->getMessage();
												}
												?>
										    </p>
									    </form>
									</div>
								</div>
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