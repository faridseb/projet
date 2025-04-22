<?php

include "connect.php";

    if(isset($_POST['ok'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = sha1($_POST['mdp']) ;
        

        if(!empty($nom) AND !empty($prenom) AND !empty($email) AND !empty($mdp) ){
                        if($nom == " " or $prenom == " "){
                            $erreur = "LE CHAMP DOIT CONTENIR DES CARACTERE" ;
                        }
                        else{
                            $reqEmail = $bdd->prepare("SELECT * FROM chef_projet WHERE email_chef = ?");
                        $reqEmail->execute(
                            array($email)
                        );
                        if($reqEmail->rowCount() == 0 ){
                                if(strlen($_POST['mdp']) < 4){
                                    $erreur = "Le mot de passe doit etre compris entre 4 ET 12 caracteres";
                                }
                                else{
                                    $requete = $bdd->prepare("INSERT INTO chef_projet VALUES (0,?,?,?,?)");
                                    $requete->execute(
                                        array($nom,$prenom,$email,$mdp)
                                    );
                                    header("location:login.php");
                                }
                            
                        }
                        else{
                            $erreur = 'CET EMAIL EXISTE DEJA';
                        }
                        }
                        
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
    <link rel="stylesheet" href="login.css">
    <title>Formulaire Chef</title>
</head>
<body>
    <div class="container">
        <h1>INSCRIPTION  CHEFS</h1>
        <?php
                if(isset($erreur)){
                            echo '<p style= "color:red; margin-top: 10px;  text-align: center; font-weight: bold;">'.$erreur.'</p>';
                }

                if(isset($message)){
                            echo '<p style= "backdrop-filter: blur(150px); box-shadow: 0 1px 5px black; color:green; margin-top: 10px; padding: 7px; text-align: center; font-weight: bold;">'.$message.'</p>';
                }

        ?>
        <form action="" method="post">
            <div class="box">
                <label for="">Nom :</label>
                <input type="text" placeholder="Entrer le Nom" name="nom" required>
            </div>
            <div class="box">
                <label for="">Prenom :</label>
                <input type="text" placeholder="Entrer le Prenom" name="prenom" required>
            </div>
            <div class="box">
                <label for="">Email :</label>
                <input type="email" placeholder="Entrer l'Email" name="email" required>
            </div>
            <div class="box">
                <label for="">Mot de passe :</label>
                <input type="password" placeholder="Entrer le mot de passe" name="mdp" required>
            </div>
            <div class="box">
                <input type="submit" value="S'INSCRIRE" name="ok">
            </div>
        </form>
    </div>
</body>
</html>