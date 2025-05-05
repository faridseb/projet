<?php

include "connect.php" ;

    $id_pro = $_GET['id'] ;
    // $_SESSION['projet'] = ['id' => $id_pro];
    // $id_pro = $_SESSION['projet']['id'];


    // $id = $_SESSION['utilisateur']['id'];
    // $nom = $_SESSION['utilisateur']['nom'];
    // $prenom = $_SESSION['utilisateur']['prenom'];
    // $email = $_SESSION['utilisateur']['email'];

    $requete1 = "SELECT *  FROM utilisateur JOIN tache ON utilisateur.id_utilisateur=tache.id_utilisateur JOIN projet ON projet.id_projet=tache.id_projet JOIN chef_projet ON chef_projet.id_chef=projet.id_chef JOIN outils ON outils.id_projet=projet.id_projet WHERE projet.id_projet=$id_pro" ;
    $resultat1 = $bdd->query($requete1);
    $results1 = $resultat1->fetch(PDO::FETCH_ASSOC);

    $lib_projet = $results1['id_projet'];


    $requete = "SELECT outils.libelle_outils , outils.contenu_outil, outils.id_outils FROM  outils WHERE id_projet=$lib_projet" ;
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
            <a href="chefA.php" class="logo" style="text-decoration:none;">TACHETEC</a>
            <div class="navlinks">
                <ul>
                    <li><a href="tableauC.php?id=<?=$id_pro?>">Listes des Taches</a></li>
                    <li><a href="tableauC.php?id=<?=$id_pro?>">Listes des Outils</a></li>
                    <li><a href="tache.php?id=<?=$id_pro?>">Tache</a></li>
                    <li><a href="outil.php?id=<?=$id_pro?>">Outils</a></li>
                    
                    <?php if(isset($_SESSION['chef'])) { ?>
                    <li>
                            <div class="conn1" style="color:black; font-weight:900;"><?=$_SESSION['chef']['nom']?> <?=$_SESSION['chef']['prenom']?></div>
                            <!-- <div class="conn1" style="color: black;"><a href="deconnect.php"><i class="fa-solid fa-right-from-bracket"></i>Deconnecter</a></div> -->
                    </li>
                <?php  } ?>
                <?php if(isset($_SESSION['chef'])) { ?>
                    <li><a style=" text-decoration: none;" href="deconnect.php"><i class="fa-solid fa-right-from-bracket"></i>Deconnecter</a></li>
                <?php  }else{ ?>
                    <li><a style=" text-decoration: none;"  Se href="login.php">  <span>Se Connecter</span>  <i class="fa-solid fa-user"></i></a></li>
                <?php } ?>
                </ul>
            </div>
        </nav>
    </header>

    
<div class="container">
    <h1 style="color:black;">Listes des outils</h1>
        <table class="table table-striped-columns">
        <thead>
            <tr>
            
            <th scope="col">Titre de l'Outils</th>
            <th scope="col">Contenu de l'Outils</th>
            <!-- <th scope="col">Supprimer</th> -->
            
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $result) { ?>
                <tr>
                
                
                <td><?=$result['libelle_outils']?></td>
                <td><a href="<?=$result['contenu_outil']?>"><?=$result['contenu_outil']?></a></td>
                <!-- <td><a href="deleteoutil.php?id=<?=$result['id_outils']?>" style="background-color:black; padding:5px 30px;  border-radius: 4px;">Supprimer</a></td> -->
                

                
                
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