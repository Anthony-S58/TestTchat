<?php
try{
$bdd = new PDO ('mysql:host=localhost;dbname=messagerie; charset=utf8;', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['message'])){

        $pseudo=htmlspecialchars($_POST['pseudo']);
        $message = nl2br(htmlspecialchars($_POST['message']));

        $insererMessage = $bdd->prepare('INSERT INTO messages(Pseudo, Message) VALUES(?,?)');
        $insererMessage ->execute(array($pseudo, $message));

     }else{
            echo "Veuillez remplir tous les champs...";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Tchat</title>
</head>
<body>
    <h1>Test</h1><br>

    <form method="POST" action="">
        <input type="text" name="pseudo" placeholder="Pseudo">
        <textarea name="message" id="" cols="30" rows="10" placeholder="Votre message..."></textarea>
        <input type="submit" name="valider">
    </form>
<section id="messages"></section>
    <script>
        setInterval('load_messages()', 500);
        function load_messages(){
            $('#messages').load('loadMessages.php');
        }
    </script>
</body>
</html>