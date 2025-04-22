<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style2.css">
    <title>Formulaire de demande</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="" class="logo">TACHETEC</a>
            <div class="navlinks">
                <ul>
                <?php if(isset($_SESSION['utilisateur'])) { ?>
                    <li>
                            <div class="conn1" style="color:white; font-weight:900;"><?=$_SESSION['utilisateur']['nom']?> <?=$_SESSION['utilisateur']['prenom']?></div>
                            <!-- <div class="conn1" style="color: black;"><a href="deconnect.php"><i class="fa-solid fa-right-from-bracket"></i>Deconnecter</a></div> -->
                    </li>
                <?php  } ?>
                <?php if(isset($_SESSION['utilisateur'])) { ?>
                    <li><a href="deconnect.php"><i class="fa-solid fa-right-from-bracket"></i>Deconnecter</a></li>
                <?php  }else{ ?>
                    <li><a Se href="login.php">  <span>Se Connecter</span>  <i class="fa-solid fa-user"></i></a></li>
                <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container" style="width:100%;">
        <h1>PLATEFORME DE L'ENTREPRISE</h1>
        <p>Toute les informations sur l'intevention dans les missions</p>
        <p>de l'entreprise</p>
        <a href="login.php">VOIR LA TABLEAU DES TAHCES <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</body>
</html>