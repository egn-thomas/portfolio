<nav>
    <div class="nav-container">
        <div class="logo">
            <img src="<?php echo LOGO_URL; ?>" alt="Logo <?php echo SITE_NAME; ?>" class="logo-img">
            <span><?php echo AUTHOR_NAME; ?></span>
        </div>

        <button id="nav-toggle" aria-label="Ouvrir le menu" aria-expanded="false" class="nav-toggle">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>

        <ul class="nav-links">
            <li><a href="?page=home" class="<?php echo is_active('home'); ?>">Accueil</a></li>
            <li><a href="?page=illustration" class="<?php echo is_active('illustration'); ?>">Illustration</a></li>
            <li><a href="?page=dev" class="<?php echo is_active('dev'); ?>">Développement</a></li>
            <li><a href="?page=3d" class="<?php echo is_active('3d'); ?>">3D</a></li>
            <li><a href="?page=photo" class="<?php echo is_active('photo'); ?>">Photo</a></li>
            <li><a href="?page=dessins" class="<?php echo is_active('dessins'); ?>">Dessin</a></li>
            <li><a href="?page=cv" class="<?php echo is_active('cv'); ?>">CV</a></li>
        </ul>
    </div>
</nav>