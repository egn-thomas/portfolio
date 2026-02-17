<?php
// Configuration générale du site

define('SITE_NAME', 'Portfolio IMAC');
define('SITE_URL', 'https://portfolio-thomas-eugene.onrender.com/');
define('BASE_PATH', __DIR__);

// Informations personnelles
define('AUTHOR_NAME', 'Thomas Eugène');
define('AUTHOR_EMAIL', 'thomas.eugene.62250@gmail.com');
define('AUTHOR_LINKEDIN', 'https://linkedin.com/in/egn-thomas');
define('AUTHOR_GITHUB', 'https://github.com/egn-thomas');

// Configuration Cloudflare R2
define('R2_ACCOUNT_ID', '2d22915c5dcb387fa89b6ebd7283c3b0');
define('R2_ACCESS_KEY', ''); // À remplir si API listing ne fonctionne pas
define('R2_SECRET_KEY', ''); // À remplir si API listing ne fonctionne pas
define('R2_BUCKET', 'images'); // À adapter si nécessaire
define('R2_ENDPOINT', 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev');

// Fonctions utiles
function get_page() {
    return isset($_GET['page']) ? $_GET['page'] : 'home';
}

function is_active($page) {
    return get_page() === $page ? 'active' : '';
}
?>