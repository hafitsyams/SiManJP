<section class="content-header">
    <h1>Absensi Dan Nilai</h1>
</section>

<section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pilih Kelas</h3>
                <div class="pull-right">
                    <a href="<?=site_url('absen/lap_nilai')?>" class="btn bg-blue btn-flat">
                    <i class="fa fa-cube"></i> Laporan Absen Nilai</a>  
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('absen/tampil')?>" method="post">
                        <div class="form-group">
                            <label>Sekolah</label>
                            <select name="sekolah" class="form-control" id="sekolah" required>
                                <option value="0"> - Pilih - </option>
                                    <?php foreach($sekolah->result() as $data):?>
                                        <option value="<?php echo $data->idsekolah;?>"> <?php echo $data->namasekolah?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>    
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="kelas" class="form-control" id="kelas">
                                <option value=""> - Pilih - </option>
                            </select>
                        </div>    
                        <div class="form-group">
                            <label>Pertemuaan Ke-</label>
                            <select name="pertemuan" class="form-control" id="pertemuan" required>
                                <option value=""> - Pilih - </option>
                            </select>  
                        </div>
                        
                        <div class="form-group col-md-offset-4">
                            <button type="submit" name="kirim" class="btn btn-success btn-flat" required>
                                <i class="fa fa-taxi"></i> Pilih
                            </button>
                        </div>        
                    </form>   
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
        $('#kelas').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>absen/ambilpertemuan",
                method : "POST",
                data : {id: id},
                // async : false,
                dataType : 'json',
                success: function(data){
                    var html = '<option value=""> - Pilih - </option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].idpertemuan+'">'+data[i].pertemuan_ke+'</option>';
                    }
                    $('#pertemuan').html(html);                    
                }
            });
        });
    });
</script>