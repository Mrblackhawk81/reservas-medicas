let formulario = document.querySelector("#form-helados");
let aviso = document.querySelector("#aviso-helados");

function validarPedido(event) {

    let nombre = document.querySelector("#nombre").value;
    let correo = document.querySelector("#correo").value;
    let sabores = document.querySelector("#sabores").value;

    if (nombre === "" || correo === "") {
        event.preventDefault();
        aviso.textContent = "complete su nombre y su correo para hacer el pedido.";
        aviso.classList.add("error");
        aviso.classList.remove("ok");

    } else if (!correo.includes("@")) {
        event.preventDefault();
        aviso.textContent = "Revisá el correo: le falta la @.";
        aviso.classList.add("error");
        aviso.classList.remove("ok");

    } else {
        aviso.textContent = "¡Pedido enviado con éxito! - Cristian Israel Alarcón Saigua";
        aviso.classList.add("ok");
        aviso.classList.remove("error");
    }
}

formulario.addEventListener("submit", validarPedido);