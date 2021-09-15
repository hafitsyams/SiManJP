<section class="content-header">
    <h1>Data Siswa Peserta Join Program</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?>Siswa</h3>
            <div class="pull-right">
                <a href="<?=site_url('siswa')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Kembali</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('siswa/tambah')?>" method="post">
                        <div class="form-group">
                            <label>Sekolah</label>
                            <select name="sekolah" class="form-control" id="sekolah">
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
                        <label>Nama Siswa</label>
                        <div class="input-group control-group after-add-more">
                            <input type="text" name="namasiswa[]" class="form-control"
                            placeholder="Masukan Nama">
                            <div class="input-group-btn">
                                <button class="btn btn-success add-more" type="button">
                                <i class="fa fa-plus"></i></button>
                            </div>
                        </div>                 
                        <div class="form-group col-md-offset-3"></br>
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                                <i class="fa fa-check"> Simpan</i></button>
                            <button type="reset" class="btn btn-flat bg-red">
                                <i class="fa fa-ban"> Batal</i></button>
                        </div>
                    </form>
                    <div class="copy hide">
                        <div class="control-group input-group" style="margin-top:10px">
                            <input type="text" name="namasiswa[]" class="form-control" placeholder="Masukkan Nama">
                            <div class="input-group-btn"> 
                            <button class="btn btn-danger remove" type="button"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</section>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
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