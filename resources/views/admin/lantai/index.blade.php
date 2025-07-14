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

                    Data lantai
                    <a href="{{ route('lantai.create') }}" class="btn btn-info btn-sm" style="color:white; float:right;">
                        Tambah
                    </a>    
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table" id="datalantai">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama gedung</th>
                                        <th>lantai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lantai as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->gedung->nama_gedung }}</td>
                                        <td>{{ $data->lantai }}</td>
                                        <td>
                                            <a href="{{ route('lantai.edit',$data->id) }}" class="btn btn-sm btn-warning">Edit</a> |
                                            <a href="{{ route('lantai.show',$data->id) }}" class="btn btn-sm btn-success">Show</a> |
                                            <form action="{{ route('lantai.destroy', $data->id) }}" method="POST" style="display:inline-block;" class="delete-confirm">
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
    new DataTable('#datalantai');
</script>
@endpush
