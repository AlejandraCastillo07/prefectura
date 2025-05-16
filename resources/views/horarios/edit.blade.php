@php
    $role = Auth::user()->role;
@endphp

@if($role === 'subdirector' || $role === 'jefe_academico')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Horario</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Arial', sans-serif;
            background: #005b99;
            color: #333;
            min-height: 100vh;
        }
        header {
            background-color: #003366;
            color: white;
            padding: 80px 20px 30px;
            text-align: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        header h1 {
            font-size: 2.2rem;
        }
        main {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        form > div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            color: #003366;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn-primary, .btn-danger {
            background-color: #003366;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }
        .btn-primary:hover, .btn-danger:hover {
            transform: scale(1.1); /* Aumenta el tamaño del botón */
        }
        .btn-primary:hover {
            background-color: #005b99;
        }
        .btn-danger {
            background-color: #003366;
            margin-left: 10px;
        }
        .btn-danger:hover {
            background-color:  #005b99;
        }
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border-left: 5px solid #dc3545;
            border-radius: 8px;
        }

        footer {
      width: 100%;
      background-color: #003366;
      color: white;
      padding: 15px;
      text-align: center;
      margin-top: 50px;
    }

        @media (max-width: 768px) {
            header h1 {
                font-size: 1.8rem;
            }
            .btn-primary, .btn-danger {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Editar Horario</h1>
    </header>

    <main>
        @if ($errors->any())
            <div class="alert">
                <ul style="margin-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('horarios.update', $horario->id_horario) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label>Maestro:</label>
                <select name="id_maestro" required>
                    @foreach($maestros as $maestro)
                        <option value="{{ $maestro->id_maestro }}" {{ $horario->id_maestro == $maestro->id_maestro ? 'selected' : '' }}>
                            {{ $maestro->nombre }} {{ $maestro->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Asignatura:</label>
                <select name="id_asignatura" required>
                    @foreach($asignaturas as $asignatura)
                        <option value="{{ $asignatura->id_asignatura }}" {{ $horario->id_asignatura == $asignatura->id_asignatura ? 'selected' : '' }}>
                            {{ $asignatura->nombre_asignatura }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Día:</label>
                <select name="dia" required>
                    @foreach(['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'] as $dia)
                        <option value="{{ $dia }}" {{ $horario->dia == $dia ? 'selected' : '' }}>{{ $dia }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Hora de Inicio:</label>
                <input type="time" name="hora_inicio" value="{{ $horario->hora_inicio }}" required>
            </div>

            <div>
                <label>Hora de Fin:</label>
                <input type="time" name="hora_fin" value="{{ $horario->hora_fin }}" required>
            </div>

            <div>
                <label>Grupo:</label>
                <select name="id_grupo" required>
                    @foreach($grupos as $grupo)
                        <option value="{{ $grupo->id_grupo }}" {{ $horario->id_grupo == $grupo->id_grupo ? 'selected' : '' }}>
                            {{ $grupo->grupo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Carrera:</label>
                <select name="id_carrera" required>
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id_carrera }}" {{ $horario->id_carrera == $carrera->id_carrera ? 'selected' : '' }}>
                            {{ $carrera->carrera }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Aula:</label>
                <select name="id_aula" required>
                    @foreach($aulas as $aula)
                        <option value="{{ $aula->id_aula }}" {{ $horario->id_aula == $aula->id_aula ? 'selected' : '' }}>
                            {{ $aula->aula }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-top: 20px; text-align: center;">
                <button type="submit" class="btn-primary">Actualizar</button>
                <a href="{{ route('horarios.index') }}" class="btn-danger">Cancelar</a>
            </div>
        </form>
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
            window.location.href = "{{ route('prefectura.index') }}"; 
        }, 3000); // 3 segundos
    </script>
@endif

</body>
</html>
