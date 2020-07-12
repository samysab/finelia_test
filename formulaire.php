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
        <form class="formNotes" action="libs/php/formEtudiantNote.php" method="post">
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
                    <input name="matiere" type="text" class="form-control" id="matiere" placeholder="Matiere">
                </div>
                <div class="form-group">
                    <input class="form-control" hidden>
                </div>
                <div class="form-group">
                    <label for="noteInput">Note</label>
                    <input name="note" type="number" class="form-control" id="note" placeholder="Votre note">
                </div>
                <div class="form-group">
                    <label for="matiereInput">Coefficient</label>
                    <input name="coeff" type="number" class="form-control" id="coeff" placeholder="Votre coefficient">
                </div>
            </div>
            <button type="submit" name="formNoteStudent" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</html>