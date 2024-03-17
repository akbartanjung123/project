@extends('layouts.bootstrap')
@section('title')
Data Berita
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Berita</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br>
            <form method="GET" action="{{route('berita.index')}}">
                <div class="row">
                    <div class="col-2 ">
                        <b>Search Nama</b>
                    </div>
                    <div class="col-3">
                        <input type="text" name="keyword" class="form-control" value="{{Request::get('keyword')}}">

                    </div>
                    <div class="col-4">
                        <button class="btn btn-default" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

            </form>
            <br>
            <a href="{{route('berita.create')}}" class="btn btn-success btn-sm">
                <i class="fas fa-print"></i> Tambah Berita +
            </a>
            <hr>
            <table class="table table-bordered">

		<thead>
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>

                    <th>Action</th>
                </tr>
		</thead>
                <tbody>
                    @foreach ($berita as $row )
                    <tr>
                        <td>{{ $loop->iteration + ($berita->perPage() * ($berita->currentPage() - 1) ) }}
                        </td>
                        <td> <img src="{{$row->photo_berita}}" alt="photo" width="60px"></td>
                        <td>{{$row->judul}}</td>
                        <td>{{$row->isi}}</td>
                        <td>

                        </td>
                        <td>
                            <a href="{{ route ('berita.edit', [$row->id])}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('berita.destroy', [$row->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('yakin hapus ?')">
                                @csrf
                                {{method_field('DELETE')}}
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$berita->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection
