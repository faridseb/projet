<?php
include "connect.php";


    
    if(isset($_POST['ok'])){
        $email = htmlspecialchars($_POST['email']);
        $mdp = sha1($_POST['mdp']);


        
        if(!empty($email) AND !empty($mdp)){
            if($email == "seboufarid43@gmail.com" && $_POST['mdp']=='admin'){
                header("location:admin.php");
            }
            else{
                $requete = $bdd->prepare("SELECT * FROM utilisateur WHERE  email_utilisateur=? AND mdp_utilisateur=?");
            $requete->execute(
                array($email,$mdp)
            );
            $reponse = $requete->rowCount();
            
            if( $reponse > 0){
                $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);
                $id = $utilisateur['id_utilisateur'];
                $nom_user  =  $utilisateur['nom_utilisateur'];
                $prenom_user  =  $utilisateur['prenom_utilisateur'];
                $_SESSION['utilisateur'] = [
                "id" => $id,
                "nom" => $nom_user,
                "prenom" => $prenom_user,
                "email" => $email ,
                "mdp" => $mdp
                ];
                $message = 'COMPTE A BIEN ETE TROUVE' ;
                header("location:tableau.php");
            }
            else{
                $requete = $bdd->prepare("SELECT * FROM chef_projet WHERE  email_chef=? AND mdp=?");
                $requete->execute(
                    array($email,$mdp)
                );
                $reponse = $requete->rowCount();
                
                if( $reponse > 0){
                    $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);
                    $id = $utilisateur['id_chef'];
                    $nom_user  =  $utilisateur['nom_chef'];
                    $prenom_user  =  $utilisateur['prenom_chef'];
                    $_SESSION['chef'] = [
                    "id" => $id,
                    "nom" => $nom_user,
                    "prenom" => $prenom_user,
                    "email" => $email ,
                    "mdp" => $mdp
                    ];
                    header("location:chefA.php");
            }
            else{
                $erreur = 'EMAIL OU MOT DE PASSE INCORRECT';
            }
            }
            
        }
    }else{
        $erreur = 'VEUILLEZ REMLIR TOUS LES CHAMPS';
    }

}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<style>
    .container{
    
    box-shadow: 30px 60px 53px #f2f2f2;

}
</style>
<body class="all">
    <div class="container">
        <h1>CONNEXION AU COMPTE</h1>
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
                <label for="">Email :</label>
                <input type="email" required placeholder="Entrer l'Email" name="email">
            </div>
            <div class="box">
                <label for="">Mot de passe :</label>
                <input type="password" required placeholder="Entrer le mot de passe" name="mdp">
            </div>
            <div class="box"><input type="submit" value="Se Connecter" name="ok">
            </div>
            <!-- <div class="text">
                <p>Avez-vous un compte ?</p>
                <p id="button">Creer un compte</p>
            </div> -->
        </form>
    </div>
    <div class="pop">
        <i class="fa-solid fa-xmark"></i>
        <p>QUEL EST VOTRE SPECIFICATION ?</p>
        <div class="button">
            <a href="chef.php">Chef projet</a>
            <a href="utilisateur.php">Utilisateur</a>
        </div>
    </div>


    <script src="script.js"></script>
</body>
</html>