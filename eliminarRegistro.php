<?php
session_start();
include('config/index.php');
    if(isset($_GET['id'])):
                $id=$_GET['id'];
                $register = $connection->prepare("UPDATE usuarios SET estado=2 WHERE Id=".$id);
                $register->execute();
                if($register->rowCount() > 0):
				echo "Se ha actualizado los datos de forma correcta";
                    if($_GET['a'] == 1):
                    header('Location: registrarEstudiantes.php');
                    endif;
                    if($_GET['a'] == 2):
                    header('Location: registrarDocentes.php');
                    endif;
                    if($_GET['a'] == 3):
                    header('Location: registrarAdministrador.php');
                    endif;
                else:
                    echo 'Ha ocurrido un error';
                endif;
    else:
        header('Location: home.php');
    endif;

?>