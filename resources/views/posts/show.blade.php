@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 dark:text-white">Detail</p>
<table class="text-xl w-full mb-5">
    <tr>
        <td class="w-3/12">
            <p class="dark:text-white">No Keputusan Pengadilan</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td class="w-8/12">
            <p class="dark:text-white">{{ $post->no_keputusan_pengadilan }}</p>
        </td>
    </tr>
    <tr>
        <td class="w-3/12">
            <p class="dark:text-white">Status Pengajuan</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td class="w-8/12">
            <p class="dark:text-white">{{ $post->status_pengajuan }}</p>
        </td>
    </tr>
    <tr>
        <td class="w-3/12">
            <p class="dark:text-white">Nama</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td class="w-8/12">
            <p class="dark:text-white">{{ $post->nama }}</p>
        </td>
    </tr>
    <tr>
        <td class="w-3/12">
            <p class="dark:text-white">Instansi</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td class="w-8/12">
            <p class="dark:text-white">{{ $post->instansi }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">Alamat</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $post->alamat }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">Nik</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $post->no_ktp }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">
                No Telepon/Wa
            </p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $post->no_telp }}</p>
        </td>
    </tr>
</table>
<hr>
<div class="text-3xl ">
    <p class="dark:text-white">Surat permohonan pengambilan Basan Baran</p>
    <br>
    <iframe src="{{ asset('storage/posts/'.$post->file1) }}" style="width:950px; height:1200px;" frameborder="0"></iframe>
    <br>
    <p class="dark:text-white">Surat penetapan putusan pengadilan</p>
    <br>
    <br>
    <iframe src="{{ asset('storage/posts/'.$post->file2) }}" style="width:950px; height:1200px;" frameborder="0"></iframe>
    <br>
    <p class="dark:text-white">Salinan barang bukti dari instansi penanggung jawab secara yuridis</p>
    <br>
    <iframe src="{{ asset('storage/posts/'.$post->file3) }}" style="width:950px; height:1200px;" frameborder="0"></iframe>
    <br>
    <p class="dark:text-white">Surat eksekusi dari Kejaksaan</p>
    <br>
    <iframe src="{{ asset('storage/posts/'.$post->file4) }}" style="width:950px; height:1200px;" frameborder="0"></iframe>
    <br>
    <p class="dark:text-white">Surat kuasa dari pemilik Basan Baran (Jika pengambil bukan orang yang bersangkutan)</p>
    <br>
    <iframe src="{{ asset('storage/posts/'.$post->file5) }}" style="width:950px; height:1200px;" frameborder="0"></iframe>
    <br>
</div>

@endsection