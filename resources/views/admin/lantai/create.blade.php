@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Tambah Lantai
                </div>
                <div class="card-body">

                    {{-- Menampilkan pesan error jika ada --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('lantai.store') }}" class="form" method="post">
                        @csrf

                        <label for="gedung_id">Gedung</label>
                        <select name="gedung_id" class="form-control @error('gedung_id') is-invalid @enderror">
                            <option value="">-- Pilih Gedung --</option>
                            @foreach ($gedung as $data)
                                <option value="{{ $data->id }}" {{ old('gedung_id') == $data->id ? 'selected' : '' }}>
                                    {{ $data->nama_gedung }}
                                </option>
                            @endforeach
                        </select>
                        @error('gedung_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="lantai" class="mt-2">Lantai</label>
                        <input type="number" name="lantai" class="form-control @error('lantai') is-invalid @enderror"
                               value="{{ old('lantai') }}">
                        @error('lantai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <button type="submit" class="btn btn-info mt-3">Tambah</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
