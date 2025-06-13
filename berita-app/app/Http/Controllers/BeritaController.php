<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Berita;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $beritas = Berita::with('admin_id')->latest()->get();
        return view('berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required|min:10',
            'isi' => 'required',
            'penulis' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->file('foto')->store('berita', 'public');

        Berita::create([
            'admin_id' => Auth::id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'penulis' => $request->penulis,
            'foto' => $imagePath,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        //

        $request->validate([
            'judul' => 'required|min:10',
            'isi' => 'required',
            'penulis' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update data dasar
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->penulis = $request->penulis;

        // Jika ada file foto baru diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
                Storage::disk('public')->delete($berita->foto);
            }

            // Simpan foto baru
            $imagePath = $request->file('foto')->store('berita', 'public');
            $berita->foto = $imagePath;
        }

        $berita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        // Hapus foto jika ada
        if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
            Storage::disk('public')->delete($berita->foto);
        }

        // Hapus data berita
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
