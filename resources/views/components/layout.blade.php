<!DOCTYPE html>
<html lang="pt" data-theme="emerald">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Agenda de Contactos' }}</title>
    <!-- Google Fonts: Instrument Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    
    <!-- Tailwind v4 + DaisyUI v5 CDN provided by the user -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            background-color: oklch(0.97 0.01 240);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between">

    <!-- Header / Navbar -->
    <header class="bg-base-100 shadow-md">
        <div class="navbar max-w-6xl mx-auto px-4 py-3">
            <div class="flex-1">
                <a href="{{ route('contactos.index') }}" class="btn btn-ghost text-xl font-extrabold gap-2 normal-case tracking-tight">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span>Agenda<span class="text-primary font-black">Contactos</span></span>
                </a>
            </div>
            <div class="flex-none gap-2">
                <a href="{{ route('contactos.index') }}" class="btn btn-ghost btn-sm font-semibold rounded-lg">Lista</a>
                <a href="{{ route('contactos.create') }}" class="btn btn-primary btn-sm gap-1.5 rounded-lg shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Novo Contato
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow max-w-6xl w-full mx-auto p-4 md:p-8">
        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert alert-success shadow-lg mb-6 rounded-xl animate-fade-in">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="flex-1">
                    <h3 class="font-bold text-sm md:text-base">Sucesso!</h3>
                    <span class="text-xs md:text-sm">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Error Alert -->
        @if($errors->any())
            <div class="alert alert-error shadow-lg mb-6 rounded-xl animate-fade-in">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="flex-1">
                    <h3 class="font-bold text-sm md:text-base">Erro de Validação!</h3>
                    <ul class="list-disc pl-4 text-xs md:text-sm mt-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="footer footer-center p-6 bg-base-200 text-base-content border-t border-base-300">
        <aside>
            <p class="font-semibold text-xs md:text-sm tracking-wide">Agenda de Contactos &copy; {{ date('Y') }} - Desenvolvido com Laravel & DaisyUI</p>
        </aside>
    </footer>

</body>
</html>
