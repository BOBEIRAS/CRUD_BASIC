<x-layout title="Adicionar Contacto - Agenda">

    <div class="mb-8">
        <a href="{{ route('contactos.index') }}"
            class="btn btn-ghost btn-sm gap-1 hover:bg-base-200/50 mb-3 pl-1 font-semibold">
            <x-icon.seta-esquerda />
            Voltar para a Lista
        </a>
        <h1 class="text-3xl font-extrabold tracking-tight text-base-content">Novo Contacto</h1>
        <p class="text-sm text-base-content/60 mt-1">Regista um novo contacto preenchendo as informações abaixo.</p>
    </div>


    <div class="card bg-base-100 shadow-xl border border-base-200 rounded-2xl max-w-2xl mx-auto">
        <div class="card-body p-6 md:p-8">
            <form action="{{ route('contactos.store') }}" method="POST" novalidate>
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nome -->
                    <div class="form-control w-full col-span-1">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-bold text-base-content/85">Nome Completo <span
                                    class="text-error">*</span></span>
                        </label>
                        <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Ex: João Silva"
                            class="input input-bordered input-md w-full rounded-xl {{ $errors->has('nome') ? 'input-error border-red-500 focus:border-red-500 focus:outline-red-500' : 'focus:input-primary' }}"
                            required />
                        @error('nome')
                            <label class="label py-1"><span
                                    class="label-text-alt text-error font-medium">{{ $message }}</span></label>
                        @enderror
                    </div>
                    <!-- Alcunha -->
                    <div class="form-control w-full col-span-1">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-bold text-base-content/85">Alcunha / Nome Curto</span>
                        </label>
                        <input type="text" name="alcunha" value="{{ old('alcunha') }}" placeholder="Ex: Silva"
                            class="input input-bordered input-md w-full rounded-xl {{ $errors->has('alcunha') ? 'input-error border-red-500 focus:border-red-500 focus:outline-red-500' : 'focus:input-primary' }}" />
                        @error('alcunha')
                            <label class="label py-1"><span
                                    class="label-text-alt text-error font-medium">{{ $message }}</span></label>
                        @enderror
                    </div>


                    <div class="form-control w-full col-span-1">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-bold text-base-content/85">Número de Telemóvel <span
                                    class="text-error">*</span></span>
                        </label>
                        <input type="tel" name="telemovel" value="{{ old('telemovel') }}" placeholder="Ex: 912345678"
                            class="input input-bordered input-md w-full rounded-xl {{ $errors->has('telemovel') ? 'input-error border-red-500 focus:border-red-500 focus:outline-red-500' : 'focus:input-primary' }}"
                            required />
                        @error('telemovel')
                            <label class="label py-1"><span
                                    class="label-text-alt text-error font-medium">{{ $message }}</span></label>
                        @enderror
                    </div>


                    <div class="form-control w-full col-span-1">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-bold text-base-content/85">Endereço de Email <span
                                    class="text-error">*</span></span>
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            placeholder="Ex: joaosilva@email.com"
                            class="input input-bordered input-md w-full rounded-xl {{ $errors->has('email') ? 'input-error border-red-500 focus:border-red-500 focus:outline-red-500' : 'focus:input-primary' }}"
                            required />
                        @error('email')
                            <label class="label py-1"><span
                                    class="label-text-alt text-error font-medium">{{ $message }}</span></label>
                        @enderror
                    </div>


                    <div class="form-control w-full col-span-1 md:col-span-2">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-bold text-base-content/85">Localidade / Cidade <span
                                    class="text-error">*</span></span>
                        </label>
                        <input type="text" name="localidade" value="{{ old('localidade') }}" placeholder="Ex: Lisboa"
                            class="input input-bordered input-md w-full rounded-xl {{ $errors->has('localidade') ? 'input-error border-red-500 focus:border-red-500 focus:outline-red-500' : 'focus:input-primary' }}"
                            required />
                        @error('localidade')
                            <label class="label py-1"><span
                                    class="label-text-alt text-error font-medium">{{ $message }}</span></label>
                        @enderror
                    </div>


                    <div class="form-control w-full col-span-1 md:col-span-2">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-bold text-base-content/85">Observações / Notas
                                Adicionais</span>
                        </label>
                        <textarea name="observacoes" placeholder="Adiciona observações ou notas sobre o contacto..."
                            class="textarea textarea-bordered h-28 w-full rounded-xl {{ $errors->has('observacoes') ? 'textarea-error border-red-500 focus:border-red-500 focus:outline-red-500' : 'focus:textarea-primary' }}">{{ old('observacoes') }}</textarea>
                        @error('observacoes')
                            <label class="label py-1"><span
                                    class="label-text-alt text-error font-medium">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>


                <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-base-200">
                    <a href="{{ route('contactos.index') }}" class="btn btn-ghost rounded-xl">Cancelar</a>
                    <button type="submit" class="btn btn-primary rounded-xl shadow-md gap-1.5 px-6">
                        <x-icon.visto />
                        Guardar Contacto
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layout>