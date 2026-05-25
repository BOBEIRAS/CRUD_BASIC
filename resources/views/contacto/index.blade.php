<x-layout title="Lista de Contactos - Agenda">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-base-content">Contactos</h1>
            <p class="text-sm text-base-content/50 mt-0.5">{{ count($contactos) }}
                registado{{ count($contactos) !== 1 ? 's' : '' }}</p>
        </div>
        <a href="{{ route('contactos.create') }}" class="btn btn-primary btn-sm rounded-lg gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('contactos.edit', $contacto->id) }}"
                                            class="btn btn-ghost btn-xs btn-circle text-base-content/40 hover:text-warning"
                                            title="Editar">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.83 20.066a4 4 0 0 1-2.203 1.1l-3.477.58c-1.127.188-2.185-.872-1.997-1.998l.58-3.477a4 4 0 0 1 1.1-2.203l12.553-12.552Z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST"
                                            class="inline" onsubmit="return confirm('Eliminar {{ $contacto->nome }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-ghost btn-xs btn-circle text-base-content/40 hover:text-error"
                                                title="Eliminar">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
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
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7 text-base-content/30">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </div>
            <p class="font-semibold text-base-content/60">Nenhum contacto ainda</p>
            <p class="text-sm text-base-content/40 mt-1 mb-6">Começa por adicionar o primeiro.</p>
            <a href="{{ route('contactos.create') }}" class="btn btn-primary btn-sm rounded-lg gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Adicionar Contacto
            </a>
        </div>
    @endif

</x-layout>