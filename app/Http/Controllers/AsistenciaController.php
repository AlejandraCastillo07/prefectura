<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Horario;
use Illuminate\Http\Request;
use App\Models\TipoEstado; // Importa el modelo Estado
use Illuminate\Support\Facades\Auth;



class AsistenciaController extends Controller
{
     // Mostrar las asistencias registradas para un horario específico

     public function index(Request $request)
{
    $query = Asistencia::where('visible', 1)
        ->with(['horario.maestro', 'horario.asignatura', 'horario.grupo', 'horario.carrera', 'horario.aula', 'tipoestado', 'usuario']);

    if ($request->filled('fecha_asistencia')) {
        $query->whereDate('fecha_asistencia', $request->fecha_asistencia);
    }

    if ($request->filled('mes')) {
        $query->whereMonth('fecha_asistencia', $request->mes);
    }

    if ($request->filled('anio')) {
        $query->whereYear('fecha_asistencia', $request->anio);
    }

    if ($request->filled('id_estado')) {
        $query->where('id_estado', $request->id_estado);
    }

    $asistencias = $query->orderBy('fecha_asistencia', 'desc')->get();

    // Para el select de estados
    $tipos_estado = \App\Models\TipoEstado::all();

    return view('asistencias.index', compact('asistencias', 'tipos_estado'));
}






    //  public function index(Request $request)
    //  {
    //      // Obtener la fecha proporcionada por el usuario
    //      $fechaFiltro = $request->input('fecha');
 
    //      // Si se proporciona una fecha, filtrar las asistencias por esa fecha
    //      if ($fechaFiltro) {
    //          $asistencias = Asistencia::whereDate('fecha_asistencia', $fechaFiltro)->get();
    //      } else {
    //          // Si no se proporciona una fecha, obtener todas las asistencias
    //          $asistencias = Asistencia::all();
    //      }
 
    //      // Pasar las asistencias y la fecha al view
    //      return view('asistencias.index', compact('asistencias', 'fechaFiltro'));
    //  }
 

    // Mostrar el formulario para crear la asistencia
    public function create($horarioId = null)
{
    if (!$horarioId) {
        return redirect()->route('horarios.index')->with('error', 'No se proporcionó un horario válido.');
    }

    $horario = Horario::find($horarioId);

    if (!$horario) {
        return redirect()->route('horarios.index')->with('error', 'Horario no encontrado.');
    }

    return view('asistencias.create', compact('horario'));
}


    // Almacenar la asistencia en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'id_horario' => 'required|exists:horarios,id_horario',
            'id_estado' => 'required|integer',
            'fecha_asistencia' => 'required|date',
            'hora_asistencia' => 'required|date_format:H:i',
        ]);

        // Crear la asistencia
        Asistencia::create([
            'id_horario' => $validated['id_horario'],
            'id_estado' => $validated['id_estado'],
            'fecha_asistencia' => $validated['fecha_asistencia'],
            'hora_asistencia' => $validated['hora_asistencia'],
            'id_usuario' => Auth::id(),
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('asistencias.index', ['horarioId' => $validated['id_horario']])->with('success', 'Asistencia registrada exitosamente');
    }
    public function ocultar($id)
{
    $asistencia = Asistencia::findOrFail($id);
    $asistencia->visible = false;  // Establecer 'visible' a false para ocultar
    $asistencia->save();

    return redirect()->route('asistencias.index')->with('success', 'Asistencia oculta correctamente.');
}

public function edit($id)
{
    $asistencia = Asistencia::findOrFail($id); // Asegúrate de que este método esté obteniendo la asistencia correcta
    $tipos_estado = TipoEstado::all(); // Pasar los tipos de estado si los necesitas en la vista

    return view('asistencias.edit', compact('asistencia', 'tipos_estado')); // Asegúrate de pasar 'asistencia' y 'tipos_estado' a la vista
}





public function update(Request $request, $id)
{
    $asistencia = Asistencia::findOrFail($id);
    $asistencia->update($request->all()); // Actualiza la asistencia con los datos del formulario

    return redirect()->route('asistencias.index')->with('success', 'Asistencia actualizada correctamente');
}

}
