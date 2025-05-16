<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios Registrados</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body {
            height: 100%;
            font-family: 'Arial', sans-serif;
            background: #005b99;
            color: #333;
        }
        .auth-links {
            background-color: #003366;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }
        .auth-links a, .logout-button {
            text-decoration: none;
            color: white;
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #005b99;
            transition: 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .auth-links a:hover,
        .logout-button:hover {
            background-color: #003366;
            transform: scale(1.05);
        }
        header {
            background-color: #003366;
            color: white;
            padding: 100px 20px 30px;
            text-align: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        header h1 {
            font-size: 2.5rem;
        }
        main {
            flex: 1;
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h2, label {
            color: #003366;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ccc;
            text-align: center;
            white-space: nowrap;
        }
        th {
            background-color: #003366;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f6fa;
        }
        tr:hover {
            background-color: #e1ecf4;
        }
        .btn-primary, .btn-warning, .btn-danger {
            background-color: #003366;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            transition: 0.3s;
        }
        .btn-primary:hover,
        .btn-warning:hover,
        .btn-danger:hover {
            background-color:  #005b99;
            transform: scale(1.05);

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
  transform: scale(1.1);  /* Aumenta el tamaño al 10% */
  background-color:  #005b99;
    }
        footer {
            background-color: #003366;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }
        .filter-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        select, button {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-left: 5px solid #28a745;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
            flex-wrap: wrap;
        }
        .action-buttons .btn-primary {
            flex: 1 1 200px;
            text-align: center;
        }

        @media (max-width: 768px) {
      .filter-form {
        flex-direction: column;
      }

      header h1 {
        font-size: 2rem;
      }
    }

        /* ==== ESTILOS PARA IMPRESIÓN ==== */
        @media print {
            * {
        color: #000 !important;
        background: transparent !important;
        box-shadow: none !important;
      }
            .auth-links,
            footer,
            .button,
            .btn-primary,
            .btn-warning,
            .btn-danger,
            .filter-form,
            .action-buttons,
            .actions-column {
                display: none !important;
            }

            body {
                background-color: white;
                color: black;
                font-size: 12pt;
                line-height: 1.4;
                padding: 20px;
            }

            main {
                margin: 0;
                padding: 0;
                width: 100%;
                background-color: white;
                box-shadow: none;
            }
            

            table {
                width: 100%;
                border-collapse: collapse;
                font-size: 11pt;
                margin-top: 20px;
            }

            th, td {
                border: 1px solid #000;
                padding: 10px;
                text-align: center;
                vertical-align: middle;
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
            tr:nth-child(even) {
                background-color: #f5f5f5 !important;
            }

            tr:hover {
                background-color: transparent !important;
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
        <h1>Horarios Registrados</h1>
    </header>

    <main>
        <div class="action-buttons">
            <a href="{{ route('horarios.create') }}" class="btn-primary">Registrar nuevo horario</a>
            <a href="{{ route('asistencias.index') }}" class="btn-primary">Ver Asistencias</a>
            <button onclick="window.print();" class="btn-primary">🖨️ Imprimir</button>
            
        </div>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('horarios.index') }}" class="filter-form">
            <div>
                <label for="dia">Día:</label>
                <select name="dia" id="dia">
                    <option value="">Todos los días</option>
                    @foreach(['Lunes','Martes','Miércoles','Jueves','Viernes'] as $dia)
                        <option value="{{ $dia }}" {{ request('dia') == $dia ? 'selected' : '' }}>{{ $dia }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id_carrera">Carrera:</label>
                <select name="id_carrera" id="id_carrera">
                    <option value="">Todas las carreras</option>
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id_carrera }}" {{ request('id_carrera') == $carrera->id_carrera ? 'selected' : '' }}>
                            {{ $carrera->carrera }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <br>
                <button type="submit" class="btn-primary">Filtrar</button>
            </div>
        </form>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Maestro</th>
                        <th>Asignatura</th>
                        <th>Día</th>
                        <th>Hora de Inicio</th>
                        <th>Hora de Fin</th>
                        <th>Grupo</th>
                        <th>Carrera</th>
                        <th>Aula</th>
                        <th>Registrado por</th>
                        <th class="actions-column">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($horarios as $horario)
                        <tr>
                            <td>{{ $horario->maestro->nombre }} {{ $horario->maestro->apellido }}</td>
                            <td>{{ $horario->asignatura->nombre_asignatura }}</td>
                            <td>{{ $horario->dia }}</td>
                            <td>{{ $horario->hora_inicio }}</td>
                            <td>{{ $horario->hora_fin }}</td>
                            <td>{{ $horario->grupo->grupo }}</td>
                            <td>{{ $horario->carrera->carrera }}</td>
                            <td>{{ $horario->aula->aula }}</td>
                            <td>{{ $horario->usuario->name ?? 'N/A' }}</td>
                            <td class="actions-column">
                                @php $role = Auth::user()->role; @endphp

                                @if($role === 'subdirector' || $role === 'prefecto')
                                    <a href="{{ route('asistencias.create.horario', ['horarioId' => $horario->id_horario]) }}" class="btn-warning">✅</a>
                                @endif

                                @if($role === 'subdirector' || $role === 'jefe_academico')
                                    <a href="{{ route('horarios.edit', $horario->id_horario) }}" class="btn-warning">✏️</a>
                                    <form action="{{ route('horarios.ocultar', $horario->id_horario) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Deseas eliminar este horario?')">
                                        @csrf
                                        @method('PATCH')
                                    <button type="submit" class="btn-danger">❌</button>
                                    </form>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div>
        <div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px;">
    
    <a href="{{ route('prefectura.index') }}" class="button">Volver al inicio</a>
    
</div>
    </main>

    <footer>
        <p>&copy; 2025 INSTITUTO TECNOLÓGICO DE TIZIMÍN - Todos los derechos reservados</p>
    </footer>

    <script>
        function imprimirTabla() {
            const style = document.createElement('style');
            style.textContent = '@media print {.print\\:hidden { display: none !important; }}';
            document.head.appendChild(style);
            window.print();
        }
    </script>

</body>
</html>
