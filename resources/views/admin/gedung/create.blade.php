@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Tambah Gedung
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

                    <form action="{{ route('gedung.store') }}" method="post" class="form">
                        @csrf

                        <label for="nama_gedung">Nama Gedung</label>
                        <input type="text" name="nama_gedung"
                               class="form-control @error('nama_gedung') is-invalid @enderror"
                               value="{{ old('nama_gedung') }}">
                        @error('nama_gedung')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-info mt-3">Tambah</button>
                        <button type="reset" class="btn btn-secondary mt-3">Reset</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
