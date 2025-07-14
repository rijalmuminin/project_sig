@extends('layouts.backend')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-warning">

                    Data kategori
                    <a href="{{ route('kategori.create') }}" class="btn btn-info btn-sm" style="color:white; float:right;">
                        Tambah
                    </a>    
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table" id="datakategori">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama_kategori }}</td>
                                        <td>
                                            <a href="{{ route('kategori.edit',$data->id) }}" class="btn btn-sm btn-warning">Edit</a> |
                                            <a href="{{ route('kategori.show',$data->id) }}" class="btn btn-sm btn-success">Show</a> |
                                            <form action="{{ route('kategori.destroy', $data->id) }}" method="POST" style="display:inline-block;" class="delete-confirm">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
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
    new DataTable('#datakategori');
</script>
@endpush
