<section class="content-header">
    <h1>Program Pembelajaran</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Daftar Program Pembelajarann</h3>
            <div class="pull-right">
                <?php if($this->session->userdata('jabatan')=='Admin'||$this->session->userdata('jabatan')=='Staf') {?>
                    <a href="<?=site_url('mapel/tambah')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus-square"></i> Tambah Program</a>
                <?php } ?>   
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example2">
                <thead>
                    <tr>
                        <!-- <th>ID Mapel</th> -->
                        <th>Nama Program Pembelajaran</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row->result() as $ya => $data) { ?>
                    <tr>
                        <!-- <td><?=$data->idmapel?></td> -->
                        <td><?=$data->namamapel?></td>
                        <td class="text-center" width="160px">
                            <?php if($this->session->userdata('jabatan')=='Admin'||$this->session->userdata('jabatan')=='Staf') {?>
                            <form action="<?=site_url('mapel/hapus')?>" method="post">
                                <a href="<?=site_url('mapel/ubah/'.$data->idmapel)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Edit</a>
                                <input type="hidden" name="idmapel" value="<?=$data->idmapel?>">
                                <button onclick="return confirm('Beneran?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                            <?php }else{ echo "Tidak Ada Pilihan";  }?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>