<section class="content-header">
    <h1>Siswa</h1>
</section>

<section class="content">
    <div class="col-md-3">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pilih</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Sekolah</label>
                    <select name="sekolah" class="form-control" id="sekolah">
                        <option value="0"> - Semua - </option>
                            <?php foreach($sekolah->result() as $data):?>
                                <option value="<?php echo $data->idsekolah;?>"> <?php echo $data->namasekolah?></option>
                            <?php endforeach; ?>
                    </select></br>
                    <label>Kelas</label>
                    <select name="kelas" class="form-control" id="kelas">
                        <option value=""> - Semua - </option>
                    </select>     
                </div>
            </div>
        </div>    
    </div>    
    <div class="col-md-9">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Siswa</h3>
                <?php if($this->session->userdata('jabatan')=="Admin" || $this->session->userdata('jabatan')=="Pengajar") { ?>
                    <div class="pull-right">
                        <a href="<?=site_url('siswa/tambah')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-plus-square"></i>Tambah Siswa</a>
                    </div>
                <?php } ?>
            </div>
        
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1?>
                        <?php foreach ($row as $data){ ?>
                        <tr>
                            <td><?php echo $no++ ; ?></td>
                            <td><?php echo $data['namasiswa']; ?></td>
                            <td><?php echo $data['namakelas']; ?></td>

                            <td class="text-center" width="160px">
                                <form action="<?=site_url('siswa/hapus')?>" method="post">
                                    <?php if($this->session->userdata('jabatan')=="Admin" || $this->session->userdata('jabatan')=="Pengajar") {?>
                                        <input type="hidden" name="idsiswa" value="<?php echo $data['idsiswa'];?>">
                                        <button onclick="return confirm('Beneran?')" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i> Hapus</a>
                                        </button>
                                        <a href="<?php echo site_url('siswa/ubah/'.$data['idsiswa'])?>" class="btn btn-primary btn-xs">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                    <?php }else{echo "Tidak Ada Pilihan";} ?>
                                </form>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script src="//code.jquery.com/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#sekolah').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>pertemuan/ambilkelas",
                method : "POST",
                data : {id: id},
                // async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].idjadwalkelas+'">'+data[i].namakelas+'</option>';
                    }
                    $('#kelas').html(html);
                     
                }
            });
        });
    });
</script>