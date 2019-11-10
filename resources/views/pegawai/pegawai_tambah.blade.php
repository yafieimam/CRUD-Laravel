<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Tambah Data Pegawai</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('pegawai/header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('pegawai/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/pegawai">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Pegawai</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form role="form" method="post" action="/pegawai/proses_simpan">
            <div class="card-body">
				{{ csrf_field() }}
                <div class="form-group">
					<label>Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Pegawai..">
					@if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif
				</div>
                <div class="form-group">
					<label>Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email Pegawai..">
					@if($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email')}}
                        </div>
                    @endif
				</div>
				<div class="form-group">
					<label>Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Alamat Pegawai ..."></textarea>
					@if($errors->has('alamat'))
                        <div class="text-danger">
                            {{ $errors->first('alamat')}}
                        </div>
                    @endif
				</div>
				<div class="form-group">
					<label>Nomor Telepon</label>
                    <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Nomor Telepon Pegawai..">
					@if($errors->has('no_telp'))
                        <div class="text-danger">
                            {{ $errors->first('no_telp')}}
                        </div>
                    @endif
				</div>
            </div>

            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Tambah">
            </div>
        </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('pegawai/footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
