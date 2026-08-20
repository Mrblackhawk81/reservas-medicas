<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>MedCenter - Reserva de citas médicas</title>

        <meta
            name="description"
            content="Centro médico especializado en brindar atención médica de calidad con un sistema de reservas en línea."
        />

        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    </head>

    <body>
        <header id="header">
            <a href="{{ route('home') }}" class="logo">
                <span class="logo-icon"></span>
                MedCenter
            </a>

            <button class="menu-btn" id="menu-links">☰</button>

            <nav class="nav-links" id="main-nav">
                <a href="#inicio">Inicio</a>
                <a href="#nosotros">Nosotros</a>
                <a href="#especialidades">Especialidades</a>
                <a href="#contacto">Contacto</a>

                <a href="{{ route('register') }}"> Registrarse </a>
            </nav>

            <button id="menu-toggle" class="button-mode">🌙 Modo Oscuro</button>

            <a href="{{ route('login') }}" class="btn-started"> Iniciar Sesión </a>
        </header>

        <main>
            <section id="inicio" class="hero">
                <h2>Tu salud, nuestra prioridad.</h2>

                <p>Agenda tus consultas medicas de forma rapida, segura y desde cualquier lugar.</p>

                <a href="{{ route('login') }}" class="btn"> Reserve una cita </a>
            </section>

            <section id="nosotros">
                <h2>Sobre Nosotros</h2>

                <p>
                    Somos un centro médico comprometido con brindar atención profesional mediante un equipo de
                    especialistas altamente capacitados.
                </p>
            </section>

            <section id="especialidades">
                <h2>Especialidades</h2>

                <div class="marquee-container">
                    <div class="marquee-content">
                        <div class="card">
                            <div class="card-icon">image</div>
                            <h3>Medicina General</h3>
                            <p>Atención y prevención para la familia.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">image</div>
                            <h3>Cardiología</h3>
                            <p>Especialistas en el corazón.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">image</div>
                            <h3>Dermatología</h3>
                            <p>Salud y cuidado de la piel.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">image</div>
                            <h3>Odontología</h3>
                            <p>Cuidado para una sonrisa sana.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">image</div>
                            <h3>Medicina General</h3>
                            <p>Atención y prevención para la familia.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">image</div>
                            <h3>Cardiología</h3>
                            <p>Especialistas en el corazón.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">image</div>
                            <h3>Dermatología</h3>
                            <p>Salud y cuidado de la piel.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">image</div>
                            <h3>Odontología</h3>
                            <p>Cuidado para una sonrisa sana.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="como-funciona">
                <h2>Cómo Funciona</h2>

                <div class="steps-grid">
                    <div class="step-card">
                        <div class="step-icon">image</div>
                        <h3>1. Regístrate</h3>
                        <p>Crea una cuenta gratuita o inicia sesión en nuestro portal de pacientes.</p>
                    </div>
                    <div class="step-card">
                        <div class="step-icon">image</div>
                        <h3>2. Elige Especialidad</h3>
                        <p>Selecciona el área médica o el doctor que necesitas consultar.</p>
                    </div>
                    <div class="step-card">
                        <div class="step-icon">image</div>
                        <h3>3. Reserva tu Horario</h3>
                        <p>Visualiza la agenda y escoge la fecha y hora que más te convengan.</p>
                    </div>
                    <div class="step-card">
                        <div class="step-icon">image</div>
                        <h3>4. Confirma tu Cita</h3>
                        <p>Verifica los datos y recibe la confirmación instantánea de tu reserva.</p>
                    </div>
                </div>
            </section>

            <section id="contacto">
                <h2>Contacto</h2>
                <p class="contacto-subtitle">¿Tienes alguna pregunta o necesitas ayuda? Estamos para atenderte.</p>

                <div class="contacto-container">
                    <div class="contacto-info">
                        <div class="info-item">
                            <span class="info-icon">📍</span>
                            <div>
                                <h4>Ubicación</h4>
                                <p>Av. Panamericana , Ciudad de Cochabamba</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">📞</span>
                            <div>
                                <h4>Teléfono</h4>
                                <p>+591 75341223</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">✉️</span>
                            <div>
                                <h4>Correo</h4>
                                <p>contacto@medcenter.com</p>
                            </div>
                        </div>
                    </div>

                    <form class="contacto-form">
                        @csrf

                        <div class="form-group">
                            <label for="nombre"> Nombre </label>
                            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" />
                        </div>

                        <div class="form-group">
                            <label for="correo"> Correo electrónico </label>
                            <input type="email" id="correo" name="correo" placeholder="correo@ejemplo.com" />
                        </div>

                        <div class="form-group">
                            <label for="mensaje"> Mensaje </label>
                            <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje"></textarea>
                        </div>

                        <button type="submit" class="btn">Enviar mensaje</button>
                    </form>
                </div>
            </section>
        </main>

        <footer>
            <div class="footer-content">
                <div>
                    <h3>MedCenter</h3>

                    <p>Tu salud, nuestra prioridad.</p>
                </div>

                <div>
                    <h4>Horarios</h4>

                    <p>Lunes a Viernes</p>

                    <p>08:00 - 18:00</p>
                </div>

                <div>
                    <h4>Enlaces</h4>

                    <ul>
                        <li>
                            <a href="#"> Términos y Condiciones </a>
                        </li>

                        <li>
                            <a href="#"> Política de Privacidad </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div>
                <p>&copy; 2026 MedCenter. Todos los derechos reservados.</p>
            </div>
        </footer>

        <script src="{{ asset('js/script.js') }}" defer></script>
    </body>
</html>
