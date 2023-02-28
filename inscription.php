<?php
$port = '3306';
$host = '127.0.0.1';
$dbname = 'web';
$id = 'root';
$pass = '';
$erreurs = [];
mb_internal_encoding('UTF-8');

try
{
    $bdd = new PDO ('mysql:host='.$host.';dbname='.$dbname, $id, $pass, array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
}
catch (Exception $ex)
{
    echo ' connection mal ffaite';
}

    if (empty($_POST) === false)
    {
        if (empty($erreurs))
        {
            try 
            { 
            $password = password_hash($_POST['password'],PASSWORD_ARGON2I);

            
            $insertion = $bdd->prepare('INSERT INTO login (Name, Firstname, Email, Password, Date, Sexe) VALUES (:name, :firstname, :emaill, :passwordd, :datetime, :sexe)');
            $insertion -> bindParam(':name', $_POST['nom']);
            $insertion -> bindParam(':firstname', $_POST['prenom']);
            $insertion -> bindParam(':emaill', $_POST['email']);
            $insertion -> bindParam(':passwordd', $password);
            $insertion -> bindParam(':datetime', $_POST['date_naissance']);

            $insertion -> execute();
        
            }
            catch  (Exception $exception)
            {
                echo 'NULLLLLLLLLLLL';
            }
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
        <link href="inscription.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
        <link rel="icon" href="image/YG.jpg">
        <link rel="stylesheet" href="https://kit.fontawesome.com/a8e2a22e13.css" crossorigin="anonymous">
    </head>
    <body>
        <div class="vl"></div>
        <div class="vl1"></div>
        <div class="contenant-formulaire" id="contenant-formulaire">
            <div class="formulaire inscription-contenant" id="formulaire-inscription">
                <form action="#" method="POST">
                    <h1>S'inscrire</h1>
                    
                    <div class="reseaux-sociaux">
                      <a href="#"><i class="fab fab-facebook"></i></a>
                      <a href="#"><i class="fab fab-google"></i></a>
                      <a href="https://www.linkedin.com/in/yacine-guerda-b30aa3262/"><i class="fab fab-linkedin"></i></a>
                    </div>
                    
                    <a class="lien" href="connexion.html">Déjà inscrit? Connectez-vous</a>
                    
                    <input for="nom" type="text" name="nom" placeholder="Nom" required>
                    
                    <input for="prenom" type="text" name="prenom" placeholder="Prénom" required>
                    
                    <input for="email"type="email" name="email" placeholder="Email" required>
                    
                    <input for = "password"type="password" name="password" placeholder="Mot de passe" required>
                    
                    <input for = "date_naissance" type="date" name="date_naissance" placeholder="Date de naissance" required>
                    
                    <select name="genre" required>
                      <option value="">Choisissez votre genre</option>
                      <option value="homme" for="homme">Homme</option>
                      <option value="femme" for="femme">Femme</option>
                      <option value="autre" for="autre">Autre</option>
                    </select>
                    <input name="pefect" type="checkbox"> Coche ici si ta des couilles
                    <button type="submit" >S'inscrire</button>
                </form>
            </div>
        </div>
    </body>