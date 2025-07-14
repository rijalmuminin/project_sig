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
                                <option value="{{ $data->id }}" {{ $data->id == $ruangan->kategori_id ? 'selected' : '' }}>
                                    {{ $data->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label class="mt-2">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $ruangan->deskripsi) }}</textarea>

                        <label class="mt-2">Lokasi</label>
                        <select name="lantai_id" class="form-control @error('lantai_id') is-invalid @enderror">
                            @foreach ($lantai as $data)
                                <option value="{{ $data->id }}" {{ $data->id == $ruangan->lantai_id ? 'selected' : '' }}>
                                   Gedung {{$data->gedung->nama_gedung }}-Lantai {{ $data->lantai }}
                                </option>
                            @endforeach
                        </select>
                        @error('lantai_id')
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
                                        {{ in_array($data->id, $ruangan->fasilitas->pluck('id')->toArray()) ? 'checked' : '' }}
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
                        @if($ruangan->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $ruangan->gambar) }}" width="100">
                            </div>
                        @endif
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label class="mt-2">Denah</label>
                        @if($ruangan->denah)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $ruangan->denah) }}" width="100">
                            </div>
                        @endif
                        <input type="file" name="denah" class="form-control @error('denah') is-invalid @enderror">
                        @error('denah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        
                        <button type="submit" class="btn btn-success mt-3">Update</button>
                        <a href="{{ route('ruangan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
