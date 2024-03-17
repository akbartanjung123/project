@extends('layouts.bootstrap')

@section('title')
Create Admin
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-warning">
        <div class="card-header">
            <h3>Buat Admin Baru</h3>
        </div>
        <div class="card-body">
            <a href="{{route('berita.index')}}" class="btn btn-secondary btn-sm">Back</a>
            @include('alert.failed')
            @include('alert.success')
            <form method="post" action="{{route('berita.store')}}" enctype="multipart/form-data">
                @csrf

              <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul" value="{{old('nama')}}" >
                <span class="error invalid-feedback">{{$errors->first('judul')}}</span>
              </div>

              <div class="form-group">
                <label for="isi">Isi</label>
                <input type="text" class="form-control" name="isi" id="isi" placeholder="Masukkan isi" value="{{old('alamat')}}" >
                <span class="error invalid-feedback">{{$errors->first('isi')}}</span>
              </div>




              <div class="form-group">
                <label for="photo_berita">PhoTo Berita</label>
                <input type="file" class="form-control-file {{$errors->first('photo_berita') ? 'is-invalid' : ''}}" required name="photo_berita" id="photo_berita">
                <span class="error invalid-feedback"></span>
              </div>

              <button type="submit"   class="btn btn-primary">Simpan</button>
            </form>

        </div>
      </div>
    </div>
  </div>
@endsection















