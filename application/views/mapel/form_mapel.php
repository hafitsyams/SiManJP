<section class="content-header">
    <h1>Program Pembelajaran</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Program Pembelajaran</h3>
            <div class="pull-right">
                <a href="<?=site_url('mapel')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Kembali</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('mapel/proses')?>" method="post">
                        <input type="hidden" name="idnya" value="<?=$row->idmapel?>" class="form-control" required>
                        <div class="form-group">
                            <label> Nama Program Pembelajaran</label>
                            <input type="text" name="namamapel" value="<?=$row->namamapel?>" class="form-control" required>
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