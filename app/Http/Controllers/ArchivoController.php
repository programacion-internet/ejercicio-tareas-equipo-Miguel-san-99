<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchivoController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->mi_archivo->isValid()) { //Valida carga

            //Guarda en storage/app/archivos_cargados
            $nombreHash = $request->mi_archivo->store('archivos_cargados');
            //Crea registro en tabla archivos
            Archivo::create([
                'user_id' => auth()->id(),
                'tarea_id' => $request->input('tarea_id'),
                'nombre_original' => $request->mi_archivo->getClientOriginalName(),
                'nombre_hash' => $nombreHash,
                'mime' => $request->mi_archivo->getClientMimeType(),
                'tamanio' => $request->mi_archivo->getSize(),
            ]);
        }
        return redirect()->back();
    }

    public function download(Archivo $archivo)
    {
        //Obtiene ruta del archivo
        $rutaArchivo = storage_path('app/private/' . $archivo->nombre_hash);

        //La respuesta contiene el archivo con el tipo de documento
        return response()->download($rutaArchivo, $archivo->nombre_original, ['Content-Type' => $archivo->mime]);
    }

    public function delete(Archivo $archivo)
    {
        $rutaArchivo = storage_path($archivo->nombre_hash);

        //Verifica la existencia del archivo
        if (\Storage::exists($archivo->nombre_hash)) {
            \Storage::delete($archivo->nombre_hash); //Elimina archivo
            $archivo->delete(); //Elimina registro en tabla
        }

        return redirect()->back();
    }
}
