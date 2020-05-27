<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root', '');

if (isset($_POST['formconnexion']))
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if (!empty($mailconnect) AND !empty($mdpconnect)) 
    {
        $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? and mdp = ?");
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if ($userexist == 1) 
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location: profil.php?id=".$_SESSION['id']);
        }
        else{
            $erreur = "Mauvais identifiants !";
        }
    }
    else {
        $erreur = "Tous les champs doivent être complétés";
    }
}

?>

<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>COVID-19</title>
    <link href="index.css" rel="stylesheet" type="text/css">
    <link href="global.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="src/fullclip.js"></script>
	</head>
    
<header>
<body>

<!--Navagation-->
<div class="nav">
    <nav>

<div class="menu-icon">
      <i class="fa fa-bars fa-2x"></i>
</div>

<div class="logo">
    Crise sanitaire COVID-19
</div>

<div class="menu">
      <ul>
            <li><a href="index.php">Bienvenue</a></li>
            <li><a href="inscription.php">Inscription</a></li>
      </ul>
</div>
</nav>
</div></br></br></br></br></br></br></br></br></br></br></br>

<!--inscription-->
<div align="center">
    <h2>Connexion</h2>
    <br/><br/>
    <form method="POST" action="">
        <input type="email" name="mailconnect" placeholder="Mail"/>
        <input type="password" name="mdpconnect" placeholder="Mot de passe"/>
        <input type="submit" name="formconnexion" value="Connexion"/>
    </form>

    <?php
    if(isset($erreur))
    {
        echo $erreur;
    }
    ?>
 </div>
</header>
</body>

<footer><br/><br/>
    <p>© 2020 Mairie. All rights reserved.</p><br/><br/>
</footer>

</html>