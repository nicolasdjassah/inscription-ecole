<?php
$dns = 'mysql:host=localhost;dbname=format_school';

$username = 'root';
$password = '';
    try {
        $connect = new PDO($dns ,$username,$password,[]);
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
   

?>
