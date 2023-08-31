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
			  <h1 class="text-titles"><i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> Registro <small>Administrador</small></h1>
			</div>
			<p class="lead">Podemos administrar los datos de los administradores, así como también hacer las actualizaciones correspondientes de los mismos y su respectiva eliminación!</p>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#new" data-toggle="tab">Nuevo</a></li>
					  	<li><a href="#listAdmin" data-toggle="tab">Lista</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
									    <form action="registros.php" method="post">
									    	<fieldset>Datos del Administrador</fieldset>
											<input type="hidden" name="acceso" value="3">
									    	<div class="form-group label-floating">
											  <label class="control-label">Cédula</label>
											  <input class="form-control" type="text" name="username">
											</div>
									    	<div class="form-group label-floating">
											  <label class="control-label">Primer nombre</label>
											  <input class="form-control" type="text" name="pnombre">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Segundo nombre</label>
											  <input class="form-control" type="text" name="snombre">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Primer apellido</label>
											  <input class="form-control" type="text" name="papellido">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Segundo apellido</label>
											  <input class="form-control" type="text" name="sapellido">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Dirección</label>
											  <input class="form-control" name="direccion">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">E-mail</label>
											  <input class="form-control" type="text" name="correo">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Teléfono</label>
											  <input class="form-control" type="text" name="telefono">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Contraseña</label>
											  <input class="form-control" type="password" name="password">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Confirmar contraseña</label>
											  <input class="form-control" type="password" name="password2">
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
										    	<button type="submit" class="btn btn-info btn-raised btn-sm" name="registro"><i class="zmdi zmdi-floppy"></i> Registar</button>
										    </p>
									    </form>
									</div>
								</div>
							</div>
						</div>
					  	<div class="tab-pane fade" id="listAdmin">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">Cedula</th>
											<th class="text-center">Nombres</th>
											<th class="text-center">Apellidos</th>
											<th class="text-center">Dirección</th>
											<th class="text-center">E-mail</th>
											<th class="text-center">Teléfono</th>
											<th class="text-center">Género</th>
											<th class="text-center">Estado</th>											
											<th class="text-center">Editar</th>
											<th class="text-center">Eliminar</th>
										</tr>
									</thead>
									
<?php
include('config/index.php');
try {
  $stmt= $connection->prepare('SELECT * FROM usuarios where nivel_acceso = 3');
  $stmt->execute();
  while($row = $stmt->fetch()) {
?>
<tbody>
<tr>
<td><?php echo $row['usuario']; ?></td>
<td><?php echo $row['pnombre'] . " " . $row['snombre']; ?></td>
<td><?php echo $row['papellido'] . " " . $row['sapellido']; ?></td>
<td><?php echo $row['direccion']; ?></td>
<td><?php echo $row['correo']; ?></td>
<td><?php echo $row['telefono']; ?> </td>
<td>
	<?php 
	if($row['genero'] == 1 ):
		echo "Masculino";
	endif;
	if($row['genero'] == 2 ):
		echo "Femenino";
	endif;
	if($row['genero'] == 3 ):
		echo "Otro";
	endif;
	?>
</td>
<td><?php
if($row['estado'] == 1){
	echo "Activo";
}
if($row['estado'] == 2){
	echo "Inactivo";
}
?></td>
<td><a href="editarDatos.php?id=<?php echo $row['Id']; ?>" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
<td><a href="eliminarRegistro.php?id=<?php echo $row['Id']; ?>&a=3" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
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