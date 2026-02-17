<?php
// Récupérer automatiquement les dessins du bucket R2
$dessins = array_map(function($url) {
    return [
        'image' => $url
    ];
}, get_bucket_files('dessins'));
?>