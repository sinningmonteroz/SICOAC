<!DOCTYPE html>
<html lang="es">
<head>
    <title>Buscar horarios</title>
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
              <h1 class="text-titles"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Registros <small>Calendarios</small></h1>
            </div>
            <p class="lead">Podemos verificar los horarios de los docentes!</p>
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
                                        <form action="" method="post">
                                            <fieldset>Buscar horario de docente</fieldset>
                                            <div class="form-group label-floating">
                                              <label class="control-label">Identificación</label>
                                              <input class="form-control" type="text" name="identificacion">
                                            </div>
                                            <p class="text-center">
                                                <button type="submit" class="btn btn-info btn-raised btn-sm" name="registro"><i class="zmdi zmdi-floppy"></i> Buscar</button>
                                            </p>
                                        </form>

<?php
include('config/index.php');
    
    if(isset($_POST['registro'])):
        
            $login = $connection->prepare("SELECT * FROM usuarios WHERE (usuario=:username or correo=:username) and nivel_acceso=2");
            $login->bindParam(':username',$_POST['identificacion']);
            $login->execute();
            if($login = $login->fetch(PDO::FETCH_ASSOC)):
                $id = $login['Id'];
                $cargo = $login['nivel_acceso'];
                $name = $login['pnombre'] . " " . $login['snombre'] . " " . $login['papellido'] . " " . $login['sapellido'];
                ?>
<table class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Lunes</th>
                                            <th class="text-center">Martes</th>
                                            <th class="text-center">Miercoles</th>
                                            <th class="text-center">Jueves</th>
                                            <th class="text-center">Viernes</th>
                                            <th class="text-center">Sabados</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                    <th class="text-center">
                <?php
            else:
                echo 'Docente no encontrado, por favor verifique los datos ';
            endif;
    endif;
