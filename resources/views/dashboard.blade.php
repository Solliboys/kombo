<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h3 class="text-2xl font-bold mb-4">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-gray-600 mb-8">Pilih menu di atas atau gunakan tombol cepat di bawah untuk mengelola konten.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl mx-auto">
                        <a href="{{ route('berita.index') }}" class="p-6 bg-blue-50 border border-blue-100 rounded-xl hover:bg-blue-100 transition flex flex-col items-center">
                            <span class="text-3xl mb-2">📰</span>
                            <span class="font-bold text-blue-700">Kelola Berita</span>
                            <span class="text-xs text-blue-500 mt-1">Tambah, ubah, atau hapus konten berita.</span>
                        </a>
                        
                        <a href="{{ route('jadwal.index') }}" class="p-6 bg-green-50 border border-green-100 rounded-xl hover:bg-green-100 transition flex flex-col items-center">
                            <span class="text-3xl mb-2">📅</span>
                            <span class="font-bold text-green-700">Kelola Jadwal</span>
                            <span class="text-xs text-green-500 mt-1">Atur agenda kegiatan komunitas.</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
