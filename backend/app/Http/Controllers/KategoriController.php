<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        // $kategori = Kategori::all();

        // return view('admin.kategori.index', ['kategori' => $kategori]);
        return response()->json(Kategori::latest()->get());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_kategori' => 'required|unique:kategori',
        // ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        // return redirect('/kategori')->with('success', 'Category added successfully!');

        return response()->json('Kategori berhasil dibuat!');
    }

    public function edit($id)
    {
        // $kategori = Kategori::findOrFail($id);
        // return view('admin.kategori.edit', compact('kategori'));

        return response()->json(Kategori::whereId($id)->first());
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama_kategori' => 'required',
        // ]);
        $kategori = Kategori::whereId($id)->first();

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        // return redirect('/kategori')->with('success', 'Category updated successfully!');

        return response()->json('Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Kategori::destroy($id);
        $kategori = Kategori::whereId($id)->delete();

        // return redirect()->to('/kategori')->with('success', 'Category successfully deleted!');
        return response()->json('Kategori berhasil dihapus!');
    }
}
