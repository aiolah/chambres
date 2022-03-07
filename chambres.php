<?php
/* Récupère les données de la table CHAMBRES, les encode en json et les affiche */

header("Access-Control-Allow-Origin: *");
include "connect.php";

/* On récupère les chambres pour les intégrer dans des objets Chambres */
$chambres = array();
$req = "SELECT * FROM CHAMBRES ORDER BY id ASC";
$stmt = $bdd->prepare($req);
$stmt->execute();

while($chambre = $stmt->fetch(PDO::FETCH_OBJ))
{
    $chambres[] = $chambre;
}

$errorInfo = $stmt->errorInfo();
if ($errorInfo[0] != 0)
{
    print_r($errorInfo);
}

echo json_encode($chambres);

?>
