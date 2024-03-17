@extends('layouts.bootstrap')
@section('title')
Data Pakta Integritas
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Data Pakta Integritas</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br>
            <form method="GET" action="{{route('user.index')}}">
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
            <a href="{{route('btnLaporan')}}" class="btn btn-success btn-sm">
                <i class="fas fa-print"></i> Buat Laporan
            </a>
            <hr>
            <table class="table table-bordered">

		<thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Umur</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
		</thead>
                <tbody>
                    @foreach ($user as $row )
                    <tr>
                        <td>{{ $loop->iteration + ($user->perPage() * ($user->currentPage() - 1) ) }}
                        </td>
                        <td>{{$row->nama}}</td>
                        <td>{{$row->tanggal}}</td>
                        <td>{{$row->umur}}</td>
                        <td>
                            <img src="{{$row->photo}}" alt="photo" width="60px">
                        </td>
                        <td>
                            <a href="{{ route ('user.edit', [$row->id])}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('user.destroy', [$row->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('yakin hapus ?')">
                                @csrf
                                {{method_field('DELETE')}}
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                            <a href="{{ route ('cetakId', [$row->id])}}" class="btn btn-primary btn-sm" target="_blank">Cetak PDF</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$user->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection
