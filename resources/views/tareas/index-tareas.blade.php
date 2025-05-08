<x-mi-layout titulo="Nuevo">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">

            {{-- <div class="alert alert-primary" role="alert">
                A simple primary alert—check it out!
            </div> --}}

            <table class="table table-striped">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Fecha limite</th>
                    <th scope="col">Propietario</th>
                </tr>

                @forelse ($tareas as $tarea)
                    <tr>
                        @can('view', $tarea)
                            <td><a href="{{ route('tarea.show', $tarea) }}">{{ $tarea->id }}</a></td>
                            <td>{{ $tarea->nombre }}</td>
                            <td>{{ $tarea->descripcion }}</td>
                            <td>{{ $tarea->fecha_limite }}</td>
                            <td>{{ $tarea->owner->name }}</td>
                        @endcan
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay tareas disponibles.</td>
                        </tr>
                @endforelse
            </table>

        </div>
    </div>
</x-mi-layout>
