<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Berita
        </h2>
    </x-slot>

    <div class="py-8 px-4 max-w-4xl mx-auto">
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6 shadow-sm border border-red-300">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Judul</label>
                    <input type="text" name="judul"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-400"
                        required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Isi Berita</label>
                    <textarea name="isi" rows="6"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-400" required></textarea>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Penulis</label>
                    <input type="text" name="penulis"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-400"
                        required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Foto</label>
                    <input type="file" name="foto" accept="image/*"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-400"
                        required>
                </div>

                <div class="text-sm text-gray-500 italic">
                    Tanggal upload akan diatur otomatis saat berita disimpan.
                </div>

                <div class="pt-4 flex items-center gap-4">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                        Simpan
                    </button>
                    <a href="{{ route('admin.berita.index') }}" class="text-gray-600 hover:underline">
                        ← Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
