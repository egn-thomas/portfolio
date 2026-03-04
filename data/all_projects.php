<?php
// Fichier centralisé pour tous les projets avec tags
// Permet le filtrage par catégories dans la section "Autres"

$all_projects = [
    // Développement
    [
        'id' => 'dev_0',
        'title' => 'Jeu de plateforme en C++',
        'description' => 'Jeu de plateforme 2D de type RPG développé en C++',
        'long_description' => 'Un jeu de plateforme 2D inspiré des classiques du RPG. <br><br>
                               Le jeu propose une aventure de survie à travers des niveaux générés procéduralement à la manière d\'un labyrinthe (voir image 3). Le joueur incarne un personnage qui doit explorer ces niveaux, collecter des ressources (voir image 4), combattre des ennemis et résoudre des énigmes pour progresser. <br><br>
                               Le développement de ce projet m\'a permis d\'approfondir mes compétences en C++ en déployant une architecture de code SOLID en parfaite autonomie. Cela m\'a permis de maintenir un code propre et évolutif. J\'ai également utilisé la bibliothèque SFML pour gérer les aspects graphiques du jeu. <br><br>
                               Au delà de l\'aspect technique, ce projet a été pour moi un moyen de mettre en pratique mes connaissances en illustration et animation car j\'ai tenu a créer moi même tous les assets graphiques du jeu, ce qui m\'a permis de développer une cohérence visuelle forte et de donner vie à mon univers de jeu.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/gameOfThomas/gameOfThomas-Presentation.png',
        'gallery' => [
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/gameOfThomas/gameOfThomas-Presentation.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/gameOfThomas/gameOfThomas-Debug.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/gameOfThomas/gameOfThomas-Map.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/gameOfThomas/gameOfThomas-Inventory.png'
        ],
        'technologies' => ['C++', 'SFML', 'Git'],
        'github' => 'https://github.com/egn-thomas/GameOfThomas.git',
        'date' => '2026-02',
        'role' => 'Développeur Jeu',
        'type' => 'dev',
        'tags' => ['Développement', 'C++']
    ],
    [
        'id' => 'dev_1',
        'title' => 'Logiciel de traitement d\'images spatiales',
        'description' => 'Outil de réduction des images spatiales développé en python par équipe de 4 à l\'occasion d\'une SAÉ organisée par le département informatique de l\'IUT de Calais',
        'long_description' => 'Ce projet a été réalisé dans le cadre d\'une SAÉ organisée par le département informatique de l\'IUT de Calais. Il s\'agit d\'un logiciel de traitement d\images spatiales qui a pour vocation de réduire la taille des étoiles sur des images astronomiques afin de faciliter leur analyse. <br><br>
                               Le logiciel utilise des technique de traitement d\'images tel que la dilatation et l\'érosion pour réduire la taille des étoiles tout en préservant les détails importants de l\'image. Il offre une interface utilisateur simple et intuitive, permettant aux utilisateurs de charger leurs images, d\'appliquer le traitement et de visualiser les résultats facilement. <br><br>
                               Ce projet a également été pour moi l\'occasion d\'aborder le développement d\une intelligence artificielle via machine learning, qui a été utilisée pour améliorer la précision du traitement en apprenant à reconnaître les étoiles et à ajuster les paramètres de réduction en conséquence.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/astrophoto/astrophoto-GoodSettings.png',
        'gallery' => [
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/astrophoto/astrophoto-GoodSettings.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/astrophoto/astrophoto-BadSettings.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/astrophoto/astrophoto-IAmode.png'
        ],
        'technologies' => ['Python', 'PyQt'],
        'github' => 'https://github.com/egn-thomas/SAE_astrophoto.git',
        'date' => '2026-01',
        'role' => 'Développeur',
        'type' => 'dev',
        'tags' => ['Développement', 'Python']
    ],
    
    // Illustrations
    [
        'id' => 'illust_0',
        'title' => 'Painting Digital "Forêt Enchantée"',
        'description' => 'Illustration numérique d\'une forêt enchantée réalisée sur Photoshop. J\'ai mis l\'accent sur les jeux de lumière pour guider le regard et donner une impression de calme dans ce paysage.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/illustrations/foret.png',
        'date' => '2025-12',
        'type' => 'illustration',
        'tags' => ['Illustration']
    ],
    [
        'id' => 'illust_1',
        'title' => 'Painting Digital "Blizzard"',
        'description' => 'Concept art d\'un aventurier affrontant une tempête de neige, réalisé sur procreate. J\'ai utilisé la profondeur de champ pour créer une atmosphère immersive et donner une impression de froid glacial, en jouant avec les nuances de blanc et les effets de lumière dans la tempête.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/illustrations/blizzard.png',
        'date' => '2025-10',
        'type' => 'illustration',
        'tags' => ['Illustration']
    ],
    [
        'id' => 'illust_2',
        'title' => 'Painting Digital "Le Scaphandrier Perdu"',
        'description' => 'Concept art d\'un scaphandrier perdu dans les profondeurs de l\'océan, réalisé sur Photoshop. J\'ai utilisé des techniques de peinture numérique pour créer une atmosphère mystérieuse et immersive, en jouant avec les nuances de bleu et les effets de lumière sous-marine.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/illustrations/scaphandre.png',
        'date' => '2024-09',
        'type' => 'illustration',
        'tags' => ['Illustration']
    ],
    [
        'id' => 'illust_3',
        'title' => 'Painting Digital "L\'Éveil de la Bûche"',
        'description' => 'Mise en scène d\'un petit être caché derrière une bûche, chassant des papillons. J\'ai voulu représenter une atmosphère paisible et magique, en jouant avec les couleurs douces et les effets de lumière pour créer une ambiance féerique.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/illustrations/bucheEtPapillons.png',
        'date' => '2025-07',
        'type' => 'illustration',
        'tags' => ['Illustration']
    ],
    [
        'id' => 'illust_4',
        'title' => 'Painting Digital "Magicien vert"',
        'description' => 'Character design d\'un guerrier à l\'allure déterminé. Les effets de lumière qui s\'échappent de ses mains et ses yeux laissent entrevoir qu\'il est doté de pouvoirs magiques.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/illustrations/magicienVert.png',
        'date' => '2025-06',
        'type' => 'illustration',
        'tags' => ['Illustration']
    ],
    [
        'id' => 'illust_5',
        'title' => 'Painting Digital "Pics Montagneux"',
        'description' => 'Sous le soleil couchant, une créature mysterieuse se tient devant une étendue de montagnes abruptes.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/illustrations/picsMontagneux.png',
        'date' => '2025-06',
        'type' => 'illustration',
        'tags' => ['Illustration']
    ],
    [
        'id' => 'illust_6',
        'title' => 'Painting Digital "Grenouille Mécanique"',
        'description' => 'Concept art d\'une grenouille mécanique réalisé sur Photoshop. J\'ai utilisé des techniques de peinture numérique pour créer les textures métalliques et donner vie à cette créature imaginaire. Le travail sur les reflets et les ombres a été crucial pour rendre l\'effet réaliste.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/illustrations/grenouilleMecanique.png',
        'date' => '2025-03',
        'type' => 'illustration',
        'tags' => ['Illustration']
    ],
    [
        'id' => 'illust_7',
        'title' => 'Painting Digital "Tete de mort géante"',
        'description' => 'Illustration numérique réalisée sur Photoshop. Pour représenter l\'ambiance sombre et nocturne de ce painting, j\'ai du faire un travail assez conséquend sur les ombres et les lumieres. Notamment en utilisant des calques de réglages pour ajuster les contrastes et les niveaux de luminosité.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/illustrations/teteDeMortGeante.png',
        'date' => '2025-05',
        'type' => 'illustration',
        'tags' => ['Illustration']
    ],
    [
        'id' => 'illust_8',
        'title' => 'Painting Digital "Scorpion"',
        'description' => 'Inspiré du personnage de marvel du même nom, j\'ai utilisé les code du comic book pour m\'approprier ce personnage et le mettre en scène sur le toit d\'un gratte ciel.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/illustrations/scorpion.png',
        'date' => '2024-11',
        'type' => 'illustration',
        'tags' => ['Illustration']
    ],
    [
        'id' => 'illust_9',
        'title' => 'Painting Digital "Cité Volante"',
        'description' => 'Digital painting d\'une cité volante en ruine de laquelle surgit un énorme dragon écarlate.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/illustrations/citeVolante.png',
        'date' => '2024-07',
        'type' => 'illustration',
        'tags' => ['Illustration']
    ],
    
    // Photographies
    [
        'id' => 'photo_0',
        'title' => 'Portrait en Noir et Blanc',
        'description' => 'Portrait studio en lumière naturelle',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/photos/fleursBazinghen.JPG',
        'date' => '2024-01',
        'type' => 'photo',
        'tags' => ['Photographie']
    ],
    [
        'id' => 'photo_1',
        'title' => 'Fort d\'Ambleteuse',
        'description' => 'Vue du fort d\'ambleteuse depuis la plage',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/photos/fortAmbleteuse.JPG',
        'date' => '2024-02',
        'type' => 'photo',
        'tags' => ['Photographie']
    ],
    [
        'id' => 'photo_2',
        'title' => 'Papillon',
        'description' => 'Macro d\'un papillon sur une fleur',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/photos/papilloonBazinghen.JPG',
        'date' => '2024-03',
        'type' => 'photo',
        'tags' => ['Photographie']
    ],
    [
        'id' => 'photo_3',
        'title' => 'Rose',
        'description' => 'Une rose qui se détache sur un fond de verdure',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/photos/roseBazinghen.JPG',
        'date' => '2024-03',
        'type' => 'photo',
        'tags' => ['Photographie']
    ],
    
    // Modèles 3D
    [
        'id' => '3d_0',
        'title' => 'Chambre Isométrique',
        'description' => 'Modèle 3D d\'une chambre en vue isométrique. Le modèle inclut une simul de tissus pour le lit ce qui m\'a permis d\'apprehender le fonctionnement de la simulation de tissus et drapés dans Blender. C\'est également mon premier projet de modélisation 3D réalisé en autonomie.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/3d/chambreIsometrique.png',
        'date' => '2025-05',
        'type' => '3d',
        'tags' => ['3D']
    ],
    [
        'id' => '3d_1',
        'title' => 'Fiole',
        'description' => 'Modélisation d\'une fiole en verre. Inspirée d\'un tutoriel de Bertrand . Tech, un artiste 3D',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/3d/tuto1Fiole.png',
        'date' => '2025-03',
        'type' => '3d',
        'tags' => ['3D']
    ],
    [
        'id' => '3d_2',
        'title' => 'Tourelle de Château',
        'description' => 'Design d\'une tourelle médiévale. Inspirée d\'un tutoriel de Bertrand . Tech, un artiste 3D',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/3d/tuto2Tour.png',
        'date' => '2025-04',
        'type' => '3d',
        'tags' => ['3D']
    ],
    [
        'id' => '3d_3',
        'title' => 'Citrouille d\'Halloween',
        'description' => 'Design d\'une citrouille sculptée pour Halloween. Inspirée d\'un tutoriel de Bertrand . Tech, un artiste 3D',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/3d/tuto3Citrouille.png',
        'date' => '2025-09',
        'type' => '3d',
        'tags' => ['3D']
    ],
    
    // Dessins
    [
        'id' => 'dessin_0',
        'title' => 'Dessin 1',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7062.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_1',
        'title' => 'Dessin 2',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7063.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_2',
        'title' => 'Dessin 3',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7064.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_3',
        'title' => 'Dessin 4',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7065.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_4',
        'title' => 'Dessin 5',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7066.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_5',
        'title' => 'Dessin 6',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7067.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_6',
        'title' => 'Dessin 7',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7069.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_7',
        'title' => 'Dessin 8',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7070.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_8',
        'title' => 'Dessin 9',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7071.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_9',
        'title' => 'Dessin 10',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7072.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_10',
        'title' => 'Dessin 11',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7073.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_11',
        'title' => 'Dessin 12',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7074.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_12',
        'title' => 'Dessin 13',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7075.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_13',
        'title' => 'Dessin 14',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7076.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_14',
        'title' => 'Dessin 15',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7077.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_15',
        'title' => 'Dessin 16',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7078.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_16',
        'title' => 'Dessin 17',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7079.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_17',
        'title' => 'Dessin 18',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7080.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_18',
        'title' => 'Dessin 19',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7081.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_19',
        'title' => 'Dessin 20',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7082.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_20',
        'title' => 'Dessin 21',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7083.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_21',
        'title' => 'Dessin 22',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7084.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_22',
        'title' => 'Dessin 23',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7086.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_23',
        'title' => 'Dessin 24',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7087.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ],
    [
        'id' => 'dessin_24',
        'title' => 'Dessin 25',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/dessins/IMG_7088.jpg',
        'type' => 'dessin',
        'tags' => ['Dessin']
    ]
];

// Fonction pour extraire tous les tags uniques
function get_all_tags() {
    global $all_projects;
    $tags = [];
    foreach ($all_projects as $project) {
        if (isset($project['tags'])) {
            $tags = array_merge($tags, $project['tags']);
        }
    }
    $unique_tags = array_unique($tags);
    sort($unique_tags);
    return $unique_tags;
}

// Fonction pour filtrer les projets par tags
function filter_projects_by_tags($selected_tags = []) {
    global $all_projects;
    if (empty($selected_tags)) {
        return $all_projects;
    }
    
    $filtered = [];
    foreach ($all_projects as $project) {
        $project_tags = isset($project['tags']) ? $project['tags'] : [];
        $has_tag = false;
        foreach ($selected_tags as $tag) {
            if (in_array($tag, $project_tags)) {
                $has_tag = true;
                break;
            }
        }
        if ($has_tag) {
            $filtered[] = $project;
        }
    }
    return $filtered;
}
?>
