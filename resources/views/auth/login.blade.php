@extends('layouts.login')

@section('content')
    <div style="max-width: 420px; margin: auto; background-color: white; padding: 30px; border-radius: 15px; box-shadow: 0 6px 12px rgba(0,0,0,0.2);">
        <h2 style="text-align: center; margin-bottom: 25px; color: #003366; font-weight: bold;">Iniciar Sesión</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; font-weight: 600; color: #003366;">Correo electrónico</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autofocus
                       style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; margin-top: 5px;">

                @error('email')
                    <div style="color: red; font-size: 0.9rem; margin-top: 5px;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; font-weight: 600; color: #003366;">Contraseña</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required
                       style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; margin-top: 5px;">

                @error('password')
                    <div style="color: red; font-size: 0.9rem; margin-top: 5px;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div style="margin-bottom: 20px; display: flex; align-items: center;">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" style="margin-left: 8px; font-size: 0.95rem;">Recuérdame</label>
            </div>

            <div style="text-align: center; margin-bottom: 10px;">
                <button type="submit" style="background-color: #003366; color: white; padding: 10px 20px; border: none; border-radius: 8px; font-size: 1rem; cursor: pointer;">
                    Iniciar sesión
                </button>
            </div>

            <!-- @if (Route::has('password.request'))
                <div style="text-align: center; margin-top: 10px;">
                    <a href="{{ route('password.request') }}" style="font-size: 0.9rem; color: #005b99;">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
            @endif
        </form> -->
    </div>
@endsection
