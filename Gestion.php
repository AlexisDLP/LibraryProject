<?php
session_start ();
$titre = "Gérer une table de livres";
include './Controller/BookController.php';
$bookController = new BookController();

if (isset($_SESSION["login"]) && isset($_SESSION["pwd"])) {
    $contenu=$bookController->GestionTable().'<a href="./logout.php">Déconnexion</a>';
}   
if(isset($_GET["supprimer"]))
{
    $bookController->SupprimerBook($_GET["supprimer"]);
}
        
include 'Template.php';      
?>
