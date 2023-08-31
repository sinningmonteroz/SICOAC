	<title>BIENVENIDO A SICOAC</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css-login/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css-login/css.css" rel="stylesheet">
<script src="css-login/bootstrap.min.js"></script>
<script src="css-login/jquery.min.js"></script>

<?php
session_start();
include('config/index.php');
	
if(isset($_SESSION['username'])):
    header('Location: home.php');
else:
    if(isset($_POST['login'])):
        if(empty($_POST['username']) || empty($_POST['password'])):
            echo 'No dejes campos en blanco';
        elseif(strlen($_POST['username']) > 20):
            echo 'El usuario no puede tener mas de 20 caracteres';
        elseif(strlen($_POST['password']) > 80):
            echo 'La contraseña no puede tener mas de 80 caracteres';
        else:
            $login = $connection->prepare("SELECT * FROM usuarios WHERE (usuario=:username or correo=:username) AND clave = :password");
			$hash_password= md5($_POST['password']);
            $login->bindParam(':username',$_POST['username']);
            $login->bindParam(':password',$hash_password);
            $login->execute();
            if($login = $login->fetch(PDO::FETCH_ASSOC)):
                $_SESSION['username'] = $_POST['username'];
				$_SESSION['id'] = $login['Id'];
				$_SESSION['cargo'] = $login['nivel_acceso'];
				$_SESSION['name'] = $login['pnombre'] . " " . $login['snombre'] . " " . $login['papellido'] . " " . $login['sapellido'];
                header('Location: home.php');
            else:
                echo 'Datos incorrectos ';
            endif;
        endif;
    endif;
    echo '';//mostrar si no logueo...
endif;
?>
	

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <h1>SICOAC</h1>
    </div>

    <!-- Login Form -->
    <form action="index.php" method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Identificación">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña">
      <input type="submit" class="fadeIn fourth" value="Iniciar sesión" name="login">
    </form>

  </div>
</div>

