<section class="content-header">
    <h1>Laporan Absen Nilai </h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Laporan Absen Nilai</h3>
            <div class="pull-right">
                <a href="<?=site_url('absen/pdf/'.$_POST['kelas'])?>" target="_blank" class="btn btn-primary btn-flat">
                <i class="fa fa-print"></i> Cetak</a>
                <a href="<?=site_url('absen')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i >Kembali</a>
            </div>
        </div>
        <div class="box-body">
        <!-- <?php print_r($berita);?>
        <?php print_r($keterangan);?> -->

            <table class="table">
                <tr>
                    <td width="90px"><b>Sekolah :</b></td>
                    <td width="200px">
                        <?php foreach($keterangan as $data) {?>
                        <?php echo $data['namasekolah']?>
                        <?php }?>
                    </td>
                    <td width="90px"><b>Hari :</b></td>
                    <td width="">
                        <?php foreach($keterangan as $data) {?>
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
                        <?php foreach($keterangan as $data) {?>
                        <?php echo $data['guru1']?> &
                        <?php echo $data['guru2']?>
                        <?php }?>
                    </td>
                    
                </tr>
                <tr>
                    <td><b>Kelas :</b></td>
                    <td>
                        <?php foreach($keterangan as $data) {?>
                        <?php echo $data['namakelas']?>
                        <?php }?>
                    </td>
                    <td><b>Jam :</b></td>
                    <td>
                        <?php foreach($keterangan as $data) {?>
                        <?php echo $data['ketwaktu']?>
                        <?php }?>
                    </td>
                    <td><b>Materi :</b></td>
                    <td>
                        <?php foreach($keterangan as $data) {?>
                        <?php echo $data['namamapel']?>
                        <?php }?>
                    </td>
                </tr>
            </table></br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" >
                    <thead>
                        <tr>
                            <th class="text-center" rowspan="2">No</th>
                            <th class="text-center col-md-2" rowspan="2">Nama Siswa</th>
                            <th class="text-center col-md-5" colspan="4">Kehadiran</th>
                            <th class="text-center col-md-5" colspan="4">Nilai</th>
                            <!-- <th class="text-center" rowspan="2">Keterangan</th> -->
                            <tr>
                                <th class="text-center col-md-1">Hadir</th>
                                <th class="text-center col-md-1">Absen</th>
                                <th class="text-center col-md-1">Sakit</th>
                                <th class="text-center col-md-1">Izin</th>                        
                                <th class="text-center col-md-1">Tugas</th>
                                <th class="text-center col-md-1">TA</th>
                                <th class="text-center col-md-1">Sikap</th>
                                <th class="text-center col-md-1">Total</th>
                                                       
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        <?php foreach ($laporan as $data) {?>
                            <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td><?php echo $data->namasiswa; ?></td>
                                <td class="text-center"><?php echo $data->hadir; ?></td>
                                <td class="text-center"><?php echo $data->absen; ?></td>
                                <td class="text-center"><?php echo $data->sakit; ?></td>
                                <td class="text-center"><?php echo $data->izin; ?></td>
                                <td class="text-center">
                                    <?php $tugas = $data->nilai_tugas/($data->hitung-1); 
                                        if($tugas > 70){
                                            echo $tugas;
                                        }else{
                                            echo "<b><font color='red'>".$tugas."</font></b>";
                                        }
                                    ?></td>
                                <td class="text-center"><?php $ta = $data->nilai_tugas_akhir;
                                echo $ta ?></td>
                                <td class="text-center">
                                    <?php $sikap = $data->nilai_sikap/$data->hitung; 
                                        if($sikap > 89){
                                            echo "A";
                                        }else if($sikap > 79){
                                            echo "B+";
                                        }else{
                                            echo "B";
                                        }
                                    ?></td>
                                <td class="text-center"><?php $total = $tugas*0.3+$sikap*0.3+$ta*0.4?>
                                <?php echo $total;?></td>
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