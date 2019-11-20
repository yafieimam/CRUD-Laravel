<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Data Pegawai</title>

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
  <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.bootstrap.css') }}">
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
            <h1 class="m-0 text-dark">Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/pegawai">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
		<a href="javascript:void(0)" id="tambah_data" class="btn btn-block btn-primary">Tambah Data</a>
		<br><br>
		<table class="table table-bordered table-hover table-pegawai">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Nomor Telepon</th>
				  <th width="280px">Opsi</th>
                </tr>
                </thead>
              </table>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
	<div class="modal fade" id="ajaxModel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="modelHeading"></h4>
				</div>
				<div class="modal-body">
					<form id="pegawaiForm" name="pegawaiForm" class="form-horizontal">
					   <input type="hidden" name="id_pegawai" id="id_pegawai">
						<div class="form-group">
							<label for="nama" class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama..." value="" maxlength="50" required="">
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-12">
								<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email..." value="" maxlength="50" required="">
							</div>
						</div>
		 
						<div class="form-group">
							<label class="col-sm-2 control-label">Alamat</label>
							<div class="col-sm-12">
								<textarea id="alamat" name="alamat" required="" placeholder="Masukkan Alamat..." class="form-control"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label for="no_telp" class="col-sm-2 control-label">Nomor Telepon</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telepon..." value="" maxlength="50" required="">
							</div>
						</div>
		  
						<div class="col-sm-offset-2 col-sm-10">
						 <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Simpan Data
						 </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>CRUD Pegawai</h5>
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
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script>
$(function() {
	$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	
    var table = $('.table-pegawai').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('pegawai-datatable.index') }}",
        columns: [
            { data: 'nama_pegawai', name: 'nama' },
            { data: 'email_pegawai', name: 'email' },
            { data: 'alamat_pegawai', name: 'alamat' },
            { data: 'no_telp_pegawai', name: 'no_telp' },
			{ data: 'action', name: 'action', orderable: false, searchable: false},
		]
    });
	
	$('#tambah_data').click(function () {
        $('#saveBtn').val("create-pegawai");
        $('#id_pegawai').val('');
        $('#pegawaiForm').trigger("reset");
        $('#modelHeading').html("Create New Data Pegawai");
        $('#ajaxModel').modal('show');
    });
	
	$('body').on('click', '.editPegawai', function () {
      var product_id = $(this).data('id');
      $.get("{{ route('pegawai-datatable.index') }}" +'/' + id_pegawai +'/edit', function (data) {
          $('#modelHeading').html("Edit Data Pegawai");
          $('#saveBtn').val("edit-pegawai");
          $('#ajaxModel').modal('show');
          $('#id_pegawai').val(data.id_pegawai);
          $('#nama').val(data.nama_pegawai);
          $('#email').val(data.email_pegawai);
		  $('#alamat').val(data.alamat_pegawai);
		  $('#no_telp').val(data.no_telp_pegawai);
      })
   });
	
	$('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
          data: $('#pegawaiForm').serialize(),
          url: "{{ route('pegawai-datatable.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#pegawaiForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
	
	$('body').on('click', '.deletePegawai', function () {
     
        var id_pegawai = $(this).data("id_pegawai");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('pegawai-datatable.store') }}"+'/'+id_pegawai,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
</script>
</body>
</html>
