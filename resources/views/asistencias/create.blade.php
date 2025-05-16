@php
    $role = Auth::user()->role;
@endphp

@if($role === 'subdirector' || $role === 'prefecto')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRAR ASISTENCIA</title>
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

        .info-horario {
            text-align: center;
            margin-bottom: 30px;
        }

        .info-horario p {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 10px;
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

        button {
            background-color: #003366;
            color: white;
            padding: 14px 25px;
            font-size: 1.2rem;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
        }

        button:hover {
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
        <h1>REGISTRAR ASISTENCIA</h1>
    </header>

    <main>
      

        <div class="info-horario">
            <p><strong>Maestro:</strong> {{ $horario->maestro->nombre }} {{ $horario->maestro->apellido }}</p>
            <p><strong>Asignatura:</strong> {{ $horario->asignatura->nombre_asignatura }}</p>
            <p><strong>Día:</strong> {{ $horario->dia }}</p>
            <p><strong>Hora de Inicio:</strong> {{ $horario->hora_inicio }}</p>
            <p><strong>Hora de Fin:</strong> {{ $horario->hora_fin }}</p>
        </div>

        <form action="{{ route('asistencias.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_horario" value="{{ $horario->id_horario }}">

            <label for="id_estado">Estado</label>
            <select name="id_estado" id="id_estado" required>
                <option value="1">Presente</option>
                <option value="2">Ausente</option>
                <option value="3">Justificado</option>
                <option value="4">Retardo</option>
            </select>

            <label for="fecha_asistencia">Fecha de Asistencia</label>
            <input type="date" name="fecha_asistencia" id="fecha_asistencia" value="{{ now()->toDateString() }}" required>

            <label for="hora_asistencia">Hora de Asistencia</label>
            <input type="time" name="hora_asistencia" id="hora_asistencia" required>

            <button type="submit">Registrar Asistencia</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2025 INSTITUTO TECNOLÓGICO DE TIZIMÍN - Todos los derechos reservados</p>
    </footer>
    @else
    <div style="text-align:center; margin-top: 100px;">
        <h2 style="color:rgb(0, 48, 204); font-size: 1.8rem;">Acceso denegado</h2>
        <p style="font-size: 1.2rem;">No tienes permisos para acceder a esta página.</p>
        <p>Serás redirigido en unos segundos</p>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "{{ route('horarios.index') }}"; // Cambia 'home' por la ruta que prefieras
        }, 3000); // 3 segundos
    </script>
@endif


    <!-- Script para poner la fecha y hora actual por defecto -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const hoy = new Date();
            const fecha = hoy.toISOString().split('T')[0];
            document.getElementById('fecha_asistencia').value = fecha;

            const horas = hoy.getHours().toString().padStart(2, '0');
            const minutos = hoy.getMinutes().toString().padStart(2, '0');
            const hora = `${horas}:${minutos}`;
            document.getElementById('hora_asistencia').value = hora;
        });
    </script>

</body>
</html>
