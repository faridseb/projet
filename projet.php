<?php

include "connect.php";

    $requete = "SELECT * FROM chef_projet";
    $resultat = $bdd->query($requete);
    $chefs = $resultat->fetchAll(PDO::FETCH_ASSOC);



    if(isset($_POST['ok'])){
        $nomP = htmlspecialchars($_POST['nomP']);
        $DateD =$_POST['dateD'];
        $DateF = $_POST['dateF'];
        $chef = $_POST['chef'] ;
        

        if(!empty($nomP) AND !empty($DateF) AND !empty($DateD) AND !empty($chef)){

                                    $requete = $bdd->prepare("INSERT INTO projet VALUES (0,?,?,?,?)");
                                    $requete->execute(
                                        array($nomP,$DateD,$DateF,$chef)
                                    );
                                    header("location: projetv.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">


    <title>Formulaire de Projet</title>
</head>
<style>

 /* body{
    background: linear-gradient(to bottom right, #6a6a6a, #0074D9);

    flex-direction: column; 
}

    header{
    width:100%;
    margin:0;
    padding :0;
    position:fixed;
    top:0;
}

aside{
    background-color: white;
    width: 100px;
    height: 100vh;
    position: fixed;
    box-shadow: 2px 1px 0px black;


}

aside.active{
    width: 300px;
    transition: 1s;
}

aside.active .text{
    display: block;
}

aside.active .fa-bars {
    display: none;
}

aside.active .fa-xmark {
    display: block;
    font-size: 30px;

}


aside.active #icones{
    display: none;
}
aside ul {
    margin: 90px 0; 
    cursor: pointer;
}

aside ul i{
    font-size: 25px;
    cursor: pointer;
}

aside ul li:hover{
     background-color: #0074D9; 
}

aside ul li{
    margin-top: 60px;
    padding: 0px;
}
.fa-xmark{
    display: none;
}
aside ul li a{
    color: black;
    text-decoration: none;
}

.container form .box{
    margin-top: 20px;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column; 
    width:600px;
    height:400px;
} 

 */
.container{
    /* display: flex;
    justify-content: center;
    align-items: center; */
    height: 100vh;
    background-color:white  ;

    /* flex-direction: column;*/
    width: 500px; 

}
.container h1{
    font-size: 40px;
    color: blue;
    font-weight: 500 ;
}
header .navbar a{
    text-decoration :none; 
}




.container{
    
    box-shadow: 30px 60px 53px #f2f2f2;

}

    
</style>
<body>


   

    <div class="container" >
        <h1>AJOUTER DES PROJETS</h1>
        <form action="" method="POST">
            <div class="box">
                <label for="">Nom :</label>
                <input type="text" placeholder="Entrer le nom du projet" required name="nomP">
            </div>
            <div class="box">
                <label for="">Date debut :</label>
                <input type="date" required name="dateD">
            </div>
            <div class="box">
                <label for="">Date Fin :</label>
                <input type="date" required name="dateF">
            </div>
            <div class="box">
                <label for="">Chef Projet :</label>
                

                <select name="chef" id="" required>
                <?php foreach ($chefs as $chef) { ?>
                    <option value="<?=$chef['id_chef']?>"><?=$chef['nom_chef']?> <?=$chef['prenom_chef']?></option>
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