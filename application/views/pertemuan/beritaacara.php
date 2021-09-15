<section class="content-header">
    <h1>Pertemuan</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Berita Acara Kegiatan</h3>
            <div class="pull-right">
                <a href="<?=site_url('pertemuan/pdf/'.$_GET['kelas'])?>" target="_blank" class="btn btn-primary btn-flat">
                <i class="fa fa-print"></i> Cetak</a>
                <a href="<?=site_url('pertemuan')?>" class="btn btn-warning btn-flat">
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

            <div class="table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ke -</th>
                            <th>Tanggal</th>
                            <th>Materi Bahasan</th>
                            <th>Metode</th>
                            <th>Pengajar 1 : 
                                <?php foreach($keterangan as $data) {?>
                                    <?php echo $data['guru1']?>
                                <?php }?>
                            </th>
                            <th>Pengajar 2 : 
                                <?php foreach($keterangan as $data) {?>
                                    <?php echo $data['guru2']?>
                                <?php }?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($berita as $data){ ?>
                            <tr>
                                <td><?php echo $data['pertemuan_ke']; ?></td>
                                <td><?php echo $data['tanggal']; ?></td>
                                <td><?php echo $data['materi']; ?></td>
                                <td><?php echo $data['metode']; ?></td>
                                <td><?php if($data['abspgjr1']==0){
                                        echo "Tidak Hadir";
                                    }else{ echo "Hadir";
                                } ?></td>
                                <td><?php if($data['abspgjr2']==0){
                                        echo "Tidak Hadir";
                                    }else{ echo "Hadir";
                                } ?></td>
                            </tr>
                        <?php } ?>    
                    </tbody>
                </table> 
            </div>
        </div>    
    </div>
</section>

<script src="//code.jquery.com/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#sekolah').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>pertemuan/ambilkelas",
                method : "POST",
                data : {id: id},
                // async : false,
                dataType : 'json',
                success: function(data){
                    var html = '<option value=""> - Pilih - </option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].idjadwalkelas+'">'+data[i].namakelas+'</option>';
                    }
                    $('#kelas').html(html);
                     
                }
            });
        });
    });
</script>