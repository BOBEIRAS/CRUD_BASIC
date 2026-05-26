<x-layout title="Lista de Contactos - Agenda">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-base-content">Contactos</h1>
            <p class="text-sm text-base-content/50 mt-0.5">{{ count($contactos) }}
                registado{{ count($contactos) !== 1 ? 's' : '' }}</p>
        </div>
        <a href="{{ route('contactos.create') }}" class="btn btn-primary btn-sm rounded-lg gap-2">
            <x-icon.mais />
            Novo
        </a>
    </div>

    @if(count($contactos) > 0)
        <div class="card bg-base-100 shadow-sm border border-base-200 rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead class="text-xs text-base-content/50 uppercase tracking-wider">
                        <tr>
                            <th class="pl-5">Nome</th>
                            <th>Telemóvel</th>
                            <th>Email</th>
                            <th>Localidade</th>
                            <th class="pr-5"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contactos as $contacto)
                            @php
                                $firstLetter = strtoupper(substr($contacto->nome, 0, 1));
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
                                            <div class="font-semibold text-base-content text-sm">{{ $contacto->nome }}</div>
                                            @if($contacto->alcunha)
                                                <div class="text-xs text-base-content/40">"{{ $contacto->alcunha }}"</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="text-sm text-base-content/70">{{ $contacto->telemovel }}</td>
                                <td class="text-sm">
                                    <a href="mailto:{{ $contacto->email }}"
                                        class="link link-hover text-base-content/70">{{ $contacto->email }}</a>
                                </td>
                                <td class="text-sm text-base-content/60">{{ $contacto->localidade }}</td>
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
                                        <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST"
                                            class="inline" onsubmit="return confirm('Eliminar {{ $contacto->nome }}?');">
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
            <p class="font-semibold text-base-content/60">Nenhum contacto ainda</p>
            <p class="text-sm text-base-content/40 mt-1 mb-6">Começa por adicionar o primeiro.</p>
            <a href="{{ route('contactos.create') }}" class="btn btn-primary btn-sm rounded-lg gap-2">
                <x-icon.mais />
                Adicionar Contacto
            </a>
        </div>
    @endif

</x-layout>