<section class="content-header">
    <h1>Nilai</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Nilai Siswa</h3>
            <div class="pull-right">
                <a href="<?=site_url('')?>" class="btn btn-primary btn-flat">
                <i class="fa fa-file-pdf-o"></i> Laporan</a>
                <a href="<?=site_url('nilai')?>" class="btn btn-warning btn-flat">
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

            <div class="table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nilai Tugas</th>
                            <th>Nilai Sikap</th>
                            <th>Nilai TA</th>
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
                                <td><input type="text" name="nilai_tugas[]" class="form-control"></td>
                                <td><input type="text" name="nilai_sikap[]" class="form-control"></td>
                                <td><input type="text" name="nilai_tugas_akhir[]" class="form-control"></td>
                                <td><input type="text" name="keterengan[]" class="form-control"></td>
                            </tr>
                        <?php } ?>    
                    </tbody>
                </table> 
                <div class="form-group col-md-offset-5">
                    <button type="submit" name="" class="btn btn-success btn-flat">
                        <i class="fa fa-check"> Simpan</i></button>
                    <button type="reset" class="btn btn-flat bg-red">
                        <i class="fa fa-ban"> Batal</i></button>
                </div>
            </div>       
        </div>
    </div>
</section>