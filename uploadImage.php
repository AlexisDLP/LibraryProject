<?php

$titre = "Télécharger une nouvelle image";

$contenu = '<form action="" method="post" enctype="multipart/form-data">
    <label for="file">Nom du fichier: </label>
    <input type="file" name="file" id="file"><br/>
    <input type="submit" name="submit" value="submit">
</form>';

if (isset($_POST["submit"])) {
    $fileType = $_FILES["file"]["type"];

    if (($fileType == "image/gif") ||
        ($fileType == "image/jpeg") ||
        ($fileType == "image/jpg") ||
        ($fileType == "image/png")) {
 
        if (file_exists("Images/Books/" . $_FILES["file"]["name"])) {
            echo "Le fichier existe déjà";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], "Images/Books/" . $_FILES["file"]["name"]);
            echo "Uploaded in " . "Images/Books/" . $_FILES["file"]["name"];
        }
    }
}
include './Template.php';
?>

