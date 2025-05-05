<?php 
include "connect.php";

$id = $_GET['id'];


$requete = $bdd->prepare("DELETE FROM tache WHERE id_tache=?");
$requete->execute(
    array($id)
);
header("location: tableauC.php");



?>