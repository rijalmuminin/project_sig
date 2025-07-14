@extends('layouts.frontend')

@section('content')
<div class="hero-2 overlay" style="background-image: url('{{ asset('assets/front/images/assalaam.jpg') }}');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mx-auto">
                <h1 class="mb-5">
                    <span>Selamat datang di sistem infromasi & geografis</span>
                    <span class="d-block"> </span>
                    <span class="d-block"></span>
                </h1>

                <div class="intro-desc">
                    <div class="line"></div>
                    <p>Website ini</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .uniform-img {
        width: 100%;
        height: 270px;
        object-fit: cover;
        border-radius: 8px;
    }

    .single-portfolio {
        position: relative;
        overflow: hidden;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 10px;
        background-color: #fff;
        transition: transform 0.3s ease;
    }

    .single-portfolio:hover {
        transform: scale(1.03);
    }

    .contents {
        margin-top: 10px;
    }   

    .contents h3 {
        font-size: 1.25rem;
        margin: 0;
    }

    .cat {
        font-size: 0.9rem;
        color: #888;
    }
</style>

<div class="section sec-1">
    <div class="section sec-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7">
                    <h2 class="heading">Ruangan</h2>
                </div>
                
                <ul class="d-flex justify-content-center">
                    @foreach ($lantai->unique('gedung_id') as $lokasi)
                    <li class="mx-2 btn">
                        <a href="{{ route('front.filter.gedung', $lokasi->gedung->id) }}"
                        class="{{ (isset($pilihGedung) && $pilihGedung->id == $lokasi->gedung->id)? 'fw-bold text-primary' : '' }} btn btn-primary text-light rounded">
                        <span style="text-decoration: none;"> {{ $lokasi->gedung->nama_gedung }} </span>
                        </a>
                    </li>
                    @endforeach
                </ul>


            <div class="row g-4">
                @foreach ($ruangan as $data)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="single-portfolio">
                        <a href="{{ route('front.detail', $data->id) }}">
                            <img src="{{ asset('storage/' . $data->gambar) }}" alt="{{ $data->nama_ruangan }}" class="uniform-img">
                            <div class="contents">
                                <h3>{{ $data->nama_ruangan }}</h3>
                                <div class="cat">{{ $data->kategori->nama_kategori ?? 'Tanpa Kategori' }}</div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div> 
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{ route('front.index') }}" class="btn btn-secondary">
                    ← Kembali
                </a>
            </div>
        </div>
    </div> 
</div> 


@endsection
