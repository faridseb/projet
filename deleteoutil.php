<?php 
include "connect.php";

$id = $_GET['id'];


$requete = $bdd->prepare("DELETE FROM outils WHERE id_outils=?");
$requete->execute(
    array($id)
);
header("location: outil.php");



?>