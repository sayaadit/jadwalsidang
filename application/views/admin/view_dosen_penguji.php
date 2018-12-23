<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url('c_user')?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>J</b>S</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Jadwal</b>Sidang</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url('assets/Admin/dist/img/user2-160x160.jpg');?>" class="user-image" alt="User Image">
                <span class="hidden-xs"> <?php echo $this->session->userdata('username')?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url('assets/Admin/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
                  <p>
                    <?php
                    $text = $this->session->userdata('username')." - ".$this->session->userdata('hak_akses');
                    echo $text;
                    ?>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url('c_user/keluar');?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo base_url('assets/Admin/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $this->session->userdata('username') ;?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Jadwal Sidang</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li ><a href="<?php echo base_url('c_jadwal_sidang');?>"><i class="fa fa-circle-o"></i> List Jadwal Sidang</a></li>
              <li class="active" ><a href="<?php echo base_url('c_list_dosen');?>"><i class="fa fa-circle-o"></i>  List Dosen Penguji </a></li>
              <li ><a href="<?php echo base_url('c_list_mahasiswa');?>"><i class="fa fa-circle-o"></i> List Mahasiswa </a></li
            </ul>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        List Dosen Penguji
        <small>Dashboard</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">List Dosen Penguji</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Main row -->
        <div class="row">
          <div class="box">
            <div class="box-header">
              <a href="#tambahdsn" data-toggle="modal"> <button type="button" class="btn btn-success"><i class="fa fa-external-link"></i>Tambah<span class="" aria-hidden="true"></span></button></a>
            </div>
            <div class="box-body">
              <table id="table_dosen" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Kode Dosen</th>
                    <th>Nama Dosen</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($dosen as $dsn):
                  ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $dsn->kode_dosen;?></td>
                    <td><?php echo $dsn->nama_dosen;?></td>
                    <td>
                      <a href="#view<?php echo $dsn->kode_dosen;?>" data-toggle="modal"> <button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>Edit<span class="" aria-hidden="true"></span></button></a>
                      <a href="<?php echo base_url('c_list_dosen/hapus_dsn/'.$dsn->kode_dosen);?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>
                      <!-- Modal Edit -->
                      <div  role="dialog" tabindex="" id="view<?php echo $dsn->kode_dosen; ?>" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit dosen</h4>
                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <form action="<?php echo base_url('c_list_dosen/edit_dsn/'.$dsn->kode_dosen); ?>" method="post">
                                  
                                  <table class="table-form">
                                    <tr>
                                      <td width="20%">Kode Dosen </td><td><b>
                                    <input type="text"  name="kode_dosen"  class="form-control"  value="<?php echo $dsn->kode_dosen;?>" readonly></b></td>
                                  </tr>
                                  <tr>
                                    <td width="30%">Nama </td><td><b>
                                  <input type="text" name="nama_dosen"  class="form-control"   value="<?php echo $dsn->nama_dosen;?>" required></b></td>
                                </tr>
                                
                              </table>
                              <br>
                              <button type="submit"  class="btn btn-success" value="submit"><i class="fa fa-check icon-white"></i> Simpan</button>
                            </form>
                          </div>
                        </div>
                        
                        
                        <div class="modal-footer">
                          <button type="button" class="btn btn-warning" data-dismiss="modal"> Back</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <!-- END Edit  -->
                </td>
              </tr>
              <?php $no++; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
</div>
<!-- Modal Edit -->
<div  role="dialog" tabindex="" id="view<?php echo $dsn->kode_dosen; ?>" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit dosen</h4>
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form action="<?php echo base_url('c_list_dosen/edit_dsn/'.$dsn->kode_dosen); ?>" method="post">
            
            <table class="table-form">
              <tr>
                <td width="20%">kode_dosen </td><td><b>
              <input type="text"  name="nim_baru"  class="form-control"  value="<?php echo $dsn->kode_dosen;?>" readonly></b></td>
            </tr>
            <tr>
              <td width="30%">Nama </td><td><b>
            <input type="text" name="nama_baru"  class="form-control"   value="<?php echo $dsn->nama;?>" required></b></td>
          </tr>
          
        </table>
        <br>
        <button type="submit"  class="btn btn-success" value="submit"><i class="fa fa-check icon-white"></i> Simpan</button>
      </form>
    </div>
  </div>
  
  
  <div class="modal-footer">
    <button type="button" class="btn btn-warning" data-dismiss="modal"> Back</button>
  </div>
  
</div>
</div>
</div>
<!-- END Edit  -->
<!-- Modal Edit -->
<div  role="dialog" tabindex="" id="tambahdsn" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Tambah Dosen</h4>
    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <form action="<?php echo base_url('c_list_dosen/insert_dsn'); ?>" method="post">
        
        <table class="table-form">
          <tr>
            <td width="20%">Kode Dosen </td><td><b>
          <input type="text"  name="kode_dosen"  class="form-control" required></b></td>
        </tr>
        <tr>
          <td width="30%">Nama </td><td><b>
        <input type="text" name="nama_dosen"  class="form-control"  required></b></td>
      </tr>
      
    </table>
    <br>
    <button type="submit"  class="btn btn-success" value="submit"><i class="fa fa-check icon-white"></i> Simpan </button>
  </form>
</div>
</div>


<div class="modal-footer">
<button type="button" class="btn btn-warning" data-dismiss="modal"> Back </button>
</div>

</div>
</div>
</div>
<!-- END Edit  -->