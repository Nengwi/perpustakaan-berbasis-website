<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
 //Menampilkan daftar semua buku
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

   //Menampilkan form tambah buku
    public function create()
    {
        return view('buku.create');
    }

  //Menyimpan data buku dari form
//Validasi dulu, baru simpan ke DB
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|digits:4',
            'stok' => 'required|integer|min:0',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    //Menampilkan form edit buku
 //Otomatis ambil buku berdasarkan ID
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    //Menyimpan hasil edit ..Validasi, lalu update ke DB, Redirect ke daftar buku
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|digits:4',
            'stok' => 'required|integer|min:0',
        ]);

        $buku->update($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

   //Menghapus buku dari database, Redirect ke daftar buku + pesan sukses
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}