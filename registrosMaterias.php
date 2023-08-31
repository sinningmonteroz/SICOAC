<?php
session_start();
include('config/index.php');
    if(isset($_POST['registro'])):
        
                $register = $connection->prepare("INSERT INTO materia(docente,nombre,descripcion,creditos,grupo,salon,estado) VALUES (:docente,:nombre,:descripcion,:creditos,:grupo,:salon,1)");
				$register->bindParam(':docente',$_POST['docente']);
				$register->bindParam(':nombre',$_POST['nombre']);
				$register->bindParam(':descripcion',$_POST['descripcion']);
				$register->bindParam(':creditos',$_POST['creditos']);
				$register->bindParam(':grupo',$_POST['grupo']);
				$register->bindParam(':salon',$_POST['salon']);
                $register->execute();
                if($register->rowCount() > 0):
				echo "Se ha creado una materia";
                    header('Location: registrarMaterias.php');
                    
                else:
                    echo 'Ha ocurrido un error';
                endif;
    endif;
?>