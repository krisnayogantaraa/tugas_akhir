<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\Registersusers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DaftarController extends Controller
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
            $users = User::where('name', 'LIKE', "%$request->search%")
                ->orWhere('email', 'LIKE', "%$request->search%")
                ->orWhere('nip', 'LIKE', "%$request->search%")
                ->paginate(10);
        } else {
            $users = User::latest()->paginate(10);
        }

        //render view with users
        return view('users.index', compact('users'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('users.create');
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
            'name'     => 'required|min:5|max:255',
            'nip'     => 'required|min:5|max:255',
            'type'     => 'required|min:1|max:255',
            'email'     => 'required|min:5|max:255|unique:users',
            'password'    => 'required|min:8',
        ]);



        //create User
        User::create([
            'name'      => $request->name,
            'nip'      => $request->nip,
            'type'      => $request->type,
            'email'      => $request->email,
            'password'      => bcrypt($request->password),
        ]);

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get User by ID
        $User = User::findOrFail($id);

        //render view with User
        return view('users.edit', compact('User'));
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
        // Validasi input
        $rules = [
            'name'     => 'required|min:5|max:255',
            'nip'      => 'required|min:5|max:255|unique:users,email,' . ($id ?? 'NULL'),
            'type'     => 'required|max:255',
            'email'    => 'required|min:5|max:255|unique:users,email,' . ($id ?? 'NULL'),
            'password' => 'nullable|min:8',
        ];

        if ($id) {
            // Jika ini adalah pembaruan, password menjadi opsional
            unset($rules['password']);
        }

        $request->validate($rules);

        // Ambil atau buat instance User sesuai dengan ID yang diberikan
        $user = $id ? User::findOrFail($id) : new User;

        // Isi data
        $user->name = $request->input('name');
        $user->nip = $request->input('nip');
        $user->type = $request->input('type');
        $user->email = $request->input('email');

        // Hash dan set password jika disediakan
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Simpan perubahan atau buat pengguna baru
        $user->save();

        return redirect()->route('users.index')->with('success', 'Data saved successfully');
    }

    /**
     * destroy
     *
     * @param  mixed $User
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get User by ID
        $User = User::findOrFail($id);

        //delete User
        $User->delete();

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
