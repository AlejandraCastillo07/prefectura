<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function index()
{
    $usuarios = User::all(); // Obtiene todos los usuarios de la base de datos
    return view('usuarios.index', compact('usuarios'));
}

    public function create()
    {
        return view('usuarios.crear_usuario');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role'     => 'required|string',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('usuarios.create')->with('success', 'Usuario registrado correctamente.');
    }

    public function edit($id)
{
    $usuario = User::findOrFail($id); // Obtener el usuario por su ID
    return view('usuarios.edit', compact('usuario')); // Pasar el usuario a la vista de edición
}

public function update(Request $request, $id)
{
    $usuario = User::findOrFail($id);

    // Validar los datos ingresados
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email,' . $id, // Asegurarse de que el email sea único excepto el del propio usuario
        'password' => 'nullable|string|min:6', // Contraseña opcional, solo se actualiza si es proporcionada
        'role'     => 'required|string',
    ]);

    // Actualizar los datos del usuario
    $usuario->name = $request->name;
    $usuario->email = $request->email;

    // Si la contraseña se ha proporcionado, actualizarla
    if ($request->password) {
        $usuario->password = Hash::make($request->password);
    }

    $usuario->role = $request->role;

    $usuario->save(); // Guardar los cambios

    return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
}


}
