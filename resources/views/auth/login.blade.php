<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <div style="text-align: center; margin-bottom: 40px;">
                <a href="/" style="color: #4b5563; text-decoration: none; font-size: 14px; font-weight: 500; transition: color 0.3s;" onmouseover="this.style.color='#000'" onmouseout="this.style.color='#4b5563'">
                    &larr; Volver a la página principal
                </a>
            </div>

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Iniciar Sesión</h2>
        
        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Correo Electrónico</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-black" id="email" type="email" name="email" required autofocus>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Contraseña</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-black" id="password" type="password" name="password" required>
            </div>
            <button class="w-full bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded focus:outline-none" type="submit">
                Entrar al Sistema
            </button>
        </form>
    </div>
</body>
</html>