<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Cliente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md text-center">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">¡Bienvenido, <?php echo e(auth()->user()->name); ?>!</h2>
        <p class="text-gray-600 mb-6">Este será nuestro embudo de pagos. Aquí restringiremos el acceso hasta que el cliente active su suscripción.</p>
        
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none" type="submit">
                Cerrar Sesión
            </button>
        </form>
    </div>
</body>
</html><?php /**PATH C:\Excelencia\Excelencia\resources\views/dashboard.blade.php ENDPATH**/ ?>