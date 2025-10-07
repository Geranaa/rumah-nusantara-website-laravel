const garistiga = document.getElementById("garistiga");
const navBar = document.getElementById("navbar-dropdown");

garistiga.addEventListener("click", () => {
    navBar.style.display = navBar.style.display === "block" ? "none" : "block";
});
const dropdownButton = document.getElementById("dropdown-button");
const dropdownMenu = document.getElementById("dropdown-menu");

dropdownButton.addEventListener("click", () => {
    dropdownMenu.classList.toggle("hidden");
});

document.addEventListener("click", (event) => {
    if (
        !dropdownButton.contains(event.target) &&
        !dropdownMenu.contains(event.target)
    ) {
        dropdownMenu.classList.add("hidden");
    }
});
