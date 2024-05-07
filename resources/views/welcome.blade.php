@extends('layouts.landingpage')

@section('judul')
Home
@endsection

@section('hero')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up">Aplikasi Permintaan Inventory Barang</h1>
      <h2 data-aos="fade-up" data-aos-delay="400">Bijaklah Dalam Meminta dan Menggunakan Barang Perusahaan</h2>
      <div data-aos="fade-up" data-aos-delay="600">
        <div class="text-center text-lg-start">
          <!-- <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
            <span>Klik untuk memulai</span>
            <i class="bi bi-arrow-right"></i>
          </a> -->
        </div>
      </div>
    </div>
    <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
      <img src="{{asset('theme/img/hero-img.png')}}" class="img-fluid" alt="">
    </div>
  </div>
</div>

</section><!-- End Hero -->
@endsection

<!-- @section('main')
<main id="main">
    
  </main><!-- End #main -->

@endsection