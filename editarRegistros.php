<?php
session_start();
include('config/index.php');
    if(isset($_POST['registro'])):
        if(empty($_POST['username']) || empty($_POST['password'])):
            echo 'No dejes campos en blanco';
        elseif(strlen($_POST['username']) > 20):
            echo 'El usuario no puede tener mas de 20 caracteres';
        else:
                $hash_password= md5($_POST['password']);
                $pnombre=$_POST['pnombre'];
                $snombre=$_POST['snombre'];
                $papellido=$_POST['papellido'];
                $sapellido=$_POST['sapellido'];
                $correo=$_POST['correo'];
                $direccion=$_POST['direccion'];
                $telefono=$_POST['telefono'];
                $usuario=$_POST['username'];
                $clave=$hash_password;
                $genero=$_POST['genero'];
                $id=$_POST['id'];
                $register = $connection->prepare("UPDATE usuarios SET pnombre='".$pnombre."',snombre='".$snombre."',papellido='" .$papellido."',sapellido='".$sapellido."',correo='".$correo."',direccion='".$direccion."',telefono='".$telefono."',usuario='".$usuario."',clave='".$clave."',genero=".$genero." WHERE Id=".$id);
                $register->execute();
                if($register->rowCount() > 0):
				echo "Se ha actualizado los datos de forma correcta";
                    if($_POST['acceso'] == 1):
                    header('Location: registrarEstudiantes.php');
                    endif;
                    if($_POST['acceso'] == 2):
                    header('Location: registrarDocentes.php');
                    endif;
                    if($_POST['acceso'] == 3):
                    header('Location: registrarAdministrador.php');
                    endif;
                else:
                    echo 'Ha ocurrido un error';
                endif;
        endif;

    else:
        header('Location: home.php');
    endif;

?>