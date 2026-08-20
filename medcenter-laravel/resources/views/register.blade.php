<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Registro - MedCenter</title>

        <meta name="description" content="Crea una cuenta para gestionar tus citas medicas en MedCenter." />
        <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    </head>

    <body>
        <main class="login-container">
            <section class="login-card">
                <header class="login-header">
                    <h1>MedCenter</h1>
                    <h2>Crear una cuenta</h2>
                    <p>Regístrate para comenzar a gestionar tus citas médicas.</p>
                </header>

                <form id="register-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name"> Nombre completo </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="nombre completo"
                            autocomplete="name"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <label for="email"> Correo electrónico </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="correo@ejemplo.com"
                            autocomplete="email"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <label for="phone"> Teléfono </label>

                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            placeholder="+591 123 456 789"
                            autocomplete="tel"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <label for="password"> Contraseña </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="********"
                            autocomplete="new-password"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation"> Confirmar Contraseña </label>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="********"
                            autocomplete="new-password"
                            required
                        />
                    </div>

                    <button type="submit" class="btn-primary">Registrarse</button>

                    <p id="register-message"></p>
                </form>

                <footer class="login-footer">
                    <p>
                        ¿Ya tienes una cuenta?

                        <a href="{{ route('login') }}"> Inicia sesión </a>
                    </p>

                    <a href="{{ route('home') }}"> ← Volver al inicio </a>
                </footer>
            </section>
        </main>

        <script src="{{ asset('js/register.js') }}" defer></script>
    </body>
</html>
