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

        <br><br><br><br><br><br><br><br><br><br> <!-- Ne pas supprimer les 10 br, car ils permettent de passer cinq lignes pour aligner tout l'ensemble de la page web ! -->

        <tables>
            <tr>
                <td>Formulaire du rendez vous</td>
            </tr>
            <tr><td><input type="text" value="ANNÉE-MOIS-JOUR HEURE-MINUTES-SECONDES"></td><td><input type="submit" name="testSubmit"></td></tr>
        </tables>
    </body>
</html>

<script>

    $("").click(function()
    {
        $.ajax({
            url : fonctions.php
        });
    });

</script>
