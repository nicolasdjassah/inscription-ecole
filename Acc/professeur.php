<?php
require 'connexion.php';
require 'verify.php';


if (isset($_POST['mod'])  && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['adresse']) && isset($_POST['cours']) && isset($_POST['telephone'])) {


  $name = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $adresse = $_POST['adresse'];
  $cours = $_POST['cours'];
  $telephone = $_POST['telephone'];
  $id = $_GET['id'];
  $stmt = $connect->prepare('UPDATE professeurs set NOMPRO=? , PRENOMPRO=? , EMAILPRO=?,ADRESSEPRO=?,COURS=?,TELEPHONEPRO=? where IDPRO=?');
  $stmt->bindParam(1, $name);
  $stmt->bindParam(2, $prenom);
  $stmt->bindParam(3, $email);
  $stmt->bindParam(4, $adresse);
  $stmt->bindParam(5, $cours);
  $stmt->bindParam(6, $telephone);
  $stmt->bindParam(7, $id);
  $stmt->execute();
  header('location:professeur.php');
}
// partie d' enregistrement
else if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['adresse']) && isset($_POST['cours']) && isset($_POST['telephone'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $adresse = $_POST['adresse'];
  $cours = $_POST['cours'];
  $telephone = $_POST['telephone'];

  // Pour executer une requete sql
  $stmt = $connect->prepare('INSERT into professeurs values(null,?,?,?,?,?,?)');
  $stmt->bindParam(1, $nom);
  $stmt->bindParam(2, $prenom);
  $stmt->bindParam(3, $adresse);
  $stmt->bindParam(4, $telephone);
  $stmt->bindParam(5, $email);
  $stmt->bindParam(6, $cours);
  $stmt->execute();

  // Pour les redirections vers les pages php
  header('location:professeur.php');
} else if (isset($_GET['supp'])  && isset($_GET['id'])) {
  $id = $_GET['id'];
  $stmt = $connect->prepare('DELETE FROM emploi_du_temps  where IDPRO=?');
  $stmt->bindParam(1, $id);
  $stmt->execute();

  $stmt = $connect->prepare('DELETE FROM professeurs where IDPRO =?');
  $stmt->bindParam(1, $id);
  $stmt->execute();
  header('location:professeur.php');
} else {
}

$row = $connect->prepare('SELECT * FROM professeurs');
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

<body style="background-color:LightBlue;">
  <!-- Header -->
  <section id="header" Style=" background-color:black;">
    <div class=" header container">
      <div class="nav-bar-center" style="background-color: black;">
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
  <br><br><br><br>

  <div class="container">
    <div style="background-color: white;">
      <br><br><br><br>
      <div>
        <h1 style="background-color:BurlyWood;">
          <center>VEUILLEZ INSERER UN PROFESSEUR</center>
        </h1>
      </div>
      <?php if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['email']) && isset($_GET['telephone']) && isset($_GET['adresse'])) : ?>
        <form style="width:800px;" method="POST" class="table table-bordered;">
          <div class="form-group">
            <label for="exampleInputNom1">NOM</label>
            <input type="text" name='nom' value="<?= $_GET['nom'] ?>" class="form-control" id="exampleInputEmail1" placeholder="NOM">
          </div>
          <div class="form-group">
            <label for="exampleInputPrenom1" class="from-label">Prenoms</label>
            <input type="Text" name='prenom' value="<?= $_GET['prenom'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Prenoms">
          </div>
          <div class="form-group">
            <label for="exampleInputAdesse1">adresse</label>
            <input type="Text" name='adresse' value="<?= $_GET['adresse'] ?>" class="form-control" id="exampleInputPassword1" placeholder="adresse">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">email</label>
            <input type="email" name='email' value="<?= $_GET['email'] ?>" class="form-control" id="exampleInputPassword1" placeholder="email">
          </div>
          <div class="form-group">
            <label for="exampleInputTelephone1">telephone</label>
            <input type="number" name='telephone' value="<?= $_GET['telephone'] ?>" class="form-control" id="exampleInputPassword1" placeholder="telephone">
          </div>
          <div class="form-group">
            <label for="exampleInputCours1">cours</label>
            <input type="Text" name='cours' value="<?= $_GET['cours'] ?>" class="form-control" id="exampleInputPassword1" placeholder="cours">
          </div>
          <!-- INput type hidden cache pour envoyer mod qui permet de differencier entre l' enregistrement et modification -->
          <input type="hidden" name="mod" value="12">
          <button type="submit" class="btn btn-info">Modifier</button>
        </form>
      <?php else : ?>
        <!-- Enregistement -->
        <form style="width:800px; background-color:Silver" method="POST">
          <div class="form-group">
            <label for="exampleInputNom1">NOM</label>
            <input type="Text" name='nom' class="form-control" id="exampleInputNom1" placeholder="NOM">
          </div>
          <div class="form-group">
            <label for="exampleInputPrenom1">Prenoms</label>
            <input type="Text" name='prenom' class="form-control" id="exampleInputPprenom1" placeholder="Prenoms">
          </div>
          <div class="form-group">
            <label for="exampleInputAdresse1">adresse</label>
            <input type="Text" name='adresse' class="form-control" id="exampleInputAdresse1" placeholder="adresse">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">email</label>
            <input type="email" name='email' class="form-control" id="exampleInputEmail1" placeholder="email">
          </div>
          <div class="form-group">
            <label for="exampleInputTelephone1">telephone</label>
            <input type="telephone" name='telephone' class="form-control" id="exampleInputTelephone1" placeholder="telephone">
          </div>
          <div class="form-group">
            <label for="exampleInputCours1">cours</label>
            <input type="cours" name='cours' class="form-control" id="exampleInputCours1" placeholder="cours">
          </div>
          <button type="submit" class="btn btn-success">Enregistrer</button>
        </form>
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
            <th scope="col">cours</th>
            <th scope="col" colspan="2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tab as $value) : ?>
            <tr>
              <th scope="row"><?= $value['IDPRO'] ?></th>
              <td><?= $value["NOMPRO"] ?></td>
              <td><?= $value['PRENOMPRO'] ?></td>
              <td><?= $value['ADRESSEPRO'] ?></td>
              <td><?= $value['TELEPHONEPRO'] ?></td>
              <td><?= $value['EMAILPRO'] ?></td>
              <td><?= $value['COURS'] ?></td>
              <!-- Lien pour modifier avec tous les champs de l' occurence avec son id  -->
              <th><a href="professeur.php?id=<?= $value['IDPRO'] ?>&mod=12&nom=<?= $value['NOMPRO'] ?>&prenom=<?= $value['PRENOMPRO'] ?>&adresse=<?= $value['ADRESSEPRO'] ?>&telephone=<?= $value['TELEPHONEPRO'] ?>&email=<?= $value['EMAILPRO'] ?>&cours=<?= $value['COURS'] ?>" class="btn btn-info">Modifier</a></th>
              <!-- Lien pour une propriete de l' occurence avec son id -->
              <td><a href="professeur.php?id=<?= $value['IDPRO'] ?>&supp=30" class="btn btn-danger">Supprimer</a></td>
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