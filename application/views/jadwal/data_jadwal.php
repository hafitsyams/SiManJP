<section class="content-header">
    <h1>Jadwal</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Jadwal Kegiatan</h3>
            <?php if($this->session->userdata('jabatan')== "Admin" || $this->session->userdata('jabatan')== "Staf") { ?>
                <div class="pull-right">
                    <a href="<?=site_url('jadwal/tambah')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus-square"></i>Tambah Jadwal</a>
                </div>
            <?php } ?>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example2">
                <thead>
                    <tr>
                        <th>Sekolah</th>
                        <th>Materi Program</th>
                        <th>Kelas / Ruangan</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Pengajar 1</th>
                        <th>Pengajar 2</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                <?php $user = $this->m_user->pengajar(); ?>
                    <?php foreach ($row as $data){ ?>                  
                        <tr>                        
                            <td><?php echo $data['namasekolah']; ?></td>
                            <td><?php echo $data['namamapel']; ?></td>
                            <td><?php echo $data['namakelas']; ?></td>
                            <td><?php if($data['kodehari'] == 1){
                                echo "Senin";
                            }else if($data['kodehari'] == 2){
                                echo "Selasa";
                            }else if($data['kodehari'] == 3){
                                echo "Rabo";
                            }else if($data['kodehari'] == 4){
                                echo "Kamis";
                            }else if($data['kodehari'] == 5){ 
                                echo "Jum'at";
                            } ?></td>
                            <td><?php echo $data['ketwaktu']; ?></td>
                            <td><?php if($data['iduser1'] != 1 ){ 
                                        echo $data['guru1'];
                             }else{ echo "<b><font color='red'>Belum Diisi</font></b>" ;} ?></td>
                            <td><?php if($data['iduser2'] != 1 ){ 
                                        echo $data['guru2'];
                             }else{ echo "<b><font color='red'>Belum Diisi</font></b>" ;} ?></td>          
                            <td class="text-center" width="160px">
                                <form action="<?=site_url('jadwal/hapus')?>" method="post">
                                    <?php if($this->session->userdata('jabatan')== "Admin" || $this->session->userdata('jabatan')== "Staf") {?>
                                        <input type="hidden" name="idjadwal" value="<?php echo $data['idjadwalkelas']; ?>">
                                        <button onclick="return confirm('Beneran?')" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i> Hapus</a>
                                        </button> 
                                        <a href="<?=site_url('jadwal/ubah/'.$data['idjadwalkelas'])?>" class="btn btn-primary btn-xs">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                    <?php }?>    
                                    <?php if($this->session->userdata('jabatan')== "Kepala" || $this->session->userdata('jabatan')== "Admin") {?>
                                        <a href="<?=site_url('jadwal/set/'.$data['idjadwalkelas'])?>" class="btn bg-purple btn-xs">
                                            <i class="fa fa-user"></i> Set Pengajar
                                        </a>
                                    <?php }?>
                                    <a id="set_dtl" class="btn btn-default btn-xs"
                                        data-toggle="modal" data-target="#modal-detail"
                                        data-kodejadwalkelas="<?php echo $data['kodejadwalkelas']; ?>"
                                        data-namasekolah="<?php echo $data['namasekolah']; ?>"
                                        data-namamapel="<?php echo $data['namamapel']; ?>"
                                        data-namakelas="<?php echo $data['namakelas']; ?>"
                                        data-tahun="<?php echo $data['tahun']; ?>"
                                        data-semester="<?php echo $data['semester']; ?>"
                                        data-kodehari="<?php echo $data['kodehari']; ?>"
                                        data-ketwaktu="<?php echo $data['ketwaktu']; ?>"
                                        data-guru1="<?php echo $data['guru1']; ?>"
                                        data-guru2="<?php echo $data['guru2']; ?>"
                                        data-jmlpert="<?php echo $data['jmlpert']; ?>">           
                                        <i class="fa fa-eye"></i> Detail 
                                    </a>
                                </form>
                            </td>
                        </tr>              
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Jadwal</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="">Kode Jadwal</th>
                            <td><span id="kodejadwalkelas"></span></td>
                        </tr>
                        <tr>
                            <th style="">Nama Sekolah</th>
                            <td><span id="namasekolah"></span></td>
                        </tr>
                        <tr>
                            <th style="">Materi Program</th>
                            <td><span id="namamapel"></span></td>
                        </tr>
                        <tr>
                            <th style="">Nama Kelas</th>
                            <td><span id="namakelas"></span></td>
                        </tr>
                        <tr>
                            <th style="">Tahun</th>
                            <td><span id="tahun"></span></td>
                        </tr>
                        <tr>
                            <th style="">Semester</th>
                            <td><span id="semester"></span></td>
                        </tr>
                        <tr>
                            <th style="">Hari</th>
                            <td><span id="kodehari"></span></td>
                        </tr>
                        <tr>
                            <th style="">Waktu</th>
                            <td><span id="ketwaktu"></span></td>
                        </tr>
                        <tr>
                            <th style="">Pengajar 1</th>
                            <td><span id="guru1"></span></td>
                        </tr>
                        <tr>
                            <th style="">Pengajar 2</th>
                            <td><span id="guru2"></span></td>
                        </tr>
                        <tr>
                            <th style="">Rencana Pertemuan</th>
                            <td><span id="jmlpert"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('click','#set_dtl', function(){
        var kodejadwalkelas = $(this).data('kodejadwalkelas');
        var namasekolah = $(this).data('namasekolah');
        var namamapel = $(this).data('namamapel');
        var namakelas = $(this).data('namakelas');
        var tahun = $(this).data('tahun');
        if($(this).data('semester')== "1" ){
            var semester = "Ganjil";
        }else{var semester = "Genap";}
        var kodehari = $(this).data('kodehari');
        if($(this).data('kodehari')== "1" ){
            var kodehari = "Senin";
        }else if($(this).data('kodehari')== "2" ){
            var kodehari = "Selasa";
        }else if($(this).data('kodehari')== "3" ){
            var kodehari = "Rabo";
        }else if($(this).data('kodehari')== "4" ){
            var kodehari = "Kamis";
        }else if($(this).data('kodehari')== "5" ){
            var kodehari = "Jum'at";
        }
        var ketwaktu = $(this).data('ketwaktu');
        if($(this).data('guru1')== "Admin" ){
            var guru1 = "Belum Diisi";
        }else{var guru1 = $(this).data('guru1');}
        if($(this).data('guru2')== "Admin" ){
            var guru2 = "Belum Diisi";
        }else{var guru2 = $(this).data('guru2');}
        var jmlpert = $(this).data('jmlpert');
        $('#kodejadwalkelas').text(kodejadwalkelas);
        $('#namasekolah').text(namasekolah);
        $('#namamapel').text(namamapel);
        $('#namakelas').text(namakelas);
        $('#kodehari').text(kodehari);
        $('#tahun').text(tahun);
        $('#semester').text(semester);
        $('#ketwaktu').text(ketwaktu);
        $('#guru1').text(guru1);
        $('#guru2').text(guru2);
        $('#jmlpert').text(jmlpert);
    });
});
</script>