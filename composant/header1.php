<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma présentation</title>

    <link rel="stylesheet" href="style1.css">

    <style>
        .actif {
            color: #45a3bb;
            font-weight: bold;
            border-bottom: 2px solid #45a3bb;
        }
    </style>
</head>

<body>
    <?php $page_courante = basename($_SERVER['PHP_SELF']); ?>

<?php require("./fonction.php"); ?>

<header>
    <nav class="container">

        <a href="index.php" <?= actif('index.php') ?>>
            Présentation
        </a>

        <a href="Mes_competences_et_mes_experiences.php" <?= actif('Mes_competences_et_mes_experiences.php') ?>>
            Compétences
        </a>

        <a href="Mon_formulaire_de_contact.php" <?= actif('Mon_formulaire_de_contact.php') ?>>
            Contact
        </a>

        <a href="Mon_formulaire_de_projet.php" <?= actif('Mon_formulaire_de_projet.php') ?>>
            Projet
        </a>

        <a href="Mon_formulaire_de_recherche_de_projet.php" <?= actif('Mon_formulaire_de_recherche_de_projet.php') ?>>
            Recherche
        </a>

    </nav>
</header>