<x-layout title="Detalhes do Contacto - Agenda">


    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('contactos.index') }}" class="btn btn-ghost btn-sm gap-1 pl-1 text-base-content/60">
            <x-icon.seta-esquerda />
            Contactos
        </a>
        <div class="flex gap-2">
            <a href="{{ route('contactos.edit', $contacto->id) }}" class="btn btn-sm btn-warning rounded-lg gap-1.5">
                <x-icon.lapis />
                Editar
            </a>
            <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST" class="inline"
                onsubmit="return confirm('Eliminar {{ $contacto->nome }}?');">
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
        $firstLetter = strtoupper(substr($contacto->nome, 0, 1));
        $colors = ['bg-primary/15 text-primary', 'bg-secondary/15 text-secondary', 'bg-accent/15 text-accent', 'bg-info/15 text-info', 'bg-success/15 text-success', 'bg-warning/15 text-warning'];
        $color = $colors[ord($firstLetter) % count($colors)];
    @endphp

    <div class="card bg-base-100 border border-base-200 shadow-sm rounded-xl">
        <div class="card-body p-6 md:p-8">

            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 rounded-full {{ $color }} flex items-center justify-center font-bold text-xl shrink-0">
                    {{ $firstLetter }}
                </div>
                <div>
                    <h2 class="text-xl font-bold text-base-content">{{ $contacto->nome }}</h2>
                    @if($contacto->alcunha)
                        <span class="text-sm text-base-content/50">"{{ $contacto->alcunha }}"</span>
                    @endif
                </div>
            </div>

            <div class="divider my-0"></div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-5 mt-2">

                <div>
                    <div class="text-xs text-base-content/40 uppercase tracking-wider font-semibold mb-1">Telemóvel</div>
                    <a href="tel:{{ $contacto->telemovel }}" class="text-base font-semibold text-base-content link link-hover link-primary">
                        {{ $contacto->telemovel }}
                    </a>
                </div>

                <div>
                    <div class="text-xs text-base-content/40 uppercase tracking-wider font-semibold mb-1">Email</div>
                    <a href="mailto:{{ $contacto->email }}" class="text-base font-semibold text-base-content link link-hover link-primary break-all">
                        {{ $contacto->email }}
                    </a>
                </div>

                <div>
                    <div class="text-xs text-base-content/40 uppercase tracking-wider font-semibold mb-1">Localidade</div>
                    <span class="text-base font-semibold text-base-content">{{ $contacto->localidade?->localidade }}</span>
                </div>

                <div>
                    <div class="text-xs text-base-content/40 uppercase tracking-wider font-semibold mb-1">Registado em</div>
                    <span class="text-base text-base-content/70">{{ $contacto->created_at->format('d/m/Y') }}</span>
                </div>

            </div>

            @if($contacto->observacoes)
                <div class="divider my-2"></div>
                <div>
                    <div class="text-xs text-base-content/40 uppercase tracking-wider font-semibold mb-2">Observações</div>
                    <p class="text-sm text-base-content/75 leading-relaxed">{!! nl2br(e($contacto->observacoes)) !!}</p>
                </div>
            @endif

        </div>
    </div>

</x-layout>