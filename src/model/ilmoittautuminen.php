<?php

  require_once HELPERS_DIR . 'DB.php';

  function haeIlmoittautuminen($idhenkilo,$idtapahtuma) {
    return DB::run('SELECT * FROM ilmoittautuminen1 WHERE idhenkilo = ? AND idtapahtuma = ?',
                   [$idhenkilo, $idtapahtuma])->fetchAll();
  }
// haeIlmoittautuminen-funktio hakee käyttäjän ilmoittautumisen yksittäiseen tapahtumaan, tapahtuman tiedot palautetaan funktion palautusarvona.
  function lisaaIlmoittautuminen($idhenkilo,$idtapahtuma) {
    DB::run('INSERT INTO ilmoittautuminen1 (idhenkilo, idtapahtuma) VALUE (?,?)',
            [$idhenkilo, $idtapahtuma]);
    return DB::lastInsertId();
  }
// lisaaIlmoittautuminen-funktio ilmoittaa käyttäjän tapahtumaan lisäämällä ilmoittautuminen-tauluun yhteyden käyttäjän ja tapahtuman välille. Tietokantamalli sallii periaatteessa käyttäjän ilmoittautuvan useamman kerran samaan tapahtumaan, mutta ilmoittautuminen käsitellään ainoastaan yksittäisenä riippumatta rivien määrästä. Funktio lisätyn rivin idilmoittautuminen-kentän arvon, joka on generoitu lisäyksen yhteydessä.
  function poistaIlmoittautuminen($idhenkilo, $idtapahtuma) {
    return DB::run('DELETE FROM ilmoittautuminen1  WHERE idhenkilo = ? AND idtapahtuma = ?',
                   [$idhenkilo, $idtapahtuma])->rowCount();
  }
//poistaIlmoittautuminen-funktio poistaa käyttäjän ilmoittautumisen tapahtumasta. Jos käyttäjällä on useampi ilmoittautumisrivi tapahtumaan, niin ne kaikki poistetaan. Funktio palauttaa poistettujen rivien lukumäärän.
?>
