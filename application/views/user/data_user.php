<section class="content-header">
    <h1>User</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Daftar User</h3>
            <div class="pull-right">
                <?php if($this->session->userdata('jabatan')=='Admin') {?>
                    <a href="<?=site_url('user/tambah')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus-square"></i> Tambah User</a>
                <?php }?>    
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example2">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Nomer HP</th>
                        <th>E-mail</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row->result() as $ya => $data) { ?>
                    <tr>
                        <td><?=$data->namauser?></td>
                        <td><?php if(($data->jabatan)=="Kepala"){ echo "Kepala PPTIK"; }else{ echo $data->jabatan; }?></td>
                        <td><?=$data->nomerhp?></td>
                        <td><?=$data->email?></td>
                        <td class="text-center" width="160px">
                            <?php if($this->session->userdata('jabatan')=='Admin') {?>
                            <form action="<?=site_url('user/hapus')?>" method="post">
                                <a href="<?=site_url('user/ubah/'.$data->iduser)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Edit</a>
                                <input type="hidden" name="iduser" value="<?=$data->iduser?>">
                                <button onclick="return confirm('Beneran?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Hapus</a>
                                </button>
                            </form>
                        <?php }else{ echo "Tidak Ada Pilihan" ;} ?>       
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>