function setTeamID() {
    sessionStorage.clear();

    var selectedTeamID = document.querySelector(
        'input[name="TeamID"]:checked'
    ).value;
    console.log("Geselecteerde TeamID:", selectedTeamID);
    sessionStorage.setItem("TeamID", selectedTeamID);

    var storedTeamID = sessionStorage.getItem("TeamID");
    console.log("TeamID in sessie:", storedTeamID);
}

let menuInitialized = false;
function toggleMenu() {
    let list = document.querySelector("ul");
    let menuIcon = document.getElementById("menuIcon");
    if (!menuInitialized) {
        ("");
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
document
    .getElementById("menuToggleButton")
    .addEventListener("click", function (event) {
        event.preventDefault();
    });