<?php require("./composant/header3.php"); ?>

<?php

$messageSucces = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = nettoyer($_POST["nom"]);
    $email = nettoyer($_POST["email"]);
    $message = nettoyer($_POST["message"]);

    $messageSucces = "Votre message a bien été envoyé.";
}
?>

<main>

    <section class="contact-box">

        <form method="POST">

            <fieldset>

                <legend>Formulaire de contact</legend>

                <label for="nom">Nom complet</label>
                <input type="text" id="nom" name="nom" required autofocus>

                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Votre message</label>
                <textarea id="message" name="message" rows="6" required></textarea>

                <button type="submit">Envoyer</button>

            </fieldset>

        </form>

        <?php if ($messageSucces): ?>

            <p class="succes">
                <?= $messageSucces ?>
            </p>

        <?php endif; ?>

    </section>

    <article class="contact-info">

        <h1>Contact professionnel</h1>

        <p>📞 77 144 83 77</p>

        <p>📧 aysediop@icloud.com</p>

    </article>

</main>

<?php require("./composant/footer.php"); ?>