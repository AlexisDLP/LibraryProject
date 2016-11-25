<?php

require 'Controller/BookController.php';
$bookController = new BookController();

if(isset($_POST['genre']))
{
    $bookTables = $bookController->Liste($_POST['genre']);
}
else 
{
    $bookTables = $bookController->Liste('%');
}

$titre = 'Aperçu de la bibliothèque';
$contenu = $bookController->SelectList(). $bookTables;

include 'Template.php';
?>
