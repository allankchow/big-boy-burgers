document.querySelector(".menu-toggle").addEventListener("click", function () {
  var body = document.body;
  if (body.style.overflow !== "hidden") {
    body.style.overflow = "hidden";
  } else {
    body.style.overflow = "";
  }
});

document.querySelector(".menu-toggle").addEventListener("click", function () {
  var svg = this.querySelector("svg");
  var path = svg.querySelector("path");

  if (path.getAttribute("d") === "M3 12H21M3 6H21M3 18H21") {
    path.setAttribute("d", "M18 6L6 18M6 6L18 18"); // Replace with your new SVG path
  } else {
    path.setAttribute("d", "M3 12H21M3 6H21M3 18H21");
  }
});