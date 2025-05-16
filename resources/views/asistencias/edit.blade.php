@php
    $role = Auth::user()->role;
@endphp

@if($role === 'subdirector' || $role === 'prefecto')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Asistencia</title>
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
            padding: 40px 0 20px;
            text-align: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        main {
            max-width: 600px;
            margin: 40px auto;
            padding: 40px;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            flex: 1;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #003366;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #003366;
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #005b99;
            transform: scale(1.05);
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            background-color: #003366;
            padding: 12px;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .back-link:hover {
            background-color: #005b99;
            transform: scale(1.05);
        }

        footer {
            text-align: center;
            background-color: #003366;
            color: white;
            padding: 15px;
            margin-top: 50px;
        }

        @media (max-width: 768px) {
            main {
                padding: 20px;
                margin: 30px 20px;
            }

            header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Editar Asistencia</h1>
    </header>

    <main>
        <form action="{{ route('asistencias.update', $asistencia->id_asistencia) }}" method="POST">
            @csrf
            @method('PATCH')

            <label for="id_estado">Estado:</label>
            <select name="id_estado" id="id_estado" required>
                @foreach($tipos_estado as $tipo_estado)
                    <option value="{{ $tipo_estado->id_estado }}" 
                        {{ $asistencia->id_estado == $tipo_estado->id_estado ? 'selected' : '' }}>
                        {{ $tipo_estado->estado }}
                    </option>
                @endforeach
            </select>

            <label for="fecha_asistencia">Fecha de Asistencia:</label>
            <input type="date" name="fecha_asistencia" id="fecha_asistencia" value="{{ $asistencia->fecha_asistencia }}" required>

            <label for="hora_asistencia">Hora de Asistencia:</label>
            <input type="time" name="hora_asistencia" id="hora_asistencia" value="{{ $asistencia->hora_asistencia }}" required>

            <button type="submit">Actualizar Asistencia</button>
        </form>

        <a href="{{ route('asistencias.index') }}" class="back-link">Cancelar</a>
    </main>

    <footer>
        <p>&copy; 2025 INSTITUTO TECNOLÓGICO DE TIZIMÍN - Todos los derechos reservados</p>
    </footer>
    @else
    <div style="text-align:center; margin-top: 100px;">
        <h2 style="color:rgb(0, 31, 204); font-size: 1.8rem;">Acceso denegado</h2>
        <p style="font-size: 1.2rem;">No tienes permisos para acceder a esta página.</p>
        <p>Serás redirigido en unos segundos...</p>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "{{ route('home') }}"; // Cambia 'home' por la ruta que prefieras
        }, 3000); // 3 segundos
    </script>
@endif

</body>
</html>
