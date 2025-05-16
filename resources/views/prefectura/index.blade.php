<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Bienvenido a la Prefectura - TCNM</title>
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

        .auth-links {
            background-color: #003366;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 10px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }

        .auth-links a, .auth-links button {
            text-decoration: none;
            color: white;
            font-size: 1rem;
            padding: 12px 20px;  /* Ajuste de padding para que ambos botones tengan el mismo tamaño */
            border-radius: 8px;
            background-color: #005b99;
            transition: background-color 0.3s ease, transform 0.2s ease;
            border: none; /* Asegura que no haya borde en el botón */
            cursor: pointer;
            display: inline-block;
            line-height: 1.5; /* Asegura que el texto se alinee correctamente */
        }

        .auth-links a:hover, .auth-links button:hover {
            background-color: #003366;
            transform: scale(1.05);
        }

        header {
            background-color: #003366;
            color: white;
            padding: 80px 20px 30px;
            text-align: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            margin-top: 70px;
        }

        header h1 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        nav ul li a {
            text-decoration: none;
            font-size: 1.1rem;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
        }

        nav ul li a:hover {
            background-color: #005b99;
            transform: scale(1.05);
        }

        main {
            max-width: 100%;
            margin: 40px auto;
            padding: 40px 20px;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            text-align: center;
            flex: 1;
        }

        main h2 {
            font-size: 2rem;
            color: #003366;
            margin-bottom: 20px;
            font-weight: 600;
        }

        main p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .button {
            background-color: #003366;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1rem;
            margin: 10px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
        }

        .button:hover {
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

        .menu {
        list-style-type: none;
        padding: 0;
        margin: 20px 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .menu li {
        width: 100%;
        text-align: center;
    }

    .menu a {
        display: block;
        background-color: #003366;
        color: white;
        padding: 15px 30px;
        text-decoration: none;
        border-radius: 8px;
        font-size: 1rem;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .menu a:hover {
        background-color: #005b99;
        transform: scale(1.05);
    }
        @media (max-width: 768px) {
            header h1 {
                font-size: 1.8rem;
            }

            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin: 10px 0;
            }

            .button {
                width: 100%;
                max-width: 300px;
                margin: 10px auto;
            }

            main h2 {
                font-size: 1.6rem;
            }

            .auth-links {
                flex-direction: column;
                align-items: flex-end;
                padding: 10px;
            }

            .auth-links a {
                width: 100%;
                text-align: center;
                margin: 5px 0;
            }

            main {
                padding: 20px 15px;
            }

        
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido a la Prefectura - TECNM</h1>

    </header>

    <div class="auth-links">
        <!-- Verificar si el usuario está autenticado -->
        @if (Auth::check())
            <!-- Si el usuario está autenticado, mostrar el botón de cerrar sesión -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="button">Cerrar sesión</button>
            </form>
        @else
            <!-- Si el usuario no está autenticado, mostrar el botón de iniciar sesión -->
            <a href="{{ route('login') }}" class="button">Iniciar sesión</a>
        @endif
    </div>

    <main>
    
    <h2>Opciones principales</h2>
    
    <p>Seleccione una opción del menú</p>
    <ul class="menu">
    <li><a href="{{ route('horarios.index') }}" class="button">Horarios</a></li>
        <li><a href="{{ route('asistencias.index') }}" class="button">Asistencias</a></li>
    @if(Auth::check() && (Auth::user()->role == 'subdirector'))
    <li><a href="{{ route('usuarios.index') }}" class="button">Usuarios</a></li>
    <li><a href="{{ route('usuarios.create') }}" class="button">Registrar usuario</a></li>
    @endif   
    @if(Auth::check() && (Auth::user()->role == 'subdirector' || Auth::user()->role == 'jefe_academico'))
    <li><a href="{{ route('horarios.create') }}" class="button">Registrar Horarios</a></li>
    @endif        
    </ul>
</main>

    <footer>
        <p>&copy; 2025 INSTITUTO TECNOLÓGICO DE TIZIMÍN - Todos los derechos reservados</p>
    </footer>
</body>
</html>
