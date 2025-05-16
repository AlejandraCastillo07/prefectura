<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Maestro;
use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Grupo;
use App\Models\Aula;
use Illuminate\Support\Facades\Auth;

class HorarioController extends Controller
{

    
    public function index(Request $request)
{
    $query = Horario::with(['maestro', 'asignatura', 'carrera', 'grupo', 'aula']);

    // Filtrar por día
    if ($request->has('dia') && $request->dia != '') {
        $query->where('dia', $request->dia);
    }

    // Filtrar por carrera
    if ($request->has('id_carrera') && $request->id_carrera != '') {
        $query->where('id_carrera', $request->id_carrera);
    }
    if ($request->filled('mes')) {
        $horarios->whereMonth('created_at', $request->mes);
    }
    
    if ($request->filled('año')) {
        $horarios->whereYear('created_at', $request->año);
    }

    // Asegúrate de filtrar solo los horarios visibles
    $query->where('visible', true);

    // Obtener los horarios filtrados
    $horarios = $query->get();

    // Obtener las carreras disponibles
    $carreras = Carrera::all();

    // Pasar datos a la vista
    return view('horarios.index', [
        'horarios' => $horarios,
        'carreras' => $carreras,
    ]);
}


    public function create()
    {
        
        return view('horarios.create', [
            
            'maestros' => Maestro::all(),
            'asignaturas' => Asignatura::all(),
            'carreras' => Carrera::all(),
            'grupos' => Grupo::all(),
            'aulas' => Aula::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_maestro' => 'required',
            'id_asignatura' => 'required',
            'id_carrera' => 'required',
            'id_grupo' => 'required',
            'id_aula' => 'required',
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required'
        ]);

        Horario::create([
            'id_maestro'     => $request->id_maestro,
            'id_asignatura'  => $request->id_asignatura,
            'id_carrera'     => $request->id_carrera,
            'id_grupo'       => $request->id_grupo,
            'id_aula'        => $request->id_aula,
            'dia'            => $request->dia,
            'hora_inicio'    => $request->hora_inicio,
            'hora_fin'       => $request->hora_fin,
            'id_usuario'     => Auth::id(), // Aquí asignas el usuario autenticado
        ]);

        return redirect()->route('horarios.index')->with('success', 'Horario registrado correctamente');
    }

    public function edit($id)
{
    $horario = Horario::findOrFail($id);
    $maestros = Maestro::all();
    $asignaturas = Asignatura::all();
    $grupos = Grupo::all();
    $carreras = Carrera::all();
    $aulas = Aula::all();

    return view('horarios.edit', compact('horario', 'maestros', 'asignaturas', 'grupos', 'carreras', 'aulas'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'id_maestro' => 'required',
        'id_asignatura' => 'required',
        'dia' => 'required',
        'hora_inicio' => 'required',
        'hora_fin' => 'required',
        'id_grupo' => 'required',
        'id_carrera' => 'required',
        'id_aula' => 'required',
    ]);

    $horario = Horario::findOrFail($id);
    $horario->update($request->all());

    return redirect()->route('horarios.index')->with('success', 'Horario actualizado correctamente.');
}

public function ocultar($id)
{
    $horario = Horario::findOrFail($id);
    $horario->visible = false;
    $horario->save();

    return redirect()->route('horarios.index')->with('success', 'El horario eliminado correctamente.');
}


}
