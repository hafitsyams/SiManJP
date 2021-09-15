<section class="content-header">
    <h1>Jadwal
    </h1>
</section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Jadwal Kegiatan</h3>
                <?php if($this->session->userdata('jabatan')== "Staf" ) {?>
                    <div class="pull-right">
                        <a href="<?=site_url('jadwal/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-plus-square"></i> Tambah jadwal</a>
                    </div>
                <?php } ?>    
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Jadwal</th>
                            <th>Sekolah</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Pengajar</th>
                            <th>Validasi</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($row->result() as $ya => $data) { ?>
                        <tr>
                            <td><?=$data->idjadwalkelas?></td>
                            <td><?=$data->namasekolah?> </td>
                            <td><?=$data->namamapel?></td>
                            <td><?=$data->namakelas?></td>
                            <td><?=$data->hari?></td>
                            <td><?=$data->waktu?></td>
                            <td><b><?=$data->namauser?></b></td>
                            <td><?=$data->validasi == 0 ? "Belum" : "Sudah"?></td>

                            <td class="text-center" width="160px">
                                <form action="<?=site_url('jadwal/hapus')?>" method="post">

                                    <?php if($this->session->userdata('jabatan')== "Pengajar" ) {?>
                                        <?php if($data->iduser == 1){ ?>
                                            <a href="<?=site_url('jadwal/ambilkelas/'.$data->idjadwalkelas)?>" class="btn bg-green btn-xs">
                                                <i class="fa fa-thumbs-o-up"></i> Ambil</a>
                                    <?php }} ?>

                                    <?php if($this->session->userdata('jabatan')== "Kepala" ) {?>
                                        <?php if($data->iduser != 1){ ?>
                                            <?php if($data->validasi == 0){ ?>
                                                <a href="<?=site_url('jadwal/validasi/'.$data->idjadwalkelas)?>" class="btn bg-yellow btn-xs">
                                                    <i class="fa fa-check"></i> Validasi</a>
                                    <?php }}} ?>

                                    <?php if($this->session->userdata('jabatan')== "Staf" ) {?>
                                    <!-- <input type="hidden" name="sesion" value="<?=$this->session->userdata('iduser')?>">  -->
                                    <a href="<?=site_url('jadwal/edit/'.$data->idjadwalkelas)?>" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i> Edit</a>
                                    <button onclick="return confirm('Beneran?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i> Hapus</a>
                                    </button>
                                    <?php } ?>

                                </form>    
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>