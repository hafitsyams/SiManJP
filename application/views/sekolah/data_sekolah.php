<section class="content-header">
    <h1>Sekolah</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Daftar Sekolah</h3>
            <div class="pull-right">
                <?php if($this->session->userdata('jabatan')=='Admin'||$this->session->userdata('jabatan')=='Staf') {?>
                    <a href="<?=site_url('sekolah/tambah')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus-square"></i> Tambah Sekolah</a>
                <?php }?>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example2">
                <thead>
                    <tr>
                        <th>Nama Sekolah</th>
                        <th>Penanggung Jawab</th>
                        <th>No. Telp. Penanggung Jawab</th>
                        <th width="150px">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row->result() as $ya => $data) { ?>
                    <tr>
                        <td><?=$data->namasekolah?></td>
                        <td><?=$data->penanggungjawab?></td>
                        <td><?=$data->notelpngjwb?></td>

                        <td class="text-center" width="160px">
                            <form action="<?=site_url('sekolah/hapus')?>" method="post">
                                <?php if($this->session->userdata('jabatan')=='Admin'||$this->session->userdata('jabatan')=='Staf') {?>
                                    <a href="<?=site_url('sekolah/ubah/'.$data->idsekolah)?>" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i> Edit</a>
                                    <input type="hidden" name="idsekolah" value="<?=$data->idsekolah?>">
                                    <button onclick="return confirm('Beneran?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i> Hapus</a>
                                    </button>
                                <?php } ?>        
                                    <a id="set_dtl" class="btn btn-default btn-xs"
                                        data-toggle="modal" data-target="#modal-detail"
                                        data-idsekolah="<?=$data->idsekolah?>"
                                        data-namasekolah="<?=$data->namasekolah?>"
                                        data-alamatsekolah="<?=$data->alamatsekolah?>"
                                        data-notelsekolah="<?=$data->notelsekolah?>"
                                        data-penanggungjawab="<?=$data->penanggungjawab?>"
                                        data-notelpngjwb="<?=$data->notelpngjwb?>">                           
                                        <i class="fa fa-eye"></i> Detail 
                                    </a>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Sekolah</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="">ID Sekolah</th>
                            <td><span id="idsekolah"></span></td>
                        </tr>
                        <tr>
                            <th style="">Nama Sekolah</th>
                            <td><span id="namasekolah"></span></td>
                        </tr>
                        <tr>
                            <th style="">Alamat Sekolah</th>
                            <td><span id="alamatsekolah"></span></td>
                        </tr>
                        <tr>
                            <th style="">Nomer Telp. Sekolah</th>
                            <td><span id="notelsekolah"></span></td>
                        </tr>
                        <tr>
                            <th style="">Penanggungjawab</th>
                            <td><span id="penanggungjawab"></span></td>
                        </tr>
                        <tr>
                            <th style="">Nomer Telp. Png.Jawab</th>
                            <td><span id="notelpngjwb"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('click','#set_dtl', function(){
        var idsekolah = $(this).data('idsekolah');
        var namasekolah = $(this).data('namasekolah');
        var alamatsekolah = $(this).data('alamatsekolah');
        var notelsekolah = $(this).data('notelsekolah');
        var penanggungjawab = $(this).data('penanggungjawab');
        var notelpngjwb = $(this).data('notelpngjwb');
        $('#idsekolah').text(idsekolah);
        $('#namasekolah').text(namasekolah);
        $('#alamatsekolah').text(alamatsekolah);
        $('#notelsekolah').text(notelsekolah);
        $('#penanggungjawab').text(penanggungjawab);
        $('#notelpngjwb').text(notelpngjwb);
    });
});
</script>