<x-layout title="Detalhes da Localidade - Agenda">

    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('localidades.index') }}" class="btn btn-ghost btn-sm gap-1 pl-1 text-base-content/60">
            <x-icon.seta-esquerda />
            Localidades
        </a>
        <div class="flex gap-2">
            <a href="{{ route('localidades.edit', $localidade->id) }}" class="btn btn-sm btn-warning rounded-lg gap-1.5">
                <x-icon.lapis />
                Editar
            </a>
            <form action="{{ route('localidades.destroy', $localidade->id) }}" method="POST" class="inline"
                onsubmit="return confirm('Eliminar {{ $localidade->localidade }}? Isto irá eliminar todos os contactos desta localidade.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-error btn-outline rounded-lg gap-1.5">
                    <x-icon.lixo />
                    Eliminar
                </button>
            </form>
        </div>
    </div>

    @php
        $firstLetter = strtoupper(substr($localidade->localidade, 0, 1));
        $colors = ['bg-primary/15 text-primary', 'bg-secondary/15 text-secondary', 'bg-accent/15 text-accent', 'bg-info/15 text-info', 'bg-success/15 text-success', 'bg-warning/15 text-warning'];
        $color = $colors[ord($firstLetter) % count($colors)];
    @endphp

    <div class="card bg-base-100 border border-base-200 shadow-sm rounded-xl mb-8">
        <div class="card-body p-6 md:p-8">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-full {{ $color }} flex items-center justify-center font-bold text-xl shrink-0">
                    {{ $firstLetter }}
                </div>
                <div>
                    <h2 class="text-xl font-bold text-base-content">{{ $localidade->localidade }}</h2>
                    <span class="text-sm text-base-content/50">Localidade registada em {{ $localidade->created_at?->format('d/m/Y') ?? 'data desconhecida' }}</span>
                </div>
            </div>
        </div>
    </div>  
</x-layout>
