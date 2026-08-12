let formulario = document.querySelector("#form-helados");
let aviso = document.querySelector("#aviso-helados");

function validarPedido(event) {

    let nombre = document.querySelector("#nombre").value;
    let correo = document.querySelector("#correo").value;
    let sabores = document.querySelector("#sabores").value;

    if (nombre === "" || correo === "") {
        event.preventDefault();
        aviso.textContent = "Falta tu nombre o tu correo - sin eso no podemos anotar el pedido.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");

    } else if (!correo.includes("@")) {
        event.preventDefault();
        aviso.textContent = "Ese correo no tiene arroba - revísalo por favor.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");

    } else {
        aviso.textContent = "Pedido anotado - te atiende Cristian Israel Alarcon Saigua";
        aviso.classList.add("exito");
        aviso.classList.remove("error");
    }
}

formulario.addEventListener("submit", validarPedido);