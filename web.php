<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriControllerr;
use App\Http\Controllers\SiswaControllerr;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AnggotaController;

use App\Http\Controllers\PengarangControllerr;
use App\Http\Controllers\PenerbitControllerr;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;

use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\MahasantriController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DosenController;

use App\Http\Controllers\KebiasaanController;
use App\Http\Controllers\Plckan_kebiasaanController;
use App\Http\Controllers\PengingatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salam', function () {
    return "Assalamu'alikum Sobat, Selamat Belajar Laravel";
});

//routing parameter
Route::get('/pegawai/{nama}/{divisi}', function ($nama,$divisi) {
    return 'Nama Pegawai : '.$nama.'<br/>Departemen : '.$divisi;
});

//routing view kondisi
Route::get('/kabar', function () {
    return view('kondisi');
});

//routing data santri
Route::get('/santri', [SantriControllerr::class, 'dataSantri']
);

//routing data siswa
Route::get('/siswa', [SiswaControllerr::class, 'dataSiswa']
);

//routing view hello
Route::get('/hello', function () {
    return view('hello', ['name' => 'Inaya']);
});

//routing view nilai
Route::get('/nilai', function () {
    return view('nilai');
});

//routing view daftar_nilai
Route::get('/daftarnilai', function () {
    return view('daftar_nilai');
});

//routing view layouts.app
Route::get('/framework', function () {
    return view('layouts.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//routing view pegawai
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');

//routing view anggota
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');

//routing Pengarang, Penerbit, Kategori, Buku
Route::resource('pengarang', PengarangController::class);
Route::resource('penerbit', PenerbitController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('buku', BukuController::class);

Route::get('Bukupdf',[BukuController::class, 'bukuPDF']);

//routing Matakuliah, Jurusan, Mahasantri, Dosen
Route::resource('matakuliah', MatakuliahController::class);
Route::resource('jurusan', JurusanController::class);
Route::resource('mahasantri', MahasantriController::class);
Route::resource('dosen', DosenController::class);

//routing view mahasantri
Route::get('/mahasantri', [mahasantriController::class, 'index'])->name('mahasantri.index');
Route::get('/mahasantri/create', [mahasantriController::class, 'create'])->name('mahasantri.create');
Route::post('/mahasantri', [mahasantriController::class, 'store'])->name('mahasantri.store');

//routing kebiasaan, plckan_kebiasaan, pengingat
Route::resource('kebiasaan', KebiasaanController::class);
Route::resource('plckan_kebiasaan', Plckan_kebiasaanController::class);
Route::resource('pengingat', PengingatController::class);

//routing view kebiasaan
Route::get('/kebiasaan', [kebiasaanController::class, 'index'])->name('kebiasaan.index');
Route::get('/kebiasaan/create', [KebiasaanController::class, 'create'])->name('kebiasaan.create');
Route::post('/kebiasaan', [KebiasaanController::class, 'store'])->name('kebiasaan.store');

//routing view pengarang
Route::get('/pengarang', [PengarangController::class, 'index'])->name('pengarang.index');
Route::get('/pengarang/create', [PengarangController::class, 'create'])->name('pengarang.create');
Route::post('/pengarang', [PengarangController::class, 'store'])->name('pengarang.store');