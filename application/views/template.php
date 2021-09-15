<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMANJP</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?=base_url('dashboard')?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>JP</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Siman</b>JP</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-danger">3</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 3 tasks</li>
                <li>    
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <h3>Design Some Buttons
                          <small class="pull-right"> 20%</small>
                        </h3>
					  <div class="progress xs">
					  	<div class="progress-bar progress-bar-aqua" style="width: 20%" role = "progressbar">
						  <span class="sr-only">20% Complete</span>
						  </div>
					  </div>
                      </a>
                    </li>
                  </ul>
                </li>
              <li class="footer"><a href="#">Ndasmua</a></li>
            </ul>
          </li> -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image"> -->
              <img src="<?=base_url()?>assets/dist/img/sandi.jpg" class="user-image">
              <span class="hidden-xs"><?=$this->fungsi->user_login()->namauser?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>assets/dist/img/sandi.jpg" class="img-circle" alt="User Image">

                <p><?=$this->fungsi->user_login()->namauser?>
                  <small><?=$this->fungsi->user_login()->jabatan?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-footer">
                <div class="pull-left">
                    <a href="<?=site_url("profil/q/".$this->fungsi->user_login()->iduser)?>" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                    <a href="<?=site_url("auth/logout")?>" class="btn btn-default bg-red">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->fungsi->user_login()->namauser?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ""?>>
          <a href="<?=site_url('dashboard')?>">
            <i class="fa fa-dashboard"> </i><span>Dashboard</span></a>
        </li>
        <li <?=$this->uri->segment(1) == 'sekolah' ? 'class="active"' : ""?>>
          <a href="<?=site_url('sekolah')?>">
            <i class="fa fa-building-o"> </i><span>Sekolah</span></a>
        </li>
		    <li <?=$this->uri->segment(1) == 'mapel' ? 'class="active"' : ""?>>
          <a href="<?=site_url('mapel')?>">
            <i class="fa fa-book"> </i><span>Materi Program</span></a>
        </li>
		    <li <?=$this->uri->segment(1) == 'pengajar' ? 'class="active"' : ""?>>
          <a href="<?=site_url('pengajar')?>">
            <i class="fa fa-user"> </i><span>Pengajar</span></a>
        </li>
		    <li <?=$this->uri->segment(1) == 'jadwal' ? 'class="active"' : ""?>>
          <a href="<?=site_url('jadwal')?>">
            <i class="fa fa-lightbulb-o"> </i><span>Jadwal</span></a>
        </li>
		    <li class="treeview <?=$this->uri->segment(1) == 'pertemuan' || $this->uri->segment(1) == 'absen' || $this->uri->segment(1) == 'nilai' || $this->uri->segment(1) == 'siswa' ? "active" : ''?>">
          <a href="#">
            <i class="fa fa-list"> </i><span>Pertemuan</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('pertemuan')?>"><i class="fa fa-file-text-o"> </i><span>Pertemuan Kegiatan</span></a></li>
            <li><a href="<?=site_url('absen')?>"><i class="fa fa-trophy"> </i><span>Absensi dan Nilai</span></a></li>
            <!-- <li><a href="<?=site_url('absen/lap_nilai')?>"><i class="fa fa-trophy"> </i><span>Lap. Absensi dan Nilai</span></a></li> -->
            <!--<li><a href="<?=site_url('nilai')?>"><i class="fa fa-trophy"> </i><span>Nilai</span></a></li>-->
            <li><a href="<?=site_url('siswa')?>"><i class="fa fa-users"> </i><span>Data Siswa</span></a></li>
          </ul>
        </li>
        <?php if($this->session->userdata('jabatan')=="Admin") { ?>
        <li <?=$this->uri->segment(1) == 'user' ? 'class="active"' : ""?>>
          <a href="<?=site_url('user')?>">
            <i class="fa fa-user-secret"> </i><span>User</span></a>
        </li>
        <?php }?>  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <?php echo $contents ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.23.456
    </div>
    <strong>Copyright &copy; 2021 <a href="#">HS</a>.</strong> All rights
    reserved.
  </footer>

</div>

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>

<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable({
      "aLengthMenu" : [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "iDisplayLength": 5
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'pageLength'  : 5
    })
    $('.example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'pageLength'  : 5
    })
  })

  $('#datepicker').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true
  })
</script>

</body>
</html>