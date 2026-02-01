<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl mb-8 border border-gray-100">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold text-gray-800">Selamat Datang di Manajemen Jadwal! 📅</h3>
                    <p class="text-sm text-gray-500">Kelola semua agenda dan kegiatan komunitas di sini.</p>
                </div>
            </div>

            <div class="mb-6">
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800 transition flex items-center gap-2 text-sm font-medium">
                    ← Kembali ke Dashboard
                </a>
            </div>
            @include('jadwal.table')
        </div>
    </div>
</x-app-layout>
