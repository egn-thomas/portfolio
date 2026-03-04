// rebuild script.js without any lightbox code

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
    if (img.complete) adjust();
    else {
      img.addEventListener("load", adjust);
      img.addEventListener("error", adjust);
    }
  }

  document
    .querySelectorAll(
      ".gallery-item img, .item-image, .project-image img, .artwork-image-full img",
    )
    .forEach(processImage);

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
        if (
          ev.key === "Escape" &&
          document.body.classList.contains("nav-open")
        ) {
          document.body.classList.remove("nav-open");
          navToggle.setAttribute("aria-expanded", "false");
        }
      });
    }
  })();

  // preserve scroll position when using artwork arrows
  (function () {
    // on load, restore if stored
    var pos = sessionStorage.getItem("scrollPos");
    if (pos) {
      window.scrollTo(0, parseInt(pos, 10) || 0);
      sessionStorage.removeItem("scrollPos");
    }
    // intercept clicks on arrows (both inline and navigation buttons)
    function handleArrowClick(ev) {
      // store current scroll
      sessionStorage.setItem("scrollPos", window.scrollY);
      // allow navigation to proceed normally
    }
    document
      .querySelectorAll(".image-arrow, .artwork-navigation a")
      .forEach(function (a) {
        a.addEventListener("click", handleArrowClick);
      });
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

  // make entire project cards clickable
  (function () {
    // make entire project cards clickable only on 'Autres' page
    document.querySelectorAll("#autres .project-card").forEach(function (card) {
      var link = card.querySelector("a");
      if (link) {
        card.style.cursor = "pointer";
        card.addEventListener("click", function (ev) {
          if (ev.target.tagName !== "A") {
            window.location.href = link.href;
          }
        });
      }
    });
  })();

  // email button copy-to-clipboard with toast notification
  (function () {
    var emailBtn = document.getElementById("footer-email");
    if (emailBtn) {
      emailBtn.addEventListener("click", function (ev) {
        ev.preventDefault();
        var email = emailBtn.dataset.email;
        if (!email) return;
        navigator.clipboard.writeText(email).then(
          function () {
            showToast("Email copied to clipboard");
          },
          function (err) {
            console.error("Clipboard write failed", err);
          },
        );
      });
    }

    function showToast(message) {
      var toast = document.createElement("div");
      toast.className = "toast";
      toast.textContent = message;
      document.body.appendChild(toast);
      // force reflow for transition
      requestAnimationFrame(function () {
        toast.classList.add("show");
      });
      setTimeout(function () {
        toast.classList.remove("show");
        toast.addEventListener("transitionend", function () {
          toast.remove();
        });
      }, 2000);
    }
  })();

  // Filter system for "Autres" page
  (function () {
    var filterForm = document.getElementById("filter-form");
    if (!filterForm) return;

    var checkboxes = filterForm.querySelectorAll(".filter-checkbox-input");

    // Add smooth filtering with visual feedback
    checkboxes.forEach(function (checkbox) {
      checkbox.addEventListener("change", function () {
        // Add a subtle animation effect
        var label = this.closest(".filter-checkbox");
        if (label) {
          label.style.animation = "none";
          setTimeout(function () {
            label.style.animation = "pulse 0.4s ease";
          }, 10);
        }
      });
    });

    // Prevent form submission and update URL instead
    filterForm.addEventListener("submit", function (e) {
      // Let the default form submission work
      // The PHP will handle the filtering
    });

    // Add keyboard support for checkboxes
    checkboxes.forEach(function (checkbox) {
      checkbox.addEventListener("keydown", function (e) {
        if (e.key === "Enter" || e.key === " ") {
          e.preventDefault();
          checkbox.checked = !checkbox.checked;
          checkbox.dispatchEvent(new Event("change", { bubbles: true }));
        }
      });
    });
  })();
});

// Add pulse animation for filter feedback
var style = document.createElement("style");
style.textContent = `
  @keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
  }
  
  .filter-checkbox {
    animation-duration: 0.4s;
    animation-timing-function: ease;
  }
`;
document.head.appendChild(style);
