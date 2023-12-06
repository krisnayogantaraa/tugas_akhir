<?php
// Mengambil bulan
$bulan = $SuratJalan->created_at->format('m');

// Mengambil tahun
$tahun = $SuratJalan->created_at->format('Y');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="../../css/styles.css">
    <style>
        /* Gaya untuk cetak */
        @media print {

            /* Set ukuran kertas ke A4 */
            @page {
                size: A4;
                margin: 1cm;
            }

            /* Set margin halaman dan font size atau gaya lainnya sesuai kebutuhan */
        }

        body {
            max-width: 210mm;
            /* Lebar A4 dalam milimeter */
            margin: 0 auto;
            /* Pusatkan body di tengah halaman */
        }
    </style>
</head>

<body class="bg-white">
    <div class="w-100 px-6  divide-y divide-gray-950">


        <div class="flex flex-row w-full mb-1 ">
            <div class="basis-1/6 ">
                <img src="{{ asset('storage/img/LOGO.png') }}" class="h-24 me-3 sm:h-15" alt="Cikoantar Logo" />
            </div>
            <div class="basis-5/6 text-center">
                <div class="text-sm p-0" style="margin-bottom: -5px;">KEMENTRIAN HUKUM DAN HAS ASASI MANUSIA R.I</div>
                <div class="text-base " style="margin-bottom: -5px;">KANTOR WILAYAH JAWA BARAT</div>
                <div class="font-bold p-0 " style="margin-bottom: -5px;">RUMAH PENYIMPANAN BARANG SITAAN NEGARA KELAS 1 BANDUNG</div>
                <div class="text-xs">Jl. Pacuan Kuda No.1 Arcamanik Bandung</div>
                <div class="text-xs">Telp.(022) - 7214472 Kode Pos. 40293 Email:rupbasanbandung@yahoo.co.id</div>
            </div>
        </div>

        <div class="pt-4">
            <div class="font-bold text-center text-base">
                <div>SURAT JALAN PENGANTARAN BASAN</div>
                <div>Nomor : RBS1/{{ $SuratJalan->id }}/Kb/PAS.35/{{$bulan}}/{{$tahun}}</div>
            </div>

            <table class="w-full ">
                <tr>
                    <td colspan="4">Kepada Yth.</td>
                </tr>
                <tr>
                    <td style="width: 50%;">{{ $SuratJalan->nama_pemohon }}</td>
                    <td>No Pengajuan</td>
                    <td>:</td>
                    <td>{{ $Post->id }}</td>
                </tr>
                <tr>
                    <td>{{ $SuratJalan->no_telp }}</td>
                    <td>Tgl Pengajuan</td>
                    <td>:</td>
                    <td>{{ $SuratJalan->tgl_pengajuan }}</td>
                </tr>
                <tr>
                    <td>{{ $SuratJalan->alamat }}</td>
                    <td>Tgl Pengiriman</td>
                    <td>:</td>
                    <td>{{ $SuratJalan->tgl_pengiriman }}</td>
                </tr>
            </table>

            <table class="w-full border border-black mt-8">
                <thead>
                    <tr>
                        <th class="border p-2 border-black">NO</th>
                        <th class="border p-2 border-black">Nama Barang</th>
                        <th class="border p-2 border-black">Spesifikasi Barang</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($warehouses as $index => $warehouse)
                    <tr>
                        <td class="border p-2 border-black">{{ $index + 1 }}</td>
                        <td class="border p-2 border-black">{{ $warehouse->nama_barang }}</td>
                        <td class="border p-2 border-black">{{ $warehouse->deskripsi_barang }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">Tidak ada data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>


            <div class="mt-4 text-base" style="line-height: 1.2;">
                <p>
                    Barang sudah diterima dalam keadaan baik dan lengkap
                </p>
            </div>

            <div class="grid grid-cols-3 place-content-center text-center mt-8" style="line-height: 1.2;">
                <div class="mt-8 w-52 float-right mx-auto">
                    <div><i>Penerima</i></div>
                    <div class="w-24 h-24"></div>
                    <div>(......................................)</div>
                </div>

                <div class="mt-8 w-52 float-right mx-auto">
                    <div><i>Bagian Ekspedisi</i></div>
                    <div class="w-24 h-24"></div>
                    <div>(&nbsp;{{$SuratJalan->nama_sopir}}&nbsp;)</div>
                </div>

                <div class="mt-8 w-52 float-right mx-auto" style="line-height: 1.2;">
                    <div><i>Koordinator Gudang</i></div>
                    <div class="w-24 h-24"></div>
                    <div>(&nbsp;             &nbsp;)</div>
                </div>
                <div class="mt-8 w-52 float-right mx-auto" style="line-height: 1.2;">
                    <div><i>Kepala Adpel</i></div>
                    <div class="w-24 h-24"></div>
                    <div>(&nbsp;             &nbsp;)</div>
                </div>
            </div>
                    

        </div>
    </div>

    <script>
        // Jalankan fungsi cetak saat halaman dimuat
        window.onload = function() {
            document.title = 'SuratJalan{{$SuratJalan->id}}';
            window.print();
        };
    </script>
</body>

</html>