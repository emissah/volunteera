<?php

  require_once HELPERS_DIR . 'DB.php';

  function haeTapahtumat() {
    return DB::run('SELECT * FROM tapahtuma1 ORDER BY tap_alkaa;')->fetchAll();
  }

?>
