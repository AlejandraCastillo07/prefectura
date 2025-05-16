<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: 'Arial', sans-serif;
            background: #005b99;
            color: #333;
            line-height: 1.6;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 0;
        }

        header {
            background-color: #003366;
            color: white;
            padding: 60px 0 30px;
            text-align: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        main {
            max-width: 100%;
            margin: 40px auto;
            padding: 40px;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            text-align: center;
            flex: 1;
        }

        main h2 {
            font-size: 2.5rem;
            color: #003366;
            margin-bottom: 20px;
            font-weight: 600;
        }

        form {
            display: grid;
            gap: 20px;
            max-width: 600px;
            margin: 0 auto;
            text-align: left;
        }

        label {
            font-size: 1.1rem;
            color: #003366;
            font-weight: 600;
        }

        select, input {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            font-size: 1rem;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f4f4f4;
        }

        .btn-primary,
        button {
            background-color: #003366;
            color: white;
            padding: 14px 25px;
            font-size: 1.2rem;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary:hover,
        button:hover {
            background-color: #005b99;
            transform: scale(1.05);
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border-left: 5px solid #28a745;
            border-radius: 5px;
            padding: 15px;
            margin: 20px auto;
            max-width: 600px;
        }

        footer {
            text-align: center;
            background-color: #003366;
            color: white;
            padding: 15px;
            margin-top: 50px;
        }

        footer p {
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            main {
                padding: 20px;
            }

            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Editar Usuario</h1>
    </header>

    <main>
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" value="{{ old('name', $usuario->name) }}" required>
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="email" value="{{ old('email', $usuario->email) }}" required>
            </div>

            <div class="form-group">
                <label>Contraseña (opcional)</label>
                <input type="password" name="password">
            </div>

            <div class="form-group">
                <label>Rol</label>
                <select name="role" required>
                    <option value="subdirector" {{ $usuario->role == 'subdirector' ? 'selected' : '' }}>Subdirector</option>
                    <option value="jefe_academico" {{ $usuario->role == 'jefe_academico' ? 'selected' : '' }}>Jefe académico</option>
                    <option value="prefecto" {{ $usuario->role == 'prefecto' ? 'selected' : '' }}>Prefecto/a</option>
                </select>
            </div>

            <button type="submit" class="btn-primary">Actualizar</button>
            <a href="{{ route('usuarios.index') }}" class="btn-primary">Cancelar</a>
        </form>
    </main>

    <footer>
        <p>&copy; 2025 INSTITUTO TECNOLÓGICO DE TIZIMÍN - Todos los derechos reservados</p>
    </footer>

</body>
</html>
