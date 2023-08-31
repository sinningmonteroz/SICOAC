<?php
session_start();
include('config/index.php');
    if(isset($_GET['id'])):
		$stmt = $connection->prepare('DELETE FROM miembros_materia WHERE id = ?');
		$OK = $stmt->execute(array($_GET['id']));	
		$error = $stmt->errorInfo();

		if (!$OK) {
			echo $error[2];
		}else{
			header('Location: registrarEstudianteM.php');
		}
    endif;
?>