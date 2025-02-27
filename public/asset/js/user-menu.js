function toggleAccountPopup() {
    let popup = document.getElementById("account-popup");
    popup.classList.toggle("show");
}

document.addEventListener("click", function (event) {
    let popup = document.getElementById("account-popup");
    let userIcon = document.querySelector(".user-icon");
    
    if (!popup.contains(event.target) && !userIcon.contains(event.target)) {
        popup.classList.remove("show");
    }
});
