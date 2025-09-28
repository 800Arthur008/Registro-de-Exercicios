<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Editar exercício</h2>
            <a href="{{ route('exercises.index') }}" class="px-4 py-2 bg-[#F53003] text-white rounded-sm">Voltar</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#161615] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm overflow-hidden">
                <div class="p-6">
                    @if(session('success'))
                        <div class="mb-4 text-sm text-green-600">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('exercises.update', $exercise) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome da atividade</label>
                            <input type="text" name="name" value="{{ old('name', $exercise->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-[#3E3E3A] dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 p-2" />
                            @error('name')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4 grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Duração (minutos)</label>
                                <input type="number" name="duration_minutes" value="{{ old('duration_minutes', $exercise->duration_minutes) }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-[#3E3E3A] dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 p-2" />
                                @error('duration_minutes')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Calorias</label>
                                <input type="number" name="calories" value="{{ old('calories', $exercise->calories) }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-[#3E3E3A] dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 p-2" />
                                @error('calories')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data</label>
                            <input type="date" name="date" value="{{ old('date', $exercise->date->format('Y-m-d')) }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-[#3E3E3A] dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 p-2" />
                            @error('date')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Observações (opcional)</label>
                            <textarea name="notes" class="mt-1 block w-full rounded-md border-gray-300 dark:border-[#3E3E3A] dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 p-2">{{ old('notes', $exercise->notes) }}</textarea>
                            @error('notes')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex items-center gap-3">
                            <button type="submit" class="px-4 py-2 bg-[#F53003] text-white rounded-sm">Atualizar</button>
                            <a href="{{ route('exercises.index') }}" class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
