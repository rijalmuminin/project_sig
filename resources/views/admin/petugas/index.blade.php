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

                    Data petugas
                    <a href="{{ route('petugas.create') }}" class="btn btn-info btn-sm" style="color:white; float:right;">
                        Tambah
                    </a>    
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table" id="datapetugas">
                                <thead>
                      <th>No</th>
                      <th>Nama Petugas</th>
                      <th>Email</th>
                      <th>Peran</th>
                      <th>Aksi</th>
                    </thead>
                     <tbody>
                      @foreach ($petugas as $user)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@if ($user->role == 1)
                        {{ "Admin" }}
                        @else
                        {{ "Petugas" }}
                        @endif  <td>
                                    <a href="{{ route('petugas.edit',$user->id) }}" class="btn btn-sm btn-warning">Edit</a> |
                                    <a href="{{ route('petugas.show',$user->id) }}" class="btn btn-sm btn-success">Show</a> |
                                    <form action="{{ route('petugas.destroy', $user->id) }}" method="POST" style="display:inline-block;" class="delete-confirm">
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
    new DataTable('#datapetugas');
</script>
@endpush
