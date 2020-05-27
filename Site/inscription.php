<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root', '');

if(isset($_POST['forminscription']))
{
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $personne = htmlspecialchars($_POST['personne']);
    //sha1 permet de ne pas montrer le mdp de la BDD plus récent que le md5 donc plus sécurisé
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) 
    AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['telephone']) AND !empty($_POST['personne']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {

        $pseudolength = strlen($nom, $prenom);
        if($pseudolength <= 255 )
        {
            if($mail == $mail2)
            {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                $reqmail = $bdd->prepare("SELECT * from membres WHERE mail = ?");
                $reqmail->execute(array($mail));
                $mailexit = $reqmail->rowCount();
                if($mailexit == 0)
                {
                if($mdp == $mdp2)
                {
                    $insertmbr = $bdd->prepare("INSERT INTO membres(nom, prenom, mail, telephone, personne, mdp) VALUES(?, ?, ?, ?, ?, ?)");
                    $insertmbr->execute(array($nom, $prenom, $mail, $telephone, $personne, $mdp));
                    //Solution 1 en dessous
                    $erreur = "Votre compte a bien été crée ! <a href=\"connexion.php\">Connexion</a>";
                    //Solution 2 à tester sinon supprimer
                    //$_SESSION['comptecree']= "Votre compte a bien été crée !";
                    //header('location: index.php');
                }
                else{
                    $erreur = "Vos mots de passes ne correspondent pas !";
                }
            }
            else{
                $erreur = "L'adresse mail est déjà utilisée !";
            }
        }
           else{
                $erreur = "Votre adresse mail n'est pas valide";
                }
            }
            else{
                $erreur = "Vos adresses mail ne correspondent pas !";
            }
        }
        else{
            $erreur = "Votre nom ne doit pas dépasser 255 caractères.";
        }
    }
    else{
        $erreur = "Tous les champs doivent être complétés !";
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
            <li><a href="connexion.php">Connexion</a></li>
      </ul>
</div>
</nav>
</div></br></br></br></br></br></br></br></br></br></br></br>

<!--inscription-->
<div align="center">
    <h2>Inscription</h2>
    <a href="connexion.php" style="color:white">Connexion</a>
    <br/><br/>
    <form method="POST" action="">
    <table>
<!--Nom-->
        <tr>
            <td>
        <label for="nom">Nom </label>
            </td>
            <td>
        <input type="text" placeholder="Votre Nom"  name="nom" <?php if(isset($nom)) { echo $nom; }?>
            </td>
        </tr>
<!--Prénom-->
<tr>
    <td>
<label for="prenom">Prénom </label>
    </td>
    <td>
<input type="text" placeholder="Votre Prénom"  name="prenom" <?php if(isset($prenom)) { echo $prenom; }?>
    </td>
</tr>
<!--Mail-->
        <tr>
            <td>
        <label for="mail">Mail </label>
            </td>
            <td>
        <input type="text" placeholder="Votre Email"  name="mail" <?php if(isset($mail)) { echo $mail; }?>
            </td>
        </tr>
<!--Confirmation Mail-->
<tr>
            <td>
        <label for="mail2">Confirmez l' Email </label>
            </td>
            <td>
        <input type="text" placeholder="Confirmez votre Email"  name="mail2" <?php if(isset($mail2)) { echo $mail2; }?>
            </td>
        </tr>
<!--Téléphone-->
<tr>
            <td>
        <label for="telephone">Téléphone </label>
            </td>
            <td>
        <input type="text" placeholder="Votre numéro de téléphone"  name="telephone" <?php if(isset($mail)) { echo $telephone; }?>
            </td>
        </tr>
<!--Nombre(s) de personne(s)-->
<tr>
    <td>
<label for="personne">Nombre de personne </label>
    </td>
    <td>
<input type="text" placeholder="Nombre de personne"  name="personne" <?php if(isset($personne)) { echo $personne; }?>
    </td>
</tr>
<!--Mot de passe-->
        <tr>
            <td>
        <label for="mdp">Mot de passe </label>
            </td>
            <td>
        <input type="password" placeholder="Votre mot de passe"  name="mdp" <?php if(isset($mdp)) { echo $mdp; }?>
            </td>
        </tr>
<!--Confirmation mot de passe-->
        <tr>
             <td>
            <label for="mdp2">Confirmez le mot de passe </label>
         </td>
            <td>
            <input type="password" placeholder="Confirmez le mdp"  name="mdp2" <?php if(isset($mdp2)) { echo $mdp2; }?>
        </td>
        </tr>
    </table><br/>
<!--Submit-->
    <input type="submit" name="forminscription" value="Inscription" />
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