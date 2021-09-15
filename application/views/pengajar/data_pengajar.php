<section class="content-header">
    <h1>Pengajar</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Daftar Pengajar</h3>
            <div class="pull-right">
                <?php if($this->session->userdata('jabatan')=='Admin' || $this->session->userdata('jabatan')=='Staf') {?>
                    <a href="<?=site_url('pengajar/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus-square"></i> Tambah Pengajar</a>
                <?php }?>    
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NRP</th>
                        <th>Program Studi</th>
                        <th width="150px">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row->result() as $ya => $data) { ?>
                    <tr>
                        <td><?=$data->namauser?></td>
                        <td><?=$data->nrp?></td>
                        <td><?=$data->prodi?></td>
                        <td class="text-center" width="160px">
                            <?php if($this->session->userdata('jabatan')=='Admin' || $this->session->userdata('jabatan')=='Staf') {?>
                                <form action="<?=site_url('pengajar/hapus')?>" method="post">
                                    <input type="hidden" name="iduser" value="<?=$data->iduser?>">
                                    <a href="<?=site_url('pengajar/edit/'.$data->iduser)?>" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i> Edit</a>                        
                                    <button onclick="return confirm('Beneran?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i> Hapus</a>
                                    </button>
                            <?php }?>        
                                    <a id="set_dtl" class="btn btn-default btn-xs"
                                        data-toggle="modal" data-target="#modal-detail"
                                        data-namauser="<?=$data->namauser?>"
                                        data-nrp="<?=$data->nrp?>"
                                        data-prodi="<?=$data->prodi?>"
                                        data-jk="<?=$data->jk?>"
                                        data-nomerhp="<?=$data->nomerhp?>"
                                        data-email="<?=$data->email?>">                                       
                                        <i class="fa fa-eye"></i>Detail 
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Pengajar</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="">Nama</th>
                            <td><span id="nama_user"></span></td>
                        </tr>
                        <tr>
                            <th style="">Nrp</th>
                            <td><span id="nrp"></span></td>
                        </tr>
                        <tr>
                            <th style="">Prodi</th>
                            <td><span id="prodi"></span></td>
                        </tr>
                        <tr>
                            <th style="">JK</th>
                            <td><span id="jk"></span></td>
                        </tr>
                        <tr>
                            <th style="">Nomer HP</th>
                            <td><span id="nomerhp"></span></td>
                        </tr>
                        <tr>
                            <th style="">Email</th>
                            <td><span id="email"></span></td>
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
        var namauser = $(this).data('namauser');
        var nrp = $(this).data('nrp');
        var prodi = $(this).data('prodi');
        if($(this).data('jk')=="P"){
            var jk = "Perempuan";
        }else{var jk = "Laki-Laki";};
        var nomerhp = $(this).data('nomerhp');
        var email = $(this).data('email');
        $('#nama_user').text(namauser);
        $('#nrp').text(nrp);
        $('#prodi').text(prodi);
        $('#jk').text(jk);
        $('#nomerhp').text(nomerhp);
        $('#email').text(email);
    });
});
</script>