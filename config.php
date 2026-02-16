<?php
// Configuration générale du site

define('SITE_NAME', 'Portfolio IMAC');
define('SITE_URL', 'http://localhost/portfolio-imac');
define('BASE_PATH', __DIR__);

// Informations personnelles
define('AUTHOR_NAME', 'Thomas Eugène');
define('AUTHOR_EMAIL', 'thomas.eugene.62250@gmail.com');
define('AUTHOR_LINKEDIN', 'https://linkedin.com/in/votre-profil');
define('AUTHOR_GITHUB', 'https://github.com/votre-profil');

// Fonctions utiles
function get_page() {
    return isset($_GET['page']) ? $_GET['page'] : 'home';
}

function is_active($page) {
    return get_page() === $page ? 'active' : '';
}
?>