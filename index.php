<?php
require_once 'config.php';
require_once 'includes/functions.php';

$page = get_page();

// Définir le titre de la page
$page_titles = [
    'home' => SITE_NAME,
    'illustration' => 'Illustration - ' . SITE_NAME,
    'dev' => 'Développement - ' . SITE_NAME,
    '3d' => 'Modélisation 3D - ' . SITE_NAME,
    'photo' => 'Photographie - ' . SITE_NAME,
    'cv' => 'CV - ' . SITE_NAME,
    'project' => 'Projet - ' . SITE_NAME,
    'artwork' => 'Œuvre - ' . SITE_NAME
];

$page_title = $page_titles[$page] ?? SITE_NAME;

// Inclure le header et la navigation
include 'includes/header.php';
include 'includes/nav.php';

// Router - Charger la bonne page
switch($page) {
    case 'illustration':
        include 'pages/illustration.php';
        break;
    case 'dev':
        include 'pages/developpement.php';
        break;
    case '3d':
        include 'pages/3d.php';
        break;
    case 'photo':
        include 'pages/photographie.php';
        break;
    case 'cv':
        include 'pages/cv.php';
        break;
    case 'project':
        include 'pages/project.php';
        break;
    case 'artwork':
        include 'pages/artwork.php';
        break;
    default:
        include 'pages/home.php';
}

// Inclure le footer
include 'includes/footer.php';
?>