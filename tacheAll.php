<?php

include "connect.php" ;


    $id = $_SESSION['utilisateur']['id'];
    $nom = $_SESSION['utilisateur']['nom'];
    $prenom = $_SESSION['utilisateur']['prenom'];
    $email = $_SESSION['utilisateur']['email'];

    $requete1 = "SELECT *  FROM utilisateur JOIN tache ON utilisateur.id_utilisateur=tache.id_utilisateur JOIN projet ON projet.id_projet=tache.id_projet JOIN chef_projet ON chef_projet.id_chef=projet.id_chef WHERE utilisateur.id_utilisateur=$id" ;
    $resultat1 = $bdd->query($requete1);
    $results1 = $resultat1->fetch(PDO::FETCH_ASSOC);

    $lib_projet = $results1['id_projet'];


    $requete = "SELECT  utilisateur.nom_utilisateur , utilisateur.prenom_utilisateur , tache.lib_tache ,projet.lib_projet  ,projet.dateD,projet.dateF, chef_projet.nom_chef , chef_projet.prenom_chef FROM utilisateur JOIN tache ON utilisateur.id_utilisateur = tache.id_utilisateur JOIN projet ON projet.id_projet=tache.id_projet JOIN chef_projet ON chef_projet.id_chef=projet.id_chef WHERE projet.id_projet=$lib_projet" ;
    $resultat = $bdd->query($requete);
    $results = $resultat->fetchAll(PDO::FETCH_ASSOC);


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
<body>
    <header>
        <nav class="navbar">
            <a href="" class="logo" style=" text-decoration: none;">TACHETEC</a>
            <div class="navlinks">
                <ul>
                <?php if(isset($_SESSION['utilisateur'])) { ?>
                    <li>
                            <div class="conn1" style="color:black; font-weight:900;"><?=$_SESSION['utilisateur']['nom']?> <?=$_SESSION['utilisateur']['prenom']?></div>
                            <!-- <div class="conn1" style="color: black;"><a href="deconnect.php"><i class="fa-solid fa-right-from-bracket"></i>Deconnecter</a></div> -->
                    </li>
                <?php  } ?>
                <?php if(isset($_SESSION['utilisateur'])) { ?>
                    <li><a style=" text-decoration: none;" href="deconnect.php"><i class="fa-solid fa-right-from-bracket"></i> Deconnecter</a></li>
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
    <h1>Listes des taches</h1>
        <table class="table table-striped-columns">
        <thead>
            <tr>
            <th scope="col">Nom & Prenom</th>
            <th scope="col">Taches</th>
            <th scope="col">Projet</th>
            <th scope="col">Chef Projet</th>
            <th scope="col">Date Debut</th>
            <th scope="col">Date Fin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $result) { ?>
                <tr>
                <th scope="row"><?=$result['nom_utilisateur']?> <?=$result['prenom_utilisateur']?></th>
                <td><?=$result['lib_tache']?></td>
                <td><?=$result['lib_projet']?></td>
                <td><?=$result['nom_chef']?> <?=$result['prenom_chef']?></td>
                <td><?=$result['dateD']?></td>
                <td><?=$result['dateF']?></td>
                </tr>
            <?php } ?>
            <!-- <tr>
            <th scope="row">BAWA Rashid</th>
            <td>API</td>
            <td>GOOGLE</td>
            <td>RID</td>
            </tr>
            <tr>
            <th scope="row">BERER</th>
            <td >Faire les push</td>
            <td>GOOGLE</td>
            <td>FACEBOOK</td>
            </tr> -->
        </tbody>
        </table>
</div>




                
    <script src="script2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>