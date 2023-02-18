document.addEventListener("DOMContentLoaded", function () {
  const header = document.getElementById("header");

  function updateHeader() {
    let currentScrollPos = window.pageYOffset;
    if (currentScrollPos > 50) {
      header.classList.add("scrolled");
      header.classList.remove("unscrolled");
    } else {
      header.classList.remove("scrolled");
      header.classList.add("unscrolled");
    }
  }

  window.addEventListener("scroll", updateHeader);
});
