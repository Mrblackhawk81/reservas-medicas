// Register form validation

const registerForm = document.querySelector("#register-form");
const registerMessage = document.querySelector("#register-message");

function revisarRegistro(event) {
    const name = document.querySelector("#name").value.trim();
    const email = document.querySelector("#email").value.trim();
    const phone = document.querySelector("#phone").value.trim();
    const password = document.querySelector("#password").value;
    const passwordConfirmation = document.querySelector("#password_confirmation").value;

    if (name === "") {
        event.preventDefault();
        showMessage("Por favor, ingresa tu nombre completo.", "error");
    } else if (email.includes("@") === false) {
        event.preventDefault();
        showMessage("Por favor, ingresa un correo válido.", "error");
    } else if (phone === "") {
        event.preventDefault();
        showMessage("Por favor, ingresa tu número de teléfono.", "error");
    } else if (password === "") {
        event.preventDefault();
        showMessage("Falta escribir la contraseña.", "error");
    } else if (password.length < 6) {
        event.preventDefault();
        showMessage("La contraseña debe tener al menos 6 caracteres.", "error");
    } else if (password !== passwordConfirmation) {
        event.preventDefault();
        showMessage("Las contraseñas no coinciden.", "error");
    } else {
        showMessage("Creando tu cuenta", "exito");
    }
}

function showMessage(text, type) {
    registerMessage.textContent = text;
    if (type === "error") {
        registerMessage.classList.add("error");
        registerMessage.classList.remove("exito");
    } else {
        registerMessage.classList.add("exito");
        registerMessage.classList.remove("error");
    }
}

if (registerForm) {
    registerForm.addEventListener("submit", revisarRegistro);
}
