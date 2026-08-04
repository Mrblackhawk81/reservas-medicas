const boton = document.querySelector("#btn-confirmar");

function mostrarMensaje() {
  const mensaje = document.querySelector("#mensaje");
  mensaje.textContent = "Pedido recibido - te atiende Cristian Israel Alarcon Saigua";
  mensaje.classList.remove("oculto");
}

boton.addEventListener("click", mostrarMensaje);
