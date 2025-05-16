@php
    $role = Auth::user()->role;
@endphp

@if($role === 'subdirector' || $role === 'jefe_academico')
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTRAR HORARIO</title>
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
      align-items: center;
      padding-top: 0;
    }

    header {
      background-color: #003366;
      color: white;
      padding: 40px 0 20px;
      text-align: center;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      width: 100%;
      position: relative;
      z-index: 1;
    }

    header h1 {
      font-size: 3rem;
      font-weight: 600;
    }

    main {
      max-width: 500px;
      width: 90%;
      background-color: white;
      padding: 30px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border-radius: 15px;
      text-align: center;
      margin-top: 30px;
    }

    form {
      width: 100%;
    }

    label {
      display: block;
      margin-top: 15px;
      color: #003366;
      font-size: 1rem;
      text-align: left;
    }

    input, select, button {
      width: 100%;
      padding: 12px;
      margin-top: 5px;
      border-radius: 8px;
      border: 1px solid #ddd;
      font-size: 1rem;
    }

    input:focus, select:focus {
      border-color: #005b99;
      outline: none;
    }

    button {
      background-color: #003366;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
      margin-top: 20px;
    }

    button:hover {
      background-color: #005b99;
      transform: scale(1.05);
    }

    .button-link {
      display: inline-block;
      background-color: #003366;
      color: white;
      padding: 12px;
      width: 100%;
      border-radius: 8px;
      font-size: 1rem;
      text-align: center;
      text-decoration: none;
      margin-top: 15px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .button-link:hover {
      background-color: #005b99;
      transform: scale(1.05);
    }

    footer {
      width: 100%;
      background-color: #003366;
      color: white;
      padding: 15px;
      text-align: center;
      margin-top: 50px;
    }

    footer p {
      font-size: 1rem;
    }

    @media (max-width: 600px) {
      header h1 {
        font-size: 2rem;
      }

      main {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <header>
    <h1>REGISTRAR NUEVO HORARIO</h1>
  </header>

  <main>

    <form action="{{ route('horarios.store') }}" method="POST">
      @csrf

      <label for="id_maestro">MAESTRO</label>
      <select name="id_maestro" id="id_maestro" required>
        <option value="">SELECCIONA UN MAESTRO</option>
        @foreach($maestros as $maestro)
          <option value="{{ $maestro->id_maestro }}">{{ $maestro->nombre }} {{ $maestro->apellido }}</option>
        @endforeach
      </select>

      <label for="id_asignatura">ASIGNATURA</label>
      <select name="id_asignatura" id="id_asignatura" required>
        <option value="">SELECCIONA UNA ASIGNATURA</option>
        @foreach($asignaturas as $asignatura)
          <option value="{{ $asignatura->id_asignatura }}">{{ $asignatura->nombre_asignatura }}</option>
        @endforeach
      </select>

      <label for="id_carrera">CARRERA</label>
      <select name="id_carrera" id="id_carrera" required>
        <option value="">SELECCIONA UNA CARRERA</option>
        @foreach($carreras as $carrera)
          <option value="{{ $carrera->id_carrera }}">{{ $carrera->carrera }}</option>
        @endforeach
      </select>

      <label for="id_grupo">GRUPO</label>
      <select name="id_grupo" id="id_grupo" required>
        <option value="">SELECCIONA UN GRUPO</option>
        @foreach($grupos as $grupo)
          <option value="{{ $grupo->id_grupo }}">{{ $grupo->grupo }}</option>
        @endforeach
      </select>

      <label for="id_aula">AULA</label>
      <select name="id_aula" id="id_aula" required>
        <option value="">SELECCIONA UN AULA</option>
        @foreach($aulas as $aula)
          <option value="{{ $aula->id_aula }}">{{ $aula->aula }}</option>
        @endforeach
      </select>

      <label for="dia">DÍA</label>
      <select name="dia" id="dia" required>
        <option value="">SELECCIONA UN DÍA</option>
        <option value="Lunes">Lunes</option>
        <option value="Martes">Martes</option>
        <option value="Miércoles">Miércoles</option>
        <option value="Jueves">Jueves</option>
        <option value="Viernes">Viernes</option>
        <option value="Sábado">Sábado</option>
        <option value="Domingo">Domingo</option>
      </select>

      <label for="hora_inicio">HORA DE INICIO</label>
      <input type="time" name="hora_inicio" id="hora_inicio" required>

      <label for="hora_fin">HORA DE FIN</label>
      <input type="time" name="hora_fin" id="hora_fin" required>

      <button type="submit">Guardar horario</button>
    </form>

    <a href="{{ route('horarios.index') }}" class="button-link">Cancelar</a>
    
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
            window.location.href = "{{ route('prefectura.index') }}"; // Cambia 'home' por la ruta que prefieras
        }, 3000); // 3 segundos
    </script>
@endif

</body>
</html>
