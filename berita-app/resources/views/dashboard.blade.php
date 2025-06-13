<x-app-layout>

    <div class="py-10 px-6">
        <h3 class="text-2xl font-bold mb-6 text-gray-800">Berita Terbaru</h3>

        @if ($beritas->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($beritas as $berita)
                    <div
                        class="bg-white border rounded-xl shadow-lg hover:shadow-xl transition duration-300 overflow-hidden">
                        @if ($berita->foto)
                            <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto Berita"
                                class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-sm">
                                Tidak ada gambar
                            </div>
                        @endif
                        <div class="p-5">
                            <h4 class="text-lg font-bold text-gray-900 mb-2">{{ $berita->judul }}</h4>
                            <p class="text-sm text-gray-500 mb-2">Oleh {{ $berita->penulis }} |
                                {{ $berita->created_at->format('d M Y') }}</p>
                            <p class="text-gray-700 text-sm mb-3">
                                {{ \Illuminate\Support\Str::limit($berita->isi, 100) }}
                            </p>
                            {{-- Jika kamu ingin detail: --}}
                            {{-- <a href="{{ route('berita.show', $berita->id) }}" class="text-blue-600 hover:underline text-sm">Baca Selengkapnya</a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded">
                <p>Tidak ada berita yang tersedia saat ini.</p>
            </div>
        @endif
    </div>
</x-app-layout>
