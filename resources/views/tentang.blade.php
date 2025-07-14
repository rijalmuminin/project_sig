@extends('layouts.frontend')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/front/css/tentang.css') }}">
<div class="hero-2 overlay" style="background-image: url('assets/front/images/assalaam.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mx-auto">
                <h1 class="mb-5 text-center"><span>About Us</span></h1>
                <div class="intro-desc text-left">
                    <div class="line"></div>
                    <p>Delectus voluptatum distinctio quos eius excepturi sunt pariatur, aut, doloribus officia ea molestias beatae laudantium...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section sec-4 tentang-section">
    <div class="container">
        <div class="row about-content">
            <div class="col-lg-5 text-content">
                <h2 class="heading mb-4">Projek Sistem Informasi Geografis SMK Assalaam</h2>
                <p>Aplikasi Sistem Informasi Geografis (SIG) ini dibuat sebagai bentuk digitalisasi data ruangan dan fasilitas di lingkungan SMK Assalaam Bandung. Tujuannya adalah untuk memudahkan pengguna dalam mencari informasi tentang lokasi, fasilitas, dan detail tiap ruangan secara interaktif dan efisien.

Dengan menggunakan teknologi berbasis Laravel, aplikasi ini menyediakan tampilan yang interaktif, informatif, dan mudah digunakan baik oleh siswa, guru, maupun pihak sekolah.

Fitur Utama
Daftar dan detail ruangan.
Filter berdasarkan Gedung.
Menampilkan fasilitas per ruangan.
Visualisasi gambar ruangan dan denah sekolah.</p>
            </div>
            <div class="col-lg-7 image-content">
                <img src="{{ asset('assets/front/images/sakola.jpg') }}" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@endsection
