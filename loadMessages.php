<?php
try{
$bdd = new PDO ('mysql:host=localhost;dbname=messagerie; charset=utf8;', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$recupMessages = $bdd->query('SELECT * FROM messages');
while($message = $recupMessages->fetch()){
    ?>
    <div class="message">
        <h4><?=$message['pseudo'];?></h4>
        <p><?=$message['message'];?></p>
    </div>
    <?php
}