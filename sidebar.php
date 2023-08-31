<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				SICOAC <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="./assets/img/Logo.jpg" alt="UserIcon">
					<figcaption class="text-center text-titles">
					<?php
					session_start();
					if(isset($_SESSION['cargo'])){
					if($_SESSION['cargo'] == 3):
					echo "Administrador";
					endif;
					if($_SESSION['cargo'] == 2):
					echo "Docente";
					endif;
					if($_SESSION['cargo'] == 1):
					echo "Estudiante";
					endif;
					}else{
					header('Location: index.php');
					}
					?>
				</figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="cerrarSesion.php" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="home.php">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Tablero
					</a>
				</li>
			<?php 
			if ($_SESSION['cargo'] == 3){
			?>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> Administración y Seguridad<i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="registrarAdministrador.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Registrar</a>
						</li>
						<li>
							<a href="#listAdmin" data-toggle="tab"><i class="zmdi zmdi-edit zmdi-hc-fw"></i> Editar</a>	
						</li>
						<li>
							<a href="#listAdmin" data-toggle="tab"><i class="zmdi zmdi-delete zmdi-hc-fw"></i> Eliminar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Estudiantes<i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="registrarEstudiantes.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Registrar</a>
						</li>
						<li>
							<a href="#listEst" data-toggle="tab"><i class="zmdi zmdi-edit zmdi-hc-fw"></i> Editar</a>	
						</li>
						<li>
							<a href="#listEst" data-toggle="tab"><i class="zmdi zmdi-delete zmdi-hc-fw"></i> Eliminar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account zmdi-hc-fw"></i> Docentes <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="registrarDocentes.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Registrar</a>
						</li>
						<li>
							<a href="#listDoc" data-toggle="tab"><i class="zmdi zmdi-edit zmdi-hc-fw"></i> Editar</a>	
						</li>
						<li>
							<a href="#listDoc" data-toggle="tab"><i class="zmdi zmdi-delete zmdi-hc-fw"></i> Eliminar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> Materias <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="registrarMaterias.php"><i class="zmdi zmdi-collection-add zmdi-hc-fw"></i> Registrar Materias</a>
						</li>
						<li>
							<a href="registrarEstudianteM.php"><i class="zmdi zmdi-collection-add zmdi-hc-fw"></i> Registrar Estudiante/Materias</a>
						</li>
						<li>
							<a href="#listEst"><i class="zmdi zmdi-collection-text zmdi-hc-fw"></i> Editar</a>
						</li>
						<li>
							<a href="#listEst"><i class="zmdi zmdi-delete zmdi-hc-fw"></i> Eliminar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-local-store zmdi-hc-fw"></i> Salones <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="registrosSalones.php"><i class="zmdi zmdi-collection-add zmdi-hc-fw"></i> Registrar</a>
						</li>
						<li>
							<a href=""><i class="zmdi zmdi-edit zmdi-hc-fw"></i> Editar</a>
						</li>
						<li>
							<a href=""><i class="zmdi zmdi-delete zmdi-hc-fw"></i> Eliminar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-calendar zmdi-hc-fw"></i> Calendarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="registrosHorarios.php"><i class="zmdi zmdi-calendar-check zmdi-hc-fw"></i> Registrar</a>
						</li>
						<li>
							<a href="buscarHorarios.php"><i class="zmdi zmdi-calendar-check zmdi-hc-fw"></i> Horarios</a>
						</li>
						<li>
							<a href=""><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> Editar</a>
						</li>
						<li>
							<a href=""><i class="zmdi zmdi-calendar-remove zmdi-hc-fw"></i> Eliminar</a>
						</li>
					</ul>
				</li>
			</ul>
			<?php
			}else{
				if($_SESSION['cargo'] == 2){
			?>
			<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Datos<i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="horarioDocente.php"><i class="zmdi zmdi-collection-text zmdi-hc-fw"></i> Horario</a>
						</li>
						<li>
							<a href="registrarAsistencia.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Registrar Asistencia</a>
						</li>
					</ul>
			</li>
			<?php
				}else{
			?>
			<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Horario<i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="horarioEstudiante.php"><i class="zmdi zmdi-collection-text zmdi-hc-fw"></i> Horario</a>
						</li>
						<li>
							<a href="registrarAsistencia.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Registrar Asistencia</a>
						</li>
						<li>
					</ul>
			</li>
			<?php
			}
		}
			?>
		</div>
	</section>