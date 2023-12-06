<?php

if (!function_exists('tanggalTerbilang')) {
function tanggalTerbilang($tanggal)
{
    // Pisahkan tanggal, bulan, dan tahun
    list($tahun, $bulan, $hari) = explode('-', $tanggal);

    // Array untuk nama bulan
    $namaBulan = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    );

    // Array untuk nama hari
    $namaHari = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    );

    // Konversi bulan menjadi terbilang
    $bulanTerbilang = $namaBulan[$bulan];

    // Konversi hari menjadi terbilang
    $hariTerbilang = $namaHari[date('l', strtotime($tanggal))];

    // Konversi tanggal dan tahun menjadi terbilang
    $hariTerbilang = terbilang($hari);
    $bulanTerbilang = terbilang($bulan);
    $tahunTerbilang = terbilang($tahun);

    // Mengembalikan array hasil konversi
    return array(
        'hari' => $hariTerbilang,
        'nama_hari' => $namaHari[date('l', strtotime($tanggal))],
        'bulan' => $bulanTerbilang,
        'nama_bulan' => $namaBulan[$bulan],
        'tahun' => $tahunTerbilang
    );
}
}
if (!function_exists('terbilang')) {
function terbilang($angka)
{
    $angka = (int) $angka;
    $angkaTerbilang = array(
        '',
        'Satu',
        'Dua',
        'Tiga',
        'Empat',
        'Lima',
        'Enam',
        'Tujuh',
        'Delapan',
        'Sembilan',
        'Sepuluh',
        'Sebelas'
    );

    if ($angka < 12) {
        return $angkaTerbilang[$angka];
    } elseif ($angka < 20) {
        return 'Sebelas ' . terbilang($angka - 10);
    } elseif ($angka < 100) {
        return terbilang($angka / 10) . ' Puluh ' . terbilang($angka % 10);
    } elseif ($angka < 200) {
        return 'Seratus ' . terbilang($angka - 100);
    } elseif ($angka < 1000) {
        return terbilang($angka / 100) . ' Ratus ' . terbilang($angka % 100);
    } elseif ($angka < 1000000) {
        return terbilang($angka / 1000) . ' Ribu ' . terbilang($angka % 1000);
    } else {
        return 'Angka terlalu besar untuk diubah menjadi terbilang';
    }
}
}
$tanggalHariIni = date('Y-m-d');
$terbilangArray = tanggalTerbilang($tanggalHariIni);

use Carbon\Carbon;

$created_at = $beritaAcara->created_at;

$bulan = $created_at->format('m');

$tahun = $created_at->format('Y');

$Post->created_at = date('Y-m-d H:i:s'); 

$timestamp = strtotime($created_at);

$formatted_date = date('d F Y', $timestamp);

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
                <div>BERITA ACARA PENGELUARAN BASAN DAN/BARAN</div>
                <div>Nomor : RBS1/{{ $beritaAcara->id }}/Kb/PAS.35/{{$bulan}}/{{$tahun}}</div>
            </div>
            <div class="text-base mt-4">
                Pada hari ini <i><b>{{$terbilangArray['nama_hari']}}</b></i> Tanggal <i><b>{{$terbilangArray['hari']}}</b></i>
                Bulan <i><b>{{$terbilangArray['nama_bulan']}}</b></i> Tahun <i><b>{{$terbilangArray['tahun']}}</b></i> di <i><b>RUPBASAN KELAS 1 BANDUNG</b></i>, Kami yang bertanda tangan dibawah ini :
            </div>
            <div class="mt-4">
                <ol class="list-decimal">
                    <li>
                        <div class="grid grid-cols-10 grid-rows-2 gap-0 ml-3" >
                            <div class="col-span-3">Nama</div>
                            <div class="col-span-7">: {{ $beritaAcara->nama_pihak_1 }}</div>
                        </div>
                        <div class="grid grid-cols-10 grid-rows-2 gap-0 ml-3" style="margin-top: -28px;">
                            <div class="col-span-3">NIP</div>
                            <div class="col-span-7">: {{ $beritaAcara->nip_pihak_1 }}</div>
                        </div>
                        <div class="grid grid-cols-10 grid-rows-2 gap-0 ml-3" style="margin-top: -28px;">
                            <div class="col-span-3">pangkat/golongan</div>
                            <div class="col-span-7">: {{ $beritaAcara->pangkat_pihak_1 }}</div>
                        </div>
                        <div class="grid grid-cols-10 grid-rows-2 gap-0 ml-3" style="margin-top: -28px;">
                            <div class="col-span-3">Jabatan</div>
                            <div class="col-span-7">: {{ $beritaAcara->jabatan_pihak_1 }}</div>
                        </div>
                        <div class="grid grid-cols-10 grid-rows-2 gap-0 ml-3" style="margin-top: -28px;">
                            <div class="col-span-10">Bertindak untuk dan atas nama Rupbasan kelas I Bandung</div>
                        </div>
                        <div class="grid grid-cols-10 grid-rows-2 gap-0 ml-3" style="margin-top: -28px;">
                            <div class="col-span-3">Selanjutnya disebut sebagai</div>
                            <div class="col-span-7">: Pihak pertama (I)</div>
                        </div>
                    </li>
                    <li style="margin-top: -20px;">
                        <div class="grid grid-cols-10 grid-rows-2 gap-0 ml-3" >
                            <div class="col-span-3">Nama</div>
                            <div class="col-span-7">: {{ $beritaAcara->nama_pihak_2}}</div>
                        </div>
                        <div class="grid grid-cols-10 grid-rows-2 gap-0 ml-3" style="margin-top: -28px;">
                            <div class="col-span-3">NIP</div>
                            <div class="col-span-7">: {{ $beritaAcara->nip_pihak_2}}</div>
                        </div>
                        <div class="grid grid-cols-10 grid-rows-2 gap-0 ml-3" style="margin-top: -28px;">
                            <div class="col-span-3">pangkat/golongan</div>
                            <div class="col-span-7">: {{ $beritaAcara->pangkat_pihak_2}}</div>
                        </div>
                        <div class="grid grid-cols-10 grid-rows-2 gap-0 ml-3" style="margin-top: -28px;">
                            <div class="col-span-3">Jabatan</div>
                            <div class="col-span-7">: {{ $beritaAcara->jabatan_pihak_2}}</div>
                        </div>
                        <div class="grid grid-cols-10 grid-rows-2 gap-0 ml-3" style="margin-top: -28px;">
                            <div class="col-span-10">Bertindak untuk dan atas nama Komisi Pemberantasan Korupsi (KPK) Republik Indonesia</div>
                        </div>
                        <div class="grid grid-cols-10 grid-rows-2 gap-0 ml-3" style="margin-top: -28px;">
                            <div class="col-span-3">Selanjutnya disebut sebagai</div>
                            <div class="col-span-7">: Pihak kedua (II)</div>
                        </div>
                    </li>
                    
                </ol>

                <div class="mt-1 text-base" style="line-height: 1.2;">
                    <p style="margin-top: -10px;">
                        Berdasarkan Surat Pengantar dari {{$Post->instansi}} Nomor: {{ $beritaAcara->no_keputusan_pengadilan }} Tanggal {{$formatted_date}}, Perihal:   
                         {{ $beritaAcara->perihal }}, dengan ini pihak pertama menyerahkan Basan dan/Baran di Rupbasan Kelas 1 Bandung <b>(Data Terlampir)</b> dan pihak kedua
                        Menerima Basan dan Baran di Rupbasan Kelas 1 Bandung.
                    </p>
                </div>

                <div class="mt-2 text-base" style="line-height: 1.2;">
                    <p>
                        Demikian berita acara ini dibuat dengan sebenarnya dan mengingat sumpah jabatan, kemudian ditutup dan ditandatangani pada tanggal dan tempat tersebut diatas.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-2 place-content-center text-center" style="line-height: 1.2;">
                <div class="mt-8 w-52 float-right mx-auto">
                    <div><i>Pihak Pertama(I)</i></div>
                    <div class="w-24 h-12"></div>
                    <div>{{$beritaAcara->nama_pihak_1}}</div>
                    <div>NIP. {{$beritaAcara->nip_pihak_1}}</div>
                </div>

                <div class="mt-8 w-52 float-right mx-auto" style="line-height: 1.2;">
                    <div><i>Pihak Kedua(II)</i></div>
                    <div class="w-24 h-12"></div>
                    <div>{{$beritaAcara->nama_pihak_2}}</div>
                    <div>NIP. {{$beritaAcara->nip_pihak_2}}</div>
                </div>
            </div>


            <div class="text-center w-full mt-4" style="line-height: 1.2;">SAKSI</div>
            <div class="grid grid-cols-2 place-content-center text-center">
                <div class="mt-8 w-52 float-right mx-auto">
                    <div class="w-24 h-8"></div>
                    <div>{{$beritaAcara->nama_saksi_1}}</div>
                    <div>NIP. {{$beritaAcara->nip_saksi_1}}</div>
                </div>

                <div class="mt-8 w-52 float-right mx-auto" style="line-height: 1.2;">
                    <div class="w-24 h-8"></div>
                    <div>{{$beritaAcara->nama_saksi_2}}</div>
                    <div>NIP. {{$beritaAcara->nip_saksi_2}}</div>
                </div>
            </div>
            <div class="mt-2 w-full text-center mx-auto"  style="line-height: 1.2;">
                <div>Mengetahui Kepala,</div>
                <div class="w-24 h-12"></div>
                <div>ADITYA WAHYU RAMADANI</div>
                <div>NIP.198107072007031001 </div>
            </div>

        </div>

    </div>

    <script>
        // Jalankan fungsi cetak saat halaman dimuat
        window.onload = function() {
            document.title='BeritaAcara{{$beritaAcara->id}}';
            window.print();
            document.title = originalTitle;
        };
    </script>
</body>

</html>