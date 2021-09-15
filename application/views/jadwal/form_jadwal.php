<section class="content-header">
    <h1>Jadwal</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?>Jadwal</h3>
            <div class="pull-right">
                <a href="<?=site_url('jadwal')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i>Kembali</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('jadwal/proses')?>"method="post">
                        <?php if($page != "set") { ?>
                            <input type="hidden" name="idnya" value="<?=$row->idjadwalkelas?>" class="form-control" required>
                            <div class="form-group">
                                <label>Kode Jadwal</label>
                                <input type="text" name="kodejadwal" value="<?=$row->kodejadwalkelas?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Sekolah</label>
                                <select name="idsekolah" class="form-control" required>
                                    <option value="">- Pilih -</option>
                                    <?php foreach($sekolah->result() as $ya => $data) {?>
                                        <option value="<?=$data->idsekolah?>" <?=$data->idsekolah == $row->idsekolah ? "selected" : null?>> <?=$data->namasekolah?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tahun & Semester</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="text" name="tahun" value="<?=$row->tahun?>" class="form-control" required>
                                    </div>
                                    <div class="col-xs-6">
                                        <select name="semester" class="form-control" required>
                                            <?php $semester = $this->input->post('semester') ? $this->input->post('semester') : $row->semester?>
                                            <option value="1" <?=set_value('semester') == "1" ? "selected" : null?>> Ganjil </option>
                                            <option value="2" <?=$semester == "2" ? "selected" : null?>> Genap </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Materi Program</label>
                                <select name="idmapel" class="form-control" required>
                                    <option value=""> - Pilih - </option>
                                    <?php foreach($mapel->result() as $ya => $data) { ?>
                                        <option value="<?=$data->idmapel?>"<?=$data->idmapel == $row->idmapel ? "selected" : null?>> <?=$data->namamapel?></option>
                                    <?php } ?>
                                </select>    
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text" name="namakelas" value="<?=$row->namakelas?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Hari & Waktu</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <select name="kodehari" class="form-control" id="kodehari" required>
                                            <?php $kodehari = $this->input->post('kodehari') ? $this->input->post('kodehari') : $row->kodehari?>
                                            <option value=""> - Pilih - </option>
                                            <option value="1" <?=set_value('kodehari') == "1" ? "selected" : null?>> Senin </option>
                                            <option value="2" <?=$kodehari == "2" ? "selected" : null?>> Selasa </option>
                                            <option value="3" <?=$kodehari == "3" ? "selected" : null?>> Rabo </option>
                                            <option value="4" <?=$kodehari == "4" ? "selected" : null?>> Kamis </option>
                                            <option value="2" <?=$kodehari == "5" ? "selected" : null?>> Jum'at </option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <select name="ketwaktu" class="form-control" id="ketwaktu">
                                            <option value=""> - Pilih - </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Total Pertemuan</label>
                                <input type="text" name="jmlpert" value="<?=$row->jmlpert?>" class="form-control" required>
                            </div>
                        <?php }else{ ?>
                            <input type="hidden" name="idnya" value="<?=$row->idjadwalkelas?>">
                            <div class="form-group">
                                <label>Pengajar 1</label>
                                <select name="iduser" class="form-control" required>
                                    <option value="1"> - Kosong - </option>
                                    <?php foreach($jar as $data) { ?>
                                        <option value="<?=$data->iduser?>"<?=$data->iduser == $row->iduser1 ? "selected" : null?>> <?=$data->namauser?></option>
                                    <?php } ?>
                                </select>    
                            </div>     
                            <div class="form-group">
                                <label>Pengajar 2</label>
                                <select name="iduserr" class="form-control" required>
                                    <option value="1"> - Kosong - </option>
                                    <?php foreach($jar as $data) { ?>
                                        <option value="<?=$data->iduser?>"<?=$data->iduser == $row->iduser2 ? "selected" : null?>> <?=$data->namauser?></option>
                                    <?php } ?>
                                </select>    
                            </div>  
                        <?php } ?>                
                        <div class="form-group col-md-offset-3">
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
        $('#kodehari').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>jadwal/ambilketwaktu",
                method : "POST",
                data : {id: id},
                // async : false,
                dataType : 'json',
                success: function(data){
                    var html = '<option value=""> - Pilih - </option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].idwaktu+'">'+data[i].ketwaktu+'</option>';
                    }
                    $('#ketwaktu').html(html);          
                }
            });
        });
    });
</script>