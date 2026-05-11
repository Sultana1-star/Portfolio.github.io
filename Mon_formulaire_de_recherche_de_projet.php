<?php require("./composant/header3.php"); ?>

<?php

function nettoyer($data)
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

$projets = [

    [
        'titre' => 'Répertoire téléphonique',
        'description' => 'Application de gestion de contacts.',
        'technologies' => ['C', 'MySQL'],
        'lien' => '/Astou-diop/projet1.php'
    ],

    [
        'titre' => 'Poubelle intelligente',
        'description' => 'Projet IoT utilisant ESP32.',
        'technologies' => ['Arduino', 'ESP32'],
        'lien' => '/Astou-diop/projet2.php'
    ],

    [
        'titre' => 'Contrôle RFID',
        'description' => 'Système de sécurité avec badge RFID.',
        'technologies' => ['Arduino', 'RFID'],
        'lien' => '/Astou-diop/projet3.php'
    ]

];

$mot_cle = nettoyer($_GET['q'] ?? '');
$resultats = [];

if (!empty($mot_cle)) {

    foreach ($projets as $projet) {

        $contenu = strtolower(
            $projet['titre'] . ' ' .
            $projet['description'] . ' ' .
            implode(' ', $projet['technologies'])
        );

        if (stripos($contenu, strtolower($mot_cle)) !== false) {
            $resultats[] = $projet;
        }
    }

} else {

    $resultats = $projets;
}
?>

<main>

    <section class="search-project">

        <form method="GET">

            <fieldset>

                <h1>Recherche de projets</h1>

                <input
                    type="text"
                    name="q"
                    placeholder="Rechercher un projet..."
                    value="<?= nettoyer($_GET['q'] ?? '') ?>"
                >

                <button type="submit">
                    Rechercher
                </button>

            </fieldset>

        </form>

        <div class="resultats">

            <?php if (empty($resultats)) : ?>

                <p>Aucun projet trouvé.</p>

            <?php else : ?>

                <?php foreach ($resultats as $projet) : ?>

                    <div class="projet carte-projet">

                        <h3>
                            <?= nettoyer($projet['titre']) ?>
                        </h3>

                        <p>
                            <?= nettoyer($projet['description']) ?>
                        </p>

                        <div class="technologies">

                            <?php foreach ($projet['technologies'] as $tech) : ?>

                                <span class="badge">
                                    <?= nettoyer($tech) ?>
                                </span>

                            <?php endforeach; ?>

                        </div>

                        <a
                            href="<?= nettoyer($projet['lien']) ?>"
                            class="btn-projet"
                        >
                            Voir le projet
                        </a>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </section>

    <article class="contact-info">

        <h2>Contact professionnel</h2>

        <p>📞 Mon numéro : 77 144 83 77</p>

    </article>

</main>

<?php require("./composant/footer.php"); ?>