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
        <a href="javascript:void(0)" id="create-new-pegawai" class="btn btn-block btn-primary">Tambah Data</a>
		<br><br>
		<table id="table_pegawai" class="table table-bordered table-hover">
                <thead>
                <tr>
				  <th>ID</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Nomor Telepon</th>
                  <th>Opsi</th>
                </tr>
                </thead>
				
              </table>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
	<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="pegawaiCrudModal"></h4>
		</div>
		<div class="modal-body">
			<form id="pegawaiForm" name="pegawaiForm" class="form-horizontal">
			   <input type="hidden" name="pegawai_id" id="pegawai_id">
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-12">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Name" value="" maxlength="50" required="">
					</div>
				</div>
	 
				<div class="form-group">
					<label class="col-sm-2 control-label">Email</label>
					<div class="col-sm-12">
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" required="">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Alamat</label>
					<div class="col-sm-12">
						<textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Enter Address"></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">No Telp</label>
					<div class="col-sm-12">
						<input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Enter Phone Number" value="" required="">
					</div>
				</div>
				
				<div class="col-sm-offset-2 col-sm-10">
				 <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
				 </button>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			
		</div>
	</div>
	</div>
	</div>

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
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script>
var SITEURL = '{{URL::to('')}}';
 $(document).ready( function () {
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $('#table_pegawai').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: SITEURL + "ajax-crud-list",
          type: 'GET',
         },
         columns: [
                  {data: 'id_pegawai', name: 'id', 'visible': false},
                  {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                  { data: 'nama_pegawai', name: 'nama' },
                  { data: 'email_pegawai', name: 'email' },
				  { data: 'alamat_pegawai', name: 'alamat' },
				  { data: 'no_telp_pegawai', name: 'no_telp' },
                  { data: 'created_at', name: 'created_at' },
                  {data: 'action', name: 'action', orderable: false},
               ],
        order: [[0, 'desc']]
      });
 /*  When user click add user button */
    $('#create-new-pegawai').click(function () {
        $('#btn-save').val("create-pegawai");
        $('#pegawai_id').val('');
        $('#pegawaiForm').trigger("reset");
        $('#pegawaiCrudModal').html("Add New Pegawai");
        $('#ajax-crud-modal').modal('show');
    });
 
   /* When click edit user */
    $('body').on('click', '.edit-pegawai', function () {
      var user_id = $(this).data('id_pegawai');
      $.get('ajax-crud-list/' + user_id +'/edit', function (data) {
         $('#name-error').hide();
         $('#email-error').hide();
         $('#pegawaiCrudModal').html("Edit Pegawai");
          $('#btn-save').val("edit-pegawai");
          $('#ajax-crud-modal').modal('show');
          $('#pegawai_id').val(data.id);
          $('#nama').val(data.name);
          $('#email').val(data.email);
		  $('#alamat').val(data.alamat);
		  $('#no_telp').val(data.no_telp);
      })
   });
    $('body').on('click', '#delete-pegawai', function () {
 
        var pegawai_id = $(this).data("id_pegawai");
        confirm("Are You sure want to delete !");
 
        $.ajax({
            type: "get",
            url: SITEURL + "ajax-crud-list/delete/"+pegawai_id,
            success: function (data) {
            var oTable = $('#table_pegawai').dataTable(); 
            oTable.fnDraw(false);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });   
   });
 
if ($("#pegawaiForm").length > 0) {
      $("#pegawaiForm").validate({
 
     submitHandler: function(form) {
 
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
      
      $.ajax({
          data: $('#pegawaiForm').serialize(),
          url: SITEURL + "ajax-crud-list/store",
          type: "POST",
          dataType: 'json',
          success: function (data) {
 
              $('#pegawaiForm').trigger("reset");
              $('#ajax-crud-modal').modal('hide');
              $('#btn-save').html('Save Changes');
              var oTable = $('#table_pegawai').dataTable();
              oTable.fnDraw(false);
              
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}
</script>
</body>
</html>
