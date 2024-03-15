<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- title --}}
    <title>cimalcimol</title>

    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    {{-- custom css --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg  navbar-dark fixed-top">
        <div class="container">
            <div class="navbar-brand">
                <img src="{{ asset('assets/images/logo-brand.png') }}" alt="Logo"
                    class="d-inline-block align-text-top">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ '/' == request()->path() ? 'active' : '' }}" role="button"
                            href="/">BERANDA<span></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ '/menu' == request()->path() ? 'active' : '' }}" role="button"
                            href="/menu"><span>MENU</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ '/tentang' == request()->path() ? 'active' : '' }}" role="button"
                            href="/tentang"><span>TENTANG</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ '/contact' == request()->path() ? 'active' : '' }}"" role="button"
                            href="/contact">CONTACT<span></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="bi bi-cart-fill"></i><span></span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link {{ 'tutorial/bhsisyarat' == request()->path() || 'tutorial/musik' == request()->path() || 'tutorial/tari' == request()->path() || 'tutorial/gambar' == request()->path() ? 'active' : '' }}"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i><span></span>
                        </a>
                        <ul class="dropdown-menu bg-dark">
                            <li><a class="dropdown-item {{ 'register' == request()->path() ? 'active' : '' }}"
                                    href="{{ url('register') }}">DAFTAR</span></a></li>
                            <li><a class="dropdown-item {{ 'login' == request()->path() ? 'active' : '' }}"
                                    href="{{ url('login') }}">MASUK<span></span></a></li>
                    </li>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- navbar --}}
    @yield('content')

    {{-- footer --}}
    <div class="container-fluid text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s"
        style="background-color: #800020;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6 text-decoration-none">
                    <h2 class="text-footer fw-bold mb-4">CimalCimol</h2>
                    <h5>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed
                        stet lorem sit clita</h5>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start fw-normal mb-4">Contact</h4>
                    <h6 class="mb-2"><i class="bi bi-geo-alt-fill me-3"></i>Jl.Dewandaru No.7 Malang</h6>
                    <h6 class="mb-2"><i class="bi bi-telephone-fill me-3"></i>+62 898-3550-049</h6>
                    <h6 class="mb-2"><i class="bi bi-envelope-fill me-3"></i>icimalcimoool@gmail.com</h6>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/cimalcimoool?igsh=OXo5em82dXlwMm8="><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start fw-normal mb-4">Opening</h4>
                    <h6 class="text-light fw-normal">Senin - Minggu</h5>
                    <h6>11.30 - 21.30</p>
                    <h6 class="text-light fw-normal">Jumat</h5>
                    <h6>13.00 - 21.30</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-20 text-center text-md-start mb-3 mb-md-0">
                        &copy; cimalcimol.com</a>, All Right Reserved. <br>
                        Designed By Kelompok 2 Teknik Informatika C Universitas Negeri Malang</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- footer end --}}

    <script>
        var nav = document.querySelector('nav');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 100) {
                nav.classList.add('solid', 'shadow');
            } else {
                nav.classList.remove('solid', 'shadow');
            }
        });
    </script>
    @yield('scripts')

    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>