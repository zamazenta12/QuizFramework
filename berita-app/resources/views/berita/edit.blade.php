<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ✏️ Edit Berita
        </h2>
    </x-slot>

    <div class="py-8 px-4 max-w-4xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('admin.berita.index') }}"
                class="inline-block bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">
                ← Kembali ke Daftar Berita
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6 shadow-sm border border-red-300">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="judul" class="block font-medium text-gray-700 mb-1">Judul</label>
                    <input type="text" name="judul" id="judul"
                        value="{{ old('judul', $berita->judul) }}"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-400">
                </div>

                <div>
                    <label for="isi" class="block font-medium text-gray-700 mb-1">Isi Berita</label>
                    <textarea name="isi" id="isi" rows="6"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-400">{{ old('isi', $berita->isi) }}</textarea>
                </div>

                <div>
                    <label for="penulis" class="block font-medium text-gray-700 mb-1">Penulis</label>
                    <input type="text" name="penulis" id="penulis"
                        value="{{ old('penulis', $berita->penulis) }}"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-400">
                </div>

                <div>
                    <label class="block font-medium text-gray-700 mb-1">Foto Saat Ini</label>
                    @if ($berita->foto)
                        <img src="{{ asset('storage/' . $berita->foto) }}" class="w-32 h-auto mb-2 rounded shadow">
                    @else
                        <p class="text-gray-500 text-sm">Tidak ada foto.</p>
                    @endif
                </div>

                <div>
                    <label for="foto" class="block font-medium text-gray-700 mb-1">Ganti Foto (opsional)</label>
                    <input type="file" name="foto" id="foto"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-400">
                    <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti foto.</p>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition font-semibold">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
