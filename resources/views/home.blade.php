@extends('layouts.bootstrap')

@section('title')
Home
@endsection


@section('content')
@inject('user','App\Models\User' )
<div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card" >
        <div class="card-body">
          <h5 class="card-title">Data Admin</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">lihat Sekarang{{$user->count()}}</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Lihat Sekarang</a>
        </div>
      </div>
    </div>
  </div>


@endsection
