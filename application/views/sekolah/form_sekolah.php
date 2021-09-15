<section class="content-header">
    <h1>Sekolah</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Sekolah</h3>
            <div class="pull-right">
                <a href="<?=site_url('sekolah')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Kembali</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('sekolah/proses')?>" method="post">
                        <input type="hidden" name="idnya" value="<?=$row->idsekolah?>" class="form-control" required>
                        <div class="form-group">
                            <label> Nama Sekolah</label>
                            <input type="text" name="namasekolah" value="<?=$row->namasekolah?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Alamat Sekolah</label>
                            <textarea name="alamatsekolah" class="form-control"><?=$row->alamatsekolah?></textarea>
                        </div>
                        <div class="form-group">
                            <label> No. Telp. sekolah</label>
                            <input type="text" name="notelsekolah" value="<?=$row->notelsekolah?>" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label> Penanggung Jawab</label>
                            <input type="text" name="pngjwb" value="<?=$row->penanggungjawab?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> No. Telp. Png. Jawab</label>
                            <input type="text" name="notelpngjwb" value="<?=$row->notelpngjwb?>" class="form-control" required>
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