<?php
require './Controller/BookController.php';
$bookController = new BookController();

$titre = "Ajout d'un nouveau livre";

if(isset($_GET["modifier"]))
{
    $book = $bookController->GetBookById($_GET["modifier"]);
    
    $contenu ="<form action='' method='post'>
    <fieldset>
        <legend>Ajout d'un livre</legend>
        <label for='titre'>Titre: </label>
        <input type='text' name='titre' value='$book->titre'  /><br/>

        
        <label for='auteur'>Auteur: </label>
        <input type='text' name='auteur' value='$book->auteur'  /><br/>
        
        <label for='genre'>Genre: </label>
        <select name='genre'>
            <option value='$book->genre'>$book->genre</option>"
        .$bookController->CreateOptionValues($bookController->GetBookGenres()).
        "</select><br/>

        <label for='note'>Note: </label>
        <input type='text' name='note' value='$book->note'/><br/>

        <label for='image'>Image: </label>
        <select name='image'>"
        .$bookController->GetImages().
        "</select></br>

        <label for='synopsis'>Synopsis: </label>
        <textarea cols='70' rows='12' name='synopsis'>$book->synopsis</textarea></br>

        <input type='submit' value='Submit'>
    </fieldset>
</form>";
}
 else 
{
   $contenu  ="<form action='' method='post'>
    <fieldset>
        <legend>Ajout d'un livre</legend>
        <label for='titre'>Titre: </label>
        <input type='text' name='titre'  /><br/>

        
        <label for='auteur'>Auteur: </label>
        <input type='text' name='auteur'   /><br/>
        
        <label for='genre'>Genre: </label>
        <select name='genre'>
            <option value='%'>All</option>"
        .$bookController->CreateOptionValues($bookController->GetBookGenres()).
        "</select><br/>

        <label for='note'>Note: </label>
        <input type='text' name='note' /><br/>

        <label for='image'>Image: </label>
        <select name='image'>"
        .$bookController->GetImages().
        "</select></br>

        <label for='synopsis'>Synopsis: </label>
        <textarea cols='60' rows='12' name='synopsis'></textarea></br>

        <input type='submit' value='Submit'>
    </fieldset>
</form>";
}


if(isset($_GET["modifier"]))
{
    if(isset($_POST["titre"]))
    {
        $bookController->ModifierBook($_GET["modifier"]);
        header('location: Gestion.php');
        
    }
}
else
{
    if(isset($_POST["titre"]))
    {
        $bookController->InsererBook();
        header ('location: Gestion.php');
    }
}

include './Template.php';
?>


