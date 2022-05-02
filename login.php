<?php
session_start();
include 'db.php';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = sha1($password);
    $username=strtolower($username);

    $stmt = $connect->prepare('SELECT * FROM inscription where username = ? and password = ? ');
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->execute();
    $value = $stmt->fetchAll();
    $a = count($value);
    foreach ($value as $as) {
        $profil = $as['profil'];
    }

    if ($a >= 1) {
        $_SESSION['username'] = $username;
        $_SESSION['profil'] = $profil;
        header('location:acceuil.php');
       
    } else {
        echo "Nothing to see";
    }
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <title>login</title>
</head>

<body style=" background-color:darkslategrey;">
    <div class="go">
        <div class="container" style="margin:250px auto;">

            <h1>CONNEXION</h1>

            <form class="form" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="col-form-label">username:</label><br>
                    <input type="text" class="form-control" name="username" placeholder="nom.prenom" required>
                </div><br>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="col-form-label">Password:</label><br>
                    <input type="password" class="form-control" name="password" autocomplete="off" placeholder="password" required>
                </div><br>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
            <button><a href="inscription.php" name="in" class="btn btn-primary"> Inscription</a></button>
        </div>
    </div>

</body>

</html>
