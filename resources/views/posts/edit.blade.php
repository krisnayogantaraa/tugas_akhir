@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 text-gray-900 dark:text-white">Edit Data</p>

<form @if(auth()->user()->type == "admin")
    action="{{ route('posts.update', $post->id) }}"
    @else
    action="{{ route('posts2.update', $post->id) }}"
    @endif
    method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="no_keputusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Keputusan Pengadilan</label>
            <input type="text" id="no_keputusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required value="{{ $post->no_keputusan_pengadilan }}" name="no_keputusan_pengadilan">
        </div>
        <div>
            <label for="status_pengajuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Pengajuan</label>
            <select id="status_pengajuan" name="status_pengajuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @if($post->status_pengajuan == "Milik Sendiri")
                <option selected value="Milik Sendiri">Milik Sendiri</option>
                <option value="Kuasa">Kuasa</option>
                @else
                <option value="Milik Sendiri">Milik Sendiri</option>
                <option selected value="Kuasa">Kuasa</option>
                @endif
            </select>
        </div>
        <div>
            <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="text" id="Nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required value="{{ $post->nama }}" name="nama">
        </div>
        <div>
            <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
            <input type="text" id="no_ktp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required value="{{ $post->no_ktp }}" name="no_ktp">
        </div>
        <div>
            <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instansi</label>
            <input type="text" id="instansi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : DPR" required value="{{ $post->instansi }}" name="instansi">
        </div>
        <div>
            <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telp</label>
            <input type="text" id="no_telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 08123456789" required value="{{ $post->no_telp }}" name="no_telp">
        </div>
    </div>
    <div class="mb-6">
        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
        <input type="text" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Jln.Merdeka No.12 Kota bandung" required value="{{ $post->alamat }}" name="alamat">
    </div>
    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Surat permohonan pengambilan Basan Baran</label>
        <input class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="file1">

    </div>
    <div class="mb-6 ">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Surat penetapan putusan pengadilan</label>
        <input class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="file2">

    </div>
    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Salinan barang bukti dari instansi penanggung jawab secara yuridis</label>
        <input class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="file3">

    </div>
    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Surat eksekusi dari Kejaksaan</label>
        <input class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="file4">

    </div>
    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Surat kuasa dari pemilik Basan Baran (Jika pengambil bukan orang yang bersangkutan)</label>
        <input class=" block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="file5">

    </div>

    <button type="submit" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Submit</button>
    <button type="reset" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-yellow-400 focus:ring-yellow-300  ">Reset</button>
</form>
@endsection