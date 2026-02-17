<?php
// Version simplifiée d'artwork pour les dessins
// Récupérer les paramètres
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Inclure les données des dessins
require_once 'data/dessins.php';

// Vérifier si l'item existe
if (!isset($dessins[$id])) {
    echo '<section class="section"><div class="container"><h2>Dessin non trouvé</h2><p>Le dessin demandé n\'existe pas.</p><a href="?page=dessins">Retour à la galerie</a></div></section>';
    return;
}

$item = $dessins[$id];
?>

<section id="artwork" class="section">
    <div class="container">
        <div class="artwork-content">
            <div class="artwork-image-full">
                <img src="<?php echo $item['image']; ?>" alt="Dessin <?php echo ($id + 1); ?>">
            </div>
        </div>

        <div class="artwork-navigation">
            <a href="?page=dessins" class="btn-secondary">Retour à la galerie</a>
            <?php if ($id > 0): ?>
                <a href="?page=miniArtwork&id=<?php echo $id - 1; ?>" class="btn-secondary">Précédent</a>
            <?php endif; ?>
            <?php if ($id < count($dessins) - 1): ?>
                <a href="?page=miniArtwork&id=<?php echo $id + 1; ?>" class="btn-secondary">Suivant</a>
            <?php endif; ?>
        </div>
    </div>
</section>
