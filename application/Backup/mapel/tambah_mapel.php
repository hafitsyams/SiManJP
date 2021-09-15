<section class="content-header">
      <h1>Mata Pelajaran
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Mata Pelajaran</h3>
            <div class="pull-right">
                <a href="<?=site_url('mapel')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Kembali</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <?php //echo validation_errors()?>
                    <form action="" method="post">
                        <div class="form-group <?=form_error('idnya') ? 'has-error': null?>">
                            <label> ID Mata Pelajaran </label>
                            <input type="text" name="idnya" value="<?=set_value('idnya')?>" class="form-control">
                            <?php echo form_error('idnya')?>
                        </div>
                        <div class="form-group <?=form_error('namamapel') ? 'has-error': null?>">
                            <label> Nama Mata Pelajaran</label>
                            <input type="text" name="namamapel" value="<?=set_value('namamapel')?>" class="form-control">
                            <?php echo form_error('namamapel')?>
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