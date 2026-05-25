<x-layout title="Lista de Contactos - Agenda">

    <!-- Header Actions & Title -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight text-base-content">Os Meus Contactos</h1>
            <p class="text-sm text-base-content/60 mt-1">Gere a tua lista de contactos, telemóveis e localidades.</p>
        </div>
        <div>
            <a href="{{ route('contactos.create') }}" class="btn btn-primary rounded-xl shadow-lg gap-2 w-full md:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Adicionar Contacto
            </a>
        </div>
    </div>

    <!-- Stats Summary Section -->
    @if(count($contactos) > 0)
        <div class="stats stats-vertical lg:stats-horizontal shadow bg-base-100 w-full rounded-2xl border border-base-200 mb-8 overflow-hidden">
            <div class="stat">
                <div class="stat-figure text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.109A11.386 11.386 0 0 1 10.089 18H8.25c-.621 0-1.125-.504-1.125-1.125V18M8.25 18a8.25 8.25 0 0 1-1.38-16.142M12 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                <div class="stat-title text-base-content/60 font-semibold">Total de Contactos</div>
                <div class="stat-value text-primary font-black">{{ count($contactos) }}</div>
                <div class="stat-desc text-base-content/40 mt-1">Registados na agenda</div>
            </div>

            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25s-7.5-4.108-7.5-11.25A7.5 7.5 0 1 1 19.5 10.5Z" />
                    </svg>
                </div>
                <div class="stat-title text-base-content/60 font-semibold">Localidades Distintas</div>
                <div class="stat-value text-secondary font-black">
                    {{ count(array_unique(array_column($contactos->toArray(), 'localidade'))) }}
                </div>
                <div class="stat-desc text-base-content/40 mt-1">Cidades representadas</div>
            </div>
        </div>
    @endif

    <!-- Main List / Card -->
    <div class="card bg-base-100 shadow-xl rounded-2xl border border-base-200 overflow-hidden">
        <div class="card-body p-0">
            @if(count($contactos) > 0)
                <div class="overflow-x-auto w-full">
                    <table class="table table-zebra table-md w-full">
                        <!-- Table Head -->
                        <thead class="bg-base-200/50 text-base-content/70">
                            <tr>
                                <th class="pl-6 py-4">Contacto</th>
                                <th class="py-4">Telemóvel</th>
                                <th class="py-4">Email</th>
                                <th class="py-4">Localidade</th>
                                <th class="py-4 text-right pr-6">Ações</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="divide-y divide-base-200">
                            @foreach($contactos as $contacto)
                                @php
                                    $firstLetter = strtoupper(substr($contacto->nome, 0, 1));
                                    $bgColors = [
                                        'bg-primary text-primary-content', 
                                        'bg-secondary text-secondary-content', 
                                        'bg-accent text-accent-content', 
                                        'bg-info text-info-content', 
                                        'bg-success text-success-content', 
                                        'bg-warning text-warning-content'
                                    ];
                                    $colorClass = $bgColors[ord($firstLetter) % count($bgColors)];
                                @endphp
                                <tr class="hover:bg-base-200/40 transition-colors duration-150">
                                    <!-- Profile Info -->
                                    <td class="pl-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="{{ $colorClass }} rounded-full w-10 h-10 shadow-inner flex items-center justify-center font-bold text-lg">
                                                    {{ $firstLetter }}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-extrabold text-base-content text-base">{{ $contacto->nome }}</div>
                                                @if($contacto->alcunha)
                                                    <span class="badge badge-sm badge-outline badge-secondary mt-0.5">"{{ $contacto->alcunha }}"</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Phone -->
                                    <td class="py-4 font-semibold text-base-content/85">
                                        {{ $contacto->telemovel }}
                                    </td>
                                    <!-- Email -->
                                    <td class="py-4 text-sm text-base-content/70">
                                        <a href="mailto:{{ $contacto->email }}" class="link link-hover link-primary">{{ $contacto->email }}</a>
                                    </td>
                                    <!-- City -->
                                    <td class="py-4">
                                        <span class="badge badge-neutral badge-md font-semibold px-3 py-1 rounded-lg">
                                            {{ $contacto->localidade }}
                                        </span>
                                    </td>
                                    <!-- Action Buttons -->
                                    <td class="py-4 text-right pr-6">
                                        <div class="flex items-center justify-end gap-1.5">
                                            <!-- View -->
                                            <a href="{{ route('contactos.show', $contacto->id) }}" class="btn btn-ghost btn-circle btn-sm text-info hover:bg-info/10" title="Ver Detalhes">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </a>
                                            <!-- Edit -->
                                            <a href="{{ route('contactos.edit', $contacto->id) }}" class="btn btn-ghost btn-circle btn-sm text-warning hover:bg-warning/10" title="Editar">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.83 20.066a4 4 0 0 1-2.203 1.1l-3.477.58c-1.127.188-2.185-.872-1.997-1.998l.58-3.477a4 4 0 0 1 1.1-2.203l12.553-12.552Z" />
                                                </svg>
                                            </a>
                                            <!-- Delete -->
                                            <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST" class="inline" onsubmit="return confirm('Tens a certeza que pretendes eliminar o contacto {{ $contacto->nome }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-ghost btn-circle btn-sm text-error hover:bg-error/10" title="Eliminar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
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
            @else
                <!-- Empty State -->
                <div class="py-16 px-4 text-center max-w-md mx-auto">
                    <div class="avatar placeholder mb-6">
                        <div class="bg-base-200 text-base-content/40 rounded-full w-20 h-20 shadow-inner flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.197 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-base-content tracking-tight">Sem contactos na agenda</h3>
                    <p class="text-sm text-base-content/60 mt-2 mb-8">Ainda não adicionaste nenhum contacto. Começa por registar um novo contacto preenchendo o formulário.</p>
                    <a href="{{ route('contactos.create') }}" class="btn btn-primary rounded-xl px-8 shadow-md gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Adicionar Contacto
                    </a>
                </div>
            @endif
        </div>
    </div>

</x-layout>
