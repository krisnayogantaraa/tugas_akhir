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
                            <p class="dark:text-white">{{ $Ekspedisi->no_keputusan_pengadilan }}</p>
                        </td>
                    </tr>
                </table>
                <hr>
                <div class="text-3xl ">
                    <p class="dark:text-white">Foto Barang</p>
                    <br>
                    <iframe src="{{ asset('storage/Ekspedisi/'.$Ekspedisi->foto_barang) }}" style="width:1300px; height:1300px;" frameborder="0"></iframe>
                    <br>
                </div>

            </div>
@endsection