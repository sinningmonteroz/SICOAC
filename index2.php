<!DOCTYPE html>
<html>
<head>
	<title>BIENVENIDO A SICOAC</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/w3.css">
</head>
<body>
<header>
	<div class="w3-container w3-White w3-center">
		<h1>BIENVENIDO A SICOAC</h1>
	</div>
</header>

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
	
	<div class="w3-container w3-green">
		<h2>Login</h2>
	</div>

	<form class="w3-container" action="index.php" method="post">
		<p>
			<label class="w3-label">
				Usuario
			</label>
			<input class="w3-input w3-border " type="text" name="username">
		</p>
		<p>
			<label class="w3-label">Contraseña</label>
			<input class="w3-input w3-border" type="password" name="password">
		</p>
		<p>
			<button class="w3-btn w3-green w3-center" name="login">Ingresar</button>
		</p>
	</form>
	
<footer>
	<div class="w3-container w3-green">
		<h4>SICOAC</h4>
	</div>
</footer>
</body>
</html>