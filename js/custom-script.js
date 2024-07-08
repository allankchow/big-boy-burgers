document.querySelector(".menu-toggle").addEventListener("click", function () {
  var html = document.documentElement;
  if (html.style.overflow !== "hidden") {
    html.style.overflow = "hidden";
  } else {
    html.style.overflow = "";
  }
});

document
  .querySelector(".menu-toggle.mobile-toggle")
  .addEventListener("click", function () {
    var html = document.documentElement;
    if (html.style.overflow !== "hidden") {
      html.style.overflow = "hidden";
    } else {
      html.style.overflow = "";
    }
  });

document
  .querySelector("#primary-menu-mobile")
  .addEventListener("click", function () {
    var navigation = document.querySelector("#site-navigation");
    var body = document.body;

    navigation.classList.remove("toggled");
    body.style.overflow = "";
  });

document
  .querySelector(".menu-toggle.mobile-toggle")
  .addEventListener("click", function () {
    var navigation = document.querySelector("#site-navigation");
    navigation.classList.remove("toggled");
  });
