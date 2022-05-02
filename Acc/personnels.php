<?php
require 'connexion.php';
require 'verify.php';

if (isset($_POST['mod']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['telephone']) && isset($_POST['email'])) {
    $name = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $id = $_GET['id'];
    $liste = $_POST['liste'];
    $row = $connect->prepare('SELECT * FROM role where NOMROLE = ?');
    $row->bindParam(1, $liste);
    $row->execute();
    $ro = $row->fetch();
    foreach ($ro as $a) {
        $ros = $ro['IDROLE'];
    }
    $stmt = $connect->prepare('UPDATE personnels set NOMPER=? , PRENOMPRO=?, ADRESSEPER=?,TELEPHONEPER=?,EMAILPER=?,IDROLE=? where IDPER=?');
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $prenom);
    $stmt->bindParam(3, $adresse);
    $stmt->bindParam(4, $telephone);
    $stmt->bindParam(5, $email);
    $stmt->bindParam(6, $ros);
    $stmt->bindParam(7, $id);
    $stmt->execute();
    header('location:personnels.php');
} else if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['telephone']) && isset($_POST['email'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $liste = $_POST['liste'];
    $row = $connect->prepare('SELECT * FROM role where NOMROLE like ?');
    $row->bindParam(1, $liste);
    $row->execute();
    $ro = $row->fetch();
    foreach ($ro as $a) {
        $ros = $ro['IDROLE'];
    }

    // Pour executer une requete sql
    $stmt = $connect->prepare('INSERT into personnels values(null,?,?,?,?,?,?)');
    $stmt->bindParam(1, $ros);
    $stmt->bindParam(2, $nom);
    $stmt->bindParam(3, $prenom);
    $stmt->bindParam(4, $adresse);
    $stmt->bindParam(5, $telephone);
    $stmt->bindParam(6, $email);
    $stmt->execute();
}
//Suppression

else if (isset($_GET['id']) && isset($_GET['supp'])) {
    $det = $_GET['id'];
    $stmt = $connect->prepare('DELETE FROM personnels where IDPER= ?');
    $stmt->bindParam(1, $det);
    $stmt->execute();
    header('location:personnels.php');
}



$row = $connect->prepare('SELECT * FROM personnels');
$row->execute();
$tab = $row->fetchAll();


$row = $connect->prepare('SELECT * FROM role');
$row->execute();
$roles = $row->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../dist/css/bootstrap.css">

    <title>My Website</title>
</head>

<body style="background-color:NavajoWhite">
    <!-- Header -->
    <section id="header" Style=" background-color:black;">
        <div class="header container">
            <div class="nav-bar-center" style="background-color: black;">
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a href='index.php' data-after="Home">ACCUEIL</a></li>
                        <li><a href="professeur.php" data-after="Service">Professeurs</a></li>
                        <li><a href="personnels.php" data-after="Projects">Personnels</a></li>
                        <li><a href="role.php" data-after="About">Rôles</a></li>
                        <li><a href="emploi.php" data-after="Contact">Emploi Du Temps</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Header -->
    <br></br>
    <section id="content">

        <section>
            <section>
                <div class="container">
                    <div style="background-color: white;">
                        <br><br><br><br>
                        <div>
                            <h1 style="background-color:BurlyWood;">
                                <center>VEUILLEZ INSERER UN PERSONNEL</center>
                            </h1>
                        </div>


                        <?php if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['telephone']) && isset($_GET['adresse'])) : ?>
                            <form style="width:800px" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NOM</label>
                                    <input type="nom" name='nom' value="<?= $_GET['nom'] ?>" class="form-control" id="exampleInputEmail1" placeholder="NOM">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Prenoms</label>
                                    <input type="prenom" name='prenom' value="<?= $_GET['prenom'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Prenoms">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">adresse</label>
                                    <input type="adresse" name='adresse' value="<?= $_GET['adresse'] ?>" class="form-control" id="exampleInputPassword1" placeholder="adresse">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">telephone</label>
                                    <input type="telephone" name='telephone' value="<?= $_GET['telephone'] ?>" class="form-control" id="exampleInputPassword1" placeholder="telephone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">email</label>
                                    <input type="email" name='email' value="<?= $_GET['email'] ?>" class="form-control" id="exampleInputPassword1" placeholder="email">
                                </div>
                                <input type="hidden" name="mod" value="iaajj">
                                <div class="form-group">
                                    <label>role
                                        <select class="form-select" aria-label="Default select example" name="liste">
                                            <option>
                                                <?php
                                                $id = $_GET['role'];
                                                $query = $connect->prepare('SELECT NOMROLE FROM role WHERE IDROLE=?');
                                                $query->bindParam(1, $id);
                                                $query->execute();
                                                $row = $query->fetchAll();
                                                foreach ($row as $key) {
                                                    echo ($key['NOMROLE']);
                                                }
                                                $query = $connect->prepare('SELECT *  FROM role WHERE IDROLE != ?');
                                                $query->bindParam(1, $id);
                                                $query->execute();
                                                $roles = $query->fetchAll();

                                                ?>
                                            </option>
                                            <?php foreach ($roles as $role) : ?>
                                                <option> <?= $role['NOMROLE'] ?> </option>
                                            <?php endforeach ?>
                                        </select></label>
                                </div>
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </form>
                        <?php else : ?>
                            <div class="be-splash-screen">
                                <div class="be-wrapper be-login be-signup">
                                    <div class="be-content">
                                        <div class="main-container container-fluid">
                                            <div class="splash-container sign-up">
                                                <div class="panel panel-default panel-border-color panel-border-color-primary">
                                                    <form style="width:800px;" length="2000px" method="POST" class="table table-bordered">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">NOM</label>
                                                            <input type="nom" name='nom' class="form-control" id="exampleInputEmail1" placeholder="NOM">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Prenoms</label>
                                                            <input type="prenom" name='prenom' class="form-control" id="exampleInputPassword1" placeholder="Prenoms">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">adresse</label>
                                                            <input type="adresse" name='adresse' class="form-control" id="exampleInputPassword1" placeholder="adresse">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">telephone</label>
                                                            <input type="telephone" name='telephone' class="form-control" id="exampleInputPassword1" placeholder="telephone">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">email</label>
                                                            <input type="email" name='email' class="form-control" id="exampleInputPassword1" placeholder="email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>role <select name="liste">
                                                                    <?php foreach ($roles as $role) : ?>
                                                                        <option> <?= $role['NOMROLE'] ?> </option>
                                                                    <?php endforeach ?>
                                                                </select></label>
                                                        </div>
                                                        <button type="submit" class="btn btn-success">Enregistrer</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php endif ?>
                        <br><br>


                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:SpringGreen; text-align:center">
                                    <th scope="col">id</th>
                                    <th scope="col">nom</th>
                                    <th scope="col">prenom</th>
                                    <th scope="col">adresse</th>
                                    <th scope="col">telephone</th>
                                    <th scope="col">email</th>
                                    <th scope="col">salaire</th>
                                    <th scope="col" colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tab as $value) : ?>
                                    <?php
                                    $per = $value['IDROLE'];
                                    $query = $connect->prepare('SELECT SALAIREROLE FROM role where IDROLE=?');
                                    $query->bindParam(1, $per);
                                    $query->execute();
                                    $bobys = $query->fetchAll();
                                    foreach ($bobys as $boby) {
                                        $salaire = $boby[0];
                                    }
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $value['IDPER'] ?></th>
                                        <td><?= $value["NOMPER"] ?></td>
                                        <td><?= $value['PRENOMPRO'] ?></td>
                                        <td><?= $value['ADRESSEPER'] ?></td>
                                        <td><?= $value['TELEPHONEPER'] ?></td>
                                        <td><?= $value['EMAILPER'] ?></td>
                                        <td><?= $salaire ?></td>
                                        <th><a href="personnels.php?id=<?= $value['IDPER'] ?>&mod=1&nom=<?= $value['NOMPER'] ?>&prenom=<?= $value['PRENOMPRO'] ?>&adresse=<?= $value['ADRESSEPER'] ?>&telephone=<?= $value['TELEPHONEPER'] ?>&email=<?= $value['EMAILPER'] ?>&role=<?= $value['IDROLE'] ?>" class="btn btn-info">Modifier</a></th>
                                        <td><a href="personnels.php?id=<?= $value['IDPER'] ?>&supp=12" class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>


                </div>

            </section>
            <!-- Creation de la table professeurs -->

            <script>
                $('#sortTable').DataTable();
            </script>


            <script src="./app.js"></script>
</body>

</html>