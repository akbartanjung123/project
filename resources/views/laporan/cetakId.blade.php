<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pdf Cetak PAKTA INTEGRITAS</title>
    <style>
        .table-spacing td,
        .table-spacing th {
            padding: 4px; /* Ubah angka 10px sesuai dengan kebutuhan Anda */
        }
    </style>
    <style>
        .table-bordered td,
            .table-bordered th {
                border: 1px solid black;
            }
        </style>
    <!-- Tautan CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <style>
        @page {
            size: A4;
            margin-left: 1.5cm;
            margin-right: 1.2cm;
        }
    </style>
    <!-- Konten halaman -->
    <div class="container-fluid">
        <div class="row">
            {{-- HEADER --}}
            <div class="col-lg-12">
                <table class="table table-sm table-borderless mx-auto" style="margin-left: 16px; margin-right: 16px;">
                    <tr>
                        <td width="10%">
                            <img src="{{asset('img/logompp.png')}}" alt=""  width="120px;" height="100px;" style="margin-bottom: 30px;">
                        </td>

                        <td width="100%" class="text-center font-weight-bolder">
                            <span style="font-size: 30px">
                           <b>PAKTA INTEGRITAS</b>
                            </span>
                        </td>
                    </tr>

                </table>
                <div class="d-block" style="border-bottom: solid 3px black; margin-right: 7%"></div>
                <div class="text-center font-weight-bolder text-underline">

                </div>

                <div class="text-center">

                </div>

            </div>
            <br>
            <br>
            <br>
            {{-- BODY --}}
            <div class="col-lg-12">

                <span style="font-size: 22px">Saya yang bertanda tangan dibawah ini  :</span>
                <table class="table table-sm table-borderless mt-3 mb-3 table-spacing">
                    <tbody>
                        @foreach ($cetakId as $item )
                        <tr class="mb-3">
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><span style="font-size: 22px">{{$item->tanggal}}</span></td>
                         </tr>
                        <tr class="mb-3">
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{$item->nama}}</td>
                         </tr>
                         <tr class="mb-3">
                            <td>alamat</td>
                            <td>:</td>
                            <td>{{$item->alamat}}</td>
                         </tr>
                         <tr class="mb-3">
                            <td>Pendidikan</td>
                            <td>:</td>
                            <td>{{$item->pendidikan}}</td>
                         </tr>
                         <tr class="mb-3">
                            <td>Umur</td>
                            <td>:</td>
                            <td>{{$item->umur}}</td>
                         </tr>
                         <tr class="mb-3">
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>{{$item->pekerjaan}}</td>
                         </tr>
                         <tr class="mb-3">
                            <td>No handphone/Telep</td>
                            <td>:</td>
                            <td>{{$item->phone}}</td>
                         </tr>


                         @endforeach
                    </tbody>
                </table>
                <hr>
                <span style="font-size: 22px" class="d-block mb-2">Dalam hl ini saya berjanji tidak akan memberi sesuatu apapun baik berupa barang/ uang atau bentuknya lainnya yang berindikasi terjadinya grtifikasi dalam rangka kemudahan dalam penggunaan Pelayanan di Mal pelayanan Publik Kabupaten Barito Kuala</span>

                <span style="font-size: 22px" class="d-block">Demikian Surat pernyataan ini dibuat dengan sebenarnya dan dengan penuh kesadaran, tanpa paksaan dari siapapun unutk dapat dipergunakan sebagaimana mestinya .</span>

            </div>
            <br>
            <br>
            <br>
            {{-- FOOTER --}}
            <div class="col-lg-12">
                <table class="table table-sm table-borderless">
                    <thead>
                        <tr>
                            <td width="60%">
                            </td>
                            <td width="60%" class="text-center">
                                @foreach ($cetakId as $item )
                                Marabahan, {{date('d-m-Y')}}
                                <br>
                                <br>
                                <img src="{{$item->photo}}" alt="" width="100px;" height="140px;">

                                <br>
                                <br>
                                {{$item->nama}}
                                <br>
                                @endforeach
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>
    <!-- Skrip JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
