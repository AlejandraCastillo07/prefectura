<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Usuarios Registrados</title>
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

    .auth-links a,
    .logout-button {
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
      padding: 60px 0 30px;
      text-align: center;
    }

    header h1 {
      font-size: 3rem;
      font-weight: 600;
    }

    main {
      max-width: 100%;
      margin: 100px auto 40px;
      padding: 40px;
      background-color: white;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border-radius: 15px;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
      padding: 15px;
      margin-top: 100px;
      margin-left: auto;
      margin-right: auto;
      width: 90%;
      border: 1px solid #c3e6cb;
      border-radius: 8px;
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th, td {
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #003366;
      color: white;
    }

    .btn-primary {
      background-color: #003366;
      color: white;
      padding: 10px 20px;
      font-size: 1rem;
      border-radius: 8px;
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
      display: inline-block;
      margin-bottom: 20px;
    }

    .btn-primary:hover {
      background-color: #005b99;
      transform: scale(1.05);
    }

    footer {
      text-align: center;
      background-color: #003366;
      color: white;
      padding: 15px;
    }

    footer p {
      font-size: 1rem;
    }

    .button {
      display: block;
      margin: 30px auto 0;
      padding: 12px 30px;
      background-color: #003366;
      color: white;
      border-radius: 8px;
      font-size: 1rem;
      text-decoration: none;
      text-align: center;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .button:hover {
      transform: scale(1.05);
      background-color: #005b99;
    }

    /* === RESPONSIVE === */
    @media (max-width: 768px) {
      header h1 {
        font-size: 2rem;
      }

      main {
        padding: 20px;
      }

      table {
        display: block;
        width: 100%;
        overflow-x: auto;
      }

      thead {
        display: none;
      }

      table, tbody, tr, td {
        display: block;
        width: 100%;
      }

      tr {
        margin-bottom: 20px;
        background: #f9f9f9;
        border-radius: 8px;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      td {
        text-align: left;
        padding: 10px 10px;
        position: relative;
      }

      td::before {
        content: attr(data-label);
        font-weight: bold;
        display: block;
        color: #003366;
        margin-bottom: 5px;
      }

      .btn-primary, .button {
        font-size: 1rem;
        padding: 8px 16px;
        width: 100%;
        box-sizing: border-box;
        text-align: center;
      }

      .auth-links {
        flex-direction: column;
        align-items: flex-end;
        padding: 10px;
      }

      .success {
        margin-top: 120px;
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

  @if(session('success'))
    <div class="success">
      {{ session('success') }}
    </div>
  @endif

  <header>
    <h1>Usuarios</h1>
  </header>

  <main>
    <a href="{{ route('usuarios.create') }}" class="btn-primary"> 👤 Nuevo Usuario</a>

    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Rol</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($usuarios as $usuario)
        <tr>
          <td data-label="Nombre">{{ $usuario->name }}</td>
          <td data-label="Correo">{{ $usuario->email }}</td>
          <td data-label="Rol">{{ $usuario->role }}</td>
          <td data-label="Acciones">
            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn-primary">✏️</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <a href="{{ route('prefectura.index') }}" class="button">Volver al inicio</a>
  </main>

  <footer>
    <p>&copy; 2025 INSTITUTO TECNOLÓGICO DE TIZIMÍN - Todos los derechos reservados</p>
  </footer>
</body>
</html>
