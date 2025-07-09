@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Detail Petugas</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label><strong>Nama Petugas:</strong></label>
                                <div>{{ $petugas->name }}</div>
                            </div>
                            <div class="mb-3">
                                <label><strong>Email:</strong></label>
                                <div>{{ $petugas->email }}</div>
                            </div>
                            <div class="mb-3">
                                <label><strong>Password:</strong></label>
                                <input type="password" class="form-control" value="{{ $petugas->password }}" disabled>
                            </div>

                    <div class="mt-4">
                        <a href="{{ route('petugas.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection