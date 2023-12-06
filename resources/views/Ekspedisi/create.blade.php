@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 text-gray-900 dark:text-white">Expedisi Baru</p>
<form 
@if(auth()->user()->type == "admin")
    action="{{ route('ekspedisi.store') }}"
    @else
    action="{{ route('ekspedisi2.store') }}"
    @endif
    
    method="POST" enctype="multipart/form-data">
    @csrf

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Keputusan Pengadilan</label>
            <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required name="no_keputusan_pengadilan">
        </div>
    </div>
    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto Barang</label>
        <input class="block  text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="foto_barang">

    </div>
    <button type="submit" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Submit</button>
    <button type="reset" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-yellow-400 focus:ring-yellow-300  ">Reset</button>
</form>
</div>
@endsection