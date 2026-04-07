<?php
$dev_projects = [
    [
        'title' => 'Jeu de plateforme en C++',
        'description' => 'Jeu de plateforme 2D de type RPG développé en C++',
        'long_description' => 'Un jeu de plateforme 2D inspiré des classiques du RPG. <br><br>
                               Le jeu propose une aventure de survie à travers des niveaux générés procéduralement à la manière d\'un labyrinthe (voir image 3). Le joueur incarne un personnage qui doit explorer ces niveaux, collecter des ressources (voir image 4), combattre des ennemis et résoudre des énigmes pour progresser. <br><br>
                               Le développement de ce projet m\'a permis d\'approfondir mes compétences en C++ en déployant une architecture de code SOLID en parfaite autonomie. Cela m\'a permis de maintenir un code propre et évolutif. J\'ai également utilisé la bibliothèque SFML pour gérer les aspects graphiques du jeu. <br><br>
                               Au-delà de l\'aspect technique, ce projet a été pour moi un moyen de mettre en pratique mes connaissances en illustration et animation car j\'ai tenu à créer moi-même tous les assets graphiques du jeu, ce qui m\'a permis de développer une cohérence visuelle forte et de donner vie à mon univers de jeu.',
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
        'role' => 'Développeur Jeu'
    ],
    [
        'title' => 'Logiciel de traitement d\'images spatiales',
        'description' => 'Outil de réduction des images spatiales développé en Python par équipe de 4 à l\'occasion d\'une SAÉ organisée par le département informatique de l\'IUT de Calais',
        'long_description' => 'Ce projet a été réalisé dans le cadre d\'une SAÉ organisée par le département informatique de l\'IUT de Calais. Il s\'agit d\'un logiciel de traitement d\'images spatiales qui a pour vocation de réduire la taille des étoiles sur des images astronomiques afin de faciliter leur analyse. <br><br>
                               Le logiciel utilise des techniques de traitement d\'images tels que la dilatation et l\'érosion pour réduire la taille des étoiles tout en préservant les détails importants de l\'image. Il offre une interface utilisateur simple et intuitive, permettant aux utilisateurs de charger leurs images, d\'appliquer le traitement et de visualiser les résultats facilement. <br><br>
                               Ce projet a également été pour moi l\'occasion d\'aborder le développement d\'une intelligence artificielle via machine learning, qui a été utilisée pour améliorer la précision du traitement en apprenant à reconnaître les étoiles et à ajuster les paramètres de réduction en conséquence.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/astrophoto/astrophoto-GoodSettings.png',
        'gallery' => [
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/astrophoto/astrophoto-GoodSettings.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/astrophoto/astrophoto-BadSettings.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/astrophoto/astrophoto-IAmode.png'
        ],
        'technologies' => ['Python', 'PyQt'],
        'github' => 'https://github.com/egn-thomas/SAE_astrophoto.git',
        'date' => '2026-01',
        'role' => 'Développeur'
    ],
    [
        'title' => 'ALTO - Le réseau social IRL',
        'description' => 'Projet de développement d\'un réseau social IRL en équipe de 2, réalisé dans le cadre du cours de développement d\'application web',
        'long_description' => 'ALTO est une plateforme de réseau social IRL (In Real Life) qui utilise un système de pairing via QR code pour connecter des utilisateurs dans la vie réelle. L\'objectif de ce projet étant de créer une application de réseau social qui favorise la sécurité des jeunes utilisateurs en limitant les interactions en ligne et en encourageant les rencontres en personne. <br><br>
                               Ce projet a été réalisé avec Flutter, un framework de développement d\'applications mobiles, ce qui m\'a permis d\'apprendre à développer pour les plateformes iOS et Android. L\'application offre une interface utilisateur intuitive et conviviale, permettant de se connecter avec d\'autres utilisateurs via QR code et de partager des moments de leur vie réelle en toute sécurité. <br><br>
                               Ce projet m\'a permis d\'apprendre à utiliser le framework Flutter pour le développement d\'applications mobiles, ainsi que de renforcer mes compétences en développement d\'applications web et en gestion de projet en équipe.',

        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/Alto/Alto-01.png',
        'gallery' => [
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/Alto/Alto-01.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/Alto/Alto-02.png'
        ],
        'technologies' => ['Flutter', 'Dart'],
        'github' => 'https://github.com/egn-thomas/alto.git',
        'date' => '2026-03',
        'role' => 'Développeur, UI/UX Designer'
    ],
    [
        'title' => 'Pokémon TCG - Application de collection de cartes à jouer Pokémon',
        'description' => 'Projet de développement web en NodeJS d\'une application de cartes Pokémon à collectionner.',
        'long_description' => 'Pokémon TCG est une application de gestion de collection de cartes à jouer Pokémon. L\'application permet aux utilisateurs de créer et de gérer leur collection de cartes, d\'ajouter des cartes à leur collection, de faire des combats avec d\'autres utilisateurs. <br><br>
                               Ce projet a été réalisé avec NodeJS pour le backend et VueJS pour le frontend, ce qui m\'a permis d\'apprendre à développer une application web complète en utilisant ces technologies qui sont très utilisées dans de vraies applications professionnelles. Le cadre de travail mis en place durant ce TP était optimisé pour nous rapprocher le plus possible du travail en entreprise.<br><br>
                               Ce projet m\'a permis d\'apprendre à utiliser NodeJS et Vue pour le développement web. Il m\'a également permis d\'aborder un environnement de travail professionnel, notamment via l\'utilisation de Git',

        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/TgcSpa/Tgc-Spa-01.png',
        'gallery' => [
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/TgcSpa/Tgc-Spa-01.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/TgcSpa/Tgc-Spa-02.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/TgcSpa/Tgc-Spa-03.png'
        ],
        'technologies' => ['NodeJS', 'VueJS', 'Git'],
        'github' => 'https://github.com/celien-svg/alto.git',
        'date' => '2026-03',
        'role' => 'Développeur'
    ],
    [
        'title' => 'Chess.preview - Application web, api et base de données pour la prévisualisation de parties d\'échecs',
        'description' => 'Projet de développement web en php et nodeJS d\'une application de prévisualisation et de prévision de parties d\'échecs.',
        'long_description' => 'Chess.preview est une application web qui permet aux utilisateurs de prévisualiser des parties d\'échecs mais aussi de simuler des affrontements en tentant de prédire l\'issue du match. <br><br>
                               Lors de la réalisation de ce projet dans le cadre d\'une SAÉ, nous avons du mettre en place une base de données relationnelle pour stocker les données des parties d\'échecs, ainsi qu\'une API RESTful pour permettre à l\'application web de communiquer avec la base de données. Le frontend a été développé en PHP, tandis que le backend a été réalisé en NodeJS. <br><br>
                               Ce projet m\'a permis d\'apprendre à concevoir et à implémenter une base de données relationnelle, ainsi qu\'à développer une API REST pour permettre la communication entre le frontend et le backend. J\'ai également renforcé mes compétences en développement web en utilisant PHP et NodeJS pour créer une application complète.',
        'image' => 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/ChessPreview/Chess-preview-12.png',
        'gallery' => [
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/ChessPreview/Chess-preview-01.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/ChessPreview/Chess-preview-02.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/ChessPreview/Chess-preview-03.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/ChessPreview/Chess-preview-04.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/ChessPreview/Chess-preview-05.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/ChessPreview/Chess-preview-06.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/ChessPreview/Chess-preview-07.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/ChessPreview/Chess-preview-08.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/ChessPreview/Chess-preview-09.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/ChessPreview/Chess-preview-10.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/ChessPreview/Chess-preview-11.png',
            'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/images/developpement/ChessPreview/Chess-preview-12.png',
        ],
        'technologies' => ['PHP', 'NodeJS', 'Git', 'PostgreSQL'],
        'github' => 'https://github.com/IUT-Calais/sae-but-informatique-2-projet-web-api-dockerise-groupe-3',
        'date' => '2026-03',
        'role' => 'Développeur, Database Designer, API Developer, UI/UX Designer'
    ],
];
?>