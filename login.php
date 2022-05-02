<?php
session_start();
$error = "";
// unset($_SESSION['username']);
require 'connexion.php';
if (isset($_POST['password']) && isset($_POST['username'])) {
    $password = $_POST['password'];
    $username = $_POST['username'];
    $stmt = $connect->prepare('SELECT * from admin where username=? and password=?');
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->execute();
    $row = $stmt->fetchAll();
    if (count($row) == 1) {
        $_SESSION['username'] = $username;
        header('location:Acc/index.php');
    } else {
        $error = "USERNAME or PASSWORD INCORRECT";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="dist/css/bootstrap.css">

<body style="background-color:black;">
    <div class="mt200" ;>
        <form class="form-vertical" method="POST">
            <h1>Connexion</h1>
            <?php
            if ($error != "") {
                echo '<div class="alert alert-danger">Mot de passe ou Username incorrect</div>';
            }
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6" style="background-color:NavajoWhite">
                        <label for="Username" class="">Username:</label>
                        <input type="text" class="form-control" name="username" id="Username" placeholder="Username" require></input><br><br>
                        <label for="Password" class=""> Password:</label>
                        <input type="password" class="form-control" name='password' id="" placeholder="Password" require></input><br><br>
                        <button class="btn btn-primary" type="submit">Se connecter</button>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </div>

        </form>
    </div>

</body>

</html>