<x-mi-layout titulo="Registrar">
    <div class="container">
        <div class="row">
            <h1>Registrar</h1>
            <form method="POST" action="{{ route('registrar') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="name" aria-describedby="emailHelp" placeholder="nombre de usuario" required>
                    </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" name="email" aria-describedby="emailHelp" placeholder="Ingresa tu correo" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirma tu contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-mi-layout>
