<!doctype html>
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
            <li><a href="deconnexion.php">Deconnexion</a></li>
      </ul>
</div>
</nav>
        </bdn>

        <br><br><br><br><br> <!-- Ne pas supprimer les cinq br, car ils permettent de passer cinq lignes pour aligner tout l'ensemble de la page web ! -->
        
        <table>
            <tr>
                <td>Demande de masques de 
                    <?php 
                        try
                        {
                            $connection = new PDO("mysql:host=localhost;dbname=espace_membre;user=root;password=");
                            $prepDeLaRequete = $connection->query("select nom, prenom from membres where id = ". $_GET["lien"] .";");
                            $resultatDeLaRequete = $prepDeLaRequete->fetch();
                            echo $resultatDeLaRequete[0] . " " . $resultatDeLaRequete[1];
                        }
                        catch(Exception $e)
                        {
                            echo "La fonctionnalité ne fonctionne pas.";
                        }
                    ?>
                </td>
                <tr><td>Cet utilisateur dessire avoir des masques, veuillez choisir entre les trois options pour l'informer sur sa demande.</td></tr>
                <tr><td><input type="button" id="Accepter" value="Accepter la demande"><input type="button" id="Rendez_vous" value="Rendez vous" onClick="window.location.href='RendezVous.php?lien=<?php echo $_GET["lien"]; ?>'"><input type="button" id="Refuser" value="Refuser la demande"></td></tr>
            </tr>
        </tables>
    </body>
</html>


