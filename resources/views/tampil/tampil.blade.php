
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
              <h3>Data Pendaftar</h3>
          </div>
          <div class="card-body table-responsive">
              @include('alert.success')
              <br>
              <form method="GET" action="{{route('tampil')}}">
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

              <hr>
              <table class="table table-bordered">

          <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tanggal</th>
                      <th>Umur</th>
                      <th>Photo</th>

                  </tr>
          </thead>
                  <tbody>
                      @foreach ($tampil as $row )
                      <tr>
                          <td>{{ $loop->iteration + ($tampil->perPage() * ($tampil->currentPage() - 1) ) }}
                          </td>
                          <td>{{$row->nama}}</td>
                          <td>{{$row->tanggal}}</td>
                          <td>{{$row->umur}}</td>
                          <td>
                              <img src="{{$row->photo}}" alt="photo" width="60px">
                          </td>

                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
          <div class="card-footer">
              {{$tampil->links()}}
          </div>
        </div>
      </div>
    </div>
</body>
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
</html>
