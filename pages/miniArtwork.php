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
                <?php if ($id !== null):
                    // calculate bounds for previous/next within dessins list if available
                    require_once 'data/dessins.php';
                    $max = count($dessins) - 1;
                    if ($id > 0): ?>
                        <a href="?page=miniArtwork&id=<?php echo $id - 1; ?>" class="image-arrow prev" aria-label="Précédent">‹</a>
                    <?php endif;
                    if ($id !== null && $id < $max): ?>
                        <a href="?page=miniArtwork&id=<?php echo $id + 1; ?>" class="image-arrow next" aria-label="Suivant">›</a>
                    <?php endif;
                endif; ?>
                <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt="Artwork">
            </div>
        </div>
        <div class="artwork-navigation">
                    <?php
                    // Construire l'URL de retour : utiliser return_page/return_id si fournis, sinon revenir à dessins
                    $returnPage = isset($_GET['return_page']) ? $_GET['return_page'] : null;
                    $returnId = isset($_GET['return_id']) ? (int)$_GET['return_id'] : null;
                    if ($returnPage) {
                        $returnUrl = '?page=' . rawurlencode($returnPage);
                        if ($returnId !== null) {
                            $returnUrl .= '&id=' . $returnId;
                        }
                    } else {
                        $returnUrl = '?page=dessins';
                    }
                    ?>
                    <a href="<?php echo $returnUrl; ?>" class="btn-secondary">Retour à la galerie</a>
                </div>
    </div>
</section>
