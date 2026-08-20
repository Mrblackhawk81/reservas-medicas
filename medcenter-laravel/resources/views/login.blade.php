<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Iniciar sesión - MedCenter</title>

        <meta name="description" content="Inicia sesión para gestionar tus citas medicas en MedCenter." />
        <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    </head>

    <body>
        <main class="login-container">
            <section class="login-card">
                <header class="login-header">
                    <h1>MedCenter</h1>
                    <h2>Iniciar sesión</h2>
                    <p>Accede a tu cuenta para gestionar tus citas medicas.</p>
                </header>

                <form id="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
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
                        <label for="password"> Contraseña </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="********"
                            autocomplete="current-password"
                            required
                        />
                    </div>

                    <div class="form-options">
                        <label>
                            <input type="checkbox" id="remember" name="remember" />
                            Recordarme
                        </label>

                        <a href="#"> ¿Olvidaste tu contraseña? </a>
                    </div>

                    <a href="{{ route('dashboard') }}" class="btn-primary">Iniciar sesión</a>

                    <p id="login-message"></p>
                </form>

                <footer class="login-footer">
                    <p>
                        ¿No tienes una cuenta?

                        <a href="{{ route('register') }}"> Regístrate </a>
                    </p>

                    <a href="{{ route('home') }}"> ← Volver al inicio </a>
                </footer>
            </section>
        </main>

        <script src="{{ asset('js/login.js') }}" defer></script>
    </body>
</html>
