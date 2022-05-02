
 <?php
    require 'db.php';
    $_GET['error'] = 0;
    if (isset($_POST['in'])) {
        $nom = $_POST['nom'];
        $prenoms = $_POST['prenoms'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmer = $_POST['confirmer'];
        $con = $nom.".".$prenoms;
        $con=strtolower($con);

        // Verification email
        $stmt = $connect->prepare('SELECT * FROM inscription where email = ?');
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $a = count($stmt->fetchAll());
        echo $a;
        if ($a >= 1) {
            echo "<div class='alert alert-danger'>Le email saisi existe déjà!!!!</div>";
        } else if ($password  != $confirmer) {
            echo '<center><div class="alert alert-danger"><h3>mot de passe non identique</h3></div></center>';
        } else {

            $password = sha1($password);
            $date = $_POST['date'];
            $nom = $_POST['nom'];
            $prenoms = $_POST['prenoms'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $genre = $_POST['genre'];
            $profil = $_POST['profil'];
            $con = $nom.".".$prenoms;
            $con=strtolower($con);

            try {
                $stmt = $connect->prepare('INSERT into inscription values (null,?,?,?,?,?,?,?,?,?,?)');
                $stmt->bindParam(1, $nom);
                $stmt->bindParam(2, $prenoms);
                $stmt->bindParam(3, $password);
                $stmt->bindParam(4, $date);
                $stmt->bindParam(5, $adresse);
                $stmt->bindParam(6, $telephone);
                $stmt->bindParam(7, $email);
                $stmt->bindParam(8, $genre);
                $stmt->bindParam(9, $profil);
                $stmt->bindParam(10, $con);
                $stmt->execute();

                echo '<center><div class="alert alert-success"><h3>Inscription Reuissie</h3></div></center>';
                header('location:login.php');
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        }
    }


    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <title>inscription</title>
</head>

<body style="background-color: gray;">
    <div>
        <center>
            <h1 class="mt-5">INSCRIPTIONS</h1>
        </center>
    </div>
    <div class="container">
        <form class="kinging" method="POST">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prénoms</label>
                <input type="text" class="form-control" name="prenoms" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirmer</label>
                <input type="password" class="form-control" name="confirmer" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" name="date" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Téléphone</label>
                <input type="number" class="form-control" name="telephone" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Genre</label><br><br>
                <input type="radio" name="genre" value="Feminin" checked> Feminin
                <input type="radio" name="genre" value="Masculin"> Masculin
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Profil</label><br><br>
                <input type="radio" name="profil" value="Administration" checked> Administration
                <input type="radio" name="profil" value="Professeurs"> Professeurs
                <input type="radio" name="profil" value="Etudiants"> Etudiants
            </div>
            <button name="in" type="submit" class="btn btn-primary" >Enregistrer</button>
        </form>
    </div>
</body>

</html>