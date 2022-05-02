<?php
$dns = 'mysql:host=localhost;dbname=examen';

$user = 'root';
$password = '';
    try {
        $connect = new PDO($dns ,$user,$password,[]);
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
      echo'';

?>
