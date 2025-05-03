<x-mi-layout titulo="Nuevo">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">

            {{-- <div class="alert alert-primary" role="alert">
                A simple primary alert—check it out!
            </div> --}}

            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha limite</th>
                    <th>Propietario</th>
                    <th>Participantes</th>
                </tr>

                @foreach ($tareas as $tarea)
                    <tr>
                        <td><a href="{{ route('tarea.show', $tarea) }}">{{ $tarea->id }}</a></td>
                        <td>{{ $tarea->nombre }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->fecha_limite }}</td>
                        <td>{{ $tarea->owner->name }}</td>
                        <td>
                            @foreach ($tarea->users as $user)
                                {{ $user->name }} <br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</x-mi-layout>
