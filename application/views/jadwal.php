<?php
$this->load->view('header');
?>

<body>

	<?php
	if ($this->session->flashdata('alert')=='sukses_insert'){
	    echo "<script>alert('Berhasil Insert Data');</script>";
	}else if ($this->session->flashdata('alert')=='sukses_edit'){
	    echo "<script>alert('Berhasil Edit Data');</script>";
	}else if ($this->session->flashdata('alert')=='sukses_hapus'){
	    echo "<script>alert('Berhasil Hapus Data');</script>";
	}
	?>

	<!-- .navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-nav">
			<a class="" href="#"><img src="<?php echo base_url(); ?>asset/img/Logo KPU.png" ></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<?php if ($this->session->userdata('level')!="admin") { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
					</li>
					<?php } ?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('C_profilcalon/') ?>">Profil Calon</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="<?php echo site_url('C_panduanpilih/') ?>">Panduan Memilih</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('C_timeline/') ?>">Timeline</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="<?php echo site_url('C_cekpemilih/') ?>">Cek Data Pemilih<span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('C_eventkpu/') ?>">Event KPU</a>
							</li>
			</ul>
			</div>
			<?php
				if ($this->session->userdata('level')!="admin") {
					echo '<a href="'.site_url("C_loginAdmin/").'" class="btn btn-warning btn-lg">Login</a>';
				}else {
					echo '<a href="'.site_url("C_loginAdmin/logout").'" class="btn btn-warning btn-lg">Logout</a>';
				}
			?>
	</nav>
	<!-- /.navbar -->

	<!-- .content -->
	<?php if ($this->session->userdata('level')=="admin") { ?>
	<div class="container" style="margin-top: 20px">
	<div class="col-md-12">
		<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th> No </th>
					<th> No KTP</th>
					<th> Nama</th>
					<th> Jenis Kelamin </th>
					<th> Alamat</th>
					<th> Agama</th>
					<th> Pekerjaan</th>
					<th> <center>Action</center></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				foreach ($pemilih as $data) {
				?>
				<tr>
					<td><?php echo $no++;?></td>
					<td><?php echo $data->no_ktp;?></td>
					<td><?php echo $data->nama; ?></td>
					<td><?php echo $data->jk; ?></td>
					<td><?php echo $data->alamat; ?></td>
					<td><?php echo $data->agama; ?></td>
					<td><?php echo $data->pekerjaan; ?></td>
					<td style="text-align: center;">
						<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit<?php echo $data->no_ktp; ?>"><i class="glyphicon glyphicon-pencil"></i></button>
						<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?php echo $data->no_ktp; ?>"><i class="glyphicon glyphicon-trash"></i></button>
					</td>
				</tr>

				<!-- Modal Edit -->
                <div id="edit<?php echo $data->no_ktp; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"></button>
                                <h4 class="modal-title">Edit Data Mahasiswa</h4>
                            </div>
                            <?php echo form_open("C_cekpemilih/edit"); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label" for="no_ktp">No KTP</label>
                                    <input type="text" class="form-control" disabled value="<?php echo $data->no_ktp;?>" id="no_ktp">
                                    <input type="hidden" name="no_ktp" class="form-control" value="<?php echo $data->no_ktp;?>" id="no_ktp" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo $data->nama;?>" id="nama" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="jk">Jenis Kelamin</label>
                                    <input type="text" name="jk" class="form-control" value="<?php echo $data->jk;?>" id="jk" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="<?php echo $data->alamat;?>" id="alamat" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="agama">Agama</label>
                                    <input type="text" name="agama" class="form-control" value="<?php echo $data->agama;?>" id="agama" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="pekerjaan">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control" value="<?php echo $data->pekerjaan;?>" id="pekerjaan" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                                <input type="submit" class="btn btn-primary" name="edit" value="Edit">
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <!-- Modal Edit -->

                <!-- Modal Hapus -->
                <div id="hapus<?php echo $data->no_ktp; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"></button>
                                <h4 class="modal-title">Anda Ingin Menghapus?</h4>
                                <?php echo form_open("C_cekpemilih/hapus"); ?>
                                <input type="hidden" name="no_ktp" class="form-control" value="<?php echo $data->no_ktp;?>" id="no_ktp" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-danger">Tidak</button>
                                <input type="submit" class="btn btn-primary" name="hapus" value="Hapus">
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <!-- Modal Hapus -->

				<?php } ?>
			</tbody>
		</table>

		<div class="row">
			<div class="col-lg-12">
				<center><button class="btnAdd short_btnAdd" data-toggle="modal" data-target="#tambah">Tambah Data</button></center>
			</div>
		</div>

		<!-- Modal Tambah -->
		<div id="tambah" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"></button>
						<h4 class="modal-title">Tambah Data Timeline</h4>
					</div>
					<?php echo form_open("C_cekpemilih/add"); ?>
					<div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="no_ktp">No KTP</label>
                            <input type="text" name="no_ktp" class="form-control" value="" id="no_ktp" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" value="" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="jk">Jenis Kelamin</label>
                            <input type="text" name="jk" class="form-control" value="" id="jk" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="" id="alamat" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="agama">Agama</label>
                            <input type="text" name="agama" class="form-control" value="" id="agama" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="pekerjaan">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" value="" id="pekerjaan" required>
                        </div>
                    </div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-danger">Reset</button>
						<input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
		<!-- Modal Tambah -->

	</div>
</div>
<?php } else{
	if($this->session->flashdata('cari_pemilih') == ''){ ?>
		<div class="container">
		 <div class="row-search">
			 <div class="row">
				 <div class="col-sm-8 col-md-8 col-lg-8 center">
					 <h1>Pencarian Data Pemilih</h1>
				 </div>
				 <div class="col-lg-12">
					 <hr style="background-color: green; height:2px; margin-bottom: 2%;">
				 </div>
			 </div>
			 <?php echo form_open('C_cekpemilih/cari'); ?>
			 <div class="row ">
				 <div class="col-sm-2 col-md-2 col-lg-2 center right">Nama</div>
				 <div class="col-sm-10 col-md-10 col-lg-10 left"><input name="nama" type="text" class="form-control input-search" placeholder="Masukkan Nama Anda"></div>
			 </div>
			 <div class="row ">
				 <div class="col-sm-2 col-md-2 col-lg-2 center right">NIK</div>
				 <div class=" col-sm-10 col-md-10 col-lg-10 left"><input name="no_ktp" type="text" class="form-control input-search" placeholder="Masukkan Nomor Induk Kependudukan"></div>
			 </div>
			 <div class="row">
				 <div class="col-sm-2 col-md-2 col-lg-2"></div>
				 <div class="col-sm-10 col-md-10 col-lg-10">
					 <input type="submit" value="Cari" class="btn_Search btn-primary">
				 </div>
			 </div>
			 <?php echo form_close(); ?>
			 <div class="row">
				 <div class="col-lg-12">
					 <div class="text-danger warning-buttom">Pastikan Nama dan NIK yang Anda masukkan sudah benar</div>
				 </div>
			 </div>
		 </div>
	 </div>
 <?php }else if($this->session->flashdata('cari_pemilih') == 'not found'){ ?>
		 <div class="container">
 		 <div class="row-search">
 			 <div class="row">
 				 <div class="col-sm-8 col-md-8 col-lg-8 center">
 					 <h1>Hasil Pencarian Data Pemilih NO</h1>
 				 </div>
 				 <div class="col-lg-12">
 					 <hr style="background-color: green; height:2px; margin-bottom: 2%;">
 				 </div>
 			 </div>
			</div>
		 	</div>
	 <?php }else{ ?>
		 <div class="container">
 		 <div class="row-search">
 			 <div class="row">
 				 <div class="col-sm-8 col-md-8 col-lg-8 center">
 					 <h1>Hasil Pencarian Data Pemilih</h1>
 				 </div>
 				 <div class="col-lg-12">
 					 <hr style="background-color: green; height:2px; margin-bottom: 2%;">
 				 </div>
 			 </div>
			 	<div class="row">
					<div class="col-lg-4">No KTP
					</div>
					<div class="col-lg-8"> <?php echo $hasil->no_ktp; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">Nama
					</div>
					<div class="col-lg-8"> <?php echo $hasil->nama; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">Jenis Kelamin
					</div>
					<div class="col-lg-8"> <?php echo $hasil->jk; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">Alamat
					</div>
					<div class="col-lg-8"> <?php echo $hasil->alamat; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">Agama
					</div>
					<div class="col-lg-8"> <?php echo $hasil->agama; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">Pekerjaan
					</div>
					<div class="col-lg-8"> <?php echo $hasil->pekerjaan; ?>
					</div>
				</div>
			</div>
		 	</div>
	<?php } ?>
<?php } ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>

