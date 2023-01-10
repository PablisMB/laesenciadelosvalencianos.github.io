function toggleTheme() {
  var body = document.body;
  body.classList.toggle("dark-theme");
}

function toggleDarkMode() {
  var checkbox = document.getElementById("dark-mode-toggle");
  if (checkbox.checked) {
    // enable dark mode
    document.body.classList.add("dark-mode");
  } else {
    // disable dark mode
    document.body.classList.remove("dark-mode");
  }
}

// check if user has previously selected dark mode
if (localStorage.getItem("dark-mode") === "true") {
  document.getElementById("dark-mode-toggle").checked = true;
  toggleDarkMode();
}

const themeChanger = document.querySelector(".themeChanger");
const closeCircle = document.querySelector(".close-circle");

let isOpen = false;

closeCircle.addEventListener("click", function () {
  if (isOpen) {
    themeChanger.style.transform = "translateX(0)";
  } else {
    themeChanger.style.transform = "translateX(56px)";
  }
  isOpen = !isOpen;
});
