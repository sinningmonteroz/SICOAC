<?php
session_start();
include('config/index.php');
    if(isset($_POST['registro'])):
        
                $register = $connection->prepare("INSERT INTO horario_salones(id_salones,materia,dia_semana,hora_entrada,hora_salida) VALUES (:salon,:nombre,:dia,:hora,:horas)");
				$register->bindParam(':salon',$_POST['salon']);
				$register->bindParam(':nombre',$_POST['materia']);
				$register->bindParam(':dia',$_POST['dia']);
				$register->bindParam(':hora',$_POST['hora']);
				$register->bindParam(':horas',$_POST['hora2']);
                $register->execute();
                if($register->rowCount() > 0):
				echo "Se ha registrado un horario";
                    header('Location: registrosHorarios.php');
                    
                else:
                    echo 'Ha ocurrido un error';
                endif;
    endif;
?>