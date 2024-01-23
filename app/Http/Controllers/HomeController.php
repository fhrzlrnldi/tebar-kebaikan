<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artikel;
use App\Models\Favorit;
use App\Models\Kategori;
use App\Models\GalangDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //
    public function  index() {
        $dukungan = DB::table('donasis as d')
        ->join('users as u','u.id','=','d.user_id')
        ->select('u.name','u.path_image','d.dukungan','d.anonim')
        ->where('d.status','=','confirmed')
        ->where('d.dukungan','!=','')
        ->get();
        $galangdana=DB::table('galang_danas as gd')
        ->join('kategoris as k','k.id','=','gd.kategori_id')
        ->select('gd.judul','k.nama','gd.goal','gd.slug','gd.path_image','gd.nominal','gd.end_date')
        ->where('status','publish')
        ->get();
        return view('Home',[
            'dukungan'=>$dukungan,
            'galangdana'=>$galangdana,
            'artikel'=>Artikel::paginate(6)
        ]);
    }
    
    public function profile (Request $request) {
        if(Auth::user()->role_id==2){
            return redirect()->route('dashboard');
        }
        return view('profile.profiluser');
    }
    public function toggleFavorite(Request $request){
        // Mendapatkan ID user yang sedang login
        $userId = $request->user()->id;

        // Mendapatkan program ID dari POST request body
        $programId = $request->input('program_id');

        // Cek apakah program sudah ada dalam tabel favorit untuk user tersebut
        $existingFavorite = Favorit::where('user_id', $userId)
            ->where('galang_dana_id', $programId)
            ->first();

        if ($existingFavorite) {
            // Program sudah ada dalam tabel favorit, hapus dari database
            $existingFavorite->delete();

            // Tampilkan response sukses
            return response()->json(['message' => 'Program dihapus dari favorit'], 200);
        } else {
            // Program belum ada dalam tabel favorit, tambahkan ke database
            $favorite = new Favorit();
            $favorite->user_id = $userId;
            $favorite->galang_dana_id = $programId;
            $favorite->save();

            // Tampilkan response sukses
            return response()->json(['message' => 'Program ditambahkan ke favorit'], 200);
        }
    }
    public function historidonasi() {
        $historiDonasi = DB::table('donasis as d')
        ->join('galang_danas as gd','d.galang_dana_id','=','gd.id')
        ->select('gd.judul','d.created_at','d.status','d.jenis_pembayaran','d.nominal','d.no_va')
        ->where('d.user_id',Auth::user()->id)
        ->get();
        return view('profile.historidonasi',[
            'donasi'=>$historiDonasi
        ]);
    }
    public function favoritdonasi() {
        $favorit= DB::table('favorits as f')
        ->join('galang_danas as gd','f.galang_dana_id','=','gd.id')
        ->get();
        return view('profile.favoritdonasi',[
            'favorit'=>$favorit
        ]);
    }
    public function hapusfavorit(Request $request)
    {
        Favorit::where('galang_dana_id',$request->id_galang_dana)
        ->where('user_id',Auth::user()->id)
        ->delete();
           return back();
    }
    public function cekfavorit(Request $request)
    {
        $userId = $request->user()->id;

        // Mendapatkan program ID dari POST request body
        $programId = $request->input('program_id');

        // Cek apakah program sudah ada dalam tabel favorit untuk user tersebut
        $existingFavorite = Favorit::where('user_id', $userId)
            ->where('galang_dana_id', $programId)
            ->first();
            if ($existingFavorite) {
                return ' Favourited';
            }else{
                return ' Tambahkan ke Favorit';

            }
    }
    public function riwayatprogram()
    {
        
        return view('profile.riwayatprogram',[
            'galangdanas'=>GalangDana::where('user_id',Auth::user()->id)->get()
        ]);
    }
    public function updateprofile(Request $request)
    {
          // Validasi input
          $request->validate([
            'name' => 'required|string',
            'phone' => 'nullable|numeric',
            'gender' => 'nullable|in:laki-laki,perempuan',
            'birth_date' => 'nullable|date',
            'job' => 'nullable|string',
            'address' => 'nullable|string',
            'about' => 'nullable|string',
            'path_image' => 'nullable|image|max:2048', // Validasi foto profil
        ]);
        // dd($request->birth_date);
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();

        // Ambil data pengguna dari tabel users berdasarkan ID
        $user = User::findOrFail($userId);

        // Update kolom-kolom yang diizinkan
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->birth_date = $request->birth_date;
        $user->job = $request->job;
        $user->address = $request->address;
        $user->about = $request->about;

        if ($request->hasFile('path_image')) {
            // Hapus foto profil yang lama jika ada
            if ($user->path_image) {
                Storage::delete('public/assets/fotoprofil/' . $user->path_image);
            }
        
            $image = $request->file('path_image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('assets/fotoprofil'), $imageName);
        
            $user->path_image = $imageName;
        }

        // Simpan perubahan pada tabel users
        $user->save();

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Memeriksa apakah password saat ini cocok dengan yang diinputkan
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
        }

        // Memperbarui password
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password berhasil diubah.');
    }

    public function donasi()
    {
        $galangdana=DB::table('galang_danas as gd')
        ->join('kategoris as k','k.id','=','gd.kategori_id')
        ->select('gd.judul','k.nama','gd.goal','gd.slug','gd.path_image','gd.nominal','gd.end_date')
        ->where('status','publish')->paginate(5);           
        

        return view('user.donasi',[
            'kategori'=>Kategori::all(),
            'galang_dana'=>$galangdana
            
        ]);
    }
    public function caridonasi(Request $request)
    {
        if($request->kategori==-1){
            $galangDana = DB::table('galang_danas as gd')
            ->join('kategoris as k','k.id','=','gd.kategori_id')
            ->where('judul','LIKE', "%$request->judul%")
            ->where('status', "publish")
            ->select('gd.judul','k.nama','gd.goal','gd.slug','gd.path_image','gd.nominal','gd.end_date')
            ->get();
        }else{
        $galangDana = DB::table('galang_danas as gd')
        ->join('kategoris as k','k.id','=','gd.kategori_id')
        ->where('kategori_id', $request->kategori)
        ->where('judul','LIKE', "%$request->judul%")
        ->where('status', "publish")
        ->select('gd.judul','k.nama','gd.goal','gd.slug','gd.path_image','gd.nominal','gd.end_date')
        ->get();
         }
        
        // dd($galangDana);
        return view('user.donasi',[
            'result'=>$galangDana,
            'kategori'=>Kategori::all(),
            'judul'=>$request->judul,
            'id_kategori'=>$request->kategori
        ]);

    }
    public function alluser()
    {
        return view('user.alluser',[
            'user'=>User::where('role_id','1')->get()
        ]);
    }
    public function adminprofile()
    {
        return view('profile.show');
    }
}
