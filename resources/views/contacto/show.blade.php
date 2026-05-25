<x-layout title="Detalhes do Contacto - Agenda">

    <!-- Header Actions & Title -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <a href="{{ route('contactos.index') }}"
                class="btn btn-ghost btn-sm gap-1 hover:bg-base-200/50 mb-3 pl-1 font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Voltar para a Lista
            </a>
            <h1 class="text-3xl font-extrabold tracking-tight text-base-content">Perfil do Contacto</h1>
            <p class="text-sm text-base-content/60 mt-1">Exibindo todos os dados salvos sobre este contacto.</p>
        </div>
        <div class="flex items-center gap-2">
            <!-- Edit -->
            <a href="{{ route('contactos.edit', $contacto->id) }}"
                class="btn btn-warning rounded-xl shadow-md gap-1.5 px-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-4.5 h-4.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.83 20.066a4 4 0 0 1-2.203 1.1l-3.477.58c-1.127.188-2.185-.872-1.997-1.998l.58-3.477a4 4 0 0 1 1.1-2.203l12.553-12.552Z" />
                </svg>
                Editar
            </a>
            <!-- Delete -->
            <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST" class="inline"
                onsubmit="return confirm('Tens a certeza que pretendes eliminar o contacto {{ $contacto->nome }}?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-error rounded-xl shadow-md gap-1.5 px-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-4.5 h-4.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                    Eliminar
                </button>
            </form>
        </div>
    </div>

    <!-- Contact Profile Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Left Side: Profile Avatar Card -->
        <div class="card bg-base-100 shadow-xl border border-base-200 rounded-2xl md:col-span-1">
            <div class="card-body items-center text-center p-8">
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
                <div class="avatar placeholder mb-4">
                    <div
                        class="{{ $colorClass }} rounded-full w-24 h-24 shadow-lg flex items-center justify-center font-extrabold text-3xl">
                        {{ $firstLetter }}
                    </div>
                </div>

                <h2 class="card-title text-2xl font-black text-base-content mt-2">{{ $contacto->nome }}</h2>
                @if($contacto->alcunha)
                    <span class="badge badge-secondary badge-md font-semibold mt-1">"{{ $contacto->alcunha }}"</span>
                @else
                    <span class="text-xs text-base-content/40 italic mt-1">Sem alcunha registada</span>
                @endif

                <div class="divider my-4"></div>

                <div class="text-left w-full space-y-4">
                    <div class="flex items-center gap-3 text-sm text-base-content/75">
                        <span class="badge badge-neutral p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                        </span>
                        <span>Criado em: {{ $contacto->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm text-base-content/75">
                        <span class="badge badge-neutral p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </span>
                        <span>Atualizado: {{ $contacto->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Details Card -->
        <div class="card bg-base-100 shadow-xl border border-base-200 rounded-2xl md:col-span-2">
            <div class="card-body p-6 md:p-8 space-y-6">

                <!-- Contact Details Fields Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <!-- Telemóvel -->
                    <div class="border border-base-200 p-4 rounded-xl flex items-start gap-4">
                        <div
                            class="badge badge-primary p-2 h-10 w-10 shrink-0 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5 text-primary-content">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.824-1.802-5.122-4.1-6.924-6.924l1.293-.97a1.125 1.125 0 0 0 .417-1.173L6.963 3.106a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-base-content/50 font-bold uppercase tracking-wider">Número de
                                Telemóvel</div>
                            <a href="tel:{{ $contacto->telemovel }}"
                                class="text-lg font-black text-base-content link link-hover link-primary mt-0.5 block">
                                {{ $contacto->telemovel }}
                            </a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="border border-base-200 p-4 rounded-xl flex items-start gap-4">
                        <div
                            class="badge badge-accent p-2 h-10 w-10 shrink-0 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5 text-accent-content">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-base-content/50 font-bold uppercase tracking-wider">Endereço de
                                Email</div>
                            <a href="mailto:{{ $contacto->email }}"
                                class="text-lg font-black text-base-content link link-hover link-accent mt-0.5 block break-all">
                                {{ $contacto->email }}
                            </a>
                        </div>
                    </div>

                    <!-- Localidade -->
                    <div class="border border-base-200 p-4 rounded-xl flex items-start gap-4 sm:col-span-2">
                        <div
                            class="badge badge-info p-2 h-10 w-10 shrink-0 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5 text-info-content">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25s-7.5-4.108-7.5-11.25A7.5 7.5 0 1 1 19.5 10.5Z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-base-content/50 font-bold uppercase tracking-wider">Localidade /
                                Cidade</div>
                            <span class="text-lg font-black text-base-content mt-0.5 block">
                                {{ $contacto->localidade }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="border border-base-200 p-5 rounded-xl space-y-3 bg-base-200/25">
                    <div class="flex items-center gap-2 text-base-content/75">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        <h3 class="font-extrabold text-sm uppercase tracking-wide">Observações / Notas Adicionais</h3>
                    </div>
                    <div
                        class="text-base text-base-content/85 leading-relaxed bg-base-100 p-4 rounded-lg border border-base-200 min-h-24">
                        @if($contacto->observacoes)
                            {!! nl2br(e($contacto->observacoes)) !!}
                        @else
                            <span class="text-base-content/40 italic">Nenhuma observação ou nota registada para este
                                contacto.</span>
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>

</x-layout>