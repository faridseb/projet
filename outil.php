<?php 
include "connect.php";
$id_pro = $_GET['id'] ;


$requete1 = "SELECT * FROM projet";
$resultat1 = $bdd->query($requete1);
$utilisateurs1 = $resultat1->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['ok'])){
    $libelle = $_POST['nomO'];
    $lien = $_POST['link'];
    $projet = $id_pro;

    if(!empty($libelle) AND !empty($lien) AND !empty($projet)){
        $requete = $bdd->prepare("INSERT INTO outils VALUES (0,?,?,?)");
        $requete->execute(
            array($libelle,$lien,$projet)
        );
    }
    

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style3.css">
    <title>Document</title>
</head>
<style>
body{
    background: linear-gradient(to bottom right, #6a6a6a, #0074D9);
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
}

.container form input,.container form select{
    width: 100%;
}

header .navbar .logo{
    margin:10px 30px;
}
    
</style>
<body>
    <header>
        <nav class="navbar">
            <a href="" class="logo" style=" text-decoration: none;">TACHETEC</a>
            <div class="navlinks">
                <ul>
                
                    
                <li><a href="outil.php?id=<?=$id_pro?>">Outils</a></li>
                <li><a href="tache.php?id=<?=$id_pro?>">Tache</a></li>
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

    <!-- <aside>
        <ul>
            <li><a href="">Acceuil</a></li>
            <li><a href="tableau.php">Listes des taches</a></li>
            <li><a href="outilsv.php">Outils</a></li>
        </ul>
    </aside> -->
    
<div class="container">
        <h1>OUTILS</h1>
        <form action="" method="post">
            <div class="box">
                <label for="">Objectif de l'outil :</label>
                <input type="text" name="nomO" placeholder="Entrer le Nom de l'Outil" required>
            </div>
            <div class="box">
                <label for="">Lien :</label>
                    <input type="text" placeholder="Entrer le lien" name="link">
            </div>
            <div class="box">
                <input type="submit" value="S'INSCRIRE" name="ok">
            </div>
        </form>
</div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>