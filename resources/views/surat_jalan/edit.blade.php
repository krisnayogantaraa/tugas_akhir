<?php
if($post->created_at){
    $timestamp = strtotime($post->created_at);
} else {

}

$formatted_date = date('Y-m-d', $timestamp);
?>
<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 dark:text-white">Buat Surat Jalan Baru</p>
<div>
    <form method="post" @if(auth()->user()->type == "admin")
        action="{{ route('surat_jalan.create', $post->no_keputusan_pengadilan) }}
        @else
        action="{{ route('surat_jalan2.create', $post->no_keputusan_pengadilan) }}
        @endif

        ">
        @csrf
        @if(!isset($SuratJalan->id))
        
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Keputusan Pengadilan</label>
                <input type="text" id="first_name" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required name="no_keputusan_pengadilan" value="{{$post->no_keputusan_pengadilan}}" readonly>
            </div>
            <div class="relative max-w-sm">
                <div>
                    <label for="alamat" class="block text-sm mb-2 font-medium text-gray-900 dark:text-white">Tanggal Pengajuan</label>
                </div>
                <div class="absolute inset-y-12 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input datepicker datepicker-format="yyyy/mm/dd" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-36 ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pilih Tanggal" value="{{$formatted_date}}" name="tgl_pengajuan">
            </div>
            <h1 class="font-bold text-lg">Detail Pengiriman</h1><br>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pemohon</label>
                <input type="text" id="first_name" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required name="nama_pemohon" value="{{$post->nama}}" readonly>
            </div>
            <div>
                <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon Pemohon</label>
                <input type="text" id="no_telp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required name="no_telp" value="{{$post->no_telp}}" readonly>
            </div>
            <div>
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Pengiriman</label>
                <textarea id="alamat" rows="4" class="block p-2.5 w-full text-sm  rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh : Pencabutan penitipan barang bukti" name="alamat" value="">{{$post->alamat}}</textarea>
            </div><br>

            <div class="relative max-w-sm">
                <div>
                    <label for="alamat" class="block text-sm mb-2 font-medium text-gray-900 dark:text-white">Tanggal Pengiriman</label>
                </div>
                <div class="absolute inset-y-12 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input datepicker datepicker-format="yyyy/mm/dd" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-36 ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pilih Tanggal" name="tgl_pengiriman">
            </div>
        </div>
        <h1 class="font-bold text-lg">Kurir/Sopir</h1>
        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
            <div>
                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Sopir/Kurir</label>
                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_sopir">
            </div>
        </div>

        @else

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Keputusan Pengadilan</label>
                <input type="text" id="first_name" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required name="no_keputusan_pengadilan" value="{{$post->no_keputusan_pengadilan}}" readonly>
            </div>
            <div class="relative max-w-sm">
                <div>
                    <label for="alamat" class="block text-sm mb-2 font-medium text-gray-900 dark:text-white">Tanggal Pengajuan</label>
                </div>
                <div class="absolute inset-y-12 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input datepicker datepicker-format="yyyy/mm/dd" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-36 ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pilih Tanggal" value="{{$formatted_date}}" name="tgl_pengajuan">
            </div>
            <h1 class="font-bold text-lg">Detail Pengiriman</h1><br>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pemohon</label>
                <input type="text" id="first_name" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required name="nama_pemohon" value="{{$post->nama}}" readonly>
            </div>
            <div>
                <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon Pemohon</label>
                <input type="text" id="no_telp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required name="no_telp" value="{{$post->no_telp}}" readonly>
            </div>
            <div>
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Pengiriman</label>
                <textarea id="alamat" rows="4" class="block p-2.5 w-full text-sm  rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh : Pencabutan penitipan barang bukti" name="alamat" value="">{{$post->alamat}}</textarea>
            </div><br>

            <div class="relative max-w-sm">
                <div>
                    <label for="alamat" class="block text-sm mb-2 font-medium text-gray-900 dark:text-white">Tanggal Pengiriman</label>
                </div>
                <div class="absolute inset-y-12 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input datepicker datepicker-format="yyyy/mm/dd" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-36 ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pilih Tanggal" name="tgl_pengiriman" value="{{$SuratJalan->tgl_pengiriman}}">
            </div>
        </div>
        <h1 class="font-bold text-lg">Kurir/Sopir</h1>
        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
            <div>
                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Sopir/Kurir</label>
                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_sopir" value="{{$SuratJalan->nama_sopir}}">
            </div>
        </div>
        @endif
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
        <button type="reset" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Reset</button>

    </form>
</div>
@endsection