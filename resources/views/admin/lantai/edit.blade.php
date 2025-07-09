@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Edit Lantai
                </div>
                <div class="card-body">
                    <form action="{{ route('lantai.update', $lantai->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col">
                                
                                {{-- Dropdown Gedung --}}
                                <div class="mb-2">
                                    <label for="gedung_id">Nama Gedung</label>
                                    <select name="gedung_id" id="gedung_id" class="form-control @error('gedung_id') is-invalid @enderror">
                                        @foreach($gedung as $data)
                                            <option value="{{ $data->id }}" {{ $data->id == $lantai->gedung_id ? 'selected' : '' }}>
                                                {{ $data->nama_gedung }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('gedung_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{-- Input Lantai --}}
                                <div class="mb-2">
                                    <label for="lantai">Nomor Lantai</label>
                                    <input type="number" name="lantai" id="lantai" value="{{ $lantai->lantai }}"
                                        class="form-control @error('lantai') is-invalid @enderror">
                                    @error('lantai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{-- Tombol --}}
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Simpan</button>
                                    <button type="reset" class="btn btn-sm btn-outline-warning">Reset</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
