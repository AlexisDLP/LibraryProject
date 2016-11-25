<?php    

$titre = 'identification'; 
$contenu='<html>
    <head>
    <title>Formulaire d\'identification</title>
    </head>
    <body>
    <form action="login.php" method="post">
    Votre login : <input type="text" name="login">
    <br />
    Votre mot de passe : <input type="password" name="pwd"><br />
    <input type="submit" value="Connexion">
    </form>
    <p>Allez, pour fêter l\'ouverture de notre site, voici le login et mot de passe:
    <ul>
    <li>login: alex</li> (pour alexis et alexandre :-)
    <li>mot de passe: library</li>
    </ul>
    </body>
    </html>';

   include 'Template.php';
   ?>

