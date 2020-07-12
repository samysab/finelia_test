<?php
session_start();

if (isset($_POST['formNoteStudent'])) {

    $fistname = htmlspecialchars($_POST['lastName']);
    $lastname = htmlspecialchars($_POST['firstName']);
    $matiere = htmlspecialchars($_POST['matiere']);
    $note = htmlspecialchars($_POST['note']);

    if (!empty($_POST['lastName']) and !empty($_POST['firstName']) and !empty($_POST['matiere']) and !empty($_POST['note'])) {

        include('classes/Etudiant.php');

        Etudiant::insertNewStudent($fistname, $lastname);

        header('location:../../formulaire.php?error=yes');
        exit;
    } else {
        header('location:../../formulaire.php?error=field_blank');
    }
}
?>