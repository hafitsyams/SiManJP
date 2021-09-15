<section class="content-header">
      <h1>Jadwal</h1>
    </section>

    <section class="content">

      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Jadwal</h3>
            <div class="pull-right">
                <a href="<?=site_url('jadwal')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Kembali</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <?php //echo validation_errors()?>
                    <form action="" method="post">
                        <div class="form-group <?=form_error('idnya') ? 'has-error': null?>">
                            <label> ID Jadwal </label>
                            <input type="text" name="idnya" value="<?=set_value('idnya')?>" class="form-control">
                            <?php echo form_error('idnya')?>
                        </div>
                        <div class="form-group <?=form_error('sklh') ? 'has-error': null?>">
                            <label> Pilih Sekolah</label>
                            <select name="sklh" class="form-control">
                            <option value=""> - Pilih - </option>
                            <?php foreach($sekolah->result() as $key => $data) { ?>
                                <option value="<?=$data->idsekolah?>"><?=$data->namasekolah?></option>
                            <?php  } ?>
                            <?php echo form_error('sklh')?>
                            </select>
                        </div>
                        <div class="form-group <?=form_error('mapel') ? 'has-error': null?>">
                            <label> Pilih Mata Pelajaran</label>
                            <select name="mapel" class="form-control">
                            <option value=""> - Pilih - </option>
                            <?php foreach($mapel->result() as $key => $data) { ?>
                                <option value="<?=$data->idmapel?>"><?=$data->namamapel?></option>
                            <?php  } ?>
                            <?php echo form_error('sklh')?>
                            </select>
                        </div>
                        <div class="form-group <?=form_error('kls') ? 'has-error': null?>">
                            <label> Nama Kelas</label>
                            <input type="text" name="kls" value="<?=set_value('kls')?>" class="form-control">
                            <?php echo form_error('kls')?>
                        </div>
                        <div class="form-group <?=form_error('hari') ? 'has-error': null?>">
                            <label> Hari</label>
                            <input type="text" name="hari" value="<?=set_value('hari')?>" class="form-control">
                            <?php echo form_error('hari')?>
                        </div>
                        <div class="form-group <?=form_error('waktu') ? 'has-error': null?>">
                            <label> Waktu</label>
                            <input type="text" name="waktu" value="<?=set_value('waktu')?>" class="form-control">
                            <?php echo form_error('waktu')?>
                        </div>
                        
                        <div class="form-group col-md-offset-3">
                            <button type="submit" class="btn btn-success btn-flat">
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