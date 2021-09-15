<section class="content-header">
    <h1>Absensi Dan Nilai</h1>
</section>
<!--sudah disimpan-->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Absen dan Nilai Siswa</h3>
            <div class="pull-right">
                <a href="<?=site_url('absen')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i >Kembali</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <tr>
                    <td width="90px"><b>Sekolah :</b></td>
                    <td width="200px">
                        <?php foreach($sekolah as $data) {?>
                        <?php echo $data['namasekolah']?>
                        <?php }?>
                    </td>
                    <td width="90px"><b>Hari :</b></td>
                    <td width="">
                        <?php foreach($kelas as $data) {?>
                        <?php if($data['kodehari']==1){
                            echo "Senin";
                        }else if($data['kodehari']==2){
                            echo "Selasa";
                        }else if($data['kodehari']==3){
                            echo "Rabo";
                        }else if($data['kodehari']==4){
                            echo "Kamis";
                        }else{
                            echo "Jum'at";
                        }?>
                        <?php }?>
                    </td>
                    <td width="90px"><b>Pengajar :</b></td>
                    <td width="">
                        <?php foreach($kelas as $data) {?>
                        <?php echo $data['guru1']?> &
                        <?php echo $data['guru2']?>
                        <?php }?>
                    </td>
                    <td width="90px"><b>Pertemuan:</b></td>
                    <td>
                        <?php foreach($tanggal as $data) {?>
                        <?php echo $data['pertemuan_ke']?>
                        <?php }?>
                    </td>

                </tr>
                <tr>
                    <td><b>Kelas :</b></td>
                    <td>
                        <?php foreach($kelas as $data) {?>
                        <?php echo $data['namakelas']?>
                        <?php }?>
                    </td>
                    <td><b>Jam :</b></td>
                    <td>
                        <?php foreach($kelas as $data) {?>
                        <?php echo $data['ketwaktu']?>
                        <?php }?>
                    </td>
                    <td><b>Materi :</b></td>
                    <td>
                        <?php foreach($kelas as $data) {?>
                        <?php echo $data['namamapel']?>
                        <?php }?>
                    </td>
                    <td><b>Tanggal :</b></td>
                    <td>
                        <?php foreach($tanggal as $data) {?>
                        <?php echo $data['tanggal']?>
                        <?php }?>
                    </td>
                </tr>
            </table></br>

            <div class="table">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center align-center" rowspan="2">No</th>
                            <th class="text-center align-center" rowspan="2">Nama Siswa</th>
                            <th class="text-center align-center" rowspan="2">Kehadiran</th>
                            <th class="text-center align-center" rowspan="2">Keterangan</th>
                            <th class="text-center" colspan="3">Nilai (Boleh Kosong)</th>
                            </tr>
                                <?php foreach($jmlpert as $data){?>
                                    <?php if($data['jmlpert']!=$data['pertemuan_ke']){?>
                                        <th class="text-center">Tugas</th>
                                    <?php }else{ ?>
                                        <th class="text-center">Tugas Akhir</th>
                                    <?php }} ?>
                                <th class="text-center">Sikap</th>
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1?>
                        <?php foreach ($row as $data){ ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['namasiswa']; ?></td>
                                <td><?php if($data['kehadiran'] == 0){
                                        echo "Absen";
                                        }else if($data['kehadiran'] == 1){
                                        echo "Hadir";
                                        }else if($data['kehadiran'] == 2){
                                        echo "Sakit";
                                        }else{ echo "Izin";}?>
                                </td>
                                <td><?php echo $data['keterangan'] ?></td>
                                    <?php if($data['jmlpert']!=$data['pertemuan_ke']){?>
                                        <td><?php echo $data['nilai_tugas']; ?></td>
                                    <?php }else{ ?>
                                        <td><?php echo $data['nilai_tugas_akhir']; ?></td>
                                    <?php } ?>
                                <td><?php if($data['nilai_sikap'] == 100){
                                        echo "A";
                                        }else if($data['nilai_sikap'] == 90){
                                        echo "B+";
                                        }else if($data['nilai_sikap'] == 80){
                                        echo "B";
                                        }else{ echo "-";}?>
                                </td>
                            </tr>
                        <?php } ?>    
                    </tbody>
                </table> 
                <!-- <div class="form-group col-md-offset-5">
                    <button type="submit" name="" class="btn btn-success btn-flat">
                        <i class="fa fa-check"> </i> Simpan</button>
                    <button type="reset" class="btn btn-flat bg-red">
                        <i class="fa fa-ban"> </i> Batal</button>
                </div> -->
            </div>       
        </div>
    </div>
</section>