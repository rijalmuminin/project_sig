@extends('layouts.frontend')

@section('content')


<div class="section sec-3 py-5">
    <div class="container">

        <div class="row mb-5">
            {{-- Dua gambar sejajar --}}
            <div class="col-lg-6">
                @if ($ruangan->gambar)
                <img src="{{ asset('storage/' . $ruangan->gambar) }}"
                    alt="Gambar Ruangan"
                    class="img-fluid rounded shadow-sm w-100 mb-3"
                    style="max-height: 500px; object-fit: cover;">
                @endif
            </div>

            <div class="col-lg-6">
                @if ($ruangan->denah)
                    <img src="{{ asset('storage/' . $ruangan->denah) }}" alt="Denah Ruangan" class="img-fluid rounded shadow-sm w-100 mb-3">
                @endif
                <center><p><i>denah {{ $ruangan->nama_ruangan }}</i></p></center>
            </div>
        </div>

        <div class="row mb-4">
            {{-- Detail Informasi --}}
            <div class="col-lg-12">
                <h2 class="mb-4 fw-bold text-uppercase border-bottom pb-2">{{ $ruangan->nama_ruangan }}</h2>

                <div class="mb-4 fs-6">
                    <strong>Deskripsi:</strong>
                    <p class="mt-1">{{ $ruangan->deskripsi }}</p>
                </div>

                <div class="mb-3 fs-6">
                    <strong>Kategori:</strong> {{ $ruangan->kategori->nama_kategori ?? '-' }}
                </div>

                <div class="mb-3 fs-6">
                    <strong>Lantai:</strong> Gedung {{ $ruangan->lantai->gedung->nama_gedung }}- Lantai{{ $ruangan->lantai->lantai ?? '-' }}
                </div>

                <div class="mb-3 fs-6">
                    <strong>Fasilitas:</strong>
                    @if ($ruangan->fasilitas->count())
                        <ul class="mt-1">
                            @foreach ($ruangan->fasilitas as $fasilitas)
                                <li>{{ $fasilitas->nama_fasilitas }}</li>
                            @endforeach
                        </ul>
                    @else
                        <span class="text-muted">Tidak ada fasilitas.</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- Tombol Kembali di Tengah --}}
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
