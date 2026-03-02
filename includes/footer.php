<footer>
    <div class="footer-links">
        <a href="mailto:<?php echo AUTHOR_EMAIL; ?>">Email</a>
        <a href="<?php echo AUTHOR_LINKEDIN; ?>">LinkedIn</a>
        <a href="<?php echo AUTHOR_GITHUB; ?>">GitHub</a>
    </div>
    <p style="color: #94a3b8;">© <?php echo date('Y'); ?> <?php echo AUTHOR_NAME; ?> - Portfolio IMAC</p>
</footer>

<!-- Global lightbox for image galleries -->
<div id="lightbox" class="lightbox" aria-hidden="true">
    <button class="lightbox-close" aria-label="Fermer">×</button>
    <div class="lightbox-inner">
        <button class="lightbox-arrow lightbox-prev" aria-label="Précédent">‹</button>
        <div class="lightbox-content" role="dialog" aria-modal="true">
            <img src="" alt="" class="lightbox-image">
            <div class="lightbox-caption"></div>
        </div>
        <button class="lightbox-arrow lightbox-next" aria-label="Suivant">›</button>
    </div>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>