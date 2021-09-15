<section class="content-header">
      <h1>Pengajar</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Pengajar</h3>
            <div class="pull-right">
                <a href="<?=site_url('pengajar')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Kembali</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        <!-- <div class="form-group <?=form_error('idnya') ? 'has-error': null?>">
                            <label> ID User </label>
                            <input type="text" name="idnya" value="<?=set_value('idnya')?>" class="form-control">
                            <?php echo form_error('idnya')?>
                        </div> -->
                        <div class="form-group <?=form_error('fullname') ? 'has-error': null?>">
                            <label> Nama Lengkap</label>
                            <input type="text" name="fullname" value="<?=set_value('fullname')?>" class="form-control" required>
                            <?php echo form_error('fullname')?>
                        </div>
                        <div class="form-group <?=form_error('nrp') ? 'has-error': null?>">
                            <label> NRP</label>
                            <input type="text" name="nrp" value="<?=set_value('nrp')?>" class="form-control">
                            <?php echo form_error('nrp')?>
                        </div>
                        <div class="form-group <?=form_error('prodi') ? 'has-error': null?>">
                            <label> Prodi</label>
                            <select name="prodi"  class="form-control" required>
                                <option value=""> -Pilih- </option>
                                <option value="Manajemen Informatika" <?=set_value('prodi') == "Manajemen Informatika" ? "selected" : null?>> Manajemen Informatika </option>
                                <option value="Sistem Informasi" <?=set_value('prodi') == "Sistem Informasi" ? "selected" : null?>> Sistem Informasi </option>
                                <option value="Teknik Informatika" <?=set_value('prodi') == "Teknik Informatika" ? "selected" : null?>> Teknik Informatika </option>
                                <option value="Desain Komunikasi Visual" <?=set_value('prodi') == "Desain Komunikasi Visual" ? "selected" : null?>> Desain Komunikasi Visual </option>
                            </select>
                            <?php echo form_error('jk')?>
                        </div>
                        <div class="form-group <?=form_error('jk') ? 'has-error': null?>">
                            <label> Jenis Kelamin</label>
                            <select name="jk"  class="form-control" required>
                                <option value=""> -Pilih- </option>
                                <option value="L" <?=set_value('jk') == "L" ? "selected" : null?>> Laki-Laki </option>
                                <option value="P" <?=set_value('jk') == "P" ? "selected" : null?>> Perempuan </option>
                            </select>
                            <?php echo form_error('jk')?>
                        </div>
                        <div class="form-group <?=form_error('nomerhp') ? 'has-error': null?>">
                            <label> No. Handphone</label>
                            <input type="text" name="nomerhp" value="<?=set_value('nomerhp')?>" class="form-control">
                            <?php echo form_error('nomerhp')?>
                        </div>
                        <div class="form-group <?=form_error('email') ? 'has-error': null?>">
                            <label> E-mail</label>
                            <input type="text" name="email" value="<?=set_value('email')?>" class="form-control">
                            <?php echo form_error('email')?>
                        </div>
                        <div class="form-group <?=form_error('un') ? 'has-error': null?>">
                            <label> Username</label>
                            <input type="text" name="un" value="<?=set_value('un')?>" class="form-control">
                            <?php echo form_error('un')?>
                        </div>
                        <div class="form-group <?=form_error('pw') ? 'has-error': null?>">
                            <label> Password</label>
                            <input type="password" name="pw" value="<?=set_value('pw')?>"class="form-control">
                            <?php echo form_error('pw')?>
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