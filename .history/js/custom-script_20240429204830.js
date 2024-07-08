document.querySelector(".menu-toggle").addEventListener("click", function () {
  var body = document.body;
  if (body.style.overflow !== "hidden") {
    body.style.overflow = "hidden";
  } else {
    body.style.overflow = "";
  }
});