?>
                                       
                                        
<?php
if(isset($id)):
                                    try {
                                        $stmt= $connection->prepare('SELECT hs.id_salones,hs.hora_entrada, hs.hora_salida, m.nombre FROM `materia` AS m INNER JOIN `horario_salones` AS hs ON (m.id=hs.materia)  WHERE m.docente = ' . $id . ' AND hs.dia_semana = "Lunes"');
                                        $stmt->execute();
                                    while($row = $stmt->fetch()) {

                                    $salon = $connection->prepare('SELECT * FROM salones where id='. $row['id_salones']);
                                    $salon->execute();
                                    while ($nsalon = $salon->fetch()) {
                                        $name= $nsalon['nombre'];
                                    }

                                    echo $row['nombre']. " - ". $name . "<br>" . $row['hora_entrada'] . "-" . $row['hora_salida'] . "<hr>"; 
                                
                                    }
                                    } catch(PDOException $e) {
                                        echo 'Error: ' . $e->getMessage();
                                    }
                                    ?>
                                    
                                    </th>
                                    <th class="text-center">
                                    <?php
                                    try {
                                        $stmt= $connection->prepare('SELECT hs.id_salones,hs.hora_entrada, hs.hora_salida, m.nombre FROM `materia` AS m INNER JOIN `horario_salones` AS hs ON (m.id=hs.materia)  WHERE m.docente = ' . $id . ' AND hs.dia_semana = "Martes"');
                                        $stmt->execute();
                                    while($row = $stmt->fetch()) {

                                    $salon = $connection->prepare('SELECT * FROM salones where id='. $row['id_salones']);
                                    $salon->execute();
                                    while ($nsalon = $salon->fetch()) {
                                        $name= $nsalon['nombre'];
                                    }

                                    echo $row['nombre']. " - ". $name . "<br>" . $row['hora_entrada'] . "-" . $row['hora_salida'] . "<hr>"; 
                                
                                    }
                                    } catch(PDOException $e) {
                                        echo 'Error: ' . $e->getMessage();
                                    }
                                    ?>
                                    
                                    </th>
                                    <th class="text-center">
                                    <?php
                                    try {
                                        $stmt= $connection->prepare('SELECT hs.id_salones,hs.hora_entrada, hs.hora_salida, m.nombre FROM `materia` AS m INNER JOIN `horario_salones` AS hs ON (m.id=hs.materia)  WHERE m.docente = ' . $id . ' AND hs.dia_semana = "Miercoles"');
                                        $stmt->execute();
                                    while($row = $stmt->fetch()) {

                                    $salon = $connection->prepare('SELECT * FROM salones where id='. $row['id_salones']);
                                    $salon->execute();
                                    while ($nsalon = $salon->fetch()) {
                                        $name= $nsalon['nombre'];
                                    }

                                    echo $row['nombre']. " - ". $name . "<br>" . $row['hora_entrada'] . "-" . $row['hora_salida'] . "<hr>"; 
                                
                                    }
                                    } catch(PDOException $e) {
                                        echo 'Error: ' . $e->getMessage();
                                    }
                                    ?>
                                    
                                    </th>
                                    <th class="text-center">
                                    <?php
                                    try {
                                        $stmt= $connection->prepare('SELECT hs.id_salones,hs.hora_entrada, hs.hora_salida, m.nombre FROM `materia` AS m INNER JOIN `horario_salones` AS hs ON (m.id=hs.materia)  WHERE m.docente = ' . $id . ' AND hs.dia_semana = "Jueves"');
                                        $stmt->execute();
                                    while($row = $stmt->fetch()) {

                                    $salon = $connection->prepare('SELECT * FROM salones where id='. $row['id_salones']);
                                    $salon->execute();
                                    while ($nsalon = $salon->fetch()) {
                                        $name= $nsalon['nombre'];
                                    }

                                    echo $row['nombre']. " - ". $name . "<br>" . $row['hora_entrada'] . "-" . $row['hora_salida'] . "<hr>"; 
                                
                                    }
                                    } catch(PDOException $e) {
                                        echo 'Error: ' . $e->getMessage();
                                    }
                                    ?>
                                    
                                    </th>
                                    <th class="text-center">
                                    <?php
                                    try {
                                        $stmt= $connection->prepare('SELECT hs.id_salones,hs.hora_entrada, hs.hora_salida, m.nombre FROM `materia` AS m INNER JOIN `horario_salones` AS hs ON (m.id=hs.materia)  WHERE m.docente = ' . $id . ' AND hs.dia_semana = "Viernes"');
                                        $stmt->execute();
                                    while($row = $stmt->fetch()) {

                                    $salon = $connection->prepare('SELECT * FROM salones where id='. $row['id_salones']);
                                    $salon->execute();
                                    while ($nsalon = $salon->fetch()) {
                                        $name= $nsalon['nombre'];
                                    }

                                    echo $row['nombre']. " - ". $name . "<br>" . $row['hora_entrada'] . "-" . $row['hora_salida'] . "<hr>"; 
                                
                                    }
                                    } catch(PDOException $e) {
                                        echo 'Error: ' . $e->getMessage();
                                    }
                                    ?>
                                    
                                    </th>
                                    <th class="text-center">
                                    <?php
                                    try {
                                        $stmt= $connection->prepare('SELECT hs.id_salones,hs.hora_entrada, hs.hora_salida, m.nombre FROM `materia` AS m INNER JOIN `horario_salones` AS hs ON (m.id=hs.materia)  WHERE m.docente = ' . $id . ' AND hs.dia_semana = "Sabado"');
                                        $stmt->execute();
                                    while($row = $stmt->fetch()) {

                                    $salon = $connection->prepare('SELECT * FROM salones where id='. $row['id_salones']);
                                    $salon->execute();
                                    while ($nsalon = $salon->fetch()) {
                                        $name= $nsalon['nombre'];
                                    }

                                    echo $row['nombre']. " - ". $name . "<br>" . $row['hora_entrada'] . "-" . $row['hora_salida'] . "<hr>"; 
                                
                                    }
                                    } catch(PDOException $e) {
                                        echo 'Error: ' . $e->getMessage();
                                    }
endif;
                                    ?>

                                    </th>
                                        </tr>
                                    </tbody>
                                </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="listEst">
                            <div class="table-responsive">
                            
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