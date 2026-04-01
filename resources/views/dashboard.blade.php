<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de Operaciones | Conexialab</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animación fluida de entrada */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards; }
        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800 overflow-hidden relative">

    <div class="flex h-screen w-full">

        <div id="mobile-overlay" onclick="toggleMenu()" class="fixed inset-0 bg-slate-900/60 z-40 hidden opacity-0 transition-opacity duration-300 md:hidden backdrop-blur-sm"></div>

        <aside id="sidebar" class="fixed inset-y-0 left-0 md:relative flex flex-col w-72 bg-slate-900 shadow-[4px_0_24px_rgba(0,0,0,0.1)] z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-300">
            
            <button onclick="toggleMenu()" class="absolute top-6 right-4 text-slate-400 hover:text-white md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="p-6 flex items-center gap-3 border-b border-slate-800/60">
                <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                    </div>
                <span class="text-2xl font-black tracking-widest text-white">CONEXIALAB</span>
            </div>
            
            <nav class="flex-1 overflow-y-auto p-4 space-y-2 mt-4">
                @if(auth()->user()->subscribed('default'))
                    <a href="#" class="flex items-center gap-3 py-3 px-4 rounded-xl bg-blue-600/10 text-blue-400 font-bold border border-blue-500/20 transition-all hover:bg-blue-600/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard General
                    </a>
                    <a href="#" class="flex items-center gap-3 py-3 px-4 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                        Mis Proyectos
                    </a>
                    <a href="#" class="flex items-center gap-3 py-3 px-4 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Configuración
                    </a>
                @else
                    <div class="group relative flex items-center justify-between py-3 px-4 rounded-xl bg-slate-800/30 border border-slate-700/50 opacity-60 cursor-not-allowed overflow-hidden">
                        <div class="flex items-center gap-3 text-slate-400">
                            <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            <span class="font-medium">Dashboard</span>
                        </div>
                        <span class="text-[9px] font-black uppercase tracking-wider bg-red-500/20 text-red-400 py-1 px-2 rounded-md">Bloqueado</span>
                    </div>
                    <div class="group relative flex items-center justify-between py-3 px-4 rounded-xl bg-slate-800/30 border border-slate-700/50 opacity-60 cursor-not-allowed mt-2">
                        <div class="flex items-center gap-3 text-slate-400">
                            <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            <span class="font-medium">Proyectos</span>
                        </div>
                    </div>
                @endif
            </nav>

            <div class="p-4 border-t border-slate-800/60 bg-slate-900/50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 w-full py-3 px-4 rounded-xl text-slate-400 hover:text-red-400 hover:bg-red-500/10 transition-all font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 flex flex-col h-screen overflow-hidden bg-[#F8FAFC]">
            
            <header class="md:hidden bg-slate-900 text-white p-4 flex justify-between items-center shadow-md z-30 relative">
                <div class="flex items-center gap-4">
                    <button onclick="toggleMenu()" class="text-slate-300 hover:text-white focus:outline-none transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                            </div>
                        <span class="font-bold tracking-widest text-sm">CONEXIALAB</span>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-slate-300 hover:text-red-400 transition-colors"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg></button>
                </form>
            </header>

            <div class="flex-1 overflow-y-auto p-6 md:p-12 relative">
                
                <div class="absolute top-0 right-0 w-96 h-96 bg-blue-400/10 rounded-full blur-[100px] -z-10 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-72 h-72 bg-purple-400/10 rounded-full blur-[80px] -z-10 pointer-events-none"></div>

                <div class="max-w-6xl mx-auto animate-fade-in opacity-0">
                    
                    <header class="mb-10 md:mb-16">
                        @if(auth()->user()->subscribed('default'))
                            <h1 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight">Bienvenido, {{ auth()->user()->name }}</h1>
                        @else
                            <h1 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight">Hola, {{ auth()->user()->name }}</h1>
                            <p class="text-slate-500 mt-3 text-lg md:text-xl font-medium">Lleva tu negocio al siguiente nivel operativo.</p>
                        @endif
                    </header>

                    @if(!auth()->user()->subscribed('default'))
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 max-w-5xl mx-auto animate-fade-in opacity-0 delay-200">
                            
                            <div class="flex flex-col bg-white rounded-3xl p-8 md:p-10 border border-slate-200 shadow-xl shadow-slate-200/50 hover:-translate-y-2 transition-all duration-300 relative overflow-hidden group">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-slate-50 rounded-bl-full -z-10 transition-colors group-hover:bg-blue-50"></div>
                                
                                <h3 class="text-2xl font-bold text-slate-800">Prueba Gratis</h3>
                                <div class="mt-4 mb-8 flex items-end">
                                </div>
                                
                                <ul class="space-y-4 mb-10 flex-1">
                                    <li class="flex items-start gap-3 text-slate-600">
                                        <svg class="w-6 h-6 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        <span class="font-medium">Acceso Total Limitado</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-slate-600">
                                        <svg class="w-6 h-6 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        <span class="font-medium">14 Dias de Prueba</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-slate-600">
                                        <svg class="w-6 h-6 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        <span class="font-medium">Pruebalo YA!</span>
                                    </li>
                                </ul>
                                <form action="{{ route('checkout') }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="price_id" value="price_1THTejLQcRRjAr5I6MsLOLuh">
                                    <button class="w-full py-4 rounded-xl bg-slate-100 text-slate-800 font-bold hover:bg-slate-200 hover:text-slate-900 transition-colors border border-slate-300 shadow-sm">
                                        Comenzar
                                    </button>
                                </form>
                            </div>

                            <div class="flex flex-col bg-slate-900 rounded-3xl p-8 md:p-10 border border-slate-800 shadow-2xl shadow-blue-900/40 hover:-translate-y-2 transition-all duration-300 relative overflow-hidden group">
                                <div class="absolute -top-24 -right-24 w-64 h-64 bg-blue-600 rounded-full blur-[80px] opacity-40 group-hover:opacity-60 transition-opacity"></div>
                                
                                <div class="absolute top-0 inset-x-0 flex justify-center">
                                    <span class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-[11px] font-black uppercase tracking-widest py-1.5 px-6 rounded-b-xl shadow-lg">Recomendado</span>
                                </div>
                                
                                <h3 class="text-2xl font-bold text-white mt-4">Plan Corporativo</h3>
                                <div class="mt-4 mb-8 flex items-end">
                                    <span class="text-5xl font-black text-white tracking-tight">$60</span>
                                    <span class="text-lg text-slate-400 font-medium ml-2 mb-1">/mes</span>
                                </div>
                                
                                <ul class="space-y-4 mb-10 flex-1">
                                    <li class="flex items-start gap-3 text-slate-300">
                                        <svg class="w-6 h-6 text-blue-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span class="font-medium">Acceso de<strong class="text-white">Control Total</strong></span>
                                    </li>
                                    <li class="flex items-start gap-3 text-slate-300">
                                        <svg class="w-6 h-6 text-blue-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span class="font-medium">Manejo en Tiempo Real de Operaciones</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-slate-300">
                                        <svg class="w-6 h-6 text-blue-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span class="font-medium">Estadisticas en tiempo Real de Productos</span>
                                    </li>
                                </ul>
                                <form action="{{ route('checkout') }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="price_id" value="price_1THTejLQcRRjAr5I6MsLOLuh">
                                    <button class="w-full py-4 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-500 transition-colors shadow-lg shadow-blue-600/30 ring-2 ring-transparent hover:ring-blue-400/50">
                                        Desbloquear Plan
                                    </button>
                                </form>
                            </div>

                        </div>
                    @else
                        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8 md:p-12 animate-fade-in opacity-0 delay-100">
                            <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8 gap-4">
                                <h2 class="text-2xl font-bold text-slate-800">Resumen Operativo</h2>
                                <span class="bg-green-100/50 border border-green-200 text-green-700 px-5 py-2 rounded-full font-bold text-sm flex items-center shadow-sm">
                                    <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-3 animate-ping absolute"></span>
                                    <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-3 relative"></span>
                                    Suscripción Activa
                                </span>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-slate-50 border border-slate-100 p-6 rounded-2xl">
                                    <p class="text-slate-500 font-medium mb-1">Visitas del mes</p>
                                    <p class="text-3xl font-black text-slate-800">12,450</p>
                                </div>
                                <div class="bg-slate-50 border border-slate-100 p-6 rounded-2xl">
                                    <p class="text-slate-500 font-medium mb-1">Conversiones</p>
                                    <p class="text-3xl font-black text-slate-800">3.2%</p>
                                </div>
                                <div class="bg-slate-50 border border-slate-100 p-6 rounded-2xl">
                                    <p class="text-slate-500 font-medium mb-1">Ingresos</p>
                                    <p class="text-3xl font-black text-slate-800">$4,500</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    <script>
        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobile-overlay');
            
            // Alterna la clase para deslizar el menú
            sidebar.classList.toggle('-translate-x-full');
            
            // Manejo de animaciones de opacidad del fondo oscuro
            if (overlay.classList.contains('hidden')) {
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.remove('opacity-0'), 10);
            } else {
                overlay.classList.add('opacity-0');
                setTimeout(() => overlay.classList.add('hidden'), 300);
            }
        }
    </script>
</body>
</html>