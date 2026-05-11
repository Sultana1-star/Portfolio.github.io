<?php require("./composant/header3.php"); ?>


<?php

$erreurs = [];
$succes = false;



function nettoyer($data)
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function champ_requis($valeur)
{
    return !empty(trim($valeur));
}

$nom = '';
$email = '';
$entreprise = '';
$typeProjet = '';
$budget = '';
$description = '';
$delai = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = nettoyer($_POST['nom'] ?? '');
    $email = nettoyer($_POST['email'] ?? '');
    $entreprise = nettoyer($_POST['entreprise'] ?? '');
    $typeProjet = nettoyer($_POST['typeProjet'] ?? '');
    $budget = nettoyer($_POST['budget'] ?? '');
    $description = nettoyer($_POST['description'] ?? '');
    $delai = nettoyer($_POST['delai'] ?? '');

    // Validation

    if (!champ_requis($nom)) {
        $erreurs['nom'] = "Le nom est obligatoire.";
    }

    if (!champ_requis($email)) {
        $erreurs['email'] = "L'email est obligatoire.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs['email'] = "Adresse email invalide.";
    }

    if (!champ_requis($entreprise)) {
        $erreurs['entreprise'] = "Le nom de l'entreprise est obligatoire.";
    }

    if (!champ_requis($description)) {
        $erreurs['description'] = "La description du projet est obligatoire.";
    }

    if (!champ_requis($typeProjet)) {
        $erreurs['typeProjet'] = "Le type de projet est obligatoire.";
    }

    if (!champ_requis($budget)) {
        $erreurs['budget'] = "Le budget est obligatoire.";
    }

    if (!champ_requis($delai)) {
        $erreurs['delai'] = "Le délai est obligatoire.";
    }

    // Succès

    if (empty($erreurs)) {
        $succes = true;
    }
}
?>

<section class="project-form">

    <?php if ($succes): ?>

        <p class="succes">
            Votre demande a été envoyée avec succès !
        </p>

    <?php endif; ?>

    <form method="POST">

        <fieldset>

            <legend>Demande de projet</legend>

            <label for="nom">Nom du client</label>
            <input type="text" id="nom" name="nom" value="<?= $nom ?>">

            <small class="erreur">
                <?= $erreurs['nom'] ?? '' ?>
            </small>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= $email ?>">

            <small class="erreur">
                <?= $erreurs['email'] ?? '' ?>
            </small>

            <label for="entreprise">Entreprise</label>
            <textarea id="entreprise" name="entreprise"><?= $entreprise ?></textarea>

            <small class="erreur">
                <?= $erreurs['entreprise'] ?? '' ?>
            </small>

            <label for="description">Description du projet</label>
            <textarea id="description" name="description"><?= $description ?></textarea>

            <small class="erreur">
                <?= $erreurs['description'] ?? '' ?>
            </small>

            <label for="typeProjet">Type de projet</label>
            <input type="text" id="typeProjet" name="typeProjet" value="<?= $typeProjet ?>">

            <small class="erreur">
                <?= $erreurs['typeProjet'] ?? '' ?>
            </small>

            <label for="budget">Budget</label>
            <input type="text" id="budget" name="budget" value="<?= $budget ?>">

            <small class="erreur">
                <?= $erreurs['budget'] ?? '' ?>
            </small>

            <label for="delai">Délai</label>
            <input type="date" id="delai" name="delai" value="<?= $delai ?>">

            <small class="erreur">
                <?= $erreurs['delai'] ?? '' ?>
            </small>

            <button type="submit">
                Envoyer
            </button>

        </fieldset>

    </form>

</section>

<?php require("./composant/footer.php"); ?>