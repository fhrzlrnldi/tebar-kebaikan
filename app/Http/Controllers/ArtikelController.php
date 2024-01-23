<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index(Request $req)
     {
         if ($req->ajax()) {
             $model = Artikel::query();
     
             return DataTables::eloquent($model)
                 ->filter(function ($query) use ($req) {
                     if ($req->has('created_at')) {
                         $query->whereDate('created_at', '=', $req->get('created_at'));
                     }
                 },true)
                 ->addIndexColumn()
                 ->editColumn('created_at', '{{date("d-m-Y",strtotime($created_at))}}')
                 ->rawColumns(['edithapus'])
                 ->addColumn('edithapus', 'Artikel.edit-hapus-artikel')
                 ->toJson();
         }
         return view('Artikel.index');
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //
         return view('Artikel.create');
     }
     
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         //
         $request->validate([
            'cover-artikel' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
            'judul' => 'required',
            'penulis' => 'required',
            'isi_konten' => 'required',
        ]);
         $cover=request()->file('cover-artikel');
         $judul=request('judul');
         $penulis=request('penulis');
         $isi_konten=request('isi_konten');
        
         $newName = $cover->getClientOriginalName();
         $cover->move(public_path('assets/artikel/'),$newName);
         Artikel::create([
             'cover'=> $cover->getClientOriginalName(),
             'judul'=>$judul,
             'penulis'=>$penulis,
             'isi_konten'=>$isi_konten
         ]);
         return redirect()->route('artikel.index')->withSuccess('Data Berhasil di tambah');
 
     }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Models\artikel  $artikel
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $artikel = Artikel::find($id);
         if($artikel==null){
             return response('Data Not Found',404);
         }
         return response($artikel,200); 
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\artikel  $artikel
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $artikel = Artikel::find($id);
         if($artikel==null){
             return response('Data Not Found',404);
         }
        return view('Artikel.show',[
         'artikel'=>$artikel
        ]);
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\artikel  $artikel
      * @return \Illuminate\Http\Response
      */
     public function update($id)
     {
         $artikel= Artikel::find($id);
         if($artikel==null){
             return response('Data Not Found',404);
         }
        if(request('edit-judul') == null || request('edit-penulis')==null || request('edit-isi')==null){
         return response('Data Not Found',404);
        }
         $artikel->judul=request('edit-judul');
         $artikel->penulis=request('edit-penulis');
         $artikel->isi_konten=request('edit-isi');
         if(request()->file('cover-artikel')!=null){
             $oldfile = $artikel->cover;
             unlink(public_path("assets/artikel/").$oldfile);
             $file = request()->file('cover-artikel');
             $newName = $file->getClientOriginalName();
             $file->move('artikels/',$newName);
             $artikel->cover= $file->getClientOriginalName();
         }
         $artikel->save();
         return redirect()->route('artikel.index')->withSuccess('Data Berhasil di ubah');
 
         // return response('success',200);
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\artikel  $artikel
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         //
         $artikel= Artikel::find($id);
         if($artikel==null){
             return response('Data Not Found',404);
         }
        //  try {
        //      unlink("assets/artikel/".$artikel->cover);
        //  } catch (\Throwable $th) {
        //      return $th->getMessage();
        //  }
         $artikel->delete();
         return response('Data Berhasil Dihapus',200);
         
     }
     public function artikeluser() {
        return view('user.blog',[
            'artikel'=>Artikel::paginate(6)
        ]);
    }
  
    public function artikelusershow($id) { 

        return view('user.blogdetails',[
            'artikel'=>Artikel::find($id)
        ]);
    }
}
