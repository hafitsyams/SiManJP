<section class="content-header">
      <h1>Jadwal
      </h1>
    </section>

    <section class="content">
      
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Daftar Jadwal</h3>
            <div class="pull-right">
                <a href="<?=site_url('jadwal/add')?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus-square"></i> Tambah Jadwal</a>
            </div>
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
                        <td><?=$data->idsekolah?></td>
                        <td><?=$data->idmapel?></td>
                        <td><?=$data->namakelas?></td>
                        <td><?=$data->hari?></td>
                        <td><?=$data->waktu?></td>
                        <td><?=$data->iduser?></td>
                        <td><?=$data->validasi == 0 ? "Belum" : "Sudah"?></td>
                        <td class="text-center" width="160px">
                            <form action="<?=site_url('pengajar/hapus')?>" method="post">
                            <a href="<?=site_url('pengajar/edit/'.$data->iduser)?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Edit</a>

                            <input type="hidden" name="iduser" value="<?=$data->iduser?>">
                            <button onclick="return confirm('Beneran?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Hapus</a>
                            </button>
                            </form>    
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
      </div>

    </section>