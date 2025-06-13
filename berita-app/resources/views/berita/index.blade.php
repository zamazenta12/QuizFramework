<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen Berita
        </h2>
    </x-slot>

    <div class="py-4 px-6">
        <a href="{{ route('admin.berita.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Berita</a>

        @if (session('success'))
            <div class="text-green-600 mt-4">{{ session('success') }}</div>
        @endif

        <table class="w-full mt-4 table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Judul</th>
                    <th class="border px-4 py-2">Penulis</th>
                    <th class="border px-4 py-2">Isi Singkat</th>
                    <th class="border px-4 py-2">Foto</th>
                    <th class="border px-4 py-2">Tanggal Upload</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($beritas as $berita)
                    <tr>
                        <td class="border px-4 py-2">{{ $berita->judul }}</td>
                        <td class="border px-4 py-2">{{ $berita->penulis ?? ($berita->beritas->name ?? '-') }}</td>
                        <td class="border px-4 py-2">{{ \Illuminate\Support\Str::limit($berita->isi, 50) }}</td>
                        <td class="border px-4 py-2 text-center">
                            @if ($berita->foto)
                                <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto Berita"
                                    class="w-24 h-auto">
                            @else
                                -
                            @endif
                        </td>
                        <td class="border px-4 py-2">{{ $berita->created_at->format('d M Y') }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="text-yellow-600">Edit</a>
                            |
                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST"
                                class="inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border px-4 py-2 text-center">Tidak ada data berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
