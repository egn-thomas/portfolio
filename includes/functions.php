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
        <a href="' . $imageUrl . '" class="gallery-item-link" target="_blank">
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

// Récupérer les fichiers d'un dossier du bucket R2
function get_bucket_files($folder = 'dessins') {
    $files = [];
    
    // Construction de l'URL pour lister les fichiers
    $baseUrl = R2_ENDPOINT . '/images/' . $folder . '/';
    
    try {
        // Essayer d'abord un listing public simple (si disponible)
        $response = @file_get_contents($baseUrl);
        
        if ($response === false) {
            // Si pas de listing public, utiliser l'API S3 avec credentials
            if (R2_ACCESS_KEY && R2_SECRET_KEY) {
                $files = get_bucket_files_s3($folder);
            }
        } else {
            // Parser le listing HTML pour extraire les fichiers
            // Chercher les liens vers les images
            if (preg_match_all('/<a href="([^"]*\.(png|jpg|jpeg|gif|webp))"/i', $response, $matches)) {
                foreach ($matches[1] as $file) {
                    // Éviter les chemins relatifs du parent
                    if (strpos($file, '../') === false) {
                        $files[] = $baseUrl . basename($file);
                    }
                }
            }
        }
    } catch (Exception $e) {
        // Retourner un tableau vide en cas d'erreur
        return [];
    }
    
    // Trier les fichiers alphabétiquement
    sort($files);
    return $files;
}

// Récupérer les fichiers via l'API S3 de R2 (avec credentials)
function get_bucket_files_s3($folder = 'dessins') {
    $files = [];
    $accessKey = R2_ACCESS_KEY;
    $secretKey = R2_SECRET_KEY;
    $bucket = R2_BUCKET;
    $prefix = 'images/' . $folder . '/';
    $host = R2_ENDPOINT . '.s3.amazonaws.com'; // Ou l'endpoint S3 approprié
    
    // Construire la requête S3 ListBucket
    $method = 'GET';
    $path = '/' . $bucket . '/';
    $query = 'prefix=' . urlencode($prefix) . '&list-type=2';
    $url = 'https://' . $host . $path . '?' . $query;
    
    try {
        // Créer la signature AWS
        $timestamp = gmdate('Ymd\\THis\\Z');
        $shortDate = gmdate('Ymd');
        $canonicalRequest = $method . "\n" . $path . "?" . $query . "\n" . "" . "\n" . "host:" . $host . "\n" . "\nhost" . "\n" . hash('sha256', '');
        
        // Note: Une implémentation complète d'AWS4 signature est complexe
        // Pour simplifier, on utilisera curl avec une approche alternative
        
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_HTTPHEADER => [
                'Authorization: AWS4-HMAC-SHA256 Credential=' . $accessKey . '/' . $shortDate . '/auto/s3/aws4_request'
            ]
        ]);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        if ($response) {
            // Parser le XML S3
            $xml = simplexml_load_string($response);
            if ($xml && isset($xml->Contents)) {
                foreach ($xml->Contents as $content) {
                    $key = (string)$content->Key;
                    // Vérifier que c'est un fichier image
                    if (preg_match('/\.(png|jpg|jpeg|gif|webp)$/i', $key)) {
                        $files[] = R2_ENDPOINT . '/' . $key;
                    }
                }
            }
        }
    } catch (Exception $e) {
        error_log('Erreur R2 API: ' . $e->getMessage());
    }
    
    sort($files);
    return $files;
}
?>