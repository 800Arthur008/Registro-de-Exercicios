<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Criar exercício</h2>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-[#F53003] text-white rounded-sm">Voltar</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#161615] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm overflow-hidden">
                <div class="p-6">
                    @include('exercises._form')
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</x-app-layout>
