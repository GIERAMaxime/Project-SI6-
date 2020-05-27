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
        <br><br><br><br><br> <!-- Ne pas supprimer les cinq br, car ils permettent de passer deux lignes pour aligner tout l'ensemble de la page web ! -->
        <tldpqddm>
        <table class="test">
        <tr><th>Listes des personnes qui demande des masques</th>
        <table>
        <tr>
        <td>Nom</td>
        <td>Prenom</td>
        <td>Status de la demande des masques</td>
        <td>Voir la demande</td>
        </tr>
        <?php
        // Ce bout de code permet de faire afficher les status des gens qui veulent un masque
        // J'oubliais mais le css agit de façon très bizarre, par éxemple quand j'enlevais background-color: grey; ou autres ça n'enlevait pas ce qui posait grandement problème, et non, il n'y avait aucun problème de syntaxe a ce moment...
        // <tldpqddm> = <TableListeDesPersonnesQuiDemandeDesMasques>
        try
        {
            $connection = new PDO("mysql:host=localhost;dbname=espace_membre;user=root;password="); // On enregistre les informations pour se connecter a la base de donnée
            $PreparationDeLaRequete = $connection->query("select count(0) from membres;"); // On enregistre la requète a envoyer a la base de donnée
            $nombreHabitantResultat = $PreparationDeLaRequete->fetch(); // On récupère les résultats envoyés par la base de donné sous forme de tableau
            //edrdlr = EnregistrementDuResultatDeLaRequete 
            for($i = 0; $i < $nombreHabitantResultat[0]; $i++)
            {
                $PreparationDeLaRequete = $connection->query("select nom from membres where nom <> prenom limit 1 offset ". $i .";"); // On enregistre la requète a envoyer a la base de donnée
                $nomResultat = $PreparationDeLaRequete->fetch(); // On récupère les résultats envoyés par la base de donné sous forme de tableau
                //edrdlr = EnregistrementDuResultatDeLaRequete 
                echo "<tr><td>" . $nomResultat[0] . "</td>";
                $PreparationDeLaRequete = $connection->query("select prenom from membres where prenom <> nom limit 1 offset ". $i .";"); // On enregistre la requète a envoyer a la base de donnée
                $prenomResultat = $PreparationDeLaRequete->fetch(); // On récupère les résultats envoyés par la base de donné sous forme de tableau
                //edrdlr = EnregistrementDuResultatDeLaRequete 
                echo "<td>" . $prenomResultat[0] . "</td>";
                $PreparationDeLaRequete = $connection->query("select statusDeLaDemande from membres where statusDeLaDemande <> nom limit 1 offset ". $i .";"); // On enregistre la requète a envoyer a la base de donnée
                $statutResultat = $PreparationDeLaRequete->fetch(); // On récupère les résultats envoyés par la base de donné sous forme de tableau
                //edrdlr = EnregistrementDuResultatDeLaRequete 
                echo "<td>" . $statutResultat[0] . "</td>";
                echo "<td><a href=\"VoirLaDemande.php?lien=" . $i . "\" id=" . $i . ">Détails</a><td></tr>";
            }
        }
        catch(Exception $e)
        {
            echo "La base de donnée est inacessible, veuillez réessayer plus tard.";
        }
        echo "</table>";
        echo "<tldpqddm>";
        $connection = null;
        $PreparationDeLaRequete = null;
        $nombreHabitantResultat = null;
        $nomResultat = null;
        $prenomResultat = null;
        $statutResultat = null;
        ?>
    </body>
    
</html>
