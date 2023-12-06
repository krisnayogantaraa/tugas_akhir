<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Warehouse;
use App\Models\SuratJalan;
use App\Models\Ekspedisi;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SuratJalanController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * edit
     *
     * @param  mixed $no_keputusan_pengadilan
     * @return View
     */
    public function edit(string $no_keputusan_pengadilan): View
    {

        // Dapatkan data Berita Acara berdasarkan no_keputusan_pengadilan
        $Warehouse = Warehouse::where('no_keputusan_pengadilan', $no_keputusan_pengadilan)->first();
        $SuratJalan = SuratJalan::where('no_keputusan_pengadilan', $no_keputusan_pengadilan)->first();

        //get post by no_keputusan_pengadilan
        $post = post::where('no_keputusan_pengadilan', $no_keputusan_pengadilan)->first();

        //render view with post
        return view('surat_jalan.edit', compact('post', 'Warehouse', 'SuratJalan'));
    }



    public function create(Request $request, $no_keputusan_pengadilan): RedirectResponse
    {
        // Cek apakah data dengan no_keputusan_pengadilan sudah ada dalam tabel
        $existingSuratJalan = SuratJalan::where('no_keputusan_pengadilan', $no_keputusan_pengadilan)->first();


        // Jika belum ada, validasi dan simpan data baru
        $request->validate([
            'nama_pemohon' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'no_keputusan_pengadilan' => 'required',
            'nama_sopir' => 'required',
            'tgl_pengajuan' => 'required',
            'tgl_pengiriman' => 'required',
        ]);

        Ekspedisi::updateOrCreate(
            ['no_keputusan_pengadilan' => $request->no_keputusan_pengadilan],
        );
        SuratJalan::updateOrCreate(
            ['no_keputusan_pengadilan' => $request->no_keputusan_pengadilan],
            [
                'nama_pemohon' => $request->nama_pemohon,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'nama_sopir' => $request->nama_sopir,
                'tgl_pengajuan' => $request->tgl_pengajuan,
                'tgl_pengiriman' => $request->tgl_pengiriman,
            ]
        );

        // Setelah menyimpan, arahkan ke rute cetak
        if (auth()->user()->type == "admin") {
            return redirect()->route('surat_jalan.cetak', ['no_keputusan_pengadilan' => $no_keputusan_pengadilan]);
        } else {
            return redirect()->route('surat_jalan2.cetak', ['no_keputusan_pengadilan' => $no_keputusan_pengadilan]);
        }
    }


    public function cetak(Request $request)
    {
        $no_keputusan_pengadilan = $request->query('no_keputusan_pengadilan');

        // Dapatkan data Berita Acara berdasarkan no_keputusan_pengadilan

        $Post = Post::where('no_keputusan_pengadilan', $no_keputusan_pengadilan)->first();
        $SuratJalan = SuratJalan::where('no_keputusan_pengadilan', $no_keputusan_pengadilan)->first();
        $warehouses = Warehouse::where('no_keputusan_pengadilan', $no_keputusan_pengadilan)->get();

        // Render view dengan data Berita Acara
        return view('surat_jalan.cetak', compact('SuratJalan', 'warehouses', 'Post'));
    }
}
