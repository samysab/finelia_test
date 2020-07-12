<?php
session_start();

if (isset($_GET['formName']) AND $_GET['formName'] == "formNoteStudent") {

    $fistname = htmlspecialchars($_GET['lastName']);
    $lastname = htmlspecialchars($_GET['firstName']);
    $matiere = htmlspecialchars($_GET['matiere']);
    $note = htmlspecialchars($_GET['note']);
    $coeff = htmlspecialchars($_GET['coefficientInput']);

    if (!empty($_GET['lastName']) and !empty($_GET['firstName']) and !empty($_GET['matiere']) and !empty($_GET['note']) and !empty($_GET['coefficientInput'])) {

        include('classes/Etudiant.php');
        include('classes/Matiere.php');
        include('classes/Note.php');

        

        $id_etudiant = Etudiant::insertNewStudent($fistname, $lastname);
        $id_matiere = Matiere::insertNewMatiere($matiere);
        Note::insertNewNote($note, $coeff, $id_etudiant, $id_matiere);
        echo 1;
        header('location:../../formulaire.php?error=yes');
        exit;
    } else {
        echo 0;
        header('location:../../formulaire.php?error=field_blank');
    }
}else{
    echo 9;
}
?>


