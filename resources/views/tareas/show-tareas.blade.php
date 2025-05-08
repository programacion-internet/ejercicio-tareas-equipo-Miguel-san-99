<x-mi-layout titulo="Detalle tarea">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="text-end">
                <form class="" action="{{ route('tarea.destroy', $tarea) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar tarea</button>
                </form>
            </div>
            <h1>{{ $tarea->nombre }}</h1>
            <ul>
                <li>Descripcion: {{ $tarea->descripcion }}</li>
                <li>Fecha limite: {{ $tarea->fecha_limite }}</li>
                <li>Propietario: {{ $tarea->owner->name }}</li>
            </ul>
            <hr>

            <h2>Participantes</h2>
            <ul>
                @foreach ($tarea->users as $user)
                    <li>{{ $user->name }}</li>
                @endforeach
            </ul>

            @can('viewOwner', $tarea)
                <hr>
                <form action="{{ route('tarea.actualizar-usuarios', $tarea) }}" method="POST">
                    <h2>Invitar usuarios</h2>
                    @csrf
                    <select name="user_id[]" id="user_id" multiple>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}" @selected(array_search($user->id, $tarea->users->pluck('id')->toArray()) !== false)>
                            {{ $user->name }} - {{ $user->email }}
                        </option>
                        @endforeach
                    </select>
                    <br>
                    {{-- <input type="hidden" name="alumno_id" value="{{ $alumno->id }}"> --}}
                    <button type="submit" class="btn btn-primary">Invitar</button>
                </form>
            @endcan
            <hr>
            <h2>Carga de archivos</h2>
            <form method="POST" action="{{ route('archivo.upload') }}" enctype="multipart/form-data">
                @csrf
                {{-- <label for="archivo">Carga de Archivo</label> --}}
                <input name="mi_archivo" type="file">
                <input type="hidden" name="tarea_id" value="{{ $tarea->id }}">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <div class="card">
                <div class="card-header">Archivos Cargados</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                        <th>Archivo</th>
                        <th>Tamaño</th>
                        <th colspan="2">Acciones</th>
                        </tr>

                        @foreach($archivos as $archivo)
                            <tr>
                                <td>{{ $archivo->nombre_original }}</td>
                                <td>{{ $archivo->tamanio }}</td>
                                <td>
                                    <a href="{{ route('archivo.download', $archivo->id) }}" class="btn btn-sm btn-success">Descargar</a>
                                </td>
                                <td>
                                    <!-- Formulario para eliminar archivo -->
                                    <form action="{{ route('archivo.delete', $archivo->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                                    </form>
                                    {{-- {!! Form::open(['route' => ['archivo.delete', $archivo->id]]) !!}
                                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                                    {!! Form::close() !!} --}}
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-mi-layout>
