<x-layout title="Grupo {{ $grupo->grupo }} - Agenda">

    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('grupos.index') }}" class="btn btn-ghost btn-sm gap-1 pl-1 text-base-content/60">
            <x-icon.seta-esquerda />
            Grupos
        </a>
        <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-sm btn-warning rounded-lg gap-1.5">
            <x-icon.lapis />
            Editar
        </a>
    </div>

    @php
        $firstLetter = strtoupper(substr($grupo->grupo, 0, 1));
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
                    <h1 class="text-xl font-bold text-base-content">{{ $grupo->grupo }}</h1>
                    <span class="text-sm text-base-content/50">
                        {{ $grupo->contactos->count() }} contacto{{ $grupo->contactos->count() !== 1 ? 's' : '' }} neste grupo
                    </span>
                </div>
            </div>
        </div>
    </div>
«
    @if($grupo->contactos->count() > 0)
        <div class="card bg-base-100 shadow-sm border border-base-200 rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead class="text-xs text-base-content/50 uppercase tracking-wider">
                        <tr>
                            <th class="pl-5">Contacto</th>
                            <th>Telemóvel</th>
                            <th>Localidade</th>
                            <th class="pr-5"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grupo->contactos->sortBy('nome') as $contacto)
                            @php
                                $cl = strtoupper(substr($contacto->nome, 0, 1));
                                $cc = $colors[ord($cl) % count($colors)];
                            @endphp
                            <tr class="hover:bg-base-200/30 transition-colors">
                                <td class="pl-5 py-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full {{ $cc }} flex items-center justify-center font-bold text-sm shrink-0">
                                            {{ $cl }}
                                        </div>
                                        <div>
                                            <div class="font-semibold text-base-content text-sm">{{ $contacto->nome }}</div>
                                            @if($contacto->alcunha)
                                                <div class="text-xs text-base-content/40">{{ $contacto->alcunha }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="text-sm text-base-content/70">{{ $contacto->telemovel }}</td>
                                <td>
                                    @if($contacto->localidade)
                                        <span class="badge badge-sm badge-ghost">{{ $contacto->localidade->localidade }}</span>
                                    @else
                                        <span class="text-xs text-base-content/30">—</span>
                                    @endif
                                </td>
                                <td class="pr-5">
                                    <div class="flex items-center justify-end gap-1">
                                        <a href="{{ route('contactos.show', $contacto->id) }}"
                                            class="btn btn-ghost btn-xs btn-circle text-base-content/40 hover:text-info"
                                            title="Ver">
                                            <x-icon.olho />
                                        </a>
                                        <a href="{{ route('contactos.edit', $contacto->id) }}"
                                            class="btn btn-ghost btn-xs btn-circle text-base-content/40 hover:text-warning"
                                            title="Editar">
                                            <x-icon.lapis />
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="text-center py-20">
            <div class="w-14 h-14 rounded-full bg-base-200 flex items-center justify-center mx-auto mb-4">
                <x-icon.user class="w-7 h-7 text-base-content/30" />
            </div>
            <p class="font-semibold text-base-content/60">Nenhum contacto neste grupo</p>
            <p class="text-sm text-base-content/40 mt-1 mb-6">Adiciona contactos e associa-os a este grupo.</p>
            <a href="{{ route('contactos.create') }}" class="btn btn-primary btn-sm rounded-lg gap-2">
                <x-icon.mais />
                Novo Contacto
            </a>
        </div>
    @endif

</x-layout>
