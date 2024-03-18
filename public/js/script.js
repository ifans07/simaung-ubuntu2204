function toggleNavbar() {
  let scrollPos = window.scrollY;
  let header = document.querySelector("#header");

  if (scrollPos > 50) {
    header.style.top = 0;
  } else {
    header.style.top = "-76px";
  }
}

window.addEventListener("scroll", toggleNavbar);

// toggle menu
let navbar = document.querySelector(".nav-list");
let toggle = document.querySelector(".toggle");
let iconToggle = document.querySelector(".toggle .fa-solid");
let toggleDark = document.querySelector(".toggle-darkmode");
let iconDarkMode = document.querySelector(".toggle-darkmode .fa-solid");
let clipBg = document.querySelector(".animate-bg");
let clipBg1 = document.querySelector(".animate-bg1");

document.querySelector(".toggle").addEventListener("click", function () {
  navbar.classList.toggle("active");
  if (iconToggle.classList[1] == "fa-bars") {
    iconToggle.classList.add("fa-times");
    iconToggle.classList.remove("fa-bars");
    iconToggle.style.transform = "rotate(180deg)";
    iconToggle.style.transition = "transform 0.5s ease";
  } else {
    iconToggle.classList.add("fa-bars");
    iconToggle.classList.remove("fa-times");
    iconToggle.style.transform = "rotate(0deg)";
    iconToggle.style.transition = "transform 0.5s ease";
  }
});

document.addEventListener("click", function (e) {
  if (!toggle.contains(e.target) && !navbar.contains(e.target)) {
    navbar.classList.remove("active");
    iconToggle.classList.add("fa-bars");
    iconToggle.classList.remove("fa-times");
    iconToggle.style.transform = "rotate(0deg)";
    iconToggle.style.transition = "transform 0.5s ease";
  }
});

toggleDark.addEventListener("click", function () {
  iconDarkMode.classList.toggle("fa-sun");
  if (iconDarkMode.classList[1] == "fa-moon") {
    iconDarkMode.classList.add("fa-sun");
    iconDarkMode.classList.remove("fa-moon");

    clipBg.classList.remove("active-transisi");
    clipBg.classList.toggle("active");
    clipBg1.classList.toggle("active");
    clipBg.style.backgroundColor = "#212529";
    clipBg1.style.backgroundColor = "#212529";
    this.style.backgroundColor = "#ffffff";
    iconDarkMode.style.color = "#212529";

    iconDarkMode.style.transform = "translate(-50%, -50%) rotate(720deg)";
    iconDarkMode.style.transition = "transform 5.3s";

    setTimeout(() => {
      clipBg.classList.remove("active");
      clipBg1.classList.remove("active");
      clipBg.classList.add("active-transisi");
      clipBg1.classList.add("active-transisi");

      setTimeout(() => {
        clipBg.classList.remove("active-transisi");
        clipBg1.classList.remove("active-transisi");
      }, 1900);
    }, 1200);
  } else {
    iconDarkMode.classList.add("fa-moon");
    iconDarkMode.classList.remove("fa-sun");

    clipBg.classList.remove("active-transisi");
    clipBg.classList.toggle("active");
    clipBg1.classList.toggle("active");
    clipBg.style.backgroundColor = "#ffffff";
    clipBg1.style.backgroundColor = "#FFFFFF";

    iconDarkMode.style.transform = "translate(-50%, -50%) rotate(-720deg)";
    iconDarkMode.style.transition = "transform 5.3s";

    setTimeout(() => {
      clipBg.classList.remove("active");
      clipBg1.classList.remove("active");
      clipBg.classList.add("active-transisi");
      clipBg1.classList.add("active-transisi");
      setTimeout(() => {
        clipBg.classList.remove("active-transisi");
        clipBg1.classList.remove("active-transisi");
      }, 1900);
    }, 1200);
  }
});

// list bln toggle
