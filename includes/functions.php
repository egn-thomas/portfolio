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

// Récupérer les fichiers d'un dossier du bucket R2 via API S3
function get_bucket_files($folder = 'dessins') {
    $files = [];
    
    // Si les credentials ne sont pas configurés, impossible de lister
    if (!R2_ACCESS_KEY || !R2_SECRET_KEY) {
        error_log("R2 credentials manquants - impossible de lister les fichiers du bucket");
        return [];
    }
    
    // Paramètres S3
    $accessKey = R2_ACCESS_KEY;
    $secretKey = R2_SECRET_KEY;
    $bucket = 'images'; // Le bucket est "images"
    $region = 'auto';
    $host = 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev';
    $prefix = $folder . '/'; // Préfixe pour le dossier (dessins/, illustrations/, etc)
    
    // Paramètres de la requête
    $method = 'GET';
    $action = '?list-type=2&prefix=' . urlencode($prefix);
    $url = $host . '/' . $action;
    
    try {
        // Date au format AWS
        $timestamp = gmdate('Ymd\\THis\\Z');
        $shortDate = gmdate('Ymd');
        
        // Créer la requête canonicale pour AWS Signature V4
        $canonicalRequest = $method . "\n";
        $canonicalRequest .= "/" . "\n";
        $canonicalRequest .= $action . "\n";
        $canonicalRequest .= "host:" . parse_url($host, PHP_URL_HOST) . "\n\n";
        $canonicalRequest .= "host\n";
        $canonicalRequest .= hash('sha256', '');
        
        // String to sign
        $algorithm = 'AWS4-HMAC-SHA256';
        $credentialScope = $shortDate . '/' . $region . '/s3/aws4_request';
        $hashedCanonical = hash('sha256', $canonicalRequest);
        
        $stringToSign = $algorithm . "\n";
        $stringToSign .= $timestamp . "\n";
        $stringToSign .= $credentialScope . "\n";
        $stringToSign .= $hashedCanonical;
        
        // Calculer la signature
        $kDate = hash_hmac('sha256', $shortDate, 'AWS4' . $secretKey, true);
        $kRegion = hash_hmac('sha256', $region, $kDate, true);
        $kService = hash_hmac('sha256', 's3', $kRegion, true);
        $kSigning = hash_hmac('sha256', 'aws4_request', $kService, true);
        $signature = bin2hex(hash_hmac('sha256', $stringToSign, $kSigning, true));
        
        // Construire l'header Authorization
        $authHeader = $algorithm . ' Credential=' . $accessKey . '/' . $credentialScope;
        $authHeader .= ', SignedHeaders=host, Signature=' . $signature;
        
        // Faire la requête curl
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $authHeader,
                'X-Amz-Date: ' . $timestamp,
                'Host: ' . parse_url($host, PHP_URL_HOST)
            ]
        ]);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 200 && $response) {
            // Parser le XML S3 ListBucketResult
            $xml = simplexml_load_string($response);
            if ($xml && isset($xml->Contents)) {
                foreach ($xml->Contents as $content) {
                    $key = (string)$content->Key;
                    // Extraire juste le nom du fichier
                    $fileName = basename($key);
                    // Vérifier que c'est un fichier image
                    if (preg_match('/\.(png|jpg|jpeg|gif|webp)$/i', $fileName)) {
                        $files[] = R2_ENDPOINT . '/images/' . $key;
                    }
                }
            }
        } else {
            error_log("R2 API Error: HTTP $httpCode");
        }
    } catch (Exception $e) {
        error_log('Erreur R2 API: ' . $e->getMessage());
    }
    
    sort($files);
    return $files;
}
?>