<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/3.1.0/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1.0/daterangepicker.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
</head>

<body>
    <div class="row ">
        <div class="col-12">
          <div class="card card-success">
            <div class="card-header">
                <h3>Detail Berita Dari {{$standar->jenis}}</h3>
            </div>
            <div class="card-body table-responsive">
                <a href="{{route('tampil2')}}" class="btn btn-secondary btn-sm">Back</a>
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


      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
      <!-- ChartJS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
      <!-- Sparkline -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
      <!-- JQVMap -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-knob/1.2.9/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1.0/daterangepicker.min.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/3.1.0/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/demo.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/pages/dashboard.js"></script>

</body>
</html>

