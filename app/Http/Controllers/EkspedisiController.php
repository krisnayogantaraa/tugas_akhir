<?php

namespace App\Http\Controllers;

use App\Models\Ekspedisi;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkspedisiController extends Controller
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
            $Ekspedisi = Ekspedisi::where('no_keputusan_pengadilan', 'LIKE', "%$request->search%")
            ->paginate(10);
        } else {
            $Ekspedisi = Ekspedisi::latest()->paginate(10);
        }

        //render view with Ekspedisi
        return view('Ekspedisi.index', compact('Ekspedisi'));
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('Ekspedisi.create');
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
            'foto_barang' => 'required|image|mimes:jpeg,jpg,png',
            'no_keputusan_pengadilan' => 'required|min:5',
        ]);

        //upload foto_barang
        $foto_barang = $request->file('foto_barang');
        $foto_barang->storeAs('public/Ekspedisi', $foto_barang->hashName());

        //create post
        Ekspedisi::create([

            'foto_barang' => $foto_barang->hashName(),
            'no_keputusan_pengadilan' => $request->no_keputusan_pengadilan,
        ]);

        //redirect to index
        if (auth()->user()->type == "admin") {
            return redirect()->route('ekspedisi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('ekspedisi2.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        //get Ekspedisi by ID
        $Ekspedisi = Ekspedisi::findOrFail($id);

        //render view with Ekspedisi
        return view('Ekspedisi.show', compact('Ekspedisi'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get Ekspedisi by ID
        $Ekspedisi = Ekspedisi::findOrFail($id);

        //render view with Ekspedisi
        return view('Ekspedisi.edit', compact('Ekspedisi'));
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
            'foto_barang' => 'required|image|mimes:jpeg,jpg,png',
            'no_keputusan_pengadilan' => 'required|min:5',
        ]);

        //get post by ID
        $post = Ekspedisi::findOrFail($id);

        //check if foto_barang is uploaded
        if ($request->hasFile('foto_barang')) {

            //upload new foto_barang
            $foto_barang = $request->file('foto_barang');
            $foto_barang->storeAs('public/Ekspedisi', $foto_barang->hashName());

            //delete old image
            Storage::delete('public/Ekspedisi/' . $post->foto_barang);

            //update post with new image
            $post->update([
                'foto_barang' => $foto_barang->hashName(),
                'no_keputusan_pengadilan' => $request->no_keputusan_pengadilan,
            ]);
        } else {

            //update post without image
            $post->update([
                'pihak_yang_menitipkan' => $request->pihak_yang_menitipkan,
                'no_keputusan_pengadilan' => $request->no_keputusan_pengadilan,
            ]);
        }

        //redirect to index
        if (auth()->user()->type == "admin") {
            return redirect()->route('ekspedisi.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('ekspedisi2.index')->with(['success' => 'Data Berhasil Diubah!']);
        }
    }
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get Ekspedisi by ID
        $Ekspedisi = Ekspedisi::findOrFail($id);

        //delete image
        Storage::delete('public/Ekspedisi/' . $Ekspedisi->foto_barang);

        //delete Ekspedisi
        $Ekspedisi->delete();

        //redirect to index
        if (auth()->user()->type == "admin") {
            return redirect()->route('ekspedisi.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('ekspedisi2.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
    }
}
