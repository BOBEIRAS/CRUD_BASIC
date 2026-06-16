<!DOCTYPE html>
<html lang="pt" data-theme="emerald">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Agenda de Contactos' }}</title>
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

    <header class="bg-base-100 shadow-md">
        <div class="navbar max-w-6xl mx-auto px-4 py-3">
            <div class="flex-1">
                <a href="{{ route('contactos.index') }}"
                    class="btn btn-ghost text-xl font-extrabold gap-2 normal-case tracking-tight">
                    <x-icon.circulo class="w-7 h-7 text-primary" />
                    <span>Agenda<span class="text-primary font-black">Contactos</span></span>
                </a>
            </div>
            <a href="{{ route('contactos.create') }}" class="btn btn-primary btn-sm gap-1.5 rounded-lg shadow-sm">
                    <x-icon.mais />
                    Novo Contato
                </a>
            <div class="flex-none gap-2">
                <a href="{{ route('contactos.index') }}" class="btn btn-ghost btn-sm gap-1.5 font-semibold rounded-lg">
                    <x-icon.lista />
                    Lista
                </a>
                <a href="{{ route('localidades.index') }}" class="btn btn-ghost btn-sm gap-1.5 font-semibold rounded-lg">
                    <x-icon.lista/>
                    Localidades
                </a>
                <a href="{{ route('grupos.index') }}" class="btn btn-ghost btn-sm gap-1.5 font-semibold rounded-lg">
                    <x-icon.lista/>
                    Grupos
                </a>
            </div>
        </div>
    </header>

    <main class="flex-grow max-w-6xl w-full mx-auto p-4 md:p-8">
        @if(session('success'))
            <div class="alert alert-success shadow-lg mb-6 rounded-xl animate-fade-in">
                <x-icon.radiobox />
                <div class="flex-1">
                    <h3 class="font-bold text-sm md:text-base">Sucesso!</h3>
                    <span class="text-xs md:text-sm">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error shadow-lg mb-6 rounded-xl animate-fade-in">
                <x-icon.x-circulo />
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

    <footer class="footer footer-center p-6 bg-base-200 text-base-content border-t border-base-300">
        <aside>
            <p class="font-semibold text-xs md:text-sm tracking-wide">Agenda de Contactos &copy; {{ date('Y') }} -
                Desenvolvido por André Lapa</p>
        </aside>
    </footer>

</body>

</html>