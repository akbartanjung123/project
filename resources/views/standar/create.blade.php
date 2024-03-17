@extends('layouts.bootstrap')

@section('title')
Tambah data
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-warning">
        <div class="card-header">
            <h3>Buat data baru</h3>
        </div>
        <div class="card-body">
            <a href="{{route('standar.index')}}" class="btn btn-secondary btn-sm">Back</a>
            @include('alert.failed')
            @include('alert.success')
            <form method="post" action="{{route('standar.store')}}" enctype="multipart/form-data">
                @csrf

              <div class="form-group">
                <label for="jenis">Jenis Layanan</label>
                <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Masukkan jenis" value="{{old('jenis')}}" >
                <span class="error invalid-feedback">{{$errors->first('jenis')}}</span>
              </div>

              <div class="form-group">
                <label for="persyartan">Persyaratan layanan</label>
                <input type="text" class="form-control" name="persyartan" id="persyartan" placeholder="Masukkan peryartan" value="{{old('persyartan')}}" >
                <span class="error invalid-feedback">{{$errors->first('persyartan')}}</span>
              </div>

              <div class="form-group">
                <label for="biaya">Biaya Layanan</label>
                <input type="text" class="form-control" name="biaya" id="biaya" placeholder="Masukkan biaya" value="{{old('biaya')}}" >
                <span class="error invalid-feedback">{{$errors->first('biaya')}}</span>
              </div>

              <div class="form-group">
                <label for="waktu">Waktu Layanan</label>
                <input type="text" class="form-control" name="waktu" id="waktu" placeholder="Masukkan waktu" value="{{old('waktu')}}" >
                <span class="error invalid-feedback">{{$errors->first('waktu')}}</span>
              </div>

              <div class="form-group">
                <label for="alur">Alur</label>
                <input type="text" class="form-control" name="alur" id="alur" placeholder="Masukkan alur" value="{{old('alur')}}" >
                <span class="error invalid-feedback">{{$errors->first('alur')}}</span>
              </div>

              <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Masukkan telepon" value="{{old('telepon')}}" >
                <span class="error invalid-feedback">{{$errors->first('telepon')}}</span>
              </div>






              <button type="submit"   class="btn btn-primary">Simpan</button>
            </form>

        </div>
      </div>
    </div>
  </div>
@endsection















