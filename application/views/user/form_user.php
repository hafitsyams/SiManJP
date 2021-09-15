<section class="content-header">
    <h1>User</h1>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> User</h3>
            <div class="pull-right">
                <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Kembali</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('user/proses')?>" method="post">
                        <!-- <div class="form-group">
                            <label> ID User </label>
                            <input type="text" name="idnya" value="<?=$row->iduser?>" class="form-control" required>
                        </div> -->
                        <input type="hidden" name="idnya" value="<?=$row->iduser?>" class="form-control" required>
                        <div class="form-group">
                            <label> Nama User</label>
                            <input type="text" name="namauser" value="<?=$row->namauser?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Jenis Kelamin</label>
                            <select name="jk" class="form-control" required>
                            <?php $jk = $this->input->post('jk') ? $this->input->post('jk') : $row->jk?>
                                <option value="L" <?=set_value('jk') == "L" ? "selected" : null?>> Laki-Laki </option>
                                <option value="P" <?=$jk == "P" ? "selected" : null?>> Perempuan </option>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label> No. Handphone</label>
                            <input type="text" name="nomerhp" value="<?=$row->nomerhp?>" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label> Email</label>
                            <input type="text" name="email" value="<?=$row->email?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Jabatan</label>
                            <select name="jabatan" class="form-control" required>
                                <?php $jabatan = $this->input->post('jabatan') ? $this->input->post('jabatan') : $row->jabatan?>
                                <option value="Admin" <?=set_value('jabatan') == "Admin" ? "selected" : null?>> Admin </option>
                                <option value="Kepala"<?=$jabatan == "Kepala" ? "selected" : null?>> Kepala PPTIK</option>
                                <option value="Staf"<?=$jabatan == "Staf" ? "selected" : null?>> Staf</option>
                                <option value="Koordinator"<?=$jabatan == "Koordinator" ? "selected" : null?>> Koordinator</option>
                            </select> 
                        </div>          
                        <div class="form-group">
                            <label> Username</label>
                            <input type="text" name="username" value="<?=$row->username?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Password</label>
                            <input type="password" name="password" value="<?=$row->password?>" class="form-control" required>
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