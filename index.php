<?php
// Inclusion du squelette HTML haut et du tableau des données des œuvres
include_once ('includes/header.php');
include_once('includes/oeuvres.php');
?>
    <main>
        <div id="liste-oeuvres">
            <!-- Parcours dynamique du tableau $oeuvres pour afficher la grille de vignettes -->
            <?php foreach ($oeuvres as $oeuvre) : ?>
                <article class="oeuvre">
                    <!-- Génération du lien dynamique vers la page de détail avec transmission de l'ID via l'URL -->
                    <a href="oeuvre.php?id=<?php echo $oeuvre['id']; ?>">
                        <img src="<?php echo $oeuvre['image']; ?>" alt="<?php echo $oeuvre['title']; ?>">
                        <h2><?php echo $oeuvre['title']; ?></h2>
                        <p class="description"><?php echo $oeuvre['artiste']; ?></p>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </main>
<?php 
// Inclusion du pied de page HTML
include_once ('includes/footer.php');
?> 