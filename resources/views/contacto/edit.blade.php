<x-layout title="Editar Contacto - Agenda">

    <!-- Header Actions & Title -->
    <div class="mb-8">
        <a href="{{ route('contactos.index') }}" class="btn btn-ghost btn-sm gap-1 hover:bg-base-200/50 mb-3 pl-1 font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            Voltar para a Lista
        </a>
        <h1 class="text-3xl font-extrabold tracking-tight text-base-content">Editar Contacto</h1>
        <p class="text-sm text-base-content/60 mt-1">Atualiza os dados de <strong>{{ $contacto->nome }}</strong> abaixo.</p>
    </div>

    <!-- Form Card -->
    <div class="card bg-base-100 shadow-xl border border-base-200 rounded-2xl max-w-2xl mx-auto">
        <div class="card-body p-6 md:p-8">
            <form action="{{ route('contactos.update', $contacto->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nome -->
                    <div class="form-control w-full col-span-1">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-bold text-base-content/85">Nome Completo <span class="text-error">*</span></span>
                        </label>
                        <input type="text" name="nome" value="{{ old('nome', $contacto->nome) }}" placeholder="Ex: João Silva" class="input input-bordered input-md w-full focus:input-primary rounded-xl @error('nome') input-error @enderror" required />
                        @error('nome')
                            <label class="label py-1"><span class="label-text-alt text-error font-medium">{{ $message }}</span></label>
                        @enderror
                    </div>

                    <!-- Alcunha -->
                    <div class="form-control w-full col-span-1">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-bold text-base-content/85">Alcunha / Nome Curto</span>
                        </label>
                        <input type="text" name="alcunha" value="{{ old('alcunha', $contacto->alcunha) }}" placeholder="Ex: Silva" class="input input-bordered input-md w-full focus:input-primary rounded-xl @error('alcunha') input-error @enderror" />
                        @error('alcunha')
                            <label class="label py-1"><span class="label-text-alt text-error font-medium">{{ $message }}</span></label>
                        @enderror
                    </div>

                    <!-- Telemóvel -->
                    <div class="form-control w-full col-span-1">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-bold text-base-content/85">Número de Telemóvel <span class="text-error">*</span></span>
                        </label>
                        <input type="tel" name="telemovel" value="{{ old('telemovel', $contacto->telemovel) }}" placeholder="Ex: 912345678" class="input input-bordered input-md w-full focus:input-primary rounded-xl @error('telemovel') input-error @enderror" required />
                        @error('telemovel')
                            <label class="label py-1"><span class="label-text-alt text-error font-medium">{{ $message }}</span></label>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-control w-full col-span-1">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-bold text-base-content/85">Endereço de Email <span class="text-error">*</span></span>
                        </label>
                        <input type="email" name="email" value="{{ old('email', $contacto->email) }}" placeholder="Ex: joaosilva@email.com" class="input input-bordered input-md w-full focus:input-primary rounded-xl @error('email') input-error @enderror" required />
                        @error('email')
                            <label class="label py-1"><span class="label-text-alt text-error font-medium">{{ $message }}</span></label>
                        @enderror
                    </div>

                    <!-- Localidade -->
                    <div class="form-control w-full col-span-1 md:col-span-2">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-bold text-base-content/85">Localidade / Cidade <span class="text-error">*</span></span>
                        </label>
                        <input type="text" name="localidade" value="{{ old('localidade', $contacto->localidade) }}" placeholder="Ex: Lisboa" class="input input-bordered input-md w-full focus:input-primary rounded-xl @error('localidade') input-error @enderror" required />
                        @error('localidade')
                            <label class="label py-1"><span class="label-text-alt text-error font-medium">{{ $message }}</span></label>
                        @enderror
                    </div>

                    <!-- Observações -->
                    <div class="form-control w-full col-span-1 md:col-span-2">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-bold text-base-content/85">Observações / Notas Adicionais</span>
                        </label>
                        <textarea name="observacoes" placeholder="Adiciona observações ou notas sobre o contacto..." class="textarea textarea-bordered h-28 w-full focus:textarea-primary rounded-xl @error('observacoes') textarea-error @enderror">{{ old('observacoes', $contacto->observacoes) }}</textarea>
                        @error('observacoes')
                            <label class="label py-1"><span class="label-text-alt text-error font-medium">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>

                <!-- Form Footer Actions -->
                <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-base-200">
                    <a href="{{ route('contactos.index') }}" class="btn btn-ghost rounded-xl">Cancelar</a>
                    <button type="submit" class="btn btn-primary rounded-xl shadow-md gap-1.5 px-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4.5 h-4.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
