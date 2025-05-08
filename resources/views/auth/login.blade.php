<x-mi-layout titulo="Iniciar sesion">
    <div class="container">
        <div class="row">
            <h1>iniciar sesion</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" id="correo" name="email" aria-describedby="emailHelp" placeholder="Ingresa tu correo" required value="{{ old('correo') }}">
                </div>
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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
