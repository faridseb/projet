<?php 
include "connect.php";

$id = $_GET['id'];


$requete = $bdd->prepare("DELETE FROM utilisateur WHERE id_utilisateur=?");
$requete->execute(
    array($id)
);
header("location: listeUtilisateur.php");



?>