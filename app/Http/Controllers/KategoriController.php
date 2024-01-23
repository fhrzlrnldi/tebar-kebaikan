<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Str;


class KategoriController extends Controller
{
    protected $paginate = 3;

    public function index(Request $request)
    {
        // $kategori = Kategori::paginate(5);
        $kategori = Kategori::orderBy('nama')->when($request->has('q') && $request->q != "", function ($query) use ($request) {
            $query->where('nama', 'LIKE', '%'. $request->q .'%');
        })->paginate($request->rows ?? $this->paginate)->appends($request->only('rows','q'));
        // $kategori = Kategori::all();

        return view('kategori.index',[
            'kategori' => $kategori
        ]);

    }


    public function create()
    {
        // return view('kategori.create', compact('kategori'));
        return view('kategori.create');
    }


    public function store(Request $request)
    {

        $data = $this->validate($request, [
            'nama' => 'required|unique:kategoris,nama'
        ]);

        $data['slug'] = Str::slug($data['nama']);

        Kategori::create($data);
        // $data2 = new Kategori();
        // $data2->nama=$data['nama'];

        return redirect('/kategori/index')
            ->with([
                'message'=>'Kategori berhasil ditambahkan',
                'success'=> true,
            ]);
    }


    public function show($id)
    {
        //
    }


    public function edit(String $kategori)
    {
        return view('kategori.edit',[
            'kategori'=>Kategori::find($kategori)
        ]);
        // return view('kategori.edit', compact('kategori'));
    }


    public function update($id,Request $request)
    {

        $data = $request->validate([
            'nama' => 'required|unique:kategoris'
        ]);
        // $data = $request->only('nama');
        // $data['slug'] = Str::slug($data['nama']);


        Kategori::find($id)->update($data);

        // $data2 = new Kategori();
        // $data2->nama=$data['nama'];

        return redirect()->route('kategori.index')
            ->with([
                'message'=>'Kategori berhasil diperbarui',
                'success'=> true,
            ]);
    }
    public function destroy($id , Kategori $Kategori)
    {
        // $Kategori->delete();
        Kategori::find($id)->delete();
        return redirect()->route('kategori.index')
            ->with([
                'message' => 'Kategori berhasil dihapus',
                'success' => true,
            ]);
    }
    
}
