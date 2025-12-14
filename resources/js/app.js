document.addEventListener("DOMContentLoaded", function () {
    console.log("ShopHub JS Loaded");

    let alerts = document.querySelectorAll(".auto-hide");
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.display = "none";
        }, 3000);
    });
});
