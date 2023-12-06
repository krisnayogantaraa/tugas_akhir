<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Bukti</title>

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

        <div class="pt-8">
            <div class="font-bold text-center text-lg">
                BUKTI PENGAJUAN BARANG SITAAN
            </div>
            <div class="mt-4">
                <table style="width: 100%;">
                    <tr>
                        <td>NO Pengajuan</td>
                        <td>:</td>
                        <td style="width: 70%;">{{ $post->id }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengajuan</td>
                        <td>:</td>
                        <td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td>
                    </tr>
                    <tr>
                        <td>Nama Pemohon</td>
                        <td>:</td>
                        <td>{{ $post->nama }}</td>
                    </tr>
                    <tr>
                        <td>Instansi</td>
                        <td>:</td>
                        <td>{{ $post->instansi }}</td>
                    </tr>
                    <tr>
                        <td>No Telp</td>
                        <td>:</td>
                        <td>{{ $post->no_telp }}</td>
                    </tr>
                </table>
                <div class="mt-3 font-bold text-base">
                    <p>
                        Telah mengajukan permohonan pengambilan barang sitaan sesuai yang tertera pada tabel berikut:
                    </p>
                </div>
                <table class="w-full border border-black">
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
            </div>
            <div class="mt-20 text-center w-52 float-right">
                <div>Bandung, {{ date('d-m-Y', strtotime($post->created_at)) }}</div>
                <div>Staf Administrasi</div>
                <div class="w-24 h-24"></div>
                <div>(............................................)</div>
            </div>

        </div>

    </div>

    <script>
        // Jalankan fungsi cetak saat halaman dimuat
        window.onload = function() {
            document.title='BuktiPengajuan{{$post->id}}';
            window.print();
        };
    </script>
</body>

</html>