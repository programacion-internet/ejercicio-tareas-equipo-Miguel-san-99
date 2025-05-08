<x-mi-layout titulo="Registrar tarea">
    <div class="container">
        <div class="row">
            <h1>Registrar tarea</h1>
            <form method="POST" action="{{ route('tarea.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre de la tarea</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tarea de ejemplo">
                </div>
                <div class="form-group">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="6" placeholder="Descripcion de la tarea"></textarea>
                </div>
                <div class="form-group">
                    <label for="fecha" class="form-label">Fecha de entrega</label>
                    <input type="date" class="form-control" id="fecha" name="fecha_limite" placeholder="31/12/00">
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>
</x-mi-layout>
