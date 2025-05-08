<x-mi-layout titulo=Inicio>
    <!-- Hero Section -->
    <section class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Organiza tus tareas en equipo</h1>
            <p class="lead">Colabora, asigna y gestiona tareas fácilmente con nuestra plataforma.</p>
            <a href="#features" class="btn btn-light mt-3">Descubrir más</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">¿Qué puedes hacer?</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4>Asignación de tareas</h4>
                    <p>Asigna tareas a los miembros del equipo y da seguimiento a su progreso.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>Notificaciones</h4>
                    <p>Recibe alertas sobre fechas límite y tareas nuevas directamente en tu correo.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>Colaboración en tiempo real</h4>
                    <p>Comparte archivos, comentarios y actualizaciones en cada tarea.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-light py-5 text-center">
        <div class="container">
            <h3>Comienza ahora y mejora la productividad de tu equipo</h3>
            <a href="{{ route('show.registrar') }}" class="btn btn-primary mt-3">Registrarse gratis</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">&copy; 2025 Tareas en Equipo. Todos los derechos reservados.</p>
    </footer>
</x-mi-layout>
