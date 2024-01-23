<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\GalangDana;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalangDanaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GalangDana $galangdana)
    {
        $kategori = Kategori::orderBy('nama')->get()->pluck('nama', 'id');


        return view('galangdana.index', compact('kategori'));
    }

    public function data(Request $request)
    {
        // $query = GalangDana::orderBy('publish_date', 'desc')->get();
        $query = DB::table('galang_danas as gd')
        ->join('users as u','u.id','=','gd.user_id')
        ->select('u.name','gd.judul','gd.short_description','gd.path_image','gd.id','gd.publish_date','gd.status')
        ->where('gd.user_id',Auth::user()->id)
        ->orderBy('publish_date', 'desc')
        ->get();
        return datatables($query)
                ->addIndexColumn()
                ->editColumn('short_description', function($query) {
                    return $query->judul .'<br><small>'. $query->short_description .'</small>';    
                })
                ->editColumn('path_image', function($query) {
                    return '<img alt="" width="80%" src="'.asset("assets/galangdana/$query->path_image").'" class"img-thumbnail">';
                })
                ->addColumn('author', function($query) {
                    return $query->name;
            })
                ->addColumn('action', function($query) {
                    return '
                    <button onclick="editForm(`'. route('galangdana.update', ['id'=>$query->id]) .'`)" class="btn btn-link text-info"><i class="fas fa-edit"></i></button>
                    <button  class="btn btn-link text-danger" onclick="deleteData(`'. route('galangdana.destroy', ['id'=>$query->id]) .'`)"><i class="fas fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['short_description', 'path_image', 'action'])
                ->escapeColumns([])
                ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:8',
            'kategoris' => 'required|min:1',
            'short_description' => 'required',
            'body' => 'required|min:8',
            'publish_date' => 'required|date_format:Y-m-d H:i',
            'status' => 'required|in:publish,archived',
            'goal' => 'required|integer',
            'end_date' => 'required|date_format:Y-m-d H:i',
            'note' => 'nullable',
            'penerima' => 'required',
            'path_image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $request->except('path_image', 'kategoris');
        $data['slug'] = Str::slug($request->judul);
        $data['path_image'] =  $request->file('path_image')->getClientOriginalName();
        $request->file('path_image')->move(public_path('assets/galangdana'), $data['path_image']);
        // $data['path_image'] = upload('/assets/galangdana', $request->file('path_image'), 'galangdana');
        $data['user_id'] = auth()->id();
        $data['kategori_id'] = $request->kategoris;

        $galangdana = GalangDana::create($data);
        // $galangdana = GalangDana::first();
        // $galangdana->kategori_donasi()->attach($request->kategoris);

        return response()->json(['data' => $galangdana, 'message' => 'Galang dana berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        $galangdana = GalangDana::find($id);
        $galangdana->publish_date = date('Y-m-d H:i', strtotime($galangdana->publish_date));
        $galangdana->end_date = date('Y-m-d H:i', strtotime($galangdana->end_date));
        // $galangdana->kategoris = $kategoris->kategori_donasi;
        
        return response()->json(['data' => $galangdana]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:8',
            'kategoris' => 'required|min:1',
            'short_description' => 'required',
            'body' => 'required|min:8',
            'publish_date' => 'required|date_format:Y-m-d H:i',
            'status' => 'required|in:publish,archived',
            'goal' => 'required|integer',
            'end_date' => 'required|date_format:Y-m-d H:i',
            'note' => 'nullable',
            'penerima' => 'required',
            'path_image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $request->except('path_image', 'kategoris');
        $data['slug'] = Str::slug($request->judul);
        if($request->hasFile('path_image'))
        {
            $data['path_image'] =  $request->file('path_image')->getClientOriginalName();
            $request->file('path_image')->move(public_path('assets/galangdana'), $data['path_image']);
        }
        // $data['path_image'] = upload('/assets/galangdana', $request->file('path_image'), 'galangdana');
        $data['user_id'] = auth()->id();
        $data['kategori_id'] = $request->kategoris;

        $galangdana = GalangDana::find($id)->update($data);
        // $galangdana = GalangDana::first();
        // $galangdana->kategori_donasi()->attach($request->kategoris);

        return response()->json(['data' => $galangdana, 'message' => 'Galang dana berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $galangDana = GalangDana::findOrFail($id);

        // Get the path image
        $pathImage = "assets/galangdana/$galangDana->path_image";
        // Delete the GalangDana record
        $galangDana->delete();
        // Delete the image file
        if ($pathImage) {
            File::delete($pathImage);
        }
        return response()->json(['message' => 'Galang dana berhasil dihapus ']);

    }

    public function daftargalangdana(Request $req)
    {
        if ($req->ajax()) {
            $daftarGalangDana = DB::table('galang_danas as gd')->join('users as u','u.id','=','gd.user_id')
            ->where('gd.user_id','!=',Auth::user()->id)
            ->select('u.name','gd.judul','gd.id','gd.status')
            ->orderBy('gd.created_at', 'desc')
            ->get();
            
        return datatables($daftarGalangDana)
        ->addIndexColumn()
        ->addColumn('detail',function($galangDana){
            return "
            <a href='".route('detail-galang-dana',['id'=> $galangDana->id])."' class='btn btn-info'>Lihat</a>
            ";
        })
        ->addColumn('aksi',function($galangDana){
            if($galangDana->status=='publish'){
                return "<div class=''>".ucfirst($galangDana->status)."<div>";  
            }
            if($galangDana->status=='archived'){
                return "<div class=''>$galangDana->status<div>";  
            }
            else{
            return "
            <button class='btn btn-success' onclick=\"aksi('$galangDana->id','publish')\">Terima</button>
            <button class='btn btn-danger' onclick=\"aksi('$galangDana->id','archived')\">Tolak</button>
            ";
        }
        })
        ->rawColumns(['aksi','detail'])
        ->make(true);
        }
        return view('galangdana.daftar-galang-dana');
    }
    public function aksi(Request $request)
    {
        $id= $request->id;
        $status= $request->status;
        $publishdate =null;
        if($status=='publish'){
            $publishdate = now();
        }
        GalangDana::find($id)->update(['status' => $status, 'publish_date' => $publishdate]);
         return response()->json(['message' => 'update berhasil']);
    }

    public function detailgalangdana($id)
    {
        $detailGalangDana = GalangDana::find($id);
        return view('galangdana.detail-galang-dana',[
            'galangDana'=>$detailGalangDana
        ]);
    }

    public function buatgalangdanauser()
    {
        
        return view('program.formcampaign',[
            'kategori'=>Kategori::all()
        ]);
    }
    
    public function storegalangdanauser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:8',
            'kategori_id' => 'required',
            'short_description' => 'required',
            'body' => 'required|min:8',
            'publish_date' => 'required|date_format:Y-m-d H:i',
            'goal' => 'required|integer',
            'end_date' => 'required|date_format:Y-m-d H:i',
            'note' => 'nullable',
            'penerima' => 'required',
            'path_image' => 'required',
        ]);

      
        $data = $request->except('path_image');
        $data['slug'] = Str::slug($request->judul);
        $data['path_image'] =  $request->file('path_image')->getClientOriginalName();
        $request->file('path_image')->move(public_path('assets/galangdana/'), $data['path_image']);
        // $data['path_image'] = upload('/assets/galangdana', $request->file('path_image'), 'galangdana');
        $data['user_id'] = auth()->id();
        // $data['kategori_id'] = $request->kategoris;

        $galangdana = GalangDana::create($data);
        return redirect()->route('riwayat-program');
    }
}
