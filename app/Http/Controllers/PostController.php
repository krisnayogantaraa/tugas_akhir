<?php

namespace App\Http\Controllers;

use App\Models\Berita_acara;
use App\Models\Post;
use App\Models\Warehouse;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
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
    //
    /**
     * index
     *
     * @return View
     */
    public function index(Request $request): View
    {

        if ($request->has('search')) {
            $posts = Post::where('no_keputusan_pengadilan', 'LIKE', "%$request->search%")
                ->orWhere('status_pengajuan', 'LIKE', "%$request->search%")
                ->orWhere('nama', 'LIKE', "%$request->search%")
                ->orWhere('instansi', 'LIKE', "%$request->search%")
                ->paginate(1);
        } else {
            $posts = Post::latest()->paginate(1);
        }

        //get posts
        $ba = Berita_Acara::latest();
        //render view with posts
        return view('posts.index', compact('posts', 'ba'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * store
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

        //redirect to index
        if (auth()->user()->type == "admin") {
            return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('posts2.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('posts.show', compact('post'));
    }

    /**
     * cetak_bukti
     *
     * @param  mixed $no_keputusan_pengadilan
     * @return View
     */
    public function cetak_bukti(string $no_keputusan_pengadilan): View
    {
        //get post by no_keputusan pengadilan
        $post = Post::where('no_keputusan_pengadilan', $no_keputusan_pengadilan)->firstOrFail();

        //get warehouse by no_keputusan pengadilan
        $warehouses = Warehouse::where('no_keputusan_pengadilan', $post->no_keputusan_pengadilan)->get();

        //render view
        return view('posts.cetak_bukti', compact('post', 'warehouses'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('posts.edit', compact('post'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
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
            'file1'     => 'sometimes|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            'file2'     => 'sometimes|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            'file3'     => 'sometimes|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            'file4'     => 'sometimes|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            'file5'    => 'sometimes|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
        ]);

        //get post by ID
        $post = Post::findOrFail($id);

        //check if file is uploaded

        $fileFields = ['file1', 'file2', 'file3', 'file4', 'file5'];

        foreach ($fileFields as $fileField) {
            if ($request->hasFile($fileField)) {
                $uploadedFile = $request->file($fileField);

                if ($post->$fileField) {
                    // Jika file sudah ada sebelumnya, hapus file lama
                    Storage::delete('public/posts/' . $post->$fileField);
                }

                // Simpan file baru
                $uploadedFile->storeAs('public/posts', $uploadedFile->hashName());

                // Simpan nama file baru ke dalam model jika ada atau tidak
                $post->$fileField = $uploadedFile->hashName();

                //redirect to index
            }
        }


        // Perbarui atribut no_keputusan_pengadilan jika ada perubahan
        if ($request->no_keputusan_pengadilan && $request->no_keputusan_pengadilan !== $post->no_keputusan_pengadilan) {
            $post->update(['no_keputusan_pengadilan' => $request->no_keputusan_pengadilan]);
        }

        // Perbarui atribut status_pengajuan jika ada perubahan
        if ($request->status_pengajuan && $request->status_pengajuan !== $post->status_pengajuan) {
            $post->update(['status_pengajuan' => $request->status_pengajuan]);
        }

        // Perbarui atribut nama jika ada perubahan
        if ($request->nama && $request->nama !== $post->nama) {
            $post->update(['nama' => $request->nama]);
        }

        // Perbarui atribut instansi jika ada perubahan
        if ($request->instansi && $request->instansi !== $post->instansi) {
            $post->update(['instansi' => $request->instansi]);
        }

        // Perbarui atribut alamat jika ada perubahan
        if ($request->alamat && $request->alamat !== $post->alamat) {
            $post->update(['alamat' => $request->alamat]);
        }

        // Perbarui atribut no_ktp jika ada perubahan
        if ($request->no_ktp && $request->no_ktp !== $post->no_ktp) {
            $post->update(['no_ktp' => $request->no_ktp]);
        }

        // Perbarui atribut no_telp jika ada perubahan
        if ($request->no_telp && $request->no_telp !== $post->no_telp) {
            $post->update(['no_telp' => $request->no_telp]);
        }

        $post->save(); // Simpan model
        if (auth()->user()->type == "admin") {
            return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('posts2.index')->with(['success' => 'Data Berhasil Diubah!']);
        }
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'no_keputusan_pengadilan' => 'required',
        ]);
        //get post by ID
        $post = Post::findOrFail($id);
        $ba = Berita_acara::where('no_keputusan_pengadilan', $request->no_keputusan_pengadilan)->first();

        //delete file
        Storage::delete('public/posts/' . $post->file1);
        Storage::delete('public/posts/' . $post->file2);
        Storage::delete('public/posts/' . $post->file3);
        Storage::delete('public/posts/' . $post->file4);
        Storage::delete('public/posts/' . $post->file5);

        //delete post
        $post->delete();
        $ba?->delete();


        //redirect to index
        if (auth()->user()->type == "admin") {
            return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('posts2.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
    }
}
