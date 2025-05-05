<?php 
include "connect.php";

$id = $_GET['id'];


$requete = $bdd->prepare("DELETE FROM projet WHERE id_projet=?");
$requete->execute(
    array($id)
);
header("location: projetv.php");



?>