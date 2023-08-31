<?php 
	include('config/index.php');
?>
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
			  <h1 class="text-titles">Sistema <small>Almacenamiento</small></h1>
			</div>
		</div>
		<div class="full-box text-center" style="padding: 30px 10px;">
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Administradores
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-shield-security"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box">
					<?php
					try {
  						$stt= $connection->prepare("SELECT * FROM usuarios where nivel_acceso = 3");
  						$stt->execute();
  						echo $stt->rowCount();
					} catch(PDOException $e) {
  						echo 'Error: ' . $e->getMessage();
					}
					?>
					</p>
					<small>Registros</small>
				</div>
			</article>
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Estudiantes
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-graduation-cap"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box">
					<?php
					try {
  						$stm= $connection->prepare("SELECT * FROM usuarios where nivel_acceso = 1");
  						$stm->execute();
  						$num = $stm->rowCount();
  						echo $num;
					} catch(PDOException $e) {
  						echo 'Error: ' . $e->getMessage();
					}
					?>
					</p>
					<small>Registros</small>
				</div>
			</article>
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Docentes
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-account"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box">
					<?php
					try {
  						$stmt= $connection->prepare("SELECT * FROM usuarios where nivel_acceso = 2");
  						$stmt->execute();
  						echo $stmt->rowCount();
					} catch(PDOException $e) {
  						echo 'Error: ' . $e->getMessage();
					}
					?>
					</p>
					<small>Registros</small>
				</div>
			</article>
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Materias
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-case zmdi"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box">
					<?php
					try {
  						$stm= $connection->prepare("SELECT * FROM materia");
  						$stm->execute();
  						$num = $stm->rowCount();
  						echo $num;
					} catch(PDOException $e) {
  						echo 'Error: ' . $e->getMessage();
					}
					?>
					</p>
					<small>Registros</small>
				</div>
			</article>
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Salones
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-local-store"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box">
					<?php
					try {
  						$stm= $connection->prepare("SELECT * FROM salones");
  						$stm->execute();
  						$num = $stm->rowCount();
  						echo $num;
					} catch(PDOException $e) {
  						echo 'Error: ' . $e->getMessage();
					}
					?>
					</p>
					<small>Registros</small>
				</div>
			</article>
		</div>
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles">Sistema <small>Accesos</small></h1>
			</div>
			<section id="cd-timeline" class="cd-container">
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img">
                        <img src="./assets/img/Logo.jpg" alt="user-picture">
                    </div>
                    <div class="cd-timeline-content">
                        <h4 class="text-center text-titles">1 - Nombre (Administrador)</h4>
                        <p class="text-center">
                            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Ingreso: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                            <i class="zmdi zmdi-time zmdi-hc-fw"></i> Salida: <em>7:17 AM</em>
                        </p>
                        <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
                    </div>
                </div>
                </div>   
            </section>


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
			        	Este sistema busca solventar las necesidades de la institución, optimizando los procesos relacionados a la entrada y salida de los estudiantes. Esta aplicación web contará con un diseño agradable de fácil utilización y con una gama de herramientas que permitirá realizar las tareas rápidamente.
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