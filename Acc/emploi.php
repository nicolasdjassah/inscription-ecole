<?php
require 'connexion.php';
require 'verify.php';


if (isset($_POST['mod']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['adresse']) && isset($_POST['cours']) && isset($_POST['telephone'])) {

  $heurd = $_POST['heurdebut'];
  $heurf = $_POST['heurdefin'];
  $jour = $_POST['jour'];
  $id = $_GET['id'];
  $stmt = $connect->prepare('UPDATE emploi_du_temps set heurdebut=? , heurfin=? , jour=? where IDEMP=?');
  $stmt->bindParam(1, $heurd);
  $stmt->bindParam(2, $heurf);
  $stmt->bindParam(3, $jour);
  $stmt->bindParam(1, $id);
  $stmt->execute();
  header('location:emploi.php');
}
// partie d' enregistrement
else if (isset($_POST['heurdebut']) && isset($_POST['heurfin']) && isset($_POST['jour'])) {
  $heurd = $_POST['heurdebut'];
  $heurf = $_POST['heurfin'];
  $jour = $_POST['jour'];
  $name = $_POST['nom'];
  $prenom = $_POST['prenom'];
  if ($_POST['choice'] == 1) {
    $stmt = $connect->prepare('SELECT IDPRO FROM professeurs where NOMPRO=? and PRENOMPRO=?');
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $prenom);
    $stmt->execute();
    $row = $stmt->fetchAll();
    foreach ($row as $key) {
      $id = $key['IDPRO'];
    }
    $stmt = $connect->prepare('INSERT into emploi_du_temps values(null,?,null,?,?,?)');
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $heurd);
    $stmt->bindParam(3, $heurf);
    $stmt->bindParam(4, $jour);
    $stmt->execute();
    header('location:emploi.php');
  } else {
    $stmt = $connect->prepare('SELECT IDPER FROM personnels where NOMPER=? and PRENOMPRO=?');
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $prenom);
    $stmt->execute();
    $row = $stmt->fetchAll();
    foreach ($row as $key) {
      $id = $key['IDPER'];
    }
    print_r($id);

    $stmt = $connect->prepare('INSERT into emploi_du_temps values(null,null,?,?,?,?)');
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $heurd);
    $stmt->bindParam(3, $heurf);
    $stmt->bindParam(4, $jour);
    $stmt->execute();
    header('location:emploi.php');
  }

  // Pour executer une requete sql
  // $stmt = $connect->prepare('INSERT into emploi_du_temps values(null,?,?,?,?,?)');
  // $stmt->bindParam(1, $heurdebut);
  // $stmt->bindParam(2, $heurfin);
  // $stmt->bindParam(3, $jour);
  // $stmt->execute();

  // Pour les redirections vers les pages php
  // header('location:emploi.php');
} else if (isset($_GET['supp'])  && isset($_GET['id'])) {
  $id = $_GET['id'];
  $stmt = $connect->prepare('DELETE FROM emploi_du_temps where IDEMP=?');
  $stmt->bindParam(1, $id);
  $stmt->execute();
  header('location:emploi.php');
} else {
}

$row = $connect->prepare('SELECT * FROM emploi_du_temps');
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

