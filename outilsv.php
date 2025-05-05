<?php

include "connect.php" ;


    $id = $_SESSION['utilisateur']['id'];
    $nom = $_SESSION['utilisateur']['nom'];
    $prenom = $_SESSION['utilisateur']['prenom'];
    $email = $_SESSION['utilisateur']['email'];

    $requete = "SELECT * FROM utilisateur JOIN tache ON utilisateur.id_utilisateur = tache.id_utilisateur JOIN projet ON projet.id_projet=tache.id_projet JOIN chef_projet ON chef_projet.id_chef=projet.id_chef WHERE utilisateur.id_utilisateur=$id " ;
    $resultat = $bdd->query($requete);
    $results = $resultat->fetch(PDO::FETCH_ASSOC);

    $projetU = $results['id_projet'];


    $requete1 = "SELECT * FROM outils WHERE id_projet=$projetU";
    $resultat1 = $bdd->query($requete1);
    $outils = $resultat1->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style2.css">
    <title>Document</title>
</head>
<style>
    header{
        position: fixed;
        top:0;
        width:100%;
    }
    aside ul {
        margin-top :115px;
    }
</style>
<body>
    <header>
        <nav class="navbar">
            <a href="" class="logo" style=" text-decoration: none;">TACHETEC</a>
            <div class="navlinks">
                <ul>
                <?php if(isset($_SESSION['utilisateur'])) { ?>
                    <li>
                            <div class="conn1" style="color:white; font-weight:900;"><?=$_SESSION['utilisateur']['nom']?> <?=$_SESSION['utilisateur']['prenom']?></div>
                            <!-- <div class="conn1" style="color: black;"><a href="deconnect.php"><i class="fa-solid fa-right-from-bracket"></i>Deconnecter</a></div> -->
                    </li>
                <?php  } ?>
                <?php if(isset($_SESSION['utilisateur'])) { ?>
                    <li><a style=" text-decoration: none;" href="deconnect.php"><i class="fa-solid fa-right-from-bracket"></i>Deconnecter</a></li>
                <?php  }else{ ?>
                    <li><a style=" text-decoration: none;"  Se href="login.php">  <span>Se Connecter</span>  <i class="fa-solid fa-user"></i></a></li>
                <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="bares">
        <ul>
        
            <p><i class="fa-solid fa-bars"></i></p>
            <p><i class="fa-solid fa-xmark"></i></p>
            <li id="icones"><a href="tableau.php"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="tableau.php" class="text"><i class="fa-solid fa-house"></i> Acceuil</a></li>
            <li id="icones"><a href="tacheAll.php"><i class="fa-solid fa-square-pen"></i></a></li>
            <li><a href="tacheAll.php" class="text"><i class="fa-solid fa-square-pen"></i> Listes des taches</a></li>
            <li id="icones"><a href="outilsv.php"><i class="fa-solid fa-screwdriver-wrench"></i></a></li>
            <li><a href="outilsv.php" class="text"><i class="fa-solid fa-screwdriver-wrench"></i> Outils</a></li>
        </ul>
    </aside>
<div class="container">
        <h1>OUTILS</h1>
        <?php foreach ($outils as $outil) { ?>
        <div class="outil">
            <div class="libelle">
            
                    <p class="titre">Objet de l'outil :</p>
                    <p><?=$outil['libelle_outils']?></p>
            </div>
            <div class="link">
                    <p class="titre">Lien : </p>
                    <p><a  style="text-decoration:none;" href="<?=$outil['contenu_outil']?>"><?=$outil['contenu_outil']?></a></p> 
            </div>
        </div>
        <?php } ?>


</div>




    <script src="script2.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>