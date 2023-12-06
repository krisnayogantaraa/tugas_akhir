<?php

namespace App\Http\Controllers;

use App\Models\Berita_acara;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Post;

class BeritaController extends Controller
{
    /**
     * edit
     *
     * @param  mixed $no_keputusan_pengadilan
     * @return View
     */
    public function edit(string $no_keputusan_pengadilan): View
    {
        //$BA = Berita_acara::findOrFail($no_keputusan_pengadilan);

        // Dapatkan data Berita Acara berdasarkan no_keputusan_pengadilan
        $beritaAcara = Berita_Acara::where('no_keputusan_pengadilan', $no_keputusan_pengadilan)->first();

        //get post by no_keputusan_pengadilan
        $post = $no_keputusan_pengadilan;

        //render view with post
        return view('berita_acara.edit', compact('post','beritaAcara'));
    }



    public function create(Request $request, $no_keputusan_pengadilan): RedirectResponse
    {

        $request->validate([
            'no_keputusan_pengadilan' => 'required',
            'perihal' => 'required',
            'nama_pihak_1' => 'required',
            'nip_pihak_1' => 'required',
            'pangkat_pihak_1' => 'required',
            'jabatan_pihak_1' => 'required',
            'nama_pihak_2' => 'required',
            'nip_pihak_2' => 'required',
            'pangkat_pihak_2' => 'required',
            'jabatan_pihak_2' => 'required',
            'nama_saksi_1' => 'required',
            'nip_saksi_1' => 'required',
            'nama_saksi_2' => 'required',
            'nip_saksi_2' => 'required',
        ]);

        $beritaAcara = Berita_Acara::updateOrCreate(
            ['no_keputusan_pengadilan' => $request->input('no_keputusan_pengadilan')],
            [
                'perihal' => $request->input('perihal'),
                'nama_pihak_1' => $request->input('nama_pihak_1'),
                'nip_pihak_1' => $request->input('nip_pihak_1'),
                'pangkat_pihak_1' => $request->input('pangkat_pihak_1'),
                'jabatan_pihak_1' => $request->input('jabatan_pihak_1'),
                'nama_pihak_2' => $request->input('nama_pihak_2'),
                'nip_pihak_2' => $request->input('nip_pihak_2'),
                'pangkat_pihak_2' => $request->input('pangkat_pihak_2'),
                'jabatan_pihak_2' => $request->input('jabatan_pihak_2'),
                'nama_saksi_1' => $request->input('nama_saksi_1'),
                'nip_saksi_1' => $request->input('nip_saksi_1'),
                'nama_saksi_2' => $request->input('nama_saksi_2'),
                'nip_saksi_2' => $request->input('nip_saksi_2'),
            ]
        );
        
        if(auth()->user()->type == "admin"){
            return redirect()->route('berita_acara.cetak', ['no_keputusan_pengadilan' => $no_keputusan_pengadilan]);
        }else{
            return redirect()->route('berita_acara2.cetak', ['no_keputusan_pengadilan' => $no_keputusan_pengadilan]);
        }

    }

    public function cetak(Request $request)
    {
        $no_keputusan_pengadilan = $request->query('no_keputusan_pengadilan');

        // Dapatkan data Berita Acara berdasarkan no_keputusan_pengadilan
        $beritaAcara = Berita_Acara::where('no_keputusan_pengadilan', $no_keputusan_pengadilan)->first();
        $Post = Post::where('no_keputusan_pengadilan', $no_keputusan_pengadilan)->first();

        // Render view dengan data Berita Acara
        return view('berita_acara.cetak', compact('beritaAcara','Post'));
    }
}

