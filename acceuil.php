<?php
include 'db.php';
session_start();

if (isset($_SESSION['username'])  && isset($_SESSION['profil'])){  
} else {
    header('Location: login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css">
    <link rel="stylesheet" href="Style/bootstrap.css">
    <script src="Style/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Style/bootstrap.min.css">
    
    <title>acceuil</title>

</head>

<body style="background-color:dimgrey ">
    <div style="background-color:white;
            margin: 100px auto; text-align:center; padding:auto ; height:200px;
    width: 400px" >  
        <h1> Bienvenue <?= $_SESSION['username'] ?> </h1>
        <h1>Profil <?= $_SESSION['profil'] ?></h1>
        <button type="button" class="btn btn-primary">
            <a href='logout.php' style="text-decoration: none; color:white;">Déconnexion</a>
        </button>
    </div>
</body>

</html>