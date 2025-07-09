@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Tambah lantai
                </div>
                <div class="card-body">
                    <form action="{{ route('lantai.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- Dropdown Gedung --}}
                        <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                    <label for="">Gedung</label>
                                    <select name="gedung_id" class="form-control @error('gedung_id') is-invalid @enderror">
                                        <option value="">-- Pilih Gedung --</option>
                                        @foreach ($gedung as $g)
                                            <option value="{{ $g->id }}">{{ $g->nama_gedung }}</option>
                                        @endforeach
                                    </select>
                                    @error('gedung_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Input Lantai --}}
                        <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                    <label for="">Lantai</label>
                                    <input type="number" name="lantai"
                                        class="form-control @error('lantai') is-invalid @enderror">
                                    @error('lantai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <button type="submit" class="btn btn-sm btn-outline-primary">Simpan</button>
                            <button type="reset" class="btn btn-sm btn-outline-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
