// rebuilt script.js with corrected lightbox and removed nested IIFE

// wait for DOM

document.addEventListener("DOMContentLoaded", function () {
  function processImage(img) {
    function adjust() {
      var w = img.naturalWidth;
      var h = img.naturalHeight;

      if (!w || !h) {
        setTimeout(adjust, 100);
        return;
      }

      if (img.closest(".artwork-image-full")) {
        // proportional contain
        var maxWidth = window.innerWidth * 0.8;
        var maxHeight = window.innerHeight * 0.8;
        var ratio = Math.min(maxWidth / w, maxHeight / h);
        var newWidth = w * ratio;
        var newHeight = h * ratio;
        img.style.display = "none";
        img.style.width = newWidth + "px";
        img.style.height = newHeight + "px";
        img.style.objectFit = "contain";
        img.style.objectPosition = "center";
        img.style.borderRadius = "10px";
        img.style.boxShadow = "0 10px 30px rgba(0,0,0,0.3)";
        img.offsetHeight;
        img.style.display = "block";
      } else {
        img.style.width = "100%";
        img.style.height = "100%";
        img.style.objectFit = "cover";
        img.style.objectPosition = "center";
        img.style.display = "block";
      }
    }

    if (img.complete) {
      adjust();
    } else {
      img.addEventListener("load", adjust);
      img.addEventListener("error", adjust);
    }
  }

  // initial images
  document
    .querySelectorAll(
      ".gallery-item img, .item-image, .project-image img, .artwork-image-full img",
    )
    .forEach(processImage);

  // observe for new images
  var observer = new MutationObserver(function (mutations) {
    mutations.forEach(function (mutation) {
      mutation.addedNodes.forEach(function (node) {
        if (node.nodeType === 1) {
          node.querySelectorAll &&
            node
              .querySelectorAll(
                ".gallery-item img, .item-image, .project-image img, .artwork-image-full img",
              )
              .forEach(processImage);
          if (
            node.matches &&
            node.matches(
              ".gallery-item img, .item-image, .project-image img, .artwork-image-full img",
            )
          ) {
            processImage(node);
          }
        }
      });
    });
  });

  observer.observe(document.body, { childList: true, subtree: true });

  // mobile nav
  (function () {
    var navToggle = document.getElementById("nav-toggle");
    var closeOnLinkClick = function () {
      document.body.classList.remove("nav-open");
      if (navToggle) navToggle.setAttribute("aria-expanded", "false");
    };

    if (navToggle) {
      navToggle.addEventListener("click", function () {
        var open = document.body.classList.toggle("nav-open");
        navToggle.setAttribute("aria-expanded", open ? "true" : "false");
      });
      document.querySelectorAll(".nav-links a").forEach(function (a) {
        a.addEventListener("click", closeOnLinkClick);
      });
      document.addEventListener("keydown", function (ev) {
        if (ev.key === "Escape" && document.body.classList.contains("nav-open")) {
          document.body.classList.remove("nav-open");
          navToggle.setAttribute("aria-expanded", "false");
        }
      });
    }
  })();

  // theme toggle
  var themeToggleCheckbox = document.getElementById("theme-toggle-checkbox");
  if (themeToggleCheckbox) {
    var savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") {
      document.body.classList.add("dark-mode");
      themeToggleCheckbox.checked = false;
    } else {
      document.body.classList.remove("dark-mode");
      themeToggleCheckbox.checked = true;
    }

    themeToggleCheckbox.addEventListener("change", function () {
      if (themeToggleCheckbox.checked) {
        document.body.classList.remove("dark-mode");
        localStorage.setItem("theme", "light");
      } else {
        document.body.classList.add("dark-mode");
        localStorage.setItem("theme", "dark");
      }
    });
  }

  // lightbox
  (function () {
    var lightbox = document.getElementById("lightbox");
    if (!lightbox) return;
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
      var container =
        img.closest(
          ".gallery, .projects-list, .project-gallery, .project-card",
        ) || document;
      var imgs = Array.prototype.slice.call(
        container.querySelectorAll(
          ".gallery-item img, .item-image, .project-image img, .artwork-image-full img",
        ),
      );
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
      if (usePageNavigation) {
        if (pageNavPrev) window.location.href = pageNavPrev;
        return;
      }
      if (!currentGroup.length) return;
      currentIndex =
        (currentIndex - 1 + currentGroup.length) % currentGroup.length;
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

    // Attach click handlers
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

    document
      .querySelectorAll(
        ".gallery-item img, .item-image, .project-image img, .artwork-image-full img",
      )
      .forEach(attachHandlersTo);

    var mo = new MutationObserver(function (mutations) {
      mutations.forEach(function (m) {
        m.addedNodes.forEach(function (n) {
          if (n.nodeType === 1) {
            n.querySelectorAll(
              ".gallery-item img, .item-image, .project-image img, .artwork-image-full img",
            ).forEach(attachHandlersTo);
            if (n.matches && n.matches("img")) attachHandlersTo(n);
          }
        });
      });
    });
    mo.observe(document.body, { childList: true, subtree: true });

    if (closeBtn) {
      closeBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        hideLightbox();
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        showPrev();
      });
      prevBtn.style.pointerEvents = 'auto';
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        showNext();
      });
      nextBtn.style.pointerEvents = 'auto';
    }

    lightbox.addEventListener('click', function (e) {
      if (e.target === lightbox) hideLightbox();
    });

    document.addEventListener('keydown', function (e) {
      if (lightbox.getAttribute('aria-hidden') === 'false') {
        if (e.key === 'ArrowLeft') showPrev();
        if (e.key === 'ArrowRight') showNext();
        if (e.key === 'Escape') hideLightbox();
      }
    });
  })();
});
