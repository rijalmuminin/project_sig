@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Tambah Ruangan</div>
                <div class="card-body">

                    {{-- Menampilkan pesan error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('ruangan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label>Nama Ruangan</label>
                        <input type="text" name="nama_ruangan" class="form-control @error('nama_ruangan') is-invalid @enderror" value="{{ old('nama_ruangan') }}">
                        @error('nama_ruangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label class="mt-2">Kategori</label>
                        <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $data)
                                <option value="{{ $data->id }}" {{ old('kategori_id') == $data->id ? 'selected' : '' }}>
                                    {{ $data->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label class="mt-2">Fasilitas</label>
                        <div class="@error('fasilitas_id') is-invalid @enderror">
                            @foreach ($fasilitas as $data)
                                <div class="form-check">
                                    <input
                                        type="checkbox"
                                        name="fasilitas_id[]"
                                        value="{{ $data->id }}"
                                        id="fasilitas_{{ $data->id }}"
                                        class="form-check-input"
                                        
                                    >
                                    <label class="form-check-label" for="fasilitas_{{ $data->id }}">
                                        {{ $data->nama_fasilitas }}
                                    </label>
                                </div>
                            @endforeach
                            @error('fasilitas_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <label class="mt-2">Gambar</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label class="mt-2">Denah</label>
                        <input type="file" name="denah" class="form-control @error('denah') is-invalid @enderror">
                        @error('denah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}">
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label class="mt-2">Lokasi </label>
                        <select name="lantai_id" class="form-control @error('lantai_id') is-invalid @enderror">
                            <option value="">-- Pilih lokasi --</option>
                            @foreach ($lantai as $data)
                                <option value="{{ $data->id }}" {{ old('lantai_id') == $data->id ? 'selected' : '' }}>
                                   Gedung {{ $data->gedung->nama_gedung }} - Lantai{{ $data->lantai }}
                                </option>
                            @endforeach
                        </select>
                        @error('lantai_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
