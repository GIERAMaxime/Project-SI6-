<?php
function connectionALaBdd($requete)
{
    try
    {
        $connection = new PDO("mysql:host=localhost;dbname=espace_membre;user=root;password=");
        $PreparationDeLaRequete = $connection->query($requete);
        $nombreHabitantResultat = $PreparationDeLaRequete->fetch();
    }
    catch(Exception $e)
    {

    }
}

function verifierHorraire()
{
    connectionALaBdd("select ");
}

?>