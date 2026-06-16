<x-layout title="Editar Grupo - Agenda">

    <div class="mb-8">
        <a href="{{ route('grupos.index') }}"
            class="btn btn-ghost btn-sm gap-1 hover:bg-base-200/50 mb-3 pl-1 font-semibold">
            <x-icon.seta-esquerda />
            Voltar para a Lista
        </a>
        <h1 class="text-3xl font-extrabold tracking-tight text-base-content">Editar Grupo</h1>
        <p class="text-sm text-base-content/60 mt-1">Altere o nome do grupo abaixo.</p>
    </div>

    <div class="card bg-base-100 shadow-xl border border-base-200 rounded-2xl max-w-xl mx-auto">
        <div class="card-body p-6 md:p-8">
            <form action="{{ route('grupos.update', $grupo->id) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <!-- Grupo -->
                    <div class="form-control w-full">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-bold text-base-content/85">Nome do Grupo <span
                                    class="text-error">*</span></span>
                        </label>
                        <input type="text" name="grupo" value="{{ old('grupo', $grupo->grupo) }}" placeholder="Ex: Amigos, Trabalho, Família"
                            class="input input-bordered input-md w-full rounded-xl {{ $errors->has('grupo') ? 'input-error border-red-500 focus:border-red-500 focus:outline-red-500' : 'focus:input-primary' }}"
                            required />
                        @error('grupo')
                            <label class="label py-1"><span
                                    class="label-text-alt text-error font-medium">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-base-200">
                    <a href="{{ route('grupos.index') }}" class="btn btn-ghost rounded-xl">Cancelar</a>
                    <button type="submit" class="btn btn-primary rounded-xl shadow-md gap-1.5 px-6">
                        <x-icon.visto />
                        Guardar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
