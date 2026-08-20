// Login form validation

const loginForm = document.querySelector("#login-form");
const loginMessage = document.querySelector("#login-message");

function revisarLogin(event) {
    const email = document.querySelector("#email").value.trim();
    const password = document.querySelector("#password").value;

    if (email.includes("@") === false) {
        event.preventDefault();

        loginMessage.textContent = "Ese correo no es válido.";
        loginMessage.classList.add("error");
        loginMessage.classList.remove("exito");

    } else if (password === "") {
        event.preventDefault();

        loginMessage.textContent = "Falta escribir la contraseña.";
        loginMessage.classList.add("error");
        loginMessage.classList.remove("exito");

    } else {

        loginMessage.textContent = "Verificando credenciales";
        loginMessage.classList.add("exito");
        loginMessage.classList.remove("error");
    }
}

if (loginForm) {
    loginForm.addEventListener("submit", revisarLogin);
}