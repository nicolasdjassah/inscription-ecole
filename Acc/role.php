<?php
require 'connexion.php';
require 'verify.php';

// Modificationw
if (isset($_POST['mod']) && isset($_POST['nom']) && isset($_POST['salaire'])) {
  $name = $_POST['nom'];
  $salaire = $_POST['salaire'];
  $id = $_GET['id'];
  $stmt = $connect->prepare('UPDATE role set NOMROLE=? , SALAIREROLE=? where IDROLE=?');
  $stmt->bindParam(1, $name);
  $stmt->bindParam(2, $salaire);
  $stmt->bindParam(3, $id);
  $stmt->execute();
  header('location:role.php');
}
// LE create ou ajout
else if (isset($_POST['nom']) && isset($_POST['salaire'])) {
  $nom = $_POST['nom'];
  $salaire = $_POST['salaire'];

  // Pour executer une requete sql
  $stmt = $connect->prepare('INSERT into role values(null,?,?)');
  $stmt->bindParam(1, $nom);
  $stmt->bindParam(2, $salaire);
  $stmt->execute();
}
//suppression
else if (isset($_GET['id'])  && isset($_GET['supp'])) {
  $sup = $_GET['id'];
  $stmt = $connect->prepare('DELETE FROM role  where IDROlE =?');
  $stmt->bindParam(1, $sup);
  $stmt->execute();
  header('location:role.php');
} else {

}

$row = $connect->prepare('SELECT * FROM  role');
$row->execute();
$tab = $row->fetchAll();

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

<body style="Background-color:PaleGreen;">
  <!-- Header -->
  <section id="header"  Style=" background-color:black";>
    <div class="header container">
      <div class="nav-bar-center" style="background-color: black;">
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href='index.php' data-after="Home">Acceuil</a></li>
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
  <br><br>
  <section id="content">

    <section>
      <section>
        <div class="container">
          <div style="background-color: white;">
            <?php if (isset($_GET['mod']) && isset($_GET['id'])) : ?>
              <form style="width:800px;" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1">NOM</label>
                  <input type="nom" name='nom' value="<?= $_GET['nom'] ?>" class="form-control" id="exampleInputEmail1" placeholder="NOM">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Rôle</label>
                  <input type="prenom" name='salaire' value="<?= $_GET['salaire'] ?>" class="form-control" id="exampleInputPassword1" placeholder="SALAIRE">
                </div>
                <br><br>
                <input type="hidden" name="mod" value="1">
                <button type="submit" class="btn btn-success">MODIFIER</button>
              </form>
              <br><br>
            <?php else : ?>
              <br><br><br><br>
              <div>
                <h1 style="background-color: BurlyWood;">
                  <center>VEUILLEZ ATTRIBUER UN ROLE ET SALAIRE </center>
                </h1>
              </div>
              <form style="width:800px;background-color:Linen" method="POST" class="table table-bordered">
                <div class="form-group">
                  <label for="exampleInputEmail1">ROLE</label>
                  <input type="nom" name='nom' class="form-control" id="exampleInputEmail1" placeholder="ROLE">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">SALAIRE</label>
                  <input type="prenom" name='salaire' class="form-control" id="exampleInputPassword1" placeholder="SALAIRE">
                </div>
                <br><br>
                <button type="submit" class="btn btn-success">Enregistrer</button>
              </form>
            <?php endif ?>
            <br><br>

            <table class="table table-bordered">
              <thead>
                <tr style="background-color: SpringGreen; text-align:center">
                  <th scope="col">id</th>
                  <th scope="col">Role</th>
                  <th scope="col">Salaire</th>
                  <th scope="col" colspan="2">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tab as $value) : ?>
                  <tr>
                    <th scope="row"><?= $value['IDROLE'] ?></th>
                    <td><?= $value["NOMROLE"] ?></td>
                    <td><?= $value['SALAIREROLE'] ?></td>
                    <th><a href="role.php?id=<?= $value['IDROLE'] ?>&mod=1&nom=<?= $value['NOMROLE'] ?>&salaire=<?= $value['SALAIREROLE'] ?>" class="btn btn-info">Modifier</a></th>
                    <td><a href="role.php?id=<?= $value['IDROLE'] ?>&supp=12" class="btn btn-danger">Supprimer</a></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>

      </section>
      <!-- Creation de la table role-->

      <script>
        $('#sortTable').DataTable();
      </script>


      <script src="./app.js"></script>
</body>

</html>