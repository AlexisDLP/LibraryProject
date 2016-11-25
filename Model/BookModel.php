<?php
require ("Entities/BookEntity.php");

class BookModel {

    function GetBookGenres() {
        
         try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=library;charset=utf8','root','Alexis3721',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $reponse = $bdd->query("SELECT DISTINCT genre FROM book");
        $genres = array();

        while ($donnees = $reponse->fetch()) {
            array_push($genres, $donnees[0]);
        }
        $reponse->closeCursor();
        return $genres;
    }

    function GetBookByGenre($genre) {
      
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=library;charset=utf8','root','Alexis3721',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $reponse = $bdd->query("SELECT * FROM book WHERE genre LIKE '$genre' ORDER BY note DESC");
        $bookArray = array();


        while ($donnees = $reponse->fetch()) {
            $id = $donnees['id'];
            $titre = $donnees['titre'];
            $auteur = $donnees['auteur'];
            $genre = $donnees['genre'];
            $note = $donnees['note'];
            $image = $donnees['image'];
            $synopsis = $donnees['synopsis'];

            //Create book objects and store them in an array.
            $book = new BookEntity($id, $titre, $auteur, $genre, $note, $image, $synopsis);
            array_push($bookArray, $book);
        }
        $reponse->closeCursor();
        return $bookArray;
    }

    function GetBookById($id) {
   
          try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=library;charset=utf8','root','Alexis3721',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $reponse = $bdd->query("SELECT * FROM book WHERE id = $id");
        

        while ($donnees = $reponse->fetch()) {
            $id = $donnees[0];
            $titre = $donnees[1];
            $auteur = $donnees[2];
            $genre = $donnees[3];
            $note = $donnees[4];
            $image = $donnees[5];
            $synopsis = $donnees[6];

            $book = new BookEntity($id, $titre, $auteur, $genre, $note, $image, $synopsis);
          
        }
   
        $reponse->closeCursor();
        return $book;
    }

    function InsererBook(BookEntity $book) {
          try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=library;charset=utf8','root','Alexis3721',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $req = $bdd->prepare("INSERT INTO book
                          (titre, auteur, genre,note,image,synopsis)
                          VALUES
                          (:titre,:auteur,:genre,:note,:image,:synopsis)");
         $req->execute(array(
             'titre' =>$book->titre,
                'auteur' => $book->auteur,
                'genre' => $book->genre,
                'note' => $book->note,
                'image' => "Images/Books/" . $book->image,
                'synopsis' => $book->synopsis
                 ));

    }

    function ModifierBook($id, BookEntity $book) {
          try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=library;charset=utf8','root','Alexis3721',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $req = $bdd->prepare("UPDATE book
                            SET titre = :titre, auteur = :auteur, genre = :genre, note = :note, image = :image, synopsis = :synopsis
                          WHERE id = $id");
             $req->execute(array(
                'titre' =>$book->titre,
                'auteur' => $book->auteur,
                'genre' => $book->genre,
                'note' => $book->note,
                'image' => "Images/Books/" . $book->image,
                'synopsis' => $book->synopsis));

    }

    function SupprimerBook($id) {
          try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=library;charset=utf8','root','Alexis3721',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $req = $bdd->prepare("DELETE FROM book WHERE id = $id");
        $req->execute();
        
    }

}
?>