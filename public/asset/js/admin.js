document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById("salesChart").getContext("2d");
    new Chart(ctx, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Sales",
                data: [200, 400, 300, 600, 500, 700, 600, 800, 900],
                borderColor: "#5e72e4",
                fill: false,
                tension: 0.3
            }]
        }
    });
});
