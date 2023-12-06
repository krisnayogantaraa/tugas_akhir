@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 dark:text-white">Buat Surat BA Baran dan Basan Keluar Baru</p>
<div>
    <form method="post" 
    @if(auth()->user()->type == "admin")
    action="{{ route('berita_acara.create', $post) }}"
    @else
    action="{{ route('berita_acara2.create', $post) }}"
    @endif
    >
        @csrf

        @if(isset($beritaAcara->nama_pihak_1))
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Keputusan Pengadilan</label>
                <input type="text" id="first_name" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required name="no_keputusan_pengadilan" value="{{$post}}" readonly>
            </div>
            <div>
                <label for="perihal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">perihal</label>
                <textarea id="perihal" rows="4" class="block p-2.5 w-full text-sm  rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh : Pencabutan penitipan barang bukti" name="perihal" value="">{{$beritaAcara->perihal}}</textarea>
            </div>
        </div>
        <h1 class="font-bold text-lg">Pihak Petama</h1>
        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
            <div>
                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pihak Pertama</label>
                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_pihak_1" value="{{$beritaAcara->nama_pihak_1}}">
            </div>
            <div>
                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Pihak Pertama</label>
                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_pihak_1" value="{{$beritaAcara->nip_pihak_1}}">
            </div>
            <div>
                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pangkat Pihak Pertama</label>
                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : " required name="pangkat_pihak_1" value="{{$beritaAcara->pangkat_pihak_1}}">
            </div>
            <div>
                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Pihak Pertama</label>
                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : " required name="jabatan_pihak_1" value="{{$beritaAcara->jabatan_pihak_1}}">
            </div>
        </div>

        <h1 class="font-bold text-lg">Pihak Kedua</h1>
        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
            <div>
                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pihak Kedua</label>
                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_pihak_2" value="{{$beritaAcara->nama_pihak_2}}">
            </div>
            <div>
                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Pihak Kedua</label>
                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_pihak_2" value="{{$beritaAcara->nip_pihak_2}}">
            </div>
            <div>
                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pangkat Pihak Kedua</label>
                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : DPR" required name="pangkat_pihak_2" value="{{$beritaAcara->pangkat_pihak_2}}">
            </div>
            <div>
                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Pihak Kedua</label>
                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : DPR" required name="jabatan_pihak_2" value="{{$beritaAcara->jabatan_pihak_2}}">
            </div>
        </div>

        <h1 class="font-bold text-lg">Saksi Pertama</h1>
        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
            <div>
                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Saksi Pertama</label>
                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_saksi_1" value="{{$beritaAcara->nama_saksi_1}}">
            </div>
            <div>
                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Saksi Pertama</label>
                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_saksi_1" value="{{$beritaAcara->nip_saksi_1}}">
            </div>
        </div>

        <h1 class="font-bold text-lg">Saksi Kedua</h1>
        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
            <div>
                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Saksi Kedua</label>
                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_saksi_2" value="{{$beritaAcara->nama_saksi_2}}">
            </div>
            <div>
                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Saksi Kedua</label>
                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_saksi_2" value="{{$beritaAcara->nip_saksi_2}}">
            </div>
        </div>
        @else
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Keputusan Pengadilan</label>
                <input type="text" id="first_name" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required name="no_keputusan_pengadilan" value="{{$post}}" readonly>
            </div>
            <div>
                <label for="perihal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">perihal</label>
                <textarea id="perihal" rows="4" class="block p-2.5 w-full text-sm  rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh : Pencabutan penitipan barang bukti" name="perihal" value="{{}}"></textarea>
            </div>
        </div>
        <h1 class="font-bold text-lg">Pihak Petama</h1>
        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
            <div>
                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pihak Pertama</label>
                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_pihak_1">
            </div>
            <div>
                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Pihak Pertama</label>
                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_pihak_1">
            </div>
            <div>
                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pangkat Pihak Pertama</label>
                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : " required name="pangkat_pihak_1">
            </div>
            <div>
                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Pihak Pertama</label>
                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : " required name="jabatan_pihak_1">
            </div>
        </div>

        <h1 class="font-bold text-lg">Pihak Kedua</h1>
        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
            <div>
                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pihak Kedua</label>
                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_pihak_2">
            </div>
            <div>
                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Pihak Kedua</label>
                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_pihak_2">
            </div>
            <div>
                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pangkat Pihak Kedua</label>
                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : DPR" required name="pangkat_pihak_2">
            </div>
            <div>
                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Pihak Kedua</label>
                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : DPR" required name="jabatan_pihak_2">
            </div>
        </div>

        <h1 class="font-bold text-lg">Saksi Pertama</h1>
        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
            <div>
                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Saksi Pertama</label>
                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_saksi_1">
            </div>
            <div>
                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Saksi Pertama</label>
                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_saksi_1">
            </div>
        </div>

        <h1 class="font-bold text-lg">Saksi Kedua</h1>
        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
            <div>
                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Saksi Kedua</label>
                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_saksi_2">
            </div>
            <div>
                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Saksi Kedua</label>
                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_saksi_2">
            </div>
        </div>
        @endif
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
        <button type="reset" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Reset</button>
    </form>
</div>
@endsection