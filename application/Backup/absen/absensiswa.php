<section class="content-header">
    <h1>Absensi</h1>
</section>
<!--belum disimpan-->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Absen Siswa</h3>
            <div class="pull-right">
                <a href="<?=site_url('absen/laporanabsen/'.$_POST['kelas'])?>" class="btn btn-primary btn-flat">
                <i class="fa fa-file-pdf-o"></i> Laporan</a>
                <a href="<?=site_url('absen')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i >Kembali</a>
            </div>
        </div>
        <div class="box-body">
            <!-- <?php print_r($_POST); ?></br>
            <?php print_r($sekolah); ?></br>
            <?php print_r($kelas); ?></br>
            <?php print_r($tanggal); ?></br>
            <?php print_r($siswa); ?></br>
            <?php print_r($row); ?> -->
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
                        <?php echo $data['hari']?>
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
                        <?php echo $data['waktu']?>
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
            <form action="<?=site_url('absen/simpan')?>" method="post">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Kehadiran</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1?>
                            <?php foreach ($row as $data){ ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['namasiswa']; ?></td>
                                    <input type="hidden" name="idsiswa[]" value="<?php echo $data['idsiswa'];?>" class="form-control" required>
                                    <input type="hidden" name="pertemuan" value="<?php print_r($_POST['pertemuan']);?>" class="form-control" required>
                                    <input type="hidden" name="sekolah" value="<?php print_r($_POST['sekolah']);?>" class="form-control" required>
                                    <input type="hidden" name="kelas" value="<?php print_r($_POST['kelas']);?>" class="form-control" required>
                                    <td>
                                        <select name="kehadiran[]" class="form-control" required>
                                            <option value="0" > Absen </option>
                                            <option value="1" > Hadir </option>
                                            <option value="2" > Sakit </option>
                                            <option value="3" > Izin </option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="keterangan[]" class="form-control"></td>
                                </tr>
                            <?php } ?>    
                        </tbody>
                    </table> 
                    <div class="form-group col-md-offset-5">
                        <button type="submit" name="" class="btn btn-success btn-flat">
                            <i class="fa fa-check"> </i> Simpan</button>
                        <button type="reset" class="btn btn-flat bg-red">
                            <i class="fa fa-ban"> </i> Batal</button>
                    </div>
                </div>   
            </form>    
        </div>
    </div>
</section>