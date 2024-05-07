<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('judul')Inventory</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('/theme/img/logonw.jpeg')}}" rel="icon">
  <link href="{{asset('theme/img/logonw.jpeg')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('theme/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('theme/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('theme/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('theme/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('theme/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('theme/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('theme/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{url('/')}}" class="logo d-flex align-items-center">
        <span>Selamat Datang</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <!-- <li><a class="nav-link scrollto active" href="{{url('/')}}">Home</a></li>
          <li><a href="{{url('Berita')}}">Berita</a></li>
          <li><a class="nav-link scrollto" href="{{url('/')}}#contact">Contact</a></li> -->
          <li><a class="getstarted scrollto" href="/login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('hero')

<main id="main">

  @yield('main')
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
      

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>ZWhoAm'I</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('theme/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('theme/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('theme/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('theme/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('theme/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('theme/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('theme/js/main.js')}}"></script>

</body>

</html>