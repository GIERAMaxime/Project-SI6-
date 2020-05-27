<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root', '');

if (isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $resquser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $resquser->execute(array($getid));
    $userinfo = $resquser->fetch();
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>COVID-19</title>
    <link href="index.css" rel="stylesheet" type="text/css">
    <link href="inscription.css" rel="stylesheet" type="text/css">
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
            <li><a href="#">Gestion du compte</a></li>
            <li><a href="#">Panel Administrateur</a></li>
      </ul>
</div>
</nav>
</div></br></br></br></br></br></br></br></br></br></br></br>

<!--inscription-->
<div align="center">
    <h2>Profil de  <?php echo $userinfo['prenom']; ?></h2>
    <br/><br/>
    Prenom = <?php echo $userinfo['prenom']; ?>
    <br/>
    Mail = <?php echo $userinfo['mail']; ?>
    <?php
    if (isset($_SESSION['id']) AND ($userinfo['id'] == $_SESSION['id']))
    {
    ?>
    <!--Pour maxime mettre le lien de ta page <a href="#"</a>-->
    <br/><a href="Pannel_Administrateur.php"  style="color:white">Pannel Admnistrateur</a>
    <br/><a href="deconnexion.php"  style="color:white">Se déconnecter</a>
    <?php   
    }
    ?>
 </div>
</header>
</body>

<footer><br/><br/>
    <p>© 2020 Mairie. All rights reserved.</p><br/><br/>
</footer>

</html>

<?php
}
?>