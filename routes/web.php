<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//Login,Register,Password
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
//Admin
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\GoogleController;
//User
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalangDanaController;
use App\Http\Controllers\DaftarDonasiController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\ForgetPasswordController;
//Donatur
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| HOMEE SEBELUM LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', [HomeController::class,'index']);

Route::get('/penggalangan', function () {
    return view('penggalangan');
});

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

//BAGIAN PROFIL USER
Route::get('/histori-donasi', [HomeController::class,'historidonasi'])->name('histori-donasi')->middleware('auth');
Route::get('/favoritdonasi', [HomeController::class,'favoritdonasi'])->name('favorit-donasi')->middleware('auth');
Route::get('/riwayatprogram', [HomeController::class,'riwayatprogram'])->name('riwayat-program')->middleware('auth');

Route::get('/pengguna', function () {
    return redirect('/home');
});

Route::get('/blog',[ArtikelController::class,'artikeluser'])->name('artikel.user');
Route::get('/blog/{id}',[ArtikelController::class,'artikelusershow'])->name('artikel.user.show');

//DONASI USER
Route::get('/donasi', [HomeController::class,'donasi'])->name('all-donasi')->middleware('auth');
Route::post('/donasi', [HomeController::class,'caridonasi'])->name('cari-donasi')->middleware('auth');
Route::get('/donasi/{slug}',[DonasiController::class,'lihatdetaildonasi'])->name('detaildonasi')->middleware('auth');
Route::get('/donasi/{slug}/orangdonasi',[DonasiController::class,'lihatorangdonasi'])->name('lihatorangdonasi')->middleware('auth');

// FAVORIT USER
Route::post('/toggle-favorite', [HomeController::class,'toggleFavorite'])->name('toggle-favorite')->middleware('auth'); 
Route::post('/hapus-favorite', [HomeController::class,'hapusfavorit'])->name('hapus-favorit')->middleware('auth'); 
Route::get('/cek-favorite', [HomeController::class,'cekfavorit'])->name('cek-favorit')->middleware('auth'); 



// PROGRAM USER
Route::get('/formcampaign', [GalangDanaController::class,'buatgalangdanauser'])->name('buat-galang-dana-user')->middleware('auth');
Route::post('/formcampaign', [GalangDanaController::class,'storegalangdanauser'])->name('buat-galang-dana-user')->middleware('auth');


Route::get('/invoice/{slug}',[InvoiceController::class,'index'])->name('invoice')->middleware('auth');

Route::post('/pembayaran',[InvoiceController::class,'pembayaran'])->name('pembayaran')->middleware('auth');
Route::post('/proses-bayar',[InvoiceController::class,'prosesbayar'])->name('proses-bayar')->middleware('auth');





/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

// DASHBOARD ADMIN
Route::get('/dashboard', [DashboardAdminController::class,'dashboard'])->name('dashboard')->middleware('admin');


// OPEN GALANG DANA ADMIN
Route::get('/galangdana/index',[GalangDanaController::class,'index'])->name('galangdana.index')->middleware('admin');
// Route::get('/galangdana/create',[GalangDanaController::class,'create'])->name('galangdana.create');
Route::delete('/galangdana/destroy/{id}', [GalangDanaController::class, 'destroy'])->name('galangdana.destroy')->middleware('admin');
Route::get('/galangdana/show/{id}', [GalangDanaController::class, 'show'])->name('galangdana.show')->middleware('admin');
Route::put('/galangdana/show/{id}', [GalangDanaController::class, 'update'])->name('galangdana.update')->middleware('admin');
Route::get('/galangdana/data', [GalangDanaController::class, 'data'])->name('galangdana.data')->middleware('admin');
Route::post('/galangdana/store',[GalangDanaController::class,'store'])->name('galangdana.store')->middleware('admin');

//KATEGORI ADMIN
Route::get('/kategori/index',[KategoriController::class,'index'])->name('kategori.index')->middleware('admin');
Route::get('/kategori/edit/{id}',[KategoriController::class,'edit'])->name('kategori.edit')->middleware('admin');
Route::put('/kategori/edit/{id}',[KategoriController::class,'update'])->name('kategori.update')->middleware('admin');
Route::delete('/kategori/edit/{id}',[KategoriController::class,'destroy'])->name('kategori.destroy')->middleware('admin');
Route::get('/kategori/create',[KategoriController::class,'create'])->name('kategori.create')->middleware('admin');
Route::post('/kategori/store',[KategoriController::class,'store'])->name('kategori.store')->middleware('admin');

//DETAIL GALANG DANA ADMIN
Route::get('/daftar-donasi', [DaftarDonasiController::class,'index'])->name('daftar-donasi')->middleware('admin');
Route::get('/daftar-galang-dana', [GalangDanaController::class,'daftargalangdana'])->name('daftar-galang-dana')->middleware('admin');
Route::post('/daftar-galang-dana', [GalangDanaController::class,'aksi'])->name('daftar-galang-dana')->middleware('admin');
Route::get('/daftar-galang-dana/{id}', [GalangDanaController::class,'detailgalangdana'])->name('detail-galang-dana')->middleware('admin');


//PROFIL ADMIN
Route::get('/show', [HomeController::class,'adminprofile'])->middleware('admin');

Route::get('/profiluser', [HomeController::class,'profile'])->name('profile');
Route::post('/profiluser', [HomeController::class,'updateprofile'])->name('profile');

Route::post('/ganti-password', [HomeController::class,'changePassword'])->name('ganti-password');


Route::get('/coba', function () {
    return view('user/coba');
});

Route::get('/all-user', [HomeController::class,'alluser'])->name('all-user')->middleware('admin');
Route::resource('/artikel', ArtikelController::class)->middleware('admin');




/*
|--------------------------------------------------------------------------
| LOGIN/REGISTER/LUPA PASSWORD/PASSWORD
|--------------------------------------------------------------------------
*/

//GOOGLE LOGIN
Route::get('/auth/login',[App\Http\Controllers\GoogleController::class,'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback',[App\Http\Controllers\GoogleController::class,'handleGoogleCallback'])->name('google.callback');


//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);


//REGISTER
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//LUPA PASSWORD UNTUK VERIF EMAIL
Route::get('/forgotpassword', [ForgetPasswordController::class,'index'])->name('auth.forgot-password');
Route::post('/forgotpassword', [ForgetPasswordController::class,'forgetpassword'])->name('auth.forgot-password');

//RESET PASSWORD SETELAH EMAIL MASUK
Route::get('/reset/password/{token}', [ForgetPasswordController::class, 'resetpassword'])->name('password.reset');
Route::post('/reset/password/acc', [ForgetPasswordController::class, 'resetpasswordpost'])->name('reset-password');




