<?php
// Récupérer les paramètres
$type = isset($_GET['type']) ? $_GET['type'] : 'illustration';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Inclure le fichier de données selon le type
$data_files = [
    'illustration' => 'data/illustrations.php',
    'photo' => 'data/photos.php',
    '3d' => 'data/3d_models.php'
];

if (!isset($data_files[$type])) {
    echo '<section class="section"><div class="container"><h2>Type non trouvé</h2><p>Le type d\'œuvre demandé n\'existe pas.</p><a href="?page=home">Retour à l\'accueil</a></div></section>';
    return;
}

require_once $data_files[$type];

// Définir le nom de la variable selon le type
$variable_names = [
    'illustration' => 'illustrations',
    'photo' => 'photos',
    '3d' => 'models_3d'
];

$variable_name = $variable_names[$type] ?? $type . 's';

// Vérifier si la variable existe
if (!isset($$variable_name)) {
    echo '<section class="section"><div class="container"><h2>Données non trouvées</h2><p>Les données pour ce type d\'œuvre ne sont pas disponibles.</p><a href="?page=home">Retour à l\'accueil</a></div></section>';
    return;
}

$items = $$variable_name;

// Vérifier si l'item existe
if (!isset($items[$id])) {
    echo '<section class="section"><div class="container"><h2>Œuvre non trouvée</h2><p>L\'œuvre demandée n\'existe pas.</p><a href="?page=' . $type . '">Retour à la galerie</a></div></section>';
    return;
}

$item = $items[$id];

// Titres des sections selon le type
$section_titles = [
    'illustration' => 'Illustration',
    'photo' => 'Photographie',
    '3d' => 'Modélisation 3D'
];

$section_title = $section_titles[$type] ?? ucfirst($type);
?>

<section id="artwork" class="section">
    <div class="container">
        <div class="artwork-header">
            <h1 class="artwork-title"><?php echo $item['title']; ?></h1>
            <p class="artwork-description project-description-full"><?php echo $item['description']; ?></p>
            <?php if (isset($item['date'])): ?>
                <p class="artwork-date">Créé en <?php echo $item['date']; ?></p>
            <?php endif; ?>
        </div>

        <div class="artwork-content">
            <div class="artwork-image-full">
                <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>">
            </div>
        </div>

        <div class="artwork-navigation">
            <a href="?page=<?php echo $type; ?>" class="btn-secondary">Retour à la galerie</a>
            <?php if ($id > 0): ?>
                <a href="?page=artwork&type=<?php echo $type; ?>&id=<?php echo $id - 1; ?>" class="btn-secondary">Précédent</a>
            <?php endif; ?>
            <?php if ($id < count($items) - 1): ?>
                <a href="?page=artwork&type=<?php echo $type; ?>&id=<?php echo $id + 1; ?>" class="btn-secondary">Suivant</a>
            <?php endif; ?>
        </div>
    </div>
</section>