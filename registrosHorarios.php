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
              <h1 class="text-titles"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Registro <small>Calendario</small></h1>
            </div>
            <p class="lead">Podemos administrar los horarios, así como también hacer las actualizaciones correspondientes de los mismos y su respectiva eliminación!</p>
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
                                        <form action="registroHorario.php" method="post">
                                            <fieldset>Datos de los registros</fieldset>
                                            <div class="form-group">
                                            <label class="control-label">Materia</label>
                                                <select class="form-control" name="materia">
<?php
include('config/index.php');
try {
  $stmt= $connection->prepare('SELECT * FROM materia');
  $stmt->execute();
  while($row = $stmt->fetch()) {
echo "<option value=".$row['id'].">". $row['nombre'] ."</option>"; 
  }
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label">Salón</label>
                                                <select class="form-control" name="salon">
<?php
try {
  $stmt= $connection->prepare('SELECT * FROM salones');
  $stmt->execute();
  while($row = $stmt->fetch()) {
echo "<option value=".$row['id'].">". $row['nombre'] ."</option>"; 
  }
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label">Dia de semana</label>
                                                <select class="form-control" name="dia">
                                                    <option value="Lunes">Lunes</option>"; 
                                                    <option value="Martes">Martes</option>"; 
                                                    <option value="Miercoles">Miercoles</option>"; 
                                                    <option value="Jueves">Jueves</option>"; 
                                                    <option value="Viernes">Viernes</option>"; 
                                                    <option value="Sabado">Sabado</option>"; 
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label">Hora entrada</label>
                                                <select class="form-control" name="hora">
                                                    <option value="6:15am">6:15am</option>"; 
                                                    <option value="7:00am">7:00am</option>";
                                                    <option value="7:45am">7:45am</option>"; 
                                                    <option value="8:30am">8:30am</option>"; 
                                                    <option value="9:15am">9:15am</option>"; 
                                                    <option value="10:00a">10:00am</option>"; 
                                                    <option value="10:45am">10:45am</option>"; 
                                                    <option value="11:30am">11:30am</option>";
                                                    <option value="12:15pm">12:15pm</option>";
                                                    <option value="1:00pm">1:00pm</option>";
                                                    <option value="1:45pm">1:45pm</option>";
                                                    <option value="2:30pm">2:30pm</option>"; 
                                                    <option value="3:15pm">3:15pm</option>"; 
                                                    <option value="4:00pm">4:00pm</option>"; 
                                                    <option value="4:45pm">4:45pm</option>"; 
                                                    <option value="5:30pm">5:30pm</option>";
                                                    <option value="6:15pm">6:15pm</option>";
                                                    <option value="7:00pm">7:00pm</option>";
                                                    <option value="7:45pm">7:45pm</option>";
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label">Hora Salida</label>
                                                <select class="form-control" name="hora2">
                                                    <option value="7:00am">7:00am</option>";
                                                    <option value="7:45am">7:45am</option>"; 
                                                    <option value="8:30am">8:30am</option>"; 
                                                    <option value="9:15am">9:15am</option>"; 
                                                    <option value="10:00a">10:00am</option>"; 
                                                    <option value="10:45am">10:45am</option>"; 
                                                    <option value="11:30am">11:30am</option>";
                                                    <option value="12:15pm">12:15pm</option>";
                                                    <option value="1:00pm">1:00pm</option>";
                                                    <option value="1:45pm">1:45pm</option>";
                                                    <option value="2:30pm">2:30pm</option>"; 
                                                    <option value="3:15pm">3:15pm</option>"; 
                                                    <option value="4:00pm">4:00pm</option>"; 
                                                    <option value="4:45pm">4:45pm</option>"; 
                                                    <option value="5:30pm">5:30pm</option>";
                                                    <option value="6:15pm">6:15pm</option>";
                                                    <option value="7:00pm">7:00pm</option>";
                                                    <option value="7:45pm">7:45pm</option>";
                                                    <option value="8:30pm">8:30pm</option>";
                                                </select>
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
                                            <th class="text-center">Salón</th>
                                            <th class="text-center">Materia</th>
                                            <th class="text-center">Dia</th>
                                            <th class="text-center">Hora entrada</th>
                                            <th class="text-center">Hora salida</th>
                                            <th class="text-center">Editar</th>
                                            <th class="text-center">Eliminar</th>
                                    </thead>

    <?php
include('config/index.php');
try {
  $stmt= $connection->prepare('SELECT * FROM horario_salones');
  $stmt->execute();
  while($row = $stmt->fetch()) {
?>
<tbody>
<tr>
<td>
    <?php 
    $id = $row['id_salones']; 
    try {
  $stm= $connection->prepare('SELECT * FROM salones where id = ' . $id);
  $stm->execute();
  while($ro = $stm->fetch()) {
echo  $ro['nombre'];
}
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
    ?>
</td>
<td>
    <?php 
    $id = $row['materia']; 
try {
  $st= $connection->prepare('SELECT * FROM materia where id = ' . $id);
  $st->execute();
  while($r = $st->fetch()) {
echo  $r['nombre'];
}
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
    ?>
        
    </td>
<td><?php echo $row['dia_semana']; ?></td>
<td><?php echo $row['hora_entrada']; ?></td>
<td><?php echo $row['hora_salida']; ?></td>
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