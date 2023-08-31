<?php
session_start();
include('config/index.php');
    if(isset($_POST['registro'])):
        
                $register = $connection->prepare("INSERT INTO asistencia(id_estudiante,id_materia,detalles) VALUES (:id_estudiante,:id_materia,:detalles)");
				$register->bindParam(':id_estudiante',$_SESSION['id']);
				$register->bindParam(':id_materia',$_POST['materia']);
                $register->bindParam(':detalles',$_POST['detalles']);
                $register->execute();
                if($register->rowCount() > 0):
				echo "Se ha creado una materia";
                    header('Location: registrarAsistencia.php');
                    
                else:
                    echo 'Ha ocurrido un error';
                endif;
    endif;
?>