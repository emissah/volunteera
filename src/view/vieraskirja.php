<?php $this->layout('template', ['title' => 'Vieraskirja']) ?>

<h1>Vieraskirja</h1>

<p>Kirjoita terveiset vieraskirjaamme.</p>
<br>

<?php

//  if (!isset($_POST['statement']) or empty($_POST['statement'])) {
//     $this->layout('template', ['title' => 'Vieraskirja']);
     
//    }

$mess = isset($_POST["mess"]) ? $_POST["mess"] : "";
$kirj = isset($_POST["kirj"]) ? $_POST["kirj"] : "";

$dsn = "mysql:host=localhost;dbname=enuutila";
$user = "db_enuutila";
$pass = getenv("DB_PASSWORD");
$options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];

try {

    $yht = new PDO($dsn, $user, $pass, $options);
    if (!$yht) { die(); }

    $kys = "select * from vieras order by vid desc";
    $lause = $yht->prepare($kys);
    $lause->execute();
    echo '<div class="vieraskirja">';
    echo "<hr>";
    while ($tulos = $lause->fetchObject() ) {
        echo "<b>";
        echo htmlspecialchars($tulos->kirj, ENT_QUOTES) . "</b> kirjoitti ";
        //echo htmlspecialchars($tulos->kirj, ENT_QUOTES); //HTML-koodi muutetaan merkkijonoiksi, jotka eivät tee mitään
        echo $tulos->pvm . " klo " . substr($tulos->aika, 0,8); 
        echo "<p><b>";
        echo htmlspecialchars($tulos->mess, ENT_QUOTES);
        //echo htmlspecialchars($tulos->mess, ENT_QUOTES); //HTML-koodi muutetaan merkkijonoiksi, jotka eivät tee mitään
        echo "</b></p><hr>"; 
    }

    }   catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }

    echo '</div>';


try {
    
    $yht = new PDO($dsn, $user, $pass, $options);
    if (!$yht) { die(); }

    if (!empty($kirj) and !empty($mess)) {
        $ins = "insert into vieras ";
        $ins .= "values (default, ?, ?, now(), now() )";

        $lause = $yht->prepare($ins);
        $lause->bindValue(1, $mess);
        $lause->bindValue(2, $kirj);

        $ret = $lause->execute();

        unset($mess);
        unset($kirj);
        unset($_POST);
        unset($_REQUEST);
        header('Location: vieraskirja');
    }

}

catch (PDOException $e) {
    echo $e->getMessage();
    die();
}


?>

<br>
<h3>Kirjoita viesti</h3>
<br>

<form method=post action="">
Kirjoittaja: <br> <input type=text name=kirj><br><br>
Viesti: <br> <textarea rows=5 cols=60 name=mess></textarea>
<br><br>
<input type=submit value="Lähetä">
</form>


