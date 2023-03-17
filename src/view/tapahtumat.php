<?php $this->layout('template', ['title' => 'Tulevat tapahtumat']) ?>
<h1>Tulevat tapahtumat</h1>
<div class="etusivukuva">
<img src="images/etusivukuva.jpg" height="200" width="132">
</div>
<div class='tapahtumat'>
<?php

foreach ($tapahtumat as $tapahtuma) {

  $start = new DateTime($tapahtuma['tap_alkaa']);
  $end = new DateTime($tapahtuma['tap_loppuu']);

  echo "<div>";
    echo "<div class='nimi'>$tapahtuma[nimi]</div>";
    echo "<div class='aika'>" . $start->format('j.n.Y') . "-" . $end->format('j.n.Y') . "</div>";
    echo "<div><a href='tapahtuma?id=" . $tapahtuma['idtapahtuma'] . "'>TIEDOT</a></div>";
  echo "</div>";


}

?>
</div>
