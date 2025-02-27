document.addEventListener("DOMContentLoaded", function () {
    const quantityButtons = document.querySelectorAll(".quantity-btn");
    const hiddenQuantityInput = document.getElementById("hidden-quantity");

    quantityButtons.forEach(button => {
        button.addEventListener("click", function () {
            quantityButtons.forEach(btn => btn.classList.remove("active"));

            this.classList.add("active");

            hiddenQuantityInput.value = this.getAttribute("data-value");
        });
    });
});

function toggleTab(event, tabId) {
    let tabContents = document.querySelectorAll(".tab-content");
    let tabLinks = document.querySelectorAll(".tab-link");

    tabContents.forEach(content => content.classList.remove("active"));

    tabLinks.forEach(link => link.classList.remove("active"));

    document.getElementById(tabId).classList.add("active");

    event.currentTarget.classList.add("active");
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("description").classList.add("active");
});