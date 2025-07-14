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

                    Data gedung
                    <a href="{{ route('gedung.create') }}" class="btn btn-info btn-sm" style="color:white; float:right;">
                        Tambah
                    </a>    
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table" id="datagedung">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Gedung</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gedung as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama_gedung }}</td>
                                        <td>
                                            <a href="{{ route('gedung.edit',$data->id) }}" class="btn btn-sm btn-warning">Edit</a> |
                                            <a href="{{ route('gedung.show',$data->id) }}" class="btn btn-sm btn-success">Show</a> |
                                            <form action="{{ route('gedung.destroy', $data->id) }}" method="POST" style="display:inline-block;" class="delete-confirm">
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
    new DataTable('#datagedung');
</script>
@endpush
