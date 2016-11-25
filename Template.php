<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8"/>
        <title><?php echo $titre; ?></title>
        <link rel="stylesheet" type="text/css" href="Style/Style.css" />
    </head>
    <body>
        <div id="wrapper">
        <header>
            <img class="picture" src="Images/image_intro.png">
        </header>
        <nav id="menu">
            <ul id="nav">
                <li><a href="index.php">Home</a></li>
                    <li><a href="Book.php">Bibliotheque</a></li>
                    <?php
                    if (isset($_SESSION["login"]) && isset($_SESSION["pwd"])){
                    echo '<li><a href="Gestion.php">Gestion</a></li>';
                    }
                    else
                    {
                        echo '<li><a href="identification.php">Gestion</a></li>';
                    }
                    ?>
            </ul>
        </nav>
        <div id="article">
            <?php echo $contenu; ?>
        </div>
        <footer>
          Copyright © 2016 DELAPRESLE RAFIDINARIVO 
        </footer>
        </div>
    </body> 
</html>';
