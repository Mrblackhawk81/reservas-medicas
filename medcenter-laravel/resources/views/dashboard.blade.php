<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard - MedCenter</title>

        <meta name="description" content="Dashboard de paciente en MedCenter." />

        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    </head>
    <body>
        @php
            $initials = collect(explode(' ', $user->name))
                ->filter()
                ->map(fn ($part) => mb_strtoupper(mb_substr($part, 0, 1)))
                ->take(2)
                ->implode('');
        @endphp

        <header class="dashboard-header">
            <a href="{{ route('home') }}" class="logo">
                <span class="logo-icon"></span>
                MedCenter
            </a>

            <div class="header-actions">
                <button class="icon-btn" aria-label="Notificaciones">
                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                </button>
                <div class="user-dropdown">
                    <div class="avatar">
                        <span style="font-size: 0.9rem;">{{ $initials }}</span>
                    </div>
                    <span class="user-name">{{ $user->name }}</span>
                    <span class="dropdown-arrow">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </span>
                </div>
            </div>
        </header>
        <main class="dashboard-main">
            <section class="welcome-section">
                <div class="welcome-text">
                    <h1>Hola, {{ $user->name }}</h1>
                    <p>¿Qué necesitas hacer hoy?</p>
                </div>
                <button class="btn btn-primary-lg">Reservar una cita</button>
            </section>
            <section class="upcoming-appointment">
                <h2>Próxima Cita</h2>
                @if($upcomingAppointment)
                    <div class="appointment-card">
                        <div class="appointment-details">
                            <div class="detail-item"><strong>Fecha:</strong> {{ $upcomingAppointment->appointment_date->format('d/m/Y') }}</div>
                            <div class="detail-item"><strong>Hora:</strong> {{ $upcomingAppointment->appointment_date->format('h:i A') }}</div>
                            <div class="detail-item"><strong>Doctor:</strong> {{ $upcomingAppointment->doctor?->name ?? 'Sin doctor asignado' }}</div>
                            <div class="detail-item"><strong>Especialidad:</strong> {{ $upcomingAppointment->doctor?->specialty ?? 'Sin especialidad' }}</div>
                            <div class="detail-item"><strong>Ubicación:</strong> {{ $upcomingAppointment->doctor?->location ?? 'Sin ubicación' }}</div>
                        </div>
                        <div class="appointment-actions">
                            <button class="btn btn-secondary">Ver detalles</button>
                            <button class="btn btn-secondary">Reprogramar</button>
                            <button class="btn btn-danger">Cancelar</button>
                        </div>
                    </div>
                @else
                    <div class="empty-state">
                        <p>No tienes citas programadas en este momento.</p>
                        <button class="btn btn-primary">Agendar nueva cita</button>
                    </div>
                @endif
            </section>

            <!-- Resumen -->
            <section class="summary-section">
                <h2>Resumen</h2>
                <div class="summary-grid">
                    <div class="summary-card">
                        <h3>Próximas</h3>
                        <div class="summary-value">{{ $summary['upcoming'] }}</div>
                    </div>
                    <div class="summary-card">
                        <h3>Completadas</h3>
                        <div class="summary-value">{{ $summary['completed'] }}</div>
                    </div>
                    <div class="summary-card">
                        <h3>Canceladas</h3>
                        <div class="summary-value">{{ $summary['cancelled'] }}</div>
                    </div>
                </div>
            </section>
            <section class="quick-access">
                <h2>Accesos Rápidos</h2>
                <div class="access-grid">
                    <button class="access-btn">
                        <span class="access-icon"><svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span> 
                        Buscar médico
                    </button>
                    <button class="access-btn">
                        <span class="access-icon"><svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span> 
                        Mis citas
                    </button>
                    <button class="access-btn">
                        <span class="access-icon"><svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span> 
                        Mi perfil
                    </button>
                    <button class="access-btn">
                        <span class="access-icon"><svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"></path><path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"></path></svg></span> 
                        Historial
                    </button>
                </div>
            </section>
        </main>

        <footer class="dashboard-footer">
            <nav class="footer-nav">
                <a href="#">Términos y Condiciones</a>
                <span class="divider">|</span>
                <a href="#">Política de Privacidad</a>
                <span class="divider">|</span>
                <a href="#">Soporte</a>
            </nav>
            <p>&copy; 2026 MedCenter. Todos los derechos reservados.</p>
        </footer>
    </body>
</html>
