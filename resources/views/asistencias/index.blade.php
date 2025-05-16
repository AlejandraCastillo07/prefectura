<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencias</title>
    <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  html, body {
    height: 100%;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #005b99;
    color: #333;
  }

  body {
    display: flex;
    flex-direction: column;
  }

  .auth-links {
    background-color: #003366;
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: flex-end;
    gap: 15px;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 10;
  }

  .auth-links a,
  .logout-button,
  .filter-form button,
  .action-button,
  .button {
    text-decoration: none;
    color: white;
    font-size: 1rem;
    padding: 10px 20px;
    background-color: #005b99;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: transform 0.3s ease, background-color 0.3s ease;
  }

  .auth-links a:hover,
  .logout-button:hover,
  .filter-form button:hover,
  .action-button:hover,
  .button:hover {
    transform: scale(1.05);
    background-color: #003366;
  }

  header {
    background-color: #003366;
    color: white;
    text-align: center;
    padding: 80px 20px 40px;
  }

  header h1 {
    font-size: 2.5rem;
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

  main {
    flex: 1;
    max-width: 1200px;
    margin: 30px auto;
    padding: 30px;
    background-color: white;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  }

  .filter-form {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    justify-content: space-between;
    margin-bottom: 30px;
  }

  .filter-form div {
    display: flex;
    flex-direction: column;
    flex: 1 1 180px;
  }

  .filter-form label {
    font-weight: bold;
    color: #003366;
    margin-bottom: 5px;
  }

  .filter-form input,
  .filter-form select,
  .filter-form button {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 1rem;
    width: 100%;
  }

  .filter-form button {
    background-color: #003366;
    color: white;
    font-weight: bold;
    cursor: pointer;
    margin-top: 10px;
  }

  .filter-form button:hover {
    background-color: #005b99;
  }

  /* Estilo de la tabla */
  .table-container {
    overflow-x: auto; /* Esto permite el desplazamiento horizontal */
    -webkit-overflow-scrolling: touch; /* Para mejorar la experiencia en iOS */
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
  }

  th {
    background-color: #003366;
    color: white;
  }

  td {
    background-color: #f9f9f9;
  }

  table tr:hover td {
    background-color: #e6f0ff;
  }

  .action-button {
    background-color: #003366;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 8px 12px;
    font-size: 1rem;
    margin: 2px;
    cursor: pointer;
    transition: transform 0.2s;
  }

  .action-button:hover {
    transform: scale(1.05);
    background-color: #005b99;
  }

  .button {
    display: block;
    margin: 30px auto 0;
    padding: 12px 30px;
    background-color: #003366;
    color: white;
    border-radius: 8px;
    font-size: 1.1rem;
    text-decoration: none;
    text-align: center;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .button:hover {
    background-color: #005b99;
  }

  footer {
    background-color: #003366;
    color: white;
    text-align: center;
    padding: 15px;
    margin-top: 40px;
  }

  /* Responsividad para pantallas pequeñas */
  @media (max-width: 768px) {
    .filter-form {
      flex-direction: column;
      gap: 10px; /* Reducido el espacio entre filtros */
    }

    header h1 {
      font-size: 2rem;
    }

    .auth-links {
  background-color: #003366;
  color: white;
  padding: 15px 20px;
  display: flex;
  justify-content: flex-end;  /* Alinea los elementos a la derecha */
  gap: 15px;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 10;
}


    .auth-links a {
      font-size: 0.9rem;
      margin-bottom: 10px;
    }

    .filter-form button {
      width: 100%;
    }

    .button {
      width: 100%;
    }

    table th, table td {
      font-size: 0.9rem;
    }

    main {
      margin: 20px;
      padding: 20px;
    }

    .filter-form div {
      flex: 1 1 100%; /* Los filtros ocupan toda la fila en pantallas pequeñas */
    }
  }

  /* Estilo para impresión */
  @media print {
    * {
      color: #000 !important;
      background: transparent !important;
      box-shadow: none !important;
    }

    .auth-links,
    .filter-form,
    .button,
    footer,
    td:last-child,
    th:last-child {
      display: none !important;
    }

    body, main {
      background: white !important;
      padding: 0 !important;
      margin: 0 !important;
    }

    main {
      box-shadow: none;
      padding: 0;
    }

    table {
      font-size: 12px;
      border: 1px solid #000;
    }

    th, td {
      border: 1px solid #000 !important;
      background: transparent !important;
      color: #000 !important;
    }

    th {
      background-color: #e0e0e0 !important;
      -webkit-print-color-adjust: exact;
      print-color-adjust: exact;
    }

    header {
      background: white !important;
      color: black !important;
      padding: 20px 0;
    }

    header h1 {
      font-size: 1.5rem;
      text-align: center;
      border-bottom: 2px solid black;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
  }
</style>

</head>
<body>
<div class="auth-links">
    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button">Cerrar sesión</button>
        </form>
    @endauth
</div>

<header>
    <h1>Asistencias</h1>
</header>

<main>
@if(session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

<!-- Formulario de filtros -->
<form method="GET" action="{{ route('asistencias.index') }}" class="filter-form">
    <div>
        <label for="fecha_asistencia">Fecha:</label>
        <input type="date" name="fecha_asistencia" id="fecha_asistencia" value="{{ request('fecha_asistencia', \Carbon\Carbon::now()->format('Y-m-d')) }}">
    </div>

    <div>
        <label for="mes">Mes:</label>
        <select name="mes" id="mes">
            <option value="">Todos</option>
            @foreach(range(1, 12) as $m)
                <option value="{{ $m }}" {{ request('mes') == $m ? 'selected' : '' }}>
                {{ mb_strtoupper(\Carbon\Carbon::create()->month($m)->locale('es')->monthName) }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="anio">Año:</label>
        <input type="number" name="anio" id="anio" value="{{ request('anio') }}">
    </div>

    <div>
        <label for="id_estado">Estado:</label>
        <select name="id_estado" id="id_estado">
            <option value=""> Todos </option>
            @foreach($tipos_estado as $estado)
                <option value="{{ $estado->id_estado }}" {{ request('id_estado') == $estado->id_estado ? 'selected' : '' }}>
                    {{ $estado->estado }}
                </option>
            @endforeach
        </select>
    </div>

    <div style="flex: 1 1 100%;">
        <button type="submit"> Filtrar</button>
    </div>
</form>

<!-- Botón de imprimir -->
<button onclick="imprimirTabla()" class="button">🖨️ Imprimir</button>

<!-- Tabla de asistencias -->
<div class="table-container">
<table>
    <thead>
        <tr>
            <th>Grupo</th>
            <th>Aula</th>
            <th>Maestro</th>
            <th>Materia</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Registrado por</th>
            @if(Auth::check() && (Auth::user()->role == 'prefecto' || Auth::user()->role == 'subdirector'))

                <th class="print:hidden">Acciones</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse($asistencias as $asistencia)
            <tr>
                <td>{{ $asistencia->horario->grupo->grupo ?? '' }}</td>
                <td>{{ $asistencia->horario->aula->aula ?? '' }}</td>
                <td>{{ $asistencia->horario->maestro->nombre }} {{ $asistencia->horario->maestro->apellido }}</td>
                <td>{{ $asistencia->horario->asignatura->nombre_asignatura ?? '' }}</td>
                <td>{{ $asistencia->fecha_asistencia }}</td>
                <td>{{ $asistencia->tipoestado->estado ?? 'N/A' }}</td>
                <td>{{ $asistencia->usuario->name ?? 'Desconocido' }}</td>
                @if(Auth::check() && (Auth::user()->role == 'prefecto' || Auth::user()->role == 'subdirector'))
                    <td class="print:hidden">
                        <a href="{{ route('asistencias.edit', $asistencia->id_asistencia) }}" class="action-button">✏️</a>
                        <form action="{{ route('asistencias.ocultar', $asistencia->id_asistencia) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Deseas eliminar esta asistencia?')" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="action-button">❌</button>
                        </form>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="7">No hay asistencias registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>

<div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px;">
    <a href="{{ route('prefectura.index') }}" class="button">Volver al inicio</a>
    <a href="{{ route('horarios.index') }}" class="button">Ver Horarios</a>
</div>
</main>

<footer>
    <p>&copy; 2025 INSTITUTO TECNOLÓGICO DE TIZIMÍN - Todos los derechos reservados</p>
</footer>

<script>
    function imprimirTabla() {
        window.print();
    }
</script>
</body>
</html>
