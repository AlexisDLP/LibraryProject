<script>

function showConfirm(id)
{
    
    var c = confirm("Voulez-vous vraiment supprimer ce livre?");
    
    if(c)
        window.location = "Gestion.php?supprimer=" + id;
}
</script>

<?php
require ("Model/BookModel.php");

class BookController {

    function GestionTable() {
        $result = "
            <table class='gestionTable'>
                <tr>
                    <td></td>
                    <td></td>
                    <th>Titre</th>
                    <th><b>Auteur</th>
                    <th>Genre</th>
                    <th>Note</th>>
                </tr>";

        $bookArray = $this->GetBookByGenre('%');

        foreach ($bookArray as $key => $book) {
            $result = $result .
                    "<tr>
                        <td><a href='AddaBook.php?modifier=$book->id'>Mettre à jour</a></td>
                        <td><a href='#' onclick='showConfirm($book->id)'>Supprimer</a></td>
                        <td>$book->titre</td>
                        <td>$book->auteur</td>    
                        <td>$book->genre</td> 
                        <td>$book->note</td>  
                    </tr>";
        }

        $result = $result . "</table>"."<p><a href='AddaBook.php'><input type='button' value='Ajouter un livre'></a></p>".
                "<a href='uploadImage.php'><input type='button' value='Télécharger une image'> </a>";
        
        return $result;
    }

    function SelectList() {
        $bookModel = new BookModel();
        $result = "<form action = '' method = 'post' width = '200px'>
                    Choisissez un genre: 
                    <select name = 'genre' >
                        <option value = '%' >All</option>
                        " . $this->CreateOptionValues($this->GetBookGenres()) .
                "</select>
                     <input type = 'submit' value = 'Rechercher' />
                    </form>";

        return $result;
    }

    function CreateOptionValues(array $Array) {
        $result = "";

        foreach ($Array as $choix) {
            $result = $result . "<option value='$choix'>$choix</option>";
        }

        return $result;
    }

    function Liste($genre) {
        $bookModel = new BookModel();
        $bookArray = $bookModel->GetBookByGenre($genre);
        $result = "";

       
        foreach ($bookArray as $key => $book) {
            $result = $result .
                    "<table class = 'Liste'>
                        <tr>
                            <th rowspan='6'><img src = '$book->image' /></th>
                            <th>Name: </th>
                            <td>$book->titre</td>
                        </tr>
                        
                        <tr>
                            <th>Type: </th>
                            <td>$book->genre</td>
                        </tr>
                        
                        <tr>
                            <th>Note: </th>
                            <td>$book->note /20</td>
                        </tr>
                        
                        
                        <tr>
                            <td colspan='2' >$book->synopsis</td>
                        </tr>                      
                     </table>";
        }
        return $result;
    }

    function GetImages() {
      
        $handle = opendir("Images/Books");

        
        while ($image = readdir($handle)) {
            $images[] = $image;
        }

        closedir($handle);

        $imageArray = array();
        foreach ($images as $image) {
            if (strlen($image) > 2) {
                array_push($imageArray, $image);
            }
        }

        $result = $this->CreateOptionValues($imageArray);
        return $result;
    }


    function InsererBook() {
        $titre = $_POST["titre"];
        $auteur = $_POST["auteur"];
        $genre = $_POST["genre"];
        $note = $_POST["note"];
        $image = $_POST["image"];
        $synopsis = $_POST["synopsis"];

        $book = new BookEntity(-1, $titre, $auteur, $genre, $note, $image, $synopsis);
        $bookModel = new BookModel();
        $bookModel->InsererBook($book);
    }

    function ModifierBook($id) {
        $titre = $_POST["titre"];
        $auteur = $_POST["auteur"];
        $genre = $_POST["genre"];
        $note = $_POST["note"];
        $image = $_POST["image"];
        $synopsis = $_POST["synopsis"];

        $book = new BookEntity($id, $titre, $auteur, $genre, $note, $image, $synopsis);
        $bookModel = new BookModel();
        $bookModel->ModifierBook($id, $book);
    }

    function SupprimerBook($id) 
    {
        $bookModel = new BookModel();
        $bookModel->SupprimerBook($id);
    }

    
    function GetBookById($id) {
        $bookModel = new BookModel();
        return $bookModel->GetBookById($id);
    }

    function GetBookByGenre($genre) {
        $bookModel = new BookModel();
        return $bookModel->GetBookByGenre($genre);
    }

    function GetBookGenres() {
        $bookModel = new BookModel();
        return $bookModel->GetBookGenres();
    }

    
}
?>
