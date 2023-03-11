<!DOCTYPE html>
<html lang="fi">
  <head>
  <link href="styles/styles.css" rel="stylesheet">
    <title>Volunteera - <?=$this->e($title)?></title>
    <meta charset="UTF-8">    
  </head>
  <body>
  <header>
      <h1><a href="<?=BASEURL?>">Volunteera.</a></h1>
      <div class="profile">
        <?php
          if (isset($_SESSION['user'])) {
            echo "<div>$_SESSION[user]</div>";
            echo "<div><a href='logout'>Kirjaudu ulos</a></div>";
          } else {
            echo "<div><a href='kirjaudu'>Kirjaudu sisään</a></div>";
            echo "<div><a href='lisaa_tili'>Rekisteröidy</a></div>";
          }
        ?>
      </div>
    </header>

   <nav>
   <a href="tapahtumat">Tapahtumat</a>
   <a href="tietoa">Tietoa sivusta</a>
   <a href="yhteystiedot">Yhteystiedot</a>
   <a href="palaute">Palautelomake</a>
  </nav>

    <section>
      <?=$this->section('content')?>
    </section>
    <footer>
      <hr>
        <div class="icons">
      <a href="https://www.facebook.com"><img  src="images/logo-facebook.svg" height="75" width="75"></a>
      <a href="https://www.instagram.com"><img src="images/logo-instagram.svg" height="75" width="75"></a>
      <a href="https://www.twitter.com"><img src="images/logo-twitter.svg" height="75" width="75"></a>
        </div>
    <p class="seuraa">Seuraa meitä sosiaalisessa mediassa!</p>
    <div class="footer-text">Volunteera by Emikki</div>
    </footer>
  </body>
</html>
