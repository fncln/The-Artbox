<?php
    // Inclusion des dépendances
    include_once('includes/header.php');
    include_once('includes/oeuvres.php');

    // 1. Contrôle de sécurité : vérification de la présence et de la validité numérique du paramètre 'id' dans l'URL
    if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
        header('Location: index.php');
        exit();
    }

    $id = (int) $_GET['id'];
    $oeuvreTrouvee = null;

    // 2. Recherche explicite de l'œuvre correspondante dans le tableau $oeuvres via son identifiant 'id'
    foreach ($oeuvres as $oeuvre) {
        if ($oeuvre['id'] === $id) {
            $oeuvreTrouvee = $oeuvre;
            break; // Arrêt de la boucle dès que l'œuvre est identifiée
        }
    }

    // 3. Redirection de sécurité vers l'accueil si aucun identifiant correspondant n'est trouvé dans le tableau
    if ($oeuvreTrouvee === null) {
        header('Location: index.php');
        exit();
    }
?>

<main>
    <!-- Affichage dynamique des détails de l'œuvre sélectionnée -->
    <article id="detail-oeuvre">
        <div id="img-oeuvre">
            <img src="<?php echo $oeuvreTrouvee['image']; ?>" alt="<?php echo $oeuvreTrouvee['title']; ?>">
        </div>
        <div id="contenu-oeuvre">
            <h1><?php echo $oeuvreTrouvee['title']; ?></h1>
            <p class="description"><?php echo $oeuvreTrouvee['artiste']; ?></p>
            <p class="description-complete">
                <?php echo $oeuvreTrouvee['description']; ?>
            </p>
        </div>
    </article>
</main>

<?php include_once('includes/footer.php'); ?>