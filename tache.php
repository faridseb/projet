<?php

include "connect.php";
    $id_pro = $_GET['id'] ;
    $requete = "SELECT * FROM utilisateur";
    $resultat = $bdd->query($requete);
    $utilisateurs = $resultat->fetchAll(PDO::FETCH_ASSOC);

    $requete1 = "SELECT * FROM projet";
    $resultat1 = $bdd->query($requete1);
    $utilisateurs1 = $resultat1->fetchAll(PDO::FETCH_ASSOC);



    if(isset($_POST['ok'])){
        $nomT = htmlspecialchars($_POST['nomT']);
        $utilisat = $_POST['chef'] ;
        $idPro = $id_pro;

        if(!empty($nomT) AND !empty($utilisat)){

                                    $requete = $bdd->prepare("INSERT INTO tache VALUES (0,?,?,?)");
                                    $requete->execute(
                                        array($nomT,$idPro,$utilisat)
                                    );
                                    $message ="Tache enregistrer avec succes";
                                    
    }

    else{
        $erreur = 'VEUILLER REMPLIR TOUS LES CHAMPS' ;
    }

    }



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style3.css">
    
    <title>Formulaire des taches</title>
</head>
<style>
body{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

header{
    width:100%;
    position:sticky;
    top:0;
}

.container{
    margin-top:50px;
    width:700px;
    height:400px;

}
.container form .box{
    margin-top: 40px;
}

header .navbar .logo{
    margin:10px 30px;
}


    .container{
    
    box-shadow: 30px 60px 53px #f2f2f2;

}

    
</style>
<body>
<header>
        <nav class="navbar">
            <a href="chefA.php" class="logo">TACHETEC</a>
            <div class="navlinks">
                <ul>
                    <li><a href="tableauC.php?id=<?=$id_pro?>">Listes des Taches</a></li>
                    <li><a href="listeOutils.php?id=<?=$id_pro?>">Listes des Outil</a></li>
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
        <h1>AJOUTER UNE TACHE</h1>
        <form action="" method="post">
        <?php if(isset($message)) { ?>
            <p style= "backdrop-filter: blur(150px); box-shadow: 0 1px 5px black; color:green; margin-top: 10px; padding: 7px; text-align: center; font-weight: bold;"><?=$message?></p>;
        <?php } ?>
            <div class="box">
                <label for="">Nom de la tache :</label>
                <input type="text" name="nomT"  required>
            </div>
            
            <div class="box">
                <label for="">Utilisateur :</label>
                <select name="chef" id="" required>
                    <?php foreach ($utilisateurs as $utilisateur) { ?>
                            <option value="<?=$utilisateur['id_utilisateur']?>"><?=$utilisateur['nom_utilisateur']?> <?=$utilisateur['prenom_utilisateur']?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="box">
                <input type="submit" value="S'INSCRIRE" name="ok">
            </div>
        </form>
    </div>
</body>
</html>