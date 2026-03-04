# Documentation des changements - Système de tags et catégorie "Autres"

## 🎯 Résumé des modifications

Votre portfolio a subit une refonte majeure pour introduire un système de filtrage par tags et unifier tous vos projets dans une nouvelle catégorie "Autres".

## 📝 Fichiers créés

### 1. `/data/all_projects.php`

- **Objectif** : Centraliser tous les projets (développement, illustration, photos, 3D, dessins) avec un système de tags
- **Contenu** :
  - Tableau `$all_projects` avec 50+ projets
  - Chaque projet inclut : `id`, `title`, `description`, `image`, `date`, `type`, `tags`
  - Fonctions utilitaires :
    - `get_all_tags()` : Récupère tous les tags uniques
    - `filter_projects_by_tags()` : Filtre les projets selon les tags sélectionnés

### 2. `/pages/autres.php`

- **Objectif** : Afficher tous les projets avec système de filtrage par tags
- **Fonctionnalités** :
  - Checkboxes pour sélectionner les tags
  - Comptage des projets par tag
  - Affichage des filtres actifs avec bouton de suppression
  - Groupement des projets par catégorie (Dev, Illustration, 3D, Photo, Dessin)
  - Affichage du nombre total de projets

## 📂 Fichiers modifiés

### 1. `/includes/nav.php`

```php
// Avant
<li><a href="?page=photo" class="<?php echo is_active('photo'); ?>">Photo</a></li>

// Après
<li><a href="?page=autres" class="<?php echo is_active('autres'); ?>">Autres</a></li>
```

### 2. `/index.php`

- Ajout du titre pour "autres" : `'autres' => 'Autres projets - ' . SITE_NAME`
- Ajout du case dans le routeur :

```php
case 'autres':
    include 'pages/autres.php';
    break;
```

### 3. `/assets/css/style.css`

Ajout de ~400 lignes de styles CSS pour :

- Système de filtrage (checkboxes stylisées)
- Affichage des filtres actifs
- Grille de projets groupés
- Cartes de projets avec tags
- Textes informatifs (résultats, pas de résultats)
- Responsive design pour tous les appareils

### 4. `/assets/js/script.js`

Ajout de code JavaScript pour :

- Animation des checkboxes au changement
- Support clavier (Enter/Space pour cocher)
- Feedback visuel lors du filtrage
- Animation pulse pour les sélections

## 🏷️ Système de tags

### Tags utilisés

**Catégories principales :**

- Développement
- Illustration
- 3D
- Photographie
- Dessin

**Tags spécialisés :**

- **Développement** : C++, Python, Jeu, SFML, IA/ML, Traitement d'images
- **Illustration** : Digital Painting, Concept Art, Personnage, Paysage, Character Design, Illustration Jeunesse, Fantastique, Steampunk, Artwork, Horreur, Fan Art, Fantasy
- **3D** : Blender, Modélisation, Intérieur, Objet, Matériaux, Architecture, Fantasy, Saisonnier
- **Photographie** : Portrait, Nature, Paysage, Architecture, Macro
- **Dessin** : Crayon, Croquis

## 🎨 Fonctionnalités du filtrage

### Sélection de tags

- Cochez un ou plusieurs tags
- Les comptages se mettent à jour en temps réel
- Validation avec le bouton "Filtrer"

### Affichage des résultats

- Les projets sont groupés par catégorie (Dev, Illustration, 3D, Photo, Dessin)
- Chaque projet affiche ses tags
- Les résultats s'affichent du plus récent au plus ancien (par date)

### Actions supplémentaires

- Affichage des filtres actifs en haut
- Bouton "×" sur chaque filtre actif pour le supprimer individuellement
- Bouton "Réinitialiser" pour voir tous les projets
- Compteur de résultats affichés

## 🔄 Migration des anciennes pages

L'ancienne page `/pages/photographie.php` n'est plus utilisée mais reste disponible. Vous pouvez la supprimer si nécessaire.

## 🚀 Avantages de cette architecture

1. **Maintenance facile** : Les projets sont centralisés
2. **Flexibilité** : Ajoutez facilement de nouveaux tags
3. **UX améliorée** : Filtrage intuitif par checkboxes
4. **SEO-friendly** : URLs propres avec paramètres GET
5. **Responsive** : Fonctionne sur tous les appareils

## 📱 Responsive Design

- **Desktop** : Affichage complet avec checkboxes côte à côte
- **Tablette** : Checkboxes sur 2 colonnes, cartes ajustées
- **Mobile** : Checkboxes sur 2 colonnes, formulaire optimisé

## ✅ À tester

1. Accédez à la page "Autres" depuis la navigation
2. Cochez différents tags
3. Cliquez sur "Filtrer"
4. Vérifiez que les résultats s'actualisent
5. Testez le bouton "Réinitialiser"
6. Testez la suppression individuelle de tags

## 🛠️ Pour ajouter de nouveaux projets

1. Éditez `/data/all_projects.php`
2. Ajoutez un nouvel élément au tableau `$all_projects` avec :
   - `id` unique
   - `title`, `description`
   - `image` et optionnellement `gallery`
   - `date` au format YYYY-MM
   - `type` (dev, illustration, 3d, photo, dessin)
   - `tags` (tableau de tags)
3. Les tags nouveaux seront automatiquement disponibles au filtrage

## 🎯 Pour modifier les tags d'un projet

Éditez la clé `tags` du projet dans `/data/all_projects.php` :

```php
'tags' => ['Tag1', 'Tag2', 'Tag3']
```

## 📝 Notes importantes

- Les projets conservent leurs pages individuelles existantes
- Le filtrage fonctionne avec GET, pas de rechargement complet de page
- Les compteurs de tags incluent tous les projets disponibles
- L'ordre d'affichage des sections est : Dev > Illustration > 3D > Photo > Dessin

---

**Dernière mise à jour** : 4 mars 2026
