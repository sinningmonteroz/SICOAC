<?php
session_start();
include('config/index.php');
    if(isset($_POST['registro'])):

try {
    $dni=$_POST['identificacion'];
  $stmt= $connection->prepare('SELECT * FROM usuarios WHERE usuario="'.$dni.'"');
  $stmt->execute();
  while($row = $stmt->fetch()) {
  $id=$row['Id']; 
                $buscar = $connection->prepare('SELECT * FROM miembros_materia WHERE id_materia='.$_POST['materia'].' and id_estudiante='.$id);
                $buscar->execute();
            if($buscar->rowCount()>0){
                echo "<h1>Ya existe ese usuario dentro de la misma materia.</h1>";
            }else{
                $register = $connection->prepare("INSERT INTO miembros_materia(id_materia,id_estudiante) VALUES (:materia,:estudiante)");
                $register->bindParam(':materia',$_POST['materia']);
                $register->bindParam(':estudiante',$id);
                $register->execute();
                if($register->rowCount() > 0):
                echo "Se ha creado una materia";
                    header('Location: registrarEstudianteM.php');
                    
                else:
                    echo 'Ha ocurrido un error';
                endif;
            }
    }
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
    endif;
?>