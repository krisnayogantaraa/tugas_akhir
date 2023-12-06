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
                            <p class="dark:text-white">{{ $warehouse->no_keputusan_pengadilan }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-3/12">
                            <p class="dark:text-white">Nama Barang</p>
                        </td>
                        <td>
                            <p class="dark:text-white">
                                :
                            </p>
                        </td>
                        <td class="w-8/12">
                            <p class="dark:text-white">{{ $warehouse->nama_barang }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-3/12">
                            <p class="dark:text-white">Asal Instansi</p>
                        </td>
                        <td>
                            <p class="dark:text-white">
                                :
                            </p>
                        </td>
                        <td class="w-8/12">
                            <p class="dark:text-white">{{ $warehouse->asal_instansi }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-3/12">
                            <p class="dark:text-white">Nama Pemilik Barang</p>
                        </td>
                        <td>
                            <p class="dark:text-white">
                                :
                            </p>
                        </td>
                        <td class="w-8/12">
                            <p class="dark:text-white">{{ $warehouse->nama_pemilik_barang }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="dark:text-white">Pihak Yang Menitipkan</p>
                        </td>
                        <td>
                            <p class="dark:text-white">
                                :
                            </p>
                        </td>
                        <td>
                            <p class="dark:text-white">{{ $warehouse->pihak_yang_menitipkan }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="dark:text-white">Deskripsi Barang</p>
                        </td>
                        <td>
                            <p class="dark:text-white">
                                :
                            </p>
                        </td>
                        <td>
                            <p class="dark:text-white">{{ $warehouse->deskripsi_barang }}</p>
                        </td>
                    </tr>
                </table>
                <hr>
                <div class="text-3xl ">
                    <p class="dark:text-white">Foto Barang</p>
                    <br>
                    <iframe src="{{ asset('storage/warehouse/'.$warehouse->foto_barang) }}" style="width:1300px; height:1300px;" frameborder="0"></iframe>
                    <br>
                </div>

            </div>
@endsection