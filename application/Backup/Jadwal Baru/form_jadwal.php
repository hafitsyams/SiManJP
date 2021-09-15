<section class="content-header">
    <h1>Jadwal Kegiatan
    </h1>
</section>

    <section class="content">
        <div class="box"> 
            <div class="box-header">
                <h3 class="box-title"><?=ucfirst($page)?> Mata Pelajaran</h3>
                <div class="pull-right">
                    <a href="<?=site_url('jadwal')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('jadwal/proses')?>" method="post">
                            <div class="form-group">
                                <label> ID Jadwal </label>
                                <input type="text" name="idnya" value="<?=$row->idjadwalkelas?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="sesion" value="<?=$this->session->userdata('iduser')?>"> 
                                <label>Sekolah</label>
                                <select name="idsekolah" class="form-control" required>
                                    <option value=""> - Pilih - </option>
                                    <?php foreach($sekolah->result() as $ya => $data) { ?>
                                        <option value="<?=$data->idsekolah?>" <?=$data->idsekolah == $row->idsekolah ? "selected" : null?>> <?=$data->namasekolah?></option>
                                    <?php } ?>
                                </select>    
                            </div>
                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <select name="idmapel" class="form-control" required>
                                    <option value=""> - Pilih - </option>
                                    <?php foreach($mapel->result() as $ya => $data) { ?>
                                        <option value="<?=$data->idmapel?>"<?=$data->idmapel == $row->idmapel ? "selected" : null?>> <?=$data->namamapel?></option>
                                    <?php } ?>
                                </select>    
                            </div>
                            <div class="form-group">
                                <label> Kelas</label>
                                <input type="text" name="namakelas" value="<?=$row->namakelas?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label> Hari</label>
                                <input type="text" name="hari" value="<?=$row->hari?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label> Waktu</label>
                                <input type="text" name="waktu" value="<?=$row->waktu?>" class="form-control" required>
                            </div>
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