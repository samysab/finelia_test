<?php
session_start();

if (isset($_POST['formNoteStudent'])) {

    $fistname = htmlspecialchars($_POST['lastName']);
    $lastname = htmlspecialchars($_POST['firstName']);
    $matiere = htmlspecialchars($_POST['matiere']);
    $note = htmlspecialchars($_POST['note']);
    $coeff = htmlspecialchars($_POST['coefficientInput']);

    if (!empty($_POST['lastName']) and !empty($_POST['firstName']) and !empty($_POST['matiere']) and !empty($_POST['note']) and !empty($_POST['coefficientInput'])) {

        include('classes/Etudiant.php');
        include('classes/Matiere.php');
        include('classes/Note.php');

        $id_etudiant = Etudiant::insertNewStudent($fistname, $lastname);
        Matiere::insertNewMatiere($matiere);
        Note::insertNewNote($note,$coeff, $id_etudiant);
        header('location:../../formulaire.php?error=yes');
        exit;
    } else {
        header('location:../../formulaire.php?error=field_blank');
    }
}
?>