<?php
    include_once('includes/header.php');
    include_once('includes/oeuvres.php');

    // 1. Vérification de la présence de l'ID dans l'URL
    if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
        header('Location: index.php');
        exit();
    }

    $id = (int) $_GET['id'];
    $oeuvreTrouvee = null;

    // 2. Recherche de l'œuvre correspondant à l'ID dans le tableau $oeuvres
    foreach ($oeuvres as $o) {
        if ($o['id'] === $id) {
            $oeuvreTrouvee = $o;
            break;
        }
    }

    // 3. Si l'œuvre n'existe pas (ex: id=99), redirection vers l'accueil
    if ($oeuvreTrouvee === null) {
        header('Location: index.php');
        exit();
    }
?>

<main>
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