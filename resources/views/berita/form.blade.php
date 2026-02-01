<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($berita) ? __('Edit Berita') : __('Tambah Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-xl border border-gray-200 my-8">
                <div class="bg-white px-6 py-5 border-b border-gray-200 flex items-center justify-between">
    <h3 class="text-lg font-semibold text-gray-800">
        {{ isset($berita) ? 'Perbarui Artikel' : 'Buat Artikel Baru' }}
    </h3>
    <p class="text-sm text-gray-500">Lengkapi form berikut ini.</p>
</div>
                
                <div class="p-6 text-gray-900 bg-white">
                    <form action="{{ isset($berita) ? route('berita.update', $berita->id) : route('berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @if(isset($berita))
                            @method('PUT')
                        @endif

                        <!-- Title Input -->
                        <div>
                            <label for="title" class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase tracking-wide">Judul Berita</label>
                            <div class="relative rounded-md shadow-sm">
    <input type="text" name="title" id="title" value="{{ old('title', $berita->title ?? '') }}"
           class="block w-full rounded-lg border-0 py-2.5 pl-9 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 transition-all shadow-sm bg-gray-50/30 focus:bg-white"
           placeholder="Judul Berita..." required>
</div>                            
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content Textarea -->
                        <div>
                            <label for="content" class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase tracking-wide">Konten Berita</label>
                            <div class="relative rounded-md shadow-sm">
                                <textarea name="content" id="content" rows="5" 
                                          class="block w-full rounded-lg border-0 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 transition-all shadow-sm bg-gray-50/30 focus:bg-white" 
                                          placeholder="Tulis konten...">{{ old('content', $berita->content ?? '') }}</textarea>
                                @error('content')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <!-- TinyMCE Rich Text Editor -->
                           <script
  src="https://cdn.tiny.cloud/1/83zkd265oyxun0axxtcp2f83bmd08ma3vyu3asc4mlfhggpo/tinymce/6/tinymce.min.js"
  referrerpolicy="origin">
</script>

                                <script>
                                    tinymce.init({
                                        selector: '#content',
                                        menubar: false,
                                        plugins: 'link lists',
                                        toolbar: 'undo redo | formatselect | bold italic underline | bullist numlist | link',
                                        branding: false,
                                        height: 300,
                                        setup: function (editor) {
                                            editor.on('change', function () {
                                                editor.save();
                                            });
                                        }
                                    });

                                    // Fallback: Ensure sync before form submission
                                    document.querySelector('form').addEventListener('submit', function() {
                                        tinymce.triggerSave();
                                    });
                                </script>
                        </div>

                        <!-- Image Upload -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Gambar</label>
                            <div class="flex items-center p-4 border border-gray-200 rounded-lg bg-gray-50/50">
                                @if(isset($berita) && $berita->image)
                                    <div class="flex-shrink-0 mr-4">
                                        <img src="{{ asset('storage/' . $berita->image) }}" alt="Preview" class="h-16 w-16 object-cover rounded-md shadow-sm border border-gray-200">
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <label class="block">
                                        <span class="sr-only">Choose file</span>
                                        <input type="file" name="image" id="image" class="block w-full text-xs text-slate-500
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-full file:border-0
                                          file:text-xs file:font-semibold
                                          file:bg-blue-50 file:text-blue-700
                                          hover:file:bg-blue-100
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

                        <div class="flex items-center justify-between pt-6 border-t border-gray-100 mt-6">
                            <a href="{{ route('dashboard') }}" class="group inline-flex items-center px-4 py-2 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-sm">
                                Batal
                            </a>
                            <button type="submit" class="group inline-flex items-center px-6 py-2 text-xs font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                {{ isset($berita) ? 'Simpan Perubahan' : 'Buat Berita' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
