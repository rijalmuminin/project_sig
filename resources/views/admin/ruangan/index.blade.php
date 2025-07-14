@extends('layouts.backend')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Data Ruangan
                    <a href="{{ route('ruangan.create') }}" class="btn btn-light btn-sm" style="float:right;">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table" id="dataruangan">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ruangan</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Lokasi</th>
                                    <th>Fasilitas</th>
                                    <th>Gambar</th>
                                    <th>Denah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ruangan as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_ruangan }}</td>
                                    <td>{{ $data->kategori->nama_kategori ?? '-' }}</td>
                                    <td>{{ Str::limit($data->deskripsi, 50) }}</td>
                                    <td>
                                        {{ $data->lantai->gedung->nama_gedung ?? '-' }} - Lantai {{ $data->lantai->lantai ?? '-' }}
                                    </td>

                                    <td>@foreach ($data->fasilitas as $f)
                                        {{ $f->nama_fasilitas }}<br>
                                         @endforeach
                                    </td>
                                    <td>
                                        @if($data->gambar)
                                            <img src="{{ asset('storage/' . $data->gambar) }}" alt="gambar" width="70">
                                        @else
                                            <em>Tidak ada</em>
                                        @endif
                                    </td>

                                    <td>
                                        @if($data->denah)
                                            <img src="{{ asset('storage/' . $data->denah) }}" alt="denah" width="70">
                                        @else
                                            <em>Tidak ada</em>
                                        @endif
                                    </td>
                                    
                                    
                                    <td>
                                        <a href="{{ route('ruangan.edit', $data->id) }}" class="btn btn-sm btn-warning me-1 mb-1">Edit</a> 
                                        <a href="{{ route('ruangan.show', $data->id) }}" class="btn btn-sm btn-success me-1 mb-1">Show</a> 
                                        <form action="{{ route('ruangan.destroy', $data->id) }}" method="POST" style="display:inline-block;" class="delete-confirm">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#dataruangan');
</script>
@endpush
