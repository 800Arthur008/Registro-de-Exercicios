@if(session('success'))
    <div class="mb-4 text-sm text-green-600">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('exercises.store') }}">
    @csrf

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome da atividade</label>
    <input type="text" name="name" value="{{ old('name') }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-[#3E3E3A] dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 p-2" />
        @error('name')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Duração (minutos)</label>
            <input type="number" name="duration_minutes" value="{{ old('duration_minutes', 30) }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-[#3E3E3A] dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 p-2" />
            @error('duration_minutes')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Calorias</label>
            <input type="number" name="calories" value="{{ old('calories', 0) }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-[#3E3E3A] dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 p-2" />
            @error('calories')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data</label>
    <input type="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-[#3E3E3A] dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 p-2" />
        @error('date')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Observações (opcional)</label>
    <textarea name="notes" class="mt-1 block w-full rounded-md border-gray-300 dark:border-[#3E3E3A] dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 p-2">{{ old('notes') }}</textarea>
        @error('notes')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="px-4 py-2 bg-[#F53003] text-white rounded-sm">Salvar exercício</button>
        <a href="{{ route('dashboard') }}" class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Cancelar</a>
    </div>
</form>
