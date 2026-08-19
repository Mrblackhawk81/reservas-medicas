// Login form validation

const loginForm = document.querySelector("#login-form");
const loginMessage = document.querySelector("#login-message");

function revisarLogin(event) {

    event.preventDefault();

    const email = document.querySelector("#email").value;
    const password = document.querySelector("#password").value;

    if (email.includes("@") === false) {

        loginMessage.textContent = "Ese correo no es válido.";
        loginMessage.classList.add("error");
        loginMessage.classList.remove("exito");

    } else if (password === "") {

        loginMessage.textContent = "Falta escribir la contraseña.";
        loginMessage.classList.add("error");
        loginMessage.classList.remove("exito");

    } else {

        loginMessage.textContent = "Inicio de sesión correcto.";
        loginMessage.classList.add("exito");
        loginMessage.classList.remove("error");
    }
}

loginForm.addEventListener("submit", revisarLogin);