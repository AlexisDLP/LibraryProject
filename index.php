<?php
$titre = "Home";
$contenu = '
        <h2>Qui sommes nous ?</h2>
        <p>
            Nous nous appellons Alexis de La Presle et Alexande Rafidinarivo et nous sommes 2 étudiants en 4ème à l\'ESIEA, une 
            école d\'ingénieur spécialisée dans le monde des Sciences du Numérique. Un des projets de cette nouvelle année du cursus de l\'ESIEA se résumait à créer 
            un site WEB en php ou ruby à l\'aide du design pattern MVC.</br>
            Nous sommes ainsi fier de vous accueillir sur le site "Library_ESIEA" réalisé entièrement à partir des langages HTML, CSS, PHP et SQL. 
            Notre base de données a été crée sous phpmyadmin.</br>
            La deuxième partie va s\'attacher à vous décrire aussi précisément que possible le fonctionnement de notre site.</br>
            Bonne lecture ! :-)
        </p>
        
        <h2>Comment marche Library_ESIEA</h2>
        <p>
           Vous l\'aurez compris en lisant le titre, il s\agit d\une mini bibliotheque numérique.</br>
           Le site se divise en 3 parties: 
           <p><ul>
           <li>Home</li>
           <li>Bibliotheque</li>
           <li>Gestion</li></ul></p>
           <h3>Home</h3>
           Home est la page sur laquelle vous arrivez pour la première fois en entrant sur ce site.</br>
           Elle est là pour nous présenter nous mais également présenter le site et son fontionnement à l\'aide d\'une description que vous lisez actuellement :-)</br>
           <h3>Bibliotheque</h3>
           C\'est là où sont rassemblés tout les livres. Fan de lecture et d\'un genre de livre en particulier ? Vous avez l\'opportunité ici de faire une recherche selon le genre que vous appréciez.</br>
           Vous découvrirez alors l\'existence de nouveaux livres (que vous connaissez mais aussi que vous ne connaissez pas bien sûr). Nous vous aidons dans vos choix en notant chaque livre et en apportant</br>
           un résumé à chacun d\'entre eux. Des nouveaux livres sont ajoutés continuellement dans notre bibliothèque grâce à la dernière partie que vous allez découvrir maintenant: Gestion.
           <h3>Gestion</h3>
           Il faut bien trouver un moyen d\'ajouter de nouveaux livres pour satisfaire nos clients. C\'est pourquoi la page Gestion vous permet d\'ajouter, mais aussi de mettre à jour et supprimer des livres.</br>
           Pour éviter que chacun ait accès à cette page, ce qui serait l\'occasion pour plusieurs farceurs d\'ajouter n\'importe quoi, seul l\'admin peut se connecter. Mais pour l\'ouverture de notre site, nous</br>
           vous donnons le login et mot de passe pour que vous puissez avoir accès à la "gestion" de notre bibliotèque. Vous pouvez même télécharger de nouvelles images pour les nouveaux livres ajoutés.
         ';
include 'Template.php';
?>
