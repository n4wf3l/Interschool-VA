let menuInitialized = false;
function toggleMenu() {
    let list = document.querySelector("ul");
    let menuIcon = document.getElementById("menuIcon");
    if (!menuInitialized) {
        list.classList.add("hidden");
        menuInitialized = true;
    }

    if (list.classList.contains("hidden")) {
        list.classList.remove("hidden");
        menuIcon.name = "close";
        list.classList.add("top-[60px]");
    } else {
        list.classList.add("hidden");
        menuIcon.name = "menu";
        list.classList.remove("top-[60px]");
    }
}
