<?php
    $connection = new PDO("mysql:host=localhost;dbname=sicoac","root","");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>