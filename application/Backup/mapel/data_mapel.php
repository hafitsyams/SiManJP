<section class="content-header">
      <h1>Mata Pelajaran
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Daftar Mata Pelajaran</h3>
            <div class="pull-right">
                <a href="<?=site_url('mapel/add')?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus-square"></i> Tambah Mapel</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Mata Pelajaran</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($row->result() as $ya => $data) { ?>
                    <tr>
                        <td><?=$data->namamapel?></td>
                        <td class="text-center" width="160px">
                            <form action="<?=site_url('mapel/hapus')?>" method="post">
                            <a href="<?=site_url('mapel/edit/'.$data->idmapel)?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Edit</a>

                            <input type="hidden" name="idmapel" value="<?=$data->idmapel?>">
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