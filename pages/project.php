<?php
require_once 'data/dev_projects.php';

// Récupérer l'ID du projet depuis l'URL
$project_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Vérifier si le projet existe
if (!isset($dev_projects[$project_id])) {
    echo '<section class="section"><div class="container"><h2>Projet non trouvé</h2><p>Le projet demandé n\'existe pas.</p><a href="?page=dev">Retour aux projets</a></div></section>';
    return;
}

$project = $dev_projects[$project_id];
?>

<section id="project-detail" class="section">
    <div class="container">
        <div class="project-header">
            <h1 class="project-title"><?php echo $project['title']; ?></h1>
            <p class="project-meta">
                <?php if (isset($project['date'])): ?>
                    <span class="project-date"><?php echo $project['date']; ?></span>
                <?php endif; ?>
                <?php if (isset($project['role'])): ?>
                    <span class="project-role"><?php echo $project['role']; ?></span>
                <?php endif; ?>
            </p>
            <p class="project-description"><?php echo $project['description']; ?></p>
        </div>

        <!-- Description longue -->
        <?php if (isset($project['long_description'])): ?>
        <div class="project-description-full">
            <h2>À propos du projet</h2>
            <p><?php echo $project['long_description']; ?></p>
        </div>
        <?php endif; ?>

        <!-- Galerie d'images -->
        <?php if (isset($project['gallery']) && !empty($project['gallery'])): ?>
        <div class="project-gallery-section">
            <h2>Galerie</h2>
            <div class="project-gallery">
                <?php foreach($project['gallery'] as $img): ?>
                    <div class="gallery-img">
                        <img src="<?php echo $img; ?>" alt="<?php echo $project['title']; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Technologies et liens -->
        <div class="project-details">
            <div class="project-tech-section">
                <h3>Technologies utilisées</h3>
                <div class="tech-list">
                    <?php foreach($project['technologies'] as $tech): ?>
                        <span class="tech-tag"><?php echo $tech; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if (isset($project['github'])): ?>
                <div class="project-links">
                    <a href="<?php echo $project['github']; ?>" target="_blank" class="btn-primary">Voir sur GitHub</a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Navigation -->
        <div class="project-navigation">
            <a href="?page=dev" class="btn-secondary">Retour aux projets</a>
            <?php if ($project_id > 0): ?>
                <a href="?page=project&id=<?php echo $project_id - 1; ?>" class="btn-secondary">Projet précédent</a>
            <?php endif; ?>
            <?php if ($project_id < count($dev_projects) - 1): ?>
                <a href="?page=project&id=<?php echo $project_id + 1; ?>" class="btn-secondary">Projet suivant</a>
            <?php endif; ?>
        </div>
    </div>
</section>
