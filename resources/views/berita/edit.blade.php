@extends('layouts.bootstrap')

@section('title')
Edit Berita
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Nama Edit {{$berita->judul}}</h3>
            @include('alert.failed')
        </div>
        <div class="card-body">
            <hr>
            <a href="{{route('berita.index')}}" class="btn btn-secondary">Kembali</a>
            <hr>
            <form method="POST" action="{{ route('berita.update', [$berita->id]) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}

                <div class="form-group">
                    <label for="judul">Judul </label>
                    <input type="text" class="form-control {{$errors->first('judul') ? 'is-invalid' : ''}}" name="judul" id="judul" value="{{$berita->judul}}">
                    <span class="error invalid-feedback">{{$errors->first('judul')}}</span>
                </div>
                <div class="form-group">
                    <label for="isi">Isi Berita</label>
                    <input type="text" class="form-control {{$errors->first('isi') ? 'is-invalid' : ''}}" name="isi" id="isi" value="{{$berita->isi}}">
                    <span class="error invalid-feedback">{{$errors->first('isi')}}</span>
                </div>


                <div class="form-group">
                    <label for="photo_berita">Upload photo baru</label>
                    <input type="file" class="form-control {{$errors->first('photo_berita') ? 'is-invalid' : ''}}"
                    name="photo_berita" id="photo_berita">
                    <span class="error invalid-feedback">{{$errors->first('photo_berita')}}</span>
                    <br>
                    @if ($berita->photo_berita)
                    <div class="mt-2">
                        <label>Foto Lama</label>
                        <img src="{{$berita->photo_berita}}" alt="Foto Lama" class="img-thumbnail" style="max-width: 100px;">
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
