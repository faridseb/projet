<?php

include "connect.php" ;


    




    $requete = "SELECT * FROM utilisateur JOIN role ON role.id_role=utilisateur.id_role" ;
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
            <a href="" class="logo" style="text-decoration:none;">TACHETEC</a>
            <div class="navlinks">
                <ul>
                <li><a href="projetv.php">Projet</a></li>
                <li><a href="projet.php">Ajouter Projet</a></li>
                <li><a href="utilisateur.php">Ajouter utilisateur</a></li>
                <li><a href="chef.php">Ajouter Chef</a></li>
                <?php if(isset($_SESSION['chef'])) { ?>
                    <li>
                            <div class="conn1" style="color:black; font-weight:900;"><?=$_SESSION['chef']['nom']?> <?=$_SESSION['chef']['prenom']?></div>
                            
                    </li>
                <?php  } ?>
                    <li><a href="deconnect.php"><i class="fa-solid fa-right-from-bracket"></i>Deconnecter</a></li>
                </ul>
            </div>
        </nav>
    </header>
    
    <aside class="bares">
        <ul>
        
            <p><i class="fa-solid fa-bars"></i></p>
            <p><i class="fa-solid fa-xmark"></i></p>
            <li id="icones"><a href="admin.php"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="admin.php" class="text"><i class="fa-solid fa-house"></i> Acceuil</a></li>
            <li id="icones"><a href="listeUtilisateur.php"><i class="fa-solid fa-user"></i></a></li>
            <li><a href="listeUtilisateur.php" class="text"><i class="fa-solid fa-user"></i> Listes des Utilisateur</a></li>
            <li id="icones"><a href="listeChef.php"><i class="fa-solid fa-chess-king"></i></a></li>
            <li><a href="listeChef.php" class="text"><i class="fa-solid fa-chess-king"></i> Listes des Chefs</a></li>
        </ul>
    </aside>
    
<div class="container">
<h1 style="color:black;">Listes des Utilisateurs</h1>
        <table class="table table-striped-columns">
        <thead>
            <tr>
            <th scope="col">Nom & Prenom</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Supprimer</th>
            
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $result) { ?>
                <tr>
                <th scope="row"><?=$result['nom_utilisateur']?> <?=$result['prenom_utilisateur']?></th>
                <td><?=$result['email_utilisateur']?></td>
                <td><?=$result['lib_role']?></td>
                <td><a href="deleteU.php?id=<?=$result['id_utilisateur']?>">Supprimer</a></td>
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