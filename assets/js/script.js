document.addEventListener("DOMContentLoaded", function () {
  function processImage(img) {
    // Attendre que l'image soit vraiment chargée
    function adjust() {
      var w = img.naturalWidth;
      var h = img.naturalHeight;

      if (!w || !h) {
        // Si les dimensions naturelles ne sont pas disponibles, réessayer dans 100ms
        setTimeout(adjust, 100);
        (function () {
          var lightbox = document.getElementById("lightbox");
          if (!lightbox) return;
          // Only enable on presentation pages: presence of `id` param or `.artwork-image-full`
          var urlParams = new URLSearchParams(window.location.search);
          var hasIdParam = urlParams.has('id');
          var hasArtworkContainer = !!document.querySelector('.artwork-image-full');
          if (!hasIdParam && !hasArtworkContainer) return;

          var lbImage = lightbox.querySelector(".lightbox-image");
          var lbCaption = lightbox.querySelector(".lightbox-caption");
          var closeBtn = lightbox.querySelector(".lightbox-close");
          var prevBtn = lightbox.querySelector(".lightbox-prev");
          var nextBtn = lightbox.querySelector(".lightbox-next");

          var currentGroup = [];
          var currentIndex = 0;
          var usePageNavigation = false;
          var pageNavPrev = null;
          var pageNavNext = null;

          function buildGroupFrom(img) {
            var container = img.closest('.project-gallery, .gallery, .projects-list, .project-card') || document;
            var imgs = Array.prototype.slice.call(
              container.querySelectorAll('.gallery-item img, .item-image, .project-image img, .artwork-image-full img')
            );
            imgs = imgs.filter(function (i) { return i && i.src; });
            return imgs;
          }

          function showLightbox(group, index) {
            currentGroup = group;
            currentIndex = index;
            var img = group[index];
            lbImage.src = img.src;
            lbImage.alt = img.alt || "";
            var titleEl = img.closest('.gallery-item') && img.closest('.gallery-item').querySelector('.item-title');
            var caption = (titleEl && titleEl.innerText) || img.alt || "";
            lbCaption.textContent = caption;
            lightbox.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
          }

          function hideLightbox() {
            lightbox.setAttribute('aria-hidden', 'true');
            lbImage.src = '';
            lbCaption.textContent = '';
            document.body.style.overflow = '';
          }

          function showPrev() {
            if (usePageNavigation) {
              if (pageNavPrev) window.location.href = pageNavPrev;
              return;
            }
            if (!currentGroup.length) return;
            currentIndex = (currentIndex - 1 + currentGroup.length) % currentGroup.length;
            showLightbox(currentGroup, currentIndex);
          }

          function showNext() {
            if (usePageNavigation) {
              if (pageNavNext) window.location.href = pageNavNext;
              return;
            }
            if (!currentGroup.length) return;
            currentIndex = (currentIndex + 1) % currentGroup.length;
            showLightbox(currentGroup, currentIndex);
          }

          function attachHandlersTo(img) {
            if (img.__lightboxAttached) return;
            img.addEventListener('click', function (ev) {
              ev.preventDefault();
              var group = buildGroupFrom(img);
              var index = group.indexOf(img);
              if (index === -1) index = 0;
              if (img.closest('.artwork-image-full')) {
                usePageNavigation = true;
                pageNavPrev = pageNavNext = null;
                document.querySelectorAll('.artwork-navigation a').forEach(function (a) {
                  var t = (a.textContent||'').trim().toLowerCase();
                  if (t.indexOf('précédent') !== -1 || t.indexOf('precedent') !== -1) pageNavPrev = a.href;
                  if (t.indexOf('suivant') !== -1) pageNavNext = a.href;
                });
              } else {
                usePageNavigation = false;
                pageNavPrev = pageNavNext = null;
              }
              showLightbox(group, index);
            });
            img.__lightboxAttached = true;
          }

          document.querySelectorAll('.gallery-item img, .item-image, .project-image img, .artwork-image-full img').forEach(attachHandlersTo);

          var mo = new MutationObserver(function (mutations) {
            mutations.forEach(function (m) {
              m.addedNodes.forEach(function (n) {
                if (n.nodeType === 1) {
                  n.querySelectorAll && n.querySelectorAll('.gallery-item img, .item-image, .project-image img, .artwork-image-full img').forEach(attachHandlersTo);
                  if (n.matches && n.matches('img')) attachHandlersTo(n);
                }
              });
            });
          });
          mo.observe(document.body, { childList: true, subtree: true });

          if (closeBtn) {
            closeBtn.addEventListener('click', function (e) { e.stopPropagation(); hideLightbox(); });
          }
          if (prevBtn) {
            prevBtn.addEventListener('click', function (e) { e.stopPropagation(); showPrev(); });
            prevBtn.style.pointerEvents = 'auto';
          }
          if (nextBtn) {
            nextBtn.addEventListener('click', function (e) { e.stopPropagation(); showNext(); });
            nextBtn.style.pointerEvents = 'auto';
          }

          lightbox.addEventListener('click', function (e) { if (e.target === lightbox) hideLightbox(); });
          document.addEventListener('keydown', function (e) {
            if (lightbox.getAttribute('aria-hidden') === 'false') {
              if (e.key === 'ArrowLeft') showPrev();
  /* Lightbox viewer for all galleries */
              if (e.key === 'Escape') hideLightbox();
            }
          });
        })();
  (function () {
    var lightbox = document.getElementById("lightbox");
    if (!lightbox) return;
    var lbImage = lightbox.querySelector(".lightbox-image");
    var lbCaption = lightbox.querySelector(".lightbox-caption");
    var closeBtn = lightbox.querySelector(".lightbox-close");
    var prevBtn = lightbox.querySelector(".lightbox-prev");
    var nextBtn = lightbox.querySelector(".lightbox-next");

    var currentGroup = [];
    var currentIndex = 0;

    function buildGroupFrom(img) {
      var container =
        img.closest(
          ".gallery, .projects-list, .project-gallery, .project-card",
        ) || document;
      var imgs = Array.prototype.slice.call(
        container.querySelectorAll(
          ".gallery-item img, .item-image, .project-image img, .artwork-image-full img",
        ),
      );
      // Filter only images with src
      imgs = imgs.filter(function (i) {
        return i && i.src;
      });
      return imgs;
    }

    function showLightbox(group, index) {
      currentGroup = group;
      currentIndex = index;
      var img = group[index];
      lbImage.src = img.src;
      lbImage.alt = img.alt || "";
      // Try to find a caption nearby
      var titleEl =
        img.closest(".gallery-item") &&
        img.closest(".gallery-item").querySelector(".item-title");
      var caption = (titleEl && titleEl.innerText) || img.alt || "";
      lbCaption.textContent = caption;
      lightbox.setAttribute("aria-hidden", "false");
      document.body.style.overflow = "hidden";
    }

    function hideLightbox() {
      lightbox.setAttribute("aria-hidden", "true");
      lbImage.src = "";
      lbCaption.textContent = "";
      document.body.style.overflow = "";
    }

    function showPrev() {
      if (!currentGroup.length) return;
      currentIndex =
        (currentIndex - 1 + currentGroup.length) % currentGroup.length;
      showLightbox(currentGroup, currentIndex);
    }

    function showNext() {
      if (!currentGroup.length) return;
      currentIndex = (currentIndex + 1) % currentGroup.length;
      showLightbox(currentGroup, currentIndex);
    }

    // Attach click handlers to all gallery images (and observe additions)
    function attachHandlersTo(img) {
      if (img.__lightboxAttached) return;
      img.addEventListener("click", function (ev) {
        ev.preventDefault();
        var group = buildGroupFrom(img);
        var index = group.indexOf(img);
        if (index === -1) index = 0;
        showLightbox(group, index);
      });
      img.__lightboxAttached = true;
    }

    document
      .querySelectorAll(
        ".gallery-item img, .item-image, .project-image img, .artwork-image-full img",
      )
      .forEach(attachHandlersTo);

    // Observe for dynamic images
    var mo = new MutationObserver(function (mutations) {
      mutations.forEach(function (m) {
        m.addedNodes.forEach(function (n) {
          if (n.nodeType === 1) {
            n.querySelectorAll &&
              n
                .querySelectorAll(
                  ".gallery-item img, .item-image, .project-image img, .artwork-image-full img",
                )
                .forEach(attachHandlersTo);
            if (n.matches && n.matches("img")) attachHandlersTo(n);
          }
        });
      });
    });
    mo.observe(document.body, { childList: true, subtree: true });

    // Controls (defensive: check elements exist and stop propagation)
    if (closeBtn) {
      closeBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        hideLightbox();
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        showPrev();
      });
      prevBtn.style.pointerEvents = "auto";
    }

    if (nextBtn) {
      nextBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        showNext();
      });
      nextBtn.style.pointerEvents = "auto";
    }

    lightbox.addEventListener("click", function (e) {
      if (e.target === lightbox) hideLightbox();
    });

    document.addEventListener("keydown", function (e) {
      if (lightbox.getAttribute("aria-hidden") === "false") {
        if (e.key === "ArrowLeft") showPrev();
        if (e.key === "ArrowRight") showNext();
        if (e.key === "Escape") hideLightbox();
      }
    });
  })();
});
