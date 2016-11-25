<?php
class BookEntity
{
    public $id;
    public $titre;
    public $auteur;
    public $genre;
    public $note;
    public $image;
    public $synopsis;
    
    function __construct($id, $titre, $auteur, $genre, $note, $image, $synopsis) {
        $this->id = $id;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->genre = $genre;
        $this->note = $note;
        $this->image = $image;
        $this->synopsis = $synopsis;
    }


}
?>
