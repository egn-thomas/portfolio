<?php
require_once 'data/all_projects.php';

// Récupérer les tags sélectionnés depuis le formulaire
$selected_tags = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tags'])) {
    $selected_tags = (array)$_POST['tags'];
}

// Récupérer les tags depuis l'URL si présents
if (isset($_GET['tags'])) {
    if (is_array($_GET['tags'])) {
        // tags[] style
        $selected_tags = array_filter($_GET['tags']);
    } else {
        // comma-separated string (fallback)
        $selected_tags = array_filter(explode(',', $_GET['tags']));
    }
}

// Filtrer les projets
$all_tags = get_all_tags();
$projects = filter_projects_by_tags($selected_tags);

// Trier par date descendante
usort($projects, function($a, $b) {
    return strcmp($b['date'] ?? '', $a['date'] ?? '');
});

// Grouper les projets par type pour l'affichage
$grouped = [];
foreach ($projects as $project) {
    $type = $project['type'] ?? 'autre';
    if (!isset($grouped[$type])) {
        $grouped[$type] = [];
    }
    $grouped[$type][] = $project;
}

// Ordre d'affichage des sections
$type_order = ['dev', 'illustration', '3d', 'photo', 'graphisme', 'dessin'];
$type_labels = [
    'dev' => 'Développement',
    'illustration' => 'Illustration',
    '3d' => 'Modélisation 3D',
    'photo' => 'Photographie',
    'graphisme' => 'Graphisme',
    'dessin' => 'Dessin'
];
?>

<section id="autres" class="section">
    <div class="container">
        <h2 class="section-title">Autres</h2>
        <p class="section-subtitle">Tous les projets - Filtrez par tags</p>
        
        <!-- Système de filtrage par tags -->
        <div class="filter-section">
            <div class="filter-container">
                <h3 class="filter-title">Filtrer par tags</h3>
                <form id="filter-form" class="filter-form" method="get">
                    <input type="hidden" name="page" value="autres">
                    <div class="filter-tags">
                        <?php
                        sort($all_tags);
                        // Compter les projets par tag pour affichage
                        $tag_counts = [];
                        foreach ($all_projects as $project) {
                            if (isset($project['tags'])) {
                                foreach ($project['tags'] as $tag) {
                                    $tag_counts[$tag] = ($tag_counts[$tag] ?? 0) + 1;
                                }
                            }
                        }
                        
                        foreach ($all_tags as $tag):
                            $tag_slug = preg_replace('/[^a-z0-9]+/', '-', strtolower($tag));
                            $is_checked = in_array($tag, $selected_tags);
                            $count = $tag_counts[$tag] ?? 0;
                        ?>
                            <label class="filter-checkbox">
                                <input 
                                    type="checkbox" 
                                    name="tags[]" 
                                    value="<?php echo htmlspecialchars($tag); ?>"
                                    <?php echo $is_checked ? 'checked' : ''; ?>
                                    class="filter-checkbox-input"
                                    data-tag="<?php echo htmlspecialchars($tag); ?>"
                                >
                                <span class="checkbox-custom"></span>
                                <span class="tag-label"><?php echo htmlspecialchars($tag); ?></span>
                                <span class="tag-count">(<?php echo $count; ?>)</span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                    <div class="filter-buttons">
                        <button type="submit" class="btn-primary btn-filter">Filtrer</button>
                        <button type="reset" class="btn-secondary btn-reset" onclick="location.href='?page=autres';">Réinitialiser</button>
                    </div>
                </form>
            </div>
            
            <!-- Affichage des tags actifs -->
            <?php if (!empty($selected_tags)): ?>
                <div class="active-filters">
                    <span class="active-filters-label">Filtres actifs :</span>
                    <?php foreach ($selected_tags as $tag): ?>
                        <span class="active-filter-tag">
                            <?php echo htmlspecialchars($tag); ?>
                            <a href="?page=autres&tags=<?php 
                                echo urlencode(implode(',', array_filter($selected_tags, function($t) use ($tag) {
                                    return $t !== $tag;
                                })));
                            ?>" class="remove-filter">×</a>
                        </span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Affichage des projets groupés -->
        <?php if (!empty($projects)): ?>
            <div class="projects-grid">
                <?php 
                foreach ($type_order as $type):
                    if (isset($grouped[$type]) && !empty($grouped[$type])):
                        $label = $type_labels[$type] ?? ucfirst($type);
                ?>
                    <div class="project-type-section">
                        <h3 class="project-type-title"><?php echo $label; ?></h3>
                        
                        <?php if ($type === 'dev'): ?>
                            <!-- Affichage des projets de développement -->
                            <div class="dev-projects-list">
                                <?php foreach ($grouped[$type] as $index => $project): ?>
                                    <div class="project-card">
                                        <div class="project-image">
                                            <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                                        </div>
                                        <div class="project-info">
                                            <h4><a href="?page=project&id=<?php echo $index; ?>&from=autres"><?php echo htmlspecialchars($project['title']); ?></a></h4>
                                            <p><?php echo htmlspecialchars($project['description']); ?></p>
                                            <div class="project-tech">
                                                <?php echo implode(', ', array_map('htmlspecialchars', $project['technologies'] ?? [])); ?>
                                            </div>
                                            <?php if (isset($project['github'])): ?>
                                                <a href="<?php echo htmlspecialchars($project['github']); ?>" target="_blank" class="btn-secondary">GitHub</a>
                                            <?php endif; ?>
                                            <div class="project-tags">
                                                <?php foreach ($project['tags'] ?? [] as $tag): ?>
                                                    <span class="project-tag"><?php echo htmlspecialchars($tag); ?></span>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <!-- Affichage des galeries pour autres types -->
                            <div class="gallery">
                                <?php foreach ($grouped[$type] as $index => $project): ?>
                                    <a href="?page=artwork&type=<?php echo $type; ?>&id=<?php echo $index; ?>&from=autres" class="gallery-item-link">
                                        <div class="gallery-item">
                                            <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                                            <div class="item-content">
                                                <h3 class="item-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                                                <?php if (isset($project['description'])): ?>
                                                    <p class="item-description"><?php echo htmlspecialchars($project['description']); ?></p>
                                                <?php endif; ?>
                                                <div class="item-tags">
                                                    <?php foreach ($project['tags'] ?? [] as $tag): ?>
                                                        <span class="item-tag"><?php echo htmlspecialchars($tag); ?></span>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php 
                    endif;
                endforeach; 
                ?>
            </div>
        <?php else: ?>
            <div class="no-results">
                <p>Aucun projet ne correspond aux tags sélectionnés.</p>
            </div>
        <?php endif; ?>
        
        <!-- Affichage du nombre total de projets -->
        <div class="results-info">
            <?php 
            $total_count = count($projects);
            $all_count = count($all_projects);
            ?>
            Affichage de <strong><?php echo $total_count; ?></strong> projet<?php echo $total_count > 1 ? 's' : ''; ?> 
            <?php if (!empty($selected_tags)): ?>
                sur <strong><?php echo $all_count; ?></strong>
            <?php endif; ?>
        </div>
    </div>
</section>
