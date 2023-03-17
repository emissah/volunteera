<?php $this->layout('template', ['title' => 'Palautelomake']) ?>

<h1>Palautelomake</h1>

<p>Voit lähettää palautetta tältä lomakkeelta. Vastaamme mahdollisimman pian!</p>


<div class="palautelomake">
<form action="" method="post" enctype="text/plain"> <!-- Tämä ei toistaiseksi ohjaa mihinkään viestejä-->
  
	  <label for="name">Nimi</label>
	  <input type="text" id="name" name="name">
    
	  <label for="number">Puhelinnumero</label>
	  <input type="text" id="number" name="number">
      
	  <label for="email">Sähköposti</label>
	  <input type="email" id="email" name="email">
	  
	  <label for="subject">Viesti</label>
	  <textarea id="subject" name="subject" rows="6" cols="50"></textarea>
    
	  <input type="submit" id="button" name="submit" value="Lähetä">
  
	</form>
  </div>