@extends('layouts.bootstrap')

@section('title')
Edit pendaftar
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Nama Edit {{$daftar->nama}}</h3>
            @include('alert.failed')
        </div>
        <div class="card-body">
            <hr>
            <a href="{{route('user.index')}}" class="btn btn-secondary">Kembali</a>
            <hr>
            <form method="POST" action="{{ route('user.update', [$daftar->id]) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}

                <div class="form-group">
                    <label for="nama">Nama </label>
                    <input type="text" class="form-control {{$errors->first('nama') ? 'is-invalid' : ''}}" name="nama" id="nama" value="{{$daftar->nama}}">
                    <span class="error invalid-feedback">{{$errors->first('nama')}}</span>
                </div>
                <div class="form-group">
                    <label for="alamat">alamat</label>
                    <input type="text" class="form-control {{$errors->first('alamat') ? 'is-invalid' : ''}}" name="alamat" id="alamat" value="{{$daftar->alamat}}">
                    <span class="error invalid-feedback">{{$errors->first('alamat')}}</span>
                </div>
                <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    <input type="text" class="form-control {{$errors->first('pendidikan') ? 'is-invalid' : ''}}" name="pendidikan" id="pendidikan" value="{{$daftar->pendidikan}}">
                    <span class="error invalid-feedback">{{$errors->first('pendidikan')}}</span>
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control {{$errors->first('umur') ? 'is-invalid' : ''}}" name="umur" id="umur" value="{{$daftar->umur}}">
                    <span class="error invalid-feedback">{{$errors->first('umur')}}</span>
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control {{$errors->first('pekerjaan') ? 'is-invalid' : ''}}" name="pekerjaan" id="pekerjaan" value="{{$daftar->pekerjaan}}">
                    <span class="error invalid-feedback">{{$errors->first('pekerjaan')}}</span>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control {{$errors->first('phone') ? 'is-invalid' : ''}}" name="phone" id="phone" value="{{$daftar->phone}}">
                    <span class="error invalid-feedback">{{$errors->first('phone')}}</span>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="text" class="form-control {{$errors->first('tanggal') ? 'is-invalid' : ''}}" name="tanggal" id="tanggal" value="{{$daftar->tanggal}}" readonly>
                    <span class="error invalid-feedback">{{$errors->first('tanggal')}}</span>
                </div>


                <div class="form-group">
                    <label for="photo">Upload photo baru</label>
                    <input type="file" class="form-control {{$errors->first('photo') ? 'is-invalid' : ''}}"
                    name="photo" id="photo">
                    <span class="error invalid-feedback">{{$errors->first('photo')}}</span>
                    <br>
                    @if ($daftar->photo)
                    <div class="mt-2">
                        <label>Foto Lama</label>
                        <img src="{{$daftar->photo}}" alt="Foto Lama" class="img-thumbnail" style="max-width: 100px;">
                    </div>
                @endif
                </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Event Sekarang</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
