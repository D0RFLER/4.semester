document.addEventListener("DOMContentLoaded", function () {
  const toggle = document.querySelector(".lang-toggle");
  const dropdown = document.querySelector(".lang-dropdown");

  if (toggle && dropdown) {
    toggle.addEventListener("click", function (e) {
      e.stopPropagation();
      dropdown.classList.toggle("visible");
    });

    document.addEventListener("click", function () {
      dropdown.classList.remove("visible");
    });
  }
});