<body style="background-color:PaleVioletRed;">
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

  <section id="content">

    <section>
      <section>
        <div class="container">
          <div style="background-color: white;">
            <br><br><br><br>
            <div>
              <h1 style="background-color: BurlyWood;">
                <center>EMPLOI DU TEMPS</center>
              </h1>
            </div>
            <?php if (isset($_GET['heurdebut']) && isset($_GET['heurfin']) && isset($_GET['jour'])) : ?>
              <form style="width:800px;" method="POST">
                <div class="form-group">
                  <label for="exampleInputNom1">nom</label>
                  <input type="text" name='nom' value="<?= $_GET['nom'] ?>" class="form-control" id="exampleInputNom1" placeholder="nom">
                </div>
                <div class="form-group">
                  <label for="exampleInputPrenom1">prenom</label>
                  <input type="text" name='prenom' value="<?= $_GET['prenom'] ?>" class="form-control" id="exampleInputPrenom1" placeholder="prenom">
                </div>
                <div class="form-group">
                  <label for="exampleInputHeuredebut1">heurdebut</label>
                  <input type="text" name='heurdebut' value="<?= $_GET['heurdebut'] ?>" class="form-control" id="exampleInputHeurdebut1" placeholder="heurdebut">
                </div>
                <div class="form-group">
                  <label for="exampleInputHeurefin1">heurfin</label>
                  <input type="text" name='heurfin' value="<?= $_GET['heurfin'] ?>" class="form-control" id="exampleInputHeurfin1" placeholder="heurfin">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">jour</label>
                  <input type="text" name='jour' value="<?= $_GET['jour'] ?>" class="form-control" id="exampleInputPassword1" placeholder="jour">
                </div>
          </div>
          <!-- INput type hidden cache pour envoyer mod qui permet de differencier entre l' enregistrement et modification -->


          <input type="radio" name="mod" value="12">Professeurs<br />
          <input type="radio" name="mod" value="12">Personnel<br />
          <input type="radio" name="mod" value="12">Professeur & Personnel<br />
          <input type="hidden" name="mod" value="12">
          <button type="submit" class="btn btn-info">Modifier</button>
          </form>
        <?php else : ?>
          <form style="width:800px; background-color:PaleTurquoise" method="POST">
            <div class="form-group">
              <label for="exampleInputNom1">nom</label>
              <input type="Text" name='nom' class="form-control" id="exampleInputNom1" placeholder="nom">
            </div>
            <div class="form-group">
              <label for="exampleInputPrenom1">prenom</label>
              <input type="Text" name='prenom' class="form-control" id="exampleInputEmail1" placeholder="prenom">
            </div>
            <div class="form-group">
              <label for="exampleInputHeurdebut1">heurdebut</label>
              <input type="Text" name='heurdebut' class="form-control" id="exampleInputHeurdebut1" placeholder="heurdebut">
            </div>
            <div class="form-group">
              <label for="exampleInputheurfin1">heurfin</label>
              <input type="Text" name='heurfin' class="form-control" id="exampleInputHeurfin1" placeholder="heurfin">
            </div>
            <div class="form-group">
              <label for="exampleInputjour1">jour</label>
              <input type="Text" name='jour' class="form-control" id="exampleInputJour1" placeholder="jour">
            </div>
            <input type="radio" name="choice" value="1" checked>Professeurs<br />
            <input type="radio" name="choice" value="2">Personnel<br />
            <!-- INput type hidden cache pour envoyer mod qui permet de differencier entre l' enregistrement et modification -->
            <button type="submit" class="btn btn-success">Enregistrer</button>
          </form>
        <?php endif ?>

        <br><br>

        <table class="table table-bordered">
          <thead>
            <tr style="background-color:SpringGreen;">
              <th scope="col">id</th>
              <th scope="col">heurdebut</th>
              <th scope="col">heurfin</th>
              <th scope="col">jour</th>
              <th scope="col" colspan="2">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tab as $value) : ?>
              <tr>
                <th scope="row"><?= $value['IDEMP'] ?></th>
                <td><?= $value["HEUREDEBUT"] ?></td>
                <td><?= $value['HEUREFIN'] ?></td>
                <td><?= $value['JOUR'] ?></td>

                <!-- Lien pour modifier avec tous les champs de l' occurence avec son id  -->
                <td><a href="emploi.php?id=<?= $value['IDEMP'] ?>&mod=12&heurdebut=<?= $value['HEUREDEBUT'] ?> " class="btn btn-info">Modifier</a></th>
                  <!-- Lien pour une propriete de l' occurence avec son id -->
                <td><a href="emploi.php?id=<?= $value['IDEMP'] ?>&supp=30" class="btn btn-danger">Supprimer</a></td>
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