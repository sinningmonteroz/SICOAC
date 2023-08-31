<?php
session_start();
include('config/index.php');
    if(isset($_POST['registro'])):
        
                $register = $connection->prepare("INSERT INTO salones(nombre,descripcion) VALUES (:nombre,:descripcion)");
				$register->bindParam(':nombre',$_POST['nombre']);
				$register->bindParam(':descripcion',$_POST['descripcion']);
                $register->execute();
                if($register->rowCount() > 0):
				echo "Se ha creado una materia";
                    header('Location: registrosSalones.php');
                    
                else:
                    echo 'Ha ocurrido un error';
                endif;
    endif;
?>