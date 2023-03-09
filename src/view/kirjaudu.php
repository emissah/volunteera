<?php $this->layout('template', ['title' => 'Kirjautuminen']) ?>

<h1>Kirjautuminen</h1>
<!-- Jos HTTPS-protokollan käytön haluaa vielä varmistaa, niin lomakkeen action-määritteen arvoksi voi laittaa kirjautumissivun tarkan osoitteen, kuten esimerkiksi:-->
<form action="https://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" method="POST">
  <div>
    <label>Sähköposti:</label>
    <input type="text" name="email">
  </div>
  <div>
    <label>Salasana:</label>
    <input type="password" name="salasana">
  </div>
  <div class="error"><?= getValue($error,'virhe'); ?></div>
  <div>
    <input type="submit" name="laheta" value="Kirjaudu">
  </div>
</form>

<div class="info">Jos sinulla ei ole vielä tunnuksia, niin voit luoda ne <a href="lisaa_tili">täällä</a>.</div>
