<?php

include "connect.php";


$requete = "SELECT * FROM projet ";

$resultat = $bdd->query($requete);

$results = $resultat->fetchAll(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="style2.css">
    <title>Formulaire de demande</title>
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
                    <li><a href="deconnect.php"><i class="fa-solid fa-right-from-bracket"></i>Deconnecte</a></li>
                </ul>
            </div>
        </nav>
    </header>
    
    <div class="container" style="width:900px;">
    <h1>Listes des  Projets</h1>
        <table class="table table-striped-columns">
        <thead>
            <tr>
            <th scope="col">Projet</th>
            <th scope="col">Date Debut</th>
            <th scope="col">Date Fin</th>
            <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $result) { ?>
                <tr>
                <td><?=$result['lib_projet']?></td>
                <td><?=$result['dateD']?></td>
                <td><?=$result['dateF']?></td>
                <td><a href="deleteprojet.php?id=<?=$result['id_projet']?>" style="background-color:black; padding:5px 30px;  border-radius: 4px;">Supprimer</a></td>
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

</body>
</html>