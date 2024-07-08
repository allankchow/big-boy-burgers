document.querySelector(".menu-toggle").addEventListener("click", function () {
  var html = document.documentElement;
  if (html.style.overflow !== "hidden") {
    html.style.overflow = "hidden";
  } else {
    html.style.overflow = "";
  }
});

document.querySelector(".menu-toggle").addEventListener("click", function () {
  var svg = this.querySelector("svg");
  var path = svg.querySelector("path");

  if (path.getAttribute("d") === "M3 12H21M3 6H21M3 18H21") {
    path.setAttribute("d", "M18 6L6 18M6 6L18 18");
  } else {
    path.setAttribute("d", "M3 12H21M3 6H21M3 18H21");
  }
});

document
  .querySelector("#primary-menu-mobile")
  .addEventListener("click", function () {
    var navigation = document.querySelector("#site-navigation");
    var body = document.body;
    const icon = document.querySelector(".menu-toggle");

    var path = icon.querySelector("path");
    if (path.getAttribute("d") === "M3 12H21M3 6H21M3 18H21") {
      path.setAttribute("d", "M18 6L6 18M6 6L18 18");
    } else {
      path.setAttribute("d", "M3 12H21M3 6H21M3 18H21");
    }

    navigation.classList.remove("toggled");
    body.style.overflow = "";
  });

(function () {
  const container = document.querySelector(".mobile-nav-content");
  const button = container.querySelector(".menu-toggle.mobile-toggle");

  button.addEventListener("click", function () {
    siteNavigation.classList.toggle("toggled");

    if (button.getAttribute("aria-expanded") === "true") {
      button.setAttribute("aria-expanded", "false");
    } else {
      button.setAttribute("aria-expanded", "true");
    }
  });

  document.addEventListener("click", function (event) {
    const isClickInside = container.contains(event.target);

    if (!isClickInside) {
      siteNavigation.classList.remove("toggled");
      button.setAttribute("aria-expanded", "false");
    }
  });
})();
