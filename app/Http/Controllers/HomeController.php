<?php

namespace App\Http\Controllers;
use App\Models\Gallery;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function service()
    {
        return view('service');
    }

    public function pemesanan()
    {
        return view('pemesanan');
    }

    public function profile()
    {
        return view('profile');
    }

    public function editprofile()
    {
        return view('editprofile');
    }
    
    public function gallery()
    {
        $galleries = Gallery::all();
        return view('gallery', compact('galleries'));    }
    public function manage(){
        $galleries = Gallery::all();
        return view('gallery.manage', compact('galleries'));
    }        

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
        ]);

        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('public/gambar'); // Simpan gambar di dalam folder public/gambar

        Gallery::create(['gambar' => $gambarPath]);

        return redirect('/gallery')->with('success', 'Gambar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $gambar = Gallery::find($id);

        return view('gallery.edit', compact('gambar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
        ]);

        $gambar = Gallery::find($id);

        if ($gambar) {
            // Hapus gambar lama dari server jika diperlukan
            // Storage::delete($gambar->gambar);

            $gambarPath = $request->file('gambar')->store('public/gambar'); // Simpan gambar di dalam folder public/gambar
            $gambar->gambar = $gambarPath;
            $gambar->save();

            return redirect('/gallery')->with('success', 'Gambar berhasil diubah');
        } else {
            return redirect('/gallery')->with('error', 'Gambar tidak ditemukan');
        }
    }

    public function destroy($id)
    {
        $gambar = Gallery::find($id);

        if ($gambar) {
            // Hapus gambar dari server jika diperlukan
            // Storage::delete($gambar->gambar);

            // Hapus data gambar dari database
            $gambar->delete();

            return redirect('/gallery')->with('success', 'Gambar berhasil dihapus');
        } else {
            return redirect('/gallery')->with('error', 'Gambar tidak ditemukan');
        }
    }
        public function showImage($id)
    {
        $gambar = Gallery::find($id);

        if ($gambar) {
            $gambarPath = storage_path('app/' . $gambar->gambar);
            return response()->file($gambarPath, ['Content-Type' => mime_content_type($gambarPath)]);
        } else {
            // Handle jika gambar tidak ditemukan, misalnya, tampilkan gambar pengganti atau pesan kesalahan
            return response()->file(public_path('images/gambar-default.jpg'), ['Content-Type' => 'image/jpeg']);
        }
}

}

