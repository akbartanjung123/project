
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Growup CSS -->
    <link rel="stylesheet" href="{{asset('growup.css')}}">
    <!-- AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- BOX Icons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- ICON -->
    <link rel="shortcut icon" href="{{asset('img/brand/growup-logo.svg')}}" type="image/x-icon">
    <title>Mal Pelayanan Publik</title>
</head>

<body>
    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('img/logompp.png')}}" alt="brand"  width="90px;" height="60x;">
                <span><b>Mal Pelayanan Publik</b></span>
            </a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class='bx bx-menu'></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="{{route('daftar.create')}}">Pakta Integritas</a>
                    {{-- <a class="nav-link" href="{{route('tampil')}}">Pakta Integritas</a> --}}
                    <a class="nav-link" href="{{route('tampil2')}}">Standar pelayanan</a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link" href="#">Contatc</a>
                </div>
                <a href="{{route('login')}}" class="btn btn-primary shadow-none">Login</a>
            </div>
            <br>

        </div>
    </nav>
    <div class="container">
        <div class="col-md-5">
            @include('alert.success')
        </div>
    </div>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copy" data-aos="fade-up" data-aos-duration="3000">
                        <div class="text-label">
                            <a href="{{route('daftar.create')}}" class="btn btn-secondary shadow-none ms-3">Mengisi Pakta Integritas</a>
                        </div>
                        <div class="text-hero-bold">
                            Mal Pelayanan Publik (MPP)
                        </div>
                        <div class="text-hero-regular"   >
                            MPP dirancang oleh KEMEPAN RB sebagai bagian dari perbaikan menyeluruh dan transformasi tata kelola pelayanan publik. Menggabungkan berbagai jenis pelayanan pada satu tempat, penyederhaan dan prosedur serta integrasi pelayanan pada Mal Pelayanan Publik akan memudahkan akses masyarakat dalam mendapat berbagai jenis pelayanan, serta meningkatkan kepercayaan masyarakat kepada penyelenggara pelayanan publik.
                        </div>
                        <div class="cta">

                        </div>
                    </div>
                </div>
                {{-- <form action="{{route('beritauser')}}" method="GET"> --}}
                    @csrf
                <div class="col-md-6" data-aos="fade-up" data-aos-duration="3000">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">
                            {{-- @foreach ($data as $row) --}}
                            <div class="carousel-item active">
                                {{-- <img src="{{$row->photo_berita}}" class="d-block w-100" alt="..."> --}}
                                <img src="{{asset('img/gambar1.JPG')}}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p class="text-primary"></p>
                                  </div>
                              </div>

                              <div class="carousel-item">
                                <img src="{{asset('img/makanan.jpg')}}" class="d-block w-100" alt="...">
                              </div>

                              <div class="carousel-item">
                                <img src="{{asset('img/tni.png')}}" class="d-block w-100" alt="...">
                              </div>
                            </div>
                            {{-- @endforeach --}}

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>

            {{-- </form> --}}

            </div>
        </div>
    </section>
    <!-- Testimoni Brand Setion -->
    <section class="testimoni-brand">
        <div class="container">
            <div class="row">
                <div class="hstack gap-3">
                    <div class="p-2"><img src="{{asset('img/logompp.png')}}" alt="" width="50px;" height="30px;"><a href="" target="_blank"></a></div>
                    <div class="p-2">Second item</div>
                    <div class="p-2">Third item</div>
                  </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <script>
        AOS.init();
    </script>
</body>

</html>
