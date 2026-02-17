<?php
// Configuration - ajouter les noms de fichiers en dur pour commencer
// Ces fichiers doivent être dans https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/
$dessin_files = [
    // Ajouter les noms de fichiers ici, ex:
    // 'dessin1.png',
    // 'dessin2.jpg',
];

// Si des fichiers sont configurés en dur, les utiliser
if (!empty($dessin_files)) {
    $dessins = array_map(function($filename) {
        return [
            'image' => R2_ENDPOINT . '/images/dessins/' . urlencode($filename)
        ];
    }, $dessin_files);
} else {
    // Sinon, récupérer automatiquement du bucket
    $dessins = array_map(function($url) {
        return [
            'image' => $url
        ];
    }, get_bucket_files('dessins'));
}

// Si aucun fichier trouvé, afficher un message pour le debug
if (empty($dessins)) {
    error_log('DESSINS: Aucun fichier trouvé. Vérifiez que le dossier images/dessins/ existe sur le bucket.');
}
?>