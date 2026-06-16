<x-layout title="Lista de Localidades - Agenda">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-base-content">Localidades</h1>
            <p class="text-sm text-base-content/50 mt-0.5">{{ count($localidades) }}
                registada{{ count($localidades) !== 1 ? 's' : '' }}</p>
        </div>
        <a href="{{ route('localidades.create') }}" class="btn btn-primary btn-sm rounded-lg gap-2">
            <x-icon.mais />
            Nova
        </a>
    </div>

    @if(count($localidades) > 0)
        <div class="card bg-base-100 shadow-sm border border-base-200 rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead class="text-xs text-base-content/50 uppercase tracking-wider">
                        <tr>
                            <th class="pl-5">Localidade</th>
                            <th class="pr-5"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($localidades as $localidade)
                            @php
                                $firstLetter = strtoupper(substr($localidade->localidade, 0, 1));
                                $colors = ['bg-primary/15 text-primary', 'bg-secondary/15 text-secondary', 'bg-accent/15 text-accent', 'bg-info/15 text-info', 'bg-success/15 text-success', 'bg-warning/15 text-warning'];
                                $color = $colors[ord($firstLetter) % count($colors)];
                            @endphp
                            <tr class="hover:bg-base-200/30 transition-colors">
                                <td class="pl-5 py-3">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-9 h-9 rounded-full {{ $color }} flex items-center justify-center font-bold text-sm shrink-0">
                                            {{ $firstLetter }}
                                        </div>
                                        <div>
                                            <div class="font-semibold text-base-content text-sm">{{ $localidade->localidade }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="pr-5">
                                    <div class="flex items-center justify-end gap-1">
                                        <a href="{{ route('localidades.show', $localidade->id) }}"
                                            class="btn btn-ghost btn-xs btn-circle text-base-content/40 hover:text-info"
                                            title="Ver">
                                            <x-icon.olho />
                                        </a>
                                        <a href="{{ route('localidades.edit', $localidade->id) }}"
                                            class="btn btn-ghost btn-xs btn-circle text-base-content/40 hover:text-warning"
                                            title="Editar">
                                            <x-icon.lapis />
                                        </a>
                                        <form action="{{ route('localidades.destroy', $localidade->id) }}" method="POST"
                                            class="inline" onsubmit="return confirm('Eliminar {{ $localidade->localidade }}? Isto irá eliminar todos os contactos desta localidade.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-ghost btn-xs btn-circle text-base-content/40 hover:text-error"
                                                title="Eliminar">
                                                <x-icon.lixo />
                                            </button>
                                        </form>
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
            <p class="font-semibold text-base-content/60">Nenhuma localidade ainda</p>
            <p class="text-sm text-base-content/40 mt-1 mb-6">Começa por adicionar a primeira.</p>
            <a href="{{ route('localidades.create') }}" class="btn btn-primary btn-sm rounded-lg gap-2">
                <x-icon.mais />
                Adicionar Localidade
            </a>
        </div>
    @endif

</x-layout>
