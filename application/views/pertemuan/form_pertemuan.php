<section class="content-header">
    <h1>Pertemuan</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Pertemuan</h3>
            <div class="pull-right">
                <a href="<?=site_url('pertemuan')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Kembali</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('pertemuan/proses')?>" method="post">
                    <?php if($page == "tambah") { ?>
                        <div class="form-group">
                            <label>Sekolah</label>
                            <select name="sekolah" class="form-control" id="sekolah">
                                <option value="0"> - Pilih - </option>
                                <?php foreach($sekolah->result() as $data):?>
                                <option value="<?php echo $data->idsekolah?>"> <?php echo $data->namasekolah?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Kelas</label>
                                <select name="kelas" class="form-control" id="kelas">
                                    <option value=""> - Pilih - </option>
                                </select>  
                        </div>
                        <div class="form-group"> 
                            <div class="row">
                                <div class="col-xs-6">
                                    <label> Pengajar 1</label>
                                    <input type="text" name="pengajar" value="" id="pengajar1" class="form-control" readonly>
                                </div>
                                <div class="col-xs-6">
                                    <label> Absen Pengajar 1</label>
                                    <select name="absenpengajar1" class="form-control">
                                        <option value="0">Tidak Hadir</option>
                                        <option value="1">Hadir</option>            
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="row">
                                <div class="col-xs-6">
                                    <label> Pengajar 2</label>
                                    <input type="text" name="pengajar" value="" id="pengajar2" class="form-control" readonly>
                                </div>
                                <div class="col-xs-6">
                                    <label> Absen Pengajar 2</label>
                                    <select name="absenpengajar2" class="form-control">
                                        <option value="0">Tidak Hadir</option>
                                        <option value="1">Hadir</option>            
                                    </select>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                        <input type="hidden" name="idnya" value="<?=$row->idpertemuan?>" class="form-control" required>           
                        <div class="form-group"> 
                            <div class="row">
                                <div class="col-xs-6">
                                    <label> Pertemuan Ke-</label>
                                    <input type="text" name="pertemuan_ke" value="" id="nextpert" class="form-control" readonly>
                                </div>
                                <div class="col-xs-6">
                                    <label> Tanggal</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    <input type="text" name="tanggal" value="<?=$row->tanggal?>" class="form-control pull-right" id="datepicker">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Materi</label>
                            <input type="text" name="materi" value="<?=$row->materi?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Metode</label>
                            <input type="text" name="metode" value="<?=$row->metode?>" class="form-control" required>
                        </div> 

                        <div class="form-group col-md-offset-3"></br>
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                                <i class="fa fa-check"> Simpan</i></button>
                            <button type="reset" class="btn btn-flat bg-red">
                                <i class="fa fa-ban"> Batal</i></button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>        
</section>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
                url : "<?php echo base_url();?>pertemuan/ambilpengajar",
                method : "POST",
                data : {id: id},
                // async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        var nama1 = data[i].guru1
                        var nama2 = data[i].guru2
                    }
                    $('#pengajar1').val(nama1);
                    $('#pengajar2').val(nama2);          
                }
            });
        });
        $('#kelas').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>pertemuan/nextpert",
                method : "POST",
                data : {id: id},
                // async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        var nextpert = parseFloat(data[i].next)+1
                    }
                    $('#nextpert').val(nextpert);          
                }
            });
        });
    });
</script>