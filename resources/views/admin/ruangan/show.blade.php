@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">Detail Ruangan</div>
        <div class="card-body">

            <div class="mb-3">
                <label><strong>Nama Ruangan:</strong></label>
                <div>{{ $ruangan->nama_ruangan }}</div>
            </div>

            <div class="mb-3">
                <label><strong>Kategori:</strong></label>
                <div>{{ $ruangan->kategori->nama_kategori ?? '-' }}</div>
            </div>

            <div class="mb-3">
                <label><strong>Deskripsi:</strong></label>
                <div>{{ $ruangan->deskripsi }}</div>
            </div>

            <div class="mb-3">
                <label><strong>Fasilitas:</strong></label>
                <div>{{ $ruangan->fasilitas }}</div>
            </div>

            <div class="mb-3">
                <label><strong>Gambar:</strong></label><br>
                @if ($ruangan->gambar)
                    <img src="{{ asset('storage/' . $ruangan->gambar) }}" width="200">
                @else
                    <em>Tidak ada gambar</em>
                @endif
            </div>

            <div class="mb-3">
                <label><strong>Latitude:</strong></label>
                <div>{{ $ruangan->latitude }}</div>
            </div>

            <div class="mb-3">
                <label><strong>Longitude:</strong></label>
                <div>{{ $ruangan->longitude }}</div>
            </div>

            <a href="{{ route('ruangan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
