@extends('layouts.backend')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
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
                                    <th>Fasilitas</th>
                                    <th>Gambar</th>
                                    <th>Koordinat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ruangan as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_ruangan }}</td>
                                    <td>{{ $data->kategori->nama_kategori ?? '-' }}</td>
                                    <td>{{ Str::limit($data->fasilitas, 40) }}</td>
                                    <td>
                                        @if($data->gambar)
                                            <img src="{{ asset('storage/' . $data->gambar) }}" alt="gambar" width="70">
                                        @else
                                            <em>Tidak ada</em>
                                        @endif
                                    </td>
                                    <td>
                                        <small>{{ $data->latitude ?? '-' }}, {{ $data->longitude ?? '-' }}</small>
                                    </td>
                                    <td>
                                        <a href="{{ route('ruangan.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a> |
                                        <a href="{{ route('ruangan.show', $data->id) }}" class="btn btn-sm btn-success">Show</a> |
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
