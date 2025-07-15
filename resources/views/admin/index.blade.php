@extends('layouts.backend')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">

    <div class="col-md-6 col-xl-4">
      <div class="card bg-success text-white mb-3" style="max-height: 200px; height: 200px;">
        <div class="card-body">
          <h2 class="card-title text-white fw-bold">
            {{ count($fasilitas ?? []) }} Fasilitas
          </h2>
          <p class="card-text">Ada total {{ count($fasilitas ?? []) }} Fasilitas di SMK Assalaam</p>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-xl-4">
      <div class="card bg-warning text-white mb-3" style="max-height: 200px; height: 200px;">
        <div class="card-body">
          <h2 class="card-title text-white fw-bold">
            {{ count($gedung ?? []) }} Gedung
          </h2>
          <p class="card-text">Ada total {{ count($gedung ?? []) }} gedung di SMK Assalaam</p>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-xl-4">
      <div class="card bg-info text-white mb-3" style="max-height: 200px; height: 200px;">
        <div class="card-body">
          <h2 class="card-title text-white fw-bold">
            {{ count($ruangan ?? []) }} Ruangan
          </h2>
          <p class="card-text">Ada total {{ count($ruangan ?? []) }} ruangan di SMK Assalaam</p>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
