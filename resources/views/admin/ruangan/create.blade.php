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

                        <label class="mt-2">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>

                        <label class="mt-2">Fasilitas</label>
                        <select name="fasilitas_id[]" multiple class="form-control @error('fasilitas_id') is-invalid @enderror">
                            <option value="">-- Pilih fasilitas --</option>
                            @foreach ($fasilitas as $data)
                                <option value="{{ $data->id }}" {{ old('fasilitas_id') == $data->id ? 'selected' : '' }}>
                                    {{ $data->nama_fasilitas }}
                                </option>
                            @endforeach
                        </select>


                        <label class="mt-2">Gambar</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label class="mt-2">Latitude</label>
                        <input type="text" name="latitude" class="form-control" value="{{ old('latitude') }}">

                        <label class="mt-2">Longitude</label>
                        <input type="text" name="longitude" class="form-control" value="{{ old('longitude') }}">

                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
