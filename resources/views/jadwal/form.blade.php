<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($jadwal) ? __('Edit Jadwal') : __('Tambah Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-xl border border-gray-200 my-8">
                <div class="bg-white px-6 py-5 border-b border-gray-200 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">
                        {{ isset($jadwal) ? 'Perbarui Jadwal' : 'Buat Jadwal Baru' }}
                    </h3>
                    <p class="text-sm text-gray-500">Lengkapi form berikut ini.</p>
                </div>
                
                <div class="p-6 text-gray-900 bg-white">
                    <form action="{{ isset($jadwal) ? route('jadwal.update', $jadwal->id) : route('jadwal.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @if(isset($jadwal))
                            @method('PUT')
                        @endif

                        <!-- Title Input -->
                        <div>
                            <label for="title" class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase tracking-wide">Nama Kegiatan</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $jadwal->title ?? '') }}"
                                   class="block w-full rounded-lg border-0 py-2.5 px-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 transition-all shadow-sm bg-gray-50/30 focus:bg-white"
                                   placeholder="Nama Kegiatan..." required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Date Input -->
                            <div>
                                <label for="date" class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase tracking-wide">Tanggal</label>
                                <input type="date" name="date" id="date" value="{{ old('date', $jadwal->date ?? '') }}"
                                       class="block w-full rounded-lg border-0 py-2.5 px-4 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 transition-all shadow-sm bg-gray-50/30 focus:bg-white"
                                       required>
                                @error('date')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Time Input -->
                            <div>
                                <label for="time" class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase tracking-wide">Waktu</label>
                                <input type="time" name="time" id="time" value="{{ old('time', isset($jadwal) ? \Carbon\Carbon::parse($jadwal->time)->format('H:i') : '') }}"
                                       class="block w-full rounded-lg border-0 py-2.5 px-4 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 transition-all shadow-sm bg-gray-50/30 focus:bg-white"
                                       required>
                                @error('time')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Location Input -->
                        <div>
                            <label for="location" class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase tracking-wide">Lokasi</label>
                            <input type="text" name="location" id="location" value="{{ old('location', $jadwal->location ?? '') }}"
                                   class="block w-full rounded-lg border-0 py-2.5 px-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 transition-all shadow-sm bg-gray-50/30 focus:bg-white"
                                   placeholder="Lokasi Kegiatan..." required>
                            @error('location')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Gambar Kegiatan (Opsional)</label>
                            <div class="flex items-center p-4 border border-gray-200 rounded-lg bg-gray-50/50">
                                @if(isset($jadwal) && $jadwal->image)
                                    <div class="flex-shrink-0 mr-4">
                                        <img src="{{ asset('storage/' . $jadwal->image) }}" alt="Preview" class="h-16 w-16 object-cover rounded-md shadow-sm border border-gray-200">
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <label class="block">
                                        <span class="sr-only">Choose file</span>
                                        <input type="file" name="image" id="image" class="block w-full text-xs text-slate-500
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-full file:border-0
                                          file:text-xs file:font-semibold
                                          file:bg-green-50 file:text-green-700
                                          hover:file:bg-green-100
                                          cursor-pointer transition-colors
                                        "/>
                                    </label>
                                    <p class="text-[10px] text-gray-500 mt-1 pl-1">PNG, JPG, GIF hingga 2MB</p>
                                </div>
                            </div>
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description Textarea -->
                        <div>
                            <label for="description" class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase tracking-wide">Keterangan (Opsional)</label>
                            <textarea name="description" id="description" rows="3" 
                                      class="block w-full rounded-lg border-0 py-2.5 px-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 transition-all shadow-sm bg-gray-50/30 focus:bg-white" 
                                      placeholder="Keterangan tambahan...">{{ old('description', $jadwal->description ?? '') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-gray-100 mt-6">
                            <a href="{{ route('jadwal.index') }}" class="group inline-flex items-center px-4 py-2 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all shadow-sm">
                                Batal
                            </a>
                            <button type="submit" class="group inline-flex items-center px-6 py-2 text-xs font-bold text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                {{ isset($jadwal) ? 'Simpan Perubahan' : 'Buat Jadwal' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
