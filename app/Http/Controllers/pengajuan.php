<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Warehouse;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class pengajuan extends Controller
{
    /**
     * tambah
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'no_keputusan_pengadilan'     => 'required|min:5',
            'status_pengajuan'     => 'required|min:5',
            'nama'     => 'required|min:5',
            'instansi'    => 'required|min:3',
            'alamat'     => 'required|min:5',
            'no_ktp'     => 'required|min:5',
            'no_telp'     => 'required|min:5',
            'file1'     => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            'file2'     => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            'file3'     => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            'file4'     => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            'file5'    => 'sometimes|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
        ]);

        //upload file 1
        $file1 = $request->file('file1');
        $file1->storeAs('public/posts', $file1->hashName());

        //upload file 2
        $file2 = $request->file('file2');
        $file2->storeAs('public/posts', $file2->hashName());

        //upload file 3
        $file3 = $request->file('file3');
        $file3->storeAs('public/posts', $file3->hashName());

        //upload file 4
        $file4 = $request->file('file4');
        $file4->storeAs('public/posts', $file4->hashName());

        if ($request->hasFile('file5')) {
            $file5 = $request->file('file5');
            $file5->storeAs('public/posts', $file5->hashName());
            // Lakukan sesuatu dengan file yang diunggah (misalnya, simpan nama file ke database)
            $file5Path = $file5->hashName();
        } else {
            // Jika file5 tidak diunggah, atur $file5Path ke null atau nilai default lainnya
            $file5Path = null; // atau sesuai kebutuhan
        }

        //create post
        Post::create([
            'file1'     => $file1->hashName(),
            'file2'     => $file2->hashName(),
            'file3'     => $file3->hashName(),
            'file4'     => $file4->hashName(),
            'file5'     => $file5Path,
            'no_keputusan_pengadilan'      => $request->no_keputusan_pengadilan,
            'status_pengajuan'      => $request->status_pengajuan,
            'nama'      => $request->nama,
            'instansi'      => $request->instansi,
            'alamat'    => $request->alamat,
            'no_ktp'    => $request->no_ktp,
            'no_telp'    => $request->no_telp,
        ]);

        //redirect to cetak
        return redirect()->route('pengajuan.cetak', ['no_keputusan_pengadilan' => $request->no_keputusan_pengadilan])->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * cetak_bukti
     *
     * @param  mixed $no_keputusan_pengadilan
     * @return View
     */
    public function cetak(string $no_keputusan_pengadilan): View
    {
        //get post by no_keputusan pengadilan
        $post = Post::where('no_keputusan_pengadilan', $no_keputusan_pengadilan)->firstOrFail();

        //get warehouse by no_keputusan pengadilan
        $warehouses = Warehouse::where('no_keputusan_pengadilan', $post->no_keputusan_pengadilan)->get();

        //render view
        return view('posts.cetak_bukti', compact('post', 'warehouses'));
    }
}
