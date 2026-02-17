<?php
// Fonctions utiles pour le portfolio

// Afficher une galerie de projets
function display_gallery($projects, $type = 'dev') {
    $html = '<div class="gallery">';
    $index = 0;
    foreach ($projects as $project) {
        $link = $type === 'dev' ? "?page=project&id=$index" : "?page=artwork&type=$type&id=$index";
        $html .= '
        <a href="' . $link . '" class="gallery-item-link">
            <div class="gallery-item">
                <img src="' . $project['image'] . '" alt="' . $project['title'] . '">
                <div class="item-content">
                    <h3 class="item-title">' . $project['title'] . '</h3>
                    <p class="item-description">' . $project['description'] . '</p>
                </div>
            </div>
        </a>';
        $index++;
    }
    $html .= '</div>';
    return $html;
}

// Afficher une liste de projets de développement
function display_projects($projects) {
    $html = '<div class="projects-list">';
    $index = 0;
    foreach ($projects as $project) {
        $html .= '
        <div class="project-card">
            <div class="project-image">
                <img src="' . $project['image'] . '" alt="' . $project['title'] . '">
            </div>
            <div class="project-info">
                <h3><a href="?page=project&id=' . $index . '">' . $project['title'] . '</a></h3>
                <p>' . $project['description'] . '</p>
                <div class="project-tech">
                    ' . implode(', ', $project['technologies']) . '
                </div>
                ' . (isset($project['github']) ? '<a href="' . $project['github'] . '" target="_blank" class="btn-secondary">GitHub</a>' : '') . '
            </div>
        </div>';
        $index++;
    }
    $html .= '</div>';
    return $html;
}

// Afficher une compétence avec barre de progression
function display_skill($name, $level) {
    return '
    <div class="skill-card">
        <div class="skill-name">' . $name . '</div>
        <div class="skill-bar">
            <div class="skill-progress" style="width: ' . $level . '%"></div>
        </div>
    </div>';
}

// Afficher une galerie simple (sans titre/description) - pour les dessins
function display_gallery_simple($images) {
    $html = '<div class="gallery gallery-simple">';
    $index = 0;
    foreach ($images as $image) {
        $imageUrl = is_array($image) ? $image['image'] : $image;
        $html .= '
        <a href="?page=miniArtwork&id=' . $index . '" class="gallery-item-link">
            <div class="gallery-item gallery-item-simple">
                <img src="' . $imageUrl . '" alt="Dessin ' . ($index + 1) . '">
            </div>
        </a>';
        $index++;
    }
    $html .= '</div>';
    return $html;
}

// Sécuriser les entrées
function clean_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}
?>