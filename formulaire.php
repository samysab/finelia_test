<?php
if (isset($_POST['btn_ajout'])) {
    if (!empty($_POST['lastName']) and !empty($_POST['firstName']) and !empty($_POST['matiere']) and !empty($_POST['note']) and !empty($_POST['coefficientInput'])) {

        include('classes/Etudiant.php');
        include('classes/Matiere.php');
        include('classes/Note.php');

        $id_etudiant = Etudiant::insertNewStudent($_POST['firstName'], $_POST['lastName']);
        $id_matiere = Matiere::insertNewMatiere($_POST['matiere']);
        Note::insertNewNote($_POST['note'], $_POST['coefficientInput'], $id_etudiant, $id_matiere);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire</title>
    <link rel="stylesheet" href="libs/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<header>
    <?php
    include 'libs/php/header.php';
    ?>
</header>
<main>
    <div class="jumbotron col-md-6 mx-auto mt-5">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == "field_blank") {
            echo '<div class="alert alert-danger col-md-12" role="alert" style="margin-top: 20px; text-align: center;"> Tous les champs doivent etres remplis !</div>';
        }
        ?>
        <form class="formNotes" id="formu" action="libs/php/formEtudiantNote.php" method="post">
            <div class="row row-cols-2">
                <div class="form-group">
                    <label for="lastNameInput">Nom</label>
                    <input type="text" class="form-control" name="lastName" id="lastNameInput"
                           aria-describedby="lastNameHelp"
                           placeholder="Nom de l'etudiant">
                </div>
                <div class="form-group">
                    <label for="firstNameInput">Prenom</label>
                    <input name="firstName" type="text" class="form-control" id="firstNameInput"
                           aria-describedby="firstNameHelp"
                           placeholder="Prénom de l'etudiant">
                </div>
                <div class="form-group">
                    <label for="matiereInput">Matiere</label>
                    <input name="matiere0" type="text" class="form-control" id="matiere" placeholder="Matiere">
                </div>
                <div class="form-group">
                    <input class="form-control" hidden>
                </div>
                <div class="form-group">
                    <label for="noteInput">Note</label>
                    <input name="note0" type="number" class="form-control" id="note" placeholder="Votre note">
                </div>
                <div class="form-group">
                    <label for="matiereInput">Coefficient</label>
                    <input name="coefficientInput0" type="number" class="form-control" id="coeff"
                           placeholder="Votre coefficient">
                </div>
            </div>
            <button type="submit" name="formNoteStudent" class="btn btn-primary">Calculer ma moyenne</button>
            <a onclick="ajout()" name="btn_ajout" class="btn btn-primary">Ajouter une note</a>

        </form>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

<script>
    var itterationNote = 1;

    function ajout() {
        var matiereId = "matiere" + itterationNote;
        var noteId = "note" + itterationNote;
        var coeffId = "coefficientInput" + itterationNote;
        $("#formu").append(`
            <div class="row row-cols-2">
                <div class="form-group">
                    <label for="matiereInput">Matiere</label>
                    <input name="${matiereId}" type="text" class="form-control" id="matiere" placeholder="Matiere">
                </div>
                <div class="form-group">
                    <input class="form-control" hidden>
                </div>
                <div class="form-group">
                    <label for="noteInput">Note</label>
                    <input name="${noteId}" type="number" class="form-control" id="note" placeholder="Votre note">
                </div>
                <div class="form-group">
                    <label for="matiereInput">Coefficient</label>
                    <input name="${coeffId}" type="number" class="form-control" id="coeff"
                           placeholder="Votre coefficient">
                </div>
            </div>`
        );
        itterationNote++;
    }

    $("#formu").submit(function (e) {
        e.preventDefault();
        var lastname = document.getElementById("lastNameInput").value;
        var firstname = document.getElementById("firstNameInput").value;
        for (var i = 0; i < itterationNote; i++) {
            var note = document.getElementsByName("note" + i)[0].value;
            console.log(note);
            var matiere = document.getElementsByName("matiere" + i)[0].value;
            var coefficient = document.getElementsByName("coefficientInput" + i)[0].value;
            let xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    console.log(xhttp.responseText);
                    alert('OK');
                }
            }
            xhttp.open('POST', 'libs/php/formEtudiantNote.php?formName=formNoteStudent&note=' + note + '&matiere=' + matiere + '&coefficientInput=' + coefficient+ '&firstName=' + firstname+"&lastName=" + lastname );
            xhttp.send();
        }
    })
</script>
</body>
</html>
