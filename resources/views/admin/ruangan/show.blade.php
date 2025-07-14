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

            {{-- Tambahan: Lantai --}}
            <div class="mb-3">
                <label><strong>Lantai:</strong></label>
                <div>{{ $ruangan->lantai->lantai ?? '-' }}</div>
            </div>

            <div class="mb-3">
                <label><strong>Fasilitas:</strong></label>
                <div>
                    @forelse ($ruangan->fasilitas as $fasilitas)
                        • {{ $fasilitas->nama_fasilitas }}<br>
                    @empty
                        <em>Tidak ada fasilitas</em>
                    @endforelse
                </div>
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
                <label><strong>Denah:</strong></label><br>
                @if ($ruangan->denah)
                    <img src="{{ asset('storage/' . $ruangan->denah) }}" width="200">
                @else
                    <em>Tidak ada denah</em>
                @endif
            </div>

            <a href="{{ route('ruangan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
