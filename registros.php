<?php
session_start();
include('config/index.php');
    if(isset($_POST['registro'])):
        if(empty($_POST['username']) || empty($_POST['password'])):
            echo 'No dejes campos en blanco';
        elseif(strlen($_POST['username']) > 20):
            echo 'El usuario no puede tener mas de 20 caracteres';
        else:
            $user = $connection->prepare("SELECT usuario FROM usuarios WHERE usuario = :username");
            $user->bindParam(':username',$_POST['username']);
            $user->execute();
            if($user->fetch(PDO::FETCH_ASSOC)):
                echo 'El usuario ya existe';
            elseif(strlen($_POST['password']) > 20):
                echo 'La contraseña no puede tener mas de 20 caracteres';
            elseif($_POST['password'] <> $_POST['password2']):
                echo 'Las contraseñas no coinciden';
            else:
                $register = $connection->prepare("INSERT INTO usuarios(pnombre,snombre,papellido,sapellido,correo,direccion,telefono,usuario,clave,nivel_acceso,genero) VALUES (:pnombre,:snombre,:papellido,:sapellido,:correo,:direccion,:telefono,:usuario,:clave,:acceso,:genero)");
				$hash_password= md5($_POST['password']);
				$register->bindParam(':pnombre',$_POST['pnombre']);
				$register->bindParam(':snombre',$_POST['snombre']);
				$register->bindParam(':papellido',$_POST['papellido']);
				$register->bindParam(':sapellido',$_POST['sapellido']);
				$register->bindParam(':correo',$_POST['correo']);
				$register->bindParam(':direccion',$_POST['direccion']);
				$register->bindParam(':telefono',$_POST['telefono']);
                $register->bindParam(':usuario',$_POST['username']);
                $register->bindParam(':clave',$hash_password);
                $register->bindParam(':acceso',$_POST['acceso']);
                $register->bindParam(':genero',$_POST['genero']);
                $register->execute();
                if($register->rowCount() > 0):
				echo "Se ha creado una cuenta, por favor inicie sesion
				 <script>
					alert('Se ha creado una cuenta, por favor inicie sesion');
				</script>
					";
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
        endif;
    endif;

?>