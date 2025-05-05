<?php 
include "connect.php";

$id = $_GET['id'];


$requete = $bdd->prepare("DELETE FROM chef_projet WHERE id_chef=?");
$requete->execute(
    array($id)
);
header("location: listeChef.php");



?>