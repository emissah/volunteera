<?php

  function generateActivationCode($text='') {
    return hash('sha1', $text . rand());
  }

  function generateResetCode($text='') {
    return generateActivationCode($text);
  }


//   Tarkkaavaisimmat huomaavat, että tämä funktio kutsuu suoraan generateActivationCode-funktiota. Nopeasti ajateltuna tässä ei tunnu olevan järkeä, 
//   miksi ei käytetä suoraan generateActivationCode-funktiota vaihtoavaimen luomiseen?

//   Tällä tavalla toteutettuna vaihtoavaimen luontiin liittyvä koodi pystytään kapseloimaan omaksi kokonaisuudekseen. 
//   Jos jatkossa tulee tarve luoda vaihtoavain eri tavalla kuin aktivointiavain, niin silloin riittää funktion koodin päivittäminen. 
//   Muussa tapauksessa jouduttaisiin etsimään koodista kaikki kohdat, jotka liittyvät nimenomaan vaihtoavaimen luomiseen.

?>
