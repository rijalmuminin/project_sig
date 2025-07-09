@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit Ruangan</div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('ruangan.update', $ruangan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <label>Nama Ruangan</label>
                        <input type="text" name="nama_ruangan" class="form-control @error('nama_ruangan') is-invalid @enderror"
                            value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}">
                        @error('nama_ruangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label class="mt-2">Kategori</label>
                        <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                            @foreach ($kategori as $data)
                                <option value="{{ $kat->id }}" {{ $data->id == $ruangan->kategori_id ? 'selected' : '' }}>
                                    {{ $data->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label class="mt-2">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $ruangan->deskripsi) }}</textarea>

                        <label class="mt-2">Fasilitas</label>
                        <input type="text" name="fasilitas" class="form-control" value="{{ old('fasilitas', $ruangan->fasilitas) }}">

                        <label class="mt-2">Gambar</label>
                        @if($ruangan->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $ruangan->gambar) }}" width="100">
                            </div>
                        @endif
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label class="mt-2">Latitude</label>
                        <input type="text" name="latitude" class="form-control" value="{{ old('latitude', $ruangan->latitude) }}">

                        <label class="mt-2">Longitude</label>
                        <input type="text" name="longitude" class="form-control" value="{{ old('longitude', $ruangan->longitude) }}">

                        <button type="submit" class="btn btn-success mt-3">Update</button>
                        <a href="{{ route('ruangan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
