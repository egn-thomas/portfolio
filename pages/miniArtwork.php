<?php
// Version simplifiée d'artwork pour afficher une image seule
// Accepte soit `id` (index dans data/dessins.php) soit `img` (URL encodée)
// Récupérer les paramètres
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$imgParam = isset($_GET['img']) ? $_GET['img'] : null;

// Si un param img est fourni, l'utiliser directement
if ($imgParam) {
    $imageUrl = urldecode($imgParam);
} else {
    // Sinon tenter d'utiliser la collection dessins
    require_once 'data/dessins.php';
    if ($id === null || !isset($dessins[$id])) {
        echo '<section class="section"><div class="container"><h2>Image non trouvée</h2><p>L\'image demandée n\'existe pas.</p><a href="?page=dessins">Retour à la galerie</a></div></section>';
        return;
    }
    $imageUrl = $dessins[$id]['image'];
}
?>

<section id="artwork" class="section">
    <div class="container">
        <div class="artwork-content">
            <div class="artwork-image-full">
                <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt="Artwork">
            </div>
        </div>
        <div class="artwork-navigation">
            <a href="?page=dessins" class="btn-secondary">Retour à la galerie</a>
        </div>
    </div>
</section>
