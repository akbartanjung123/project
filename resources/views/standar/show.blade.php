@extends('layouts.bootstrap')

@section('title')
Details Berita
@endsection

@section('content')
<div class="row ">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Detail Berita Dari {{$standar->jenis}}</h3>
        </div>
        <div class="card-body table-responsive">
            <a href="{{route('standar.index')}}" class="btn btn-secondary btn-sm">Back</a>
            <hr/>

            <table class="table table-bordered">
                <h5>Pembuat Content</h5>
                <tr>
                    <td width="30%">Jenis</td>
                    <td>:</td>
                    <td>{{$standar->jenis}}</td>
                </tr>


                <tr>
                    <td width="30%">Persyaratan</td>
                    <td>:</td>
                    <td>{{$standar->persyartan}}</td>
                </tr>




                <tr>
                    <td>Tanggal Dibuat</td>
                    <?php
                        use Carbon\Carbon;
                        setlocale(LC_TIME, 'id_ID');
                        Carbon::setLocale('id');
                        $updated_at = $standar ? Carbon::createFromFormat('Y-m-d H:i', $standar->updated_at)->setTimezone('Asia/Makassar') : null;
                    ?>

                    <td>:</td>
                    <td>
                        @if ($updated_at)
                            <span class="badge badge-danger" style="font-size: 14px">
                                {{ $updated_at->isoFormat('dddd, D MMMM YYYY') }}
                            </span>
                        @endif
                    </td>
                </tr>

            </table>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>



@endsection

