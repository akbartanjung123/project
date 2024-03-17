@extends('layouts.bootstrap')
@section('title')
Data Standar Pelayanan
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Data Standar Pelayanan</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br>
            <form method="GET" action="{{route('standar.index')}}">
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
            <a href="{{route('standar.create')}}" class="btn btn-success btn-sm">
                <i class="fas fa-print"></i> Tambah Berita +
            </a>
            <br>

            <hr>
            <table class="table table-bordered">

		<thead>
                <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Persyaratan</th>
                    <th>Biaya</th>
                    <th>Waktu</th>
                    <th>Alur</th>
                    <th>Telepon</th>
                    <th>Action</th>
                </tr>
		</thead>
                <tbody>
                    @foreach ($standar as $row )
                    <tr>
                        <td>{{ $loop->iteration + ($standar->perPage() * ($standar->currentPage() - 1) ) }}
                        </td>
                        <td>{{$row->jenis}}</td>
                        <td>{{$row->persyartan}}</td>
                        <td>{{$row->biaya}}</td>
                        <td>{{$row->waktu}}</td>
                        <td>{{$row->alurl}}</td>
                        <td>{{$row->telepon}}</td>

                        <td>
                            <a href="{{ route ('standar.show', [$row->id])}}" class="btn btn-success btn-sm">Show</a>
                            <a href="{{ route ('standar.edit', [$row->id])}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('standar.destroy', [$row->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('yakin ingin hapus ?')">
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
            {{$standar->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection
