@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 dark:text-white">Daftar Barang Sitaan</p>
<a @if(auth()->user()->type == "admin")
    href="{{ route('ekspedisi.create') }}"
    @else
    href="{{ route('ekspedisi2.create') }}"
    @endif
    >
    <button type="button" class="focus:outline-none text-white font-medium rounded-lg text-lg px-5 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800 w-56">Exspedisi Baru</button>
</a>

<div>
    <form class="w-48 mb-3 float-right" @if(auth()->user()->type == "admin")
        action="/ekspedisi"
        @else
        action="/ekspedisi2"
        @endif
        method="get">
        <div class="flex">
            <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
            <div class="relative w-full">
                <input type="search" id="search-dropdown" name="search" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search">
                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </div>
    </form>
</div>

<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700  uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No Keputusan Pengadilan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3" style="width: 200px;">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($Ekspedisi as $ekspedisi)
                <tr class=" odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $ekspedisi->no_keputusan_pengadilan }}</td>
                    <td class="px-6 py-4">
                        @if($ekspedisi->foto_barang)
                        <span class="text-success text-lg">Selesai</span>
                        @else
                        <span class="text-danger text-lg">Belum Selesai</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" @if(auth()->user()->type == "admin")
                            action="{{ route('ekspedisi.destroy', $ekspedisi->id) }}"
                            @else
                            action="{{ route('ekspedisi2.destroy', $ekspedisi->id) }}"
                            @endif
                            method="POST">
                            <a @if(auth()->user()->type == "admin")
                                href="{{ route('ekspedisi.edit', $ekspedisi->id) }}
                                @else
                                href="{{ route('ekspedisi2.edit', $ekspedisi->id) }}
                                @endif
                                ">
                                <button type="button" class="focus:outline-none text-white font-medium rounded-lg  px-5 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800  w-44">Selesaikan</button>
                            </a>
                            <a @if(auth()->user()->type == "admin")
                                href="{{ route('ekspedisi.show', $ekspedisi->id) }}
                                @else
                                href="{{ route('ekspedisi2.show', $ekspedisi->id) }}
                                @endif">
                                <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:ring-yellow-900 w-44">Show</button>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="focus:outline-none text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900 w-44">HAPUS</button>
                        </form>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data Ekspedisi belum Tersedia.
                </div>
                @endforelse
            </tbody>
        </table>
        {{$Ekspedisi->links()}}
    </div>
</div>
@endsection