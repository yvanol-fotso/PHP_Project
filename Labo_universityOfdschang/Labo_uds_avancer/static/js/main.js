const mobileMenuContainer = document.querySelector(".mobile-menu-container");
const mobileMenuIcon = document.querySelector(".mobile-menu-icon");
const menuCloseIcon = document.querySelector(".menu-close-icon");

mobileMenuIcon.addEventListener("click", function () {
  mobileMenuContainer.classList.add("active");
});

menuCloseIcon.addEventListener("click", function () {
  mobileMenuContainer.classList.remove("active");
});
