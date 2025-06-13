<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $beritas = Berita::latest()->take(6)->get(); // tampilkan 6 berita terbaru
        return view('dashboard', compact('beritas'));
    }
}
