<section class="content-header">
  <h1>Sistem Informasi Kegiatan Join Program</h1>
</section>

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"> Dashboard </h3>
    </div>
    <div class="box-body">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <h3><?php echo $totalpengajar?></h3>
            <p>Jumlah Sekolah</p>
          </div>
          <div class="icon">
            <i class="ion ion-earth"></i>
          </div>
          <?php if($this->session->userdata('jabatan')=='Admin' || $this->session->userdata('jabatan')=='Staf') {?>
            <a href="<?=site_url('sekolah/tambah')?>" class="small-box-footer">Tambah Sekolah <i class="fa fa-plus-square"></i></a>
          <?php }else {?>
            <a href="<?=site_url('sekolah')?>" class="small-box-footer">Sekolah <i class="fa fa-building-o"></i></a>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $totalpengajar?></h3>
            <p>Jumlah Pengajar</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <?php if($this->session->userdata('jabatan')=='Admin' || $this->session->userdata('jabatan')=='Staf') {?>
            <a href="<?=site_url('pengajar/add')?>" class="small-box-footer">Tambah Pengajar <i class="fa fa-plus-square"></i></a>
          <?php }else {?>
            <a href="<?=site_url('pengajar')?>" class="small-box-footer">Pengajar <i class="fa fa-user"></i></a>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-teal">
          <div class="inner">
            <h3><?php echo $totalmapel?></h3>
            <p>Jumlah Materi Program</p>
          </div>
          <div class="icon">
            <i class="ion ion-ribbon-b"></i>
          </div>
          <?php if($this->session->userdata('jabatan')=='Admin' || $this->session->userdata('jabatan')=='Staf') {?>
            <a href="<?=site_url('mapel/tambah')?>" class="small-box-footer">Tambah Materi Program <i class="fa fa-plus-square"></i></a>
          <?php }else {?>
            <a href="<?=site_url('mapel')?>" class="small-box-footer">Materi Program <i class="fa fa-book"></i></a>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
          <div class="inner">
            <h3><?php echo $totaljadwal?></h3>
            <p>Jumlah Jadwal Aktif</p>
          </div>
          <div class="icon">
            <i class="ion ion-trophy"></i>
          </div>
          <?php if($this->session->userdata('jabatan')=='Admin' || $this->session->userdata('jabatan')=='Staf') {?>
            <a href="<?=site_url('jadwal/tambah')?>" class="small-box-footer">Tambah Jadwal <i class="fa fa-plus-square"></i></a>
          <?php }else {?>
            <a href="<?=site_url('jadwal')?>" class="small-box-footer">Jadwal Kegiatan<i class="fa fa-book"></i></a>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Laporan</h3>
    </div>
    <div class="box-body">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-maroon">
          <div class="inner">
            <h3><?php echo $totalpertemuan?></h3>
            <p>Berita Acara</p>
          </div>
          <div class="icon">
            <i class="ion ion-flag"></i>
          </div>
          <?php if($this->session->userdata('jabatan')=='Admin' || $this->session->userdata('jabatan')=='Staf' || $this->session->userdata('jabatan')=='Kepala') {?>
            <a href="<?=site_url('pertemuan/pilihberita')?>" class="small-box-footer">Berita Acara <i class="fa fa-flag"></i></a>
          <?php }else {?>
            <a href="<?=site_url('pertemuan/pilihberita')?>" class="small-box-footer">Berita Acara<i class="fa fa-flag"></i></a>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <h3><?php echo "∞"?></h3>
            <p>Laporan Daftar Hadir dan Nilai</p>
          </div>
          <div class="icon">
            <i class="ion ion-lightbulb"></i>
          </div>
          <?php if($this->session->userdata('jabatan')=='Admin' || $this->session->userdata('jabatan')=='Staf' || $this->session->userdata('jabatan')=='Kepala') {?>
            <a href="<?=site_url('absen/lap_nilai')?>" class="small-box-footer">Absensi & Nilai <i class="fa fa-lightbulb"></i></a>
          <?php }else {?>
            <a href="<?=site_url('absen/lap_nilai')?>" class="small-box-footer">Absensi & Nilai<i class="fa fa-lightbulb"></i></a>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</section>