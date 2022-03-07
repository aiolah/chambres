<?php

include "connect.php";

$nbrechambres = 0;

/* Traitement du formulaire*/
foreach($_POST["chambres"] as $chambre)
{
    $req = "UPDATE CHAMBRES SET libre=0 WHERE nom_chambre = ?";
    $stmt = $bdd->prepare($req);
    $stmt->execute(array($chambre));
    $nbrechambres++;

    $req = "INSERT INTO CHOISIT(nom_chambre, nom, date_début, date_fin) values(?, ?, ?, ?)";
    $stmt = $bdd->prepare($req);
    $stmt->execute(array($chambre, $_POST['nom'], $_POST['datedébut'], $_POST['datefin']));
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation de réservation</title>
    <link rel="icon" href="logo.ico">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div id="confirmation">
        <h2>Votre réservation a bien été effectuée !</h2>
        <h2>Vous venez de réserver <span class="orange"><?php echo $nbrechambres ?></span> chambres au nom de <span class="orange"><?php echo $_POST['nom'] ?></span> du <span class="orange"><?php echo $_POST['datedébut'] ?></span> au <span class="orange"><?php echo $_POST['datefin'] ?></span> .</h2>
        <h2>A très bientôt au <a href="http://leboucalais.fr" target="_blank">Boucalais</a> !</h2>
    </div>
    
</body>
</html>