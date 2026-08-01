const body = document.body;
const button = document.getElementById("menu-toggle");

button.addEventListener("click", () => {

    body.classList.toggle("oscuro");

    if (body.classList.contains("oscuro")) {
        button.textContent = "☀️ Modo Claro";
    } else {
        button.textContent = "🌙 Modo Oscuro";
    }

});