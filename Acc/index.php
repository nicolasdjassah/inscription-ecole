<?php
require 'connexion.php';
require 'verify.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>My Website</title>

</head>

<body>
  <!-- Header -->
  <section id="header" Style=" background-color:black;">
    <div class="header container">
      <div class="nav-bar-center">
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


  <!-- Hero Section  -->
  <br><br><br><br>
  <section id="hero" style="background-image: url('HON_7829.jpg')" ;>
    <div class="hero container">
      <div>
        <h1>Bienvenue A L'Institut Des Sciences Techniques ,<span></span></h1>
        <h1>Economiques & Administratives<span></span></h1>
        <h1>FORMATEC<span></span></h1>
         <h1>Master-Licence-BT-Modulaire<span></span></h1>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->



  <!-- Projects Section -->
  <section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title"><span>UN LABEL DE QUALITE DANS L'ENSEIGNEMENT</span></h1>
      </div>
      <div class="all-projects">
        <div class="project-item">
          <div class="project-info">
            <h1>Espace Vert</h1>
          </div>
          <div class="project-img">
            <img src="./img/imge.jpeg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Salle d'informatique</h1>
          </div>
          <div class="project-img">
            <img src="./img/pépé.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Infirmerie</h1>
          </div>
          <div class="project-img">
            <img src="./img/pédagogique.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>BLOC PEDAGOGIQUE</h1>
          </div>
          <div class="project-img">
            <img src="./img/pedap.png" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Salle de conférence</h1>
          </div>
          <div class="project-img">
            <img src="./img/pé.jpg" alt="img">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Projects Section -->

  <!-- About Section -->
  <section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="./img/HON_8023-1.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title"><span>ADMINISTRATION</span></h1>
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- Contact Section -->
  <section id="contact">
    <div class="contact container">
      <div>
        <h1 class="section-title">Contacts <span></span></h1>
      </div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Téléphone</h1>
            <h2>+22890038416</h2>
            <h2>+22890038451</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>formatec03@gmail.com</h2>
            <h2>formatec03@yahoo.fr</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2>LOME - TOGO , Quartier AGOE - CACAVELI</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->

  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <div class="brand">
        <h1><span></span><span>FORMATEC</span>-TOGO</h1>
      </div>
      <h2> La qualité dans l'enseignement</h2>
      <div class="social-icon">
        <div class="social-item">
          <a href="Nicolasdjassah.@gmail.com"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/twitter.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/behance.png" /></a>
        </div>
      </div>
      <p>Pour plus d'info sur le site Veillez contacter sur le +22893202691/+22897580552</p>
    </div>
  </section>
  <!-- End Footer -->
  <script src="./app.js"></script>
</body>

</html>