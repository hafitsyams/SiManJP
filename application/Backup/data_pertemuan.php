<section class="content-header">
    <h1>Pertemuan</h1>
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
                <h3 class="box-title">Data Pertemuan</h3>
                <?php if($this->session->userdata('jabatan')=="Admin" || $this->session->userdata('jabatan')=="Pengajar") { ?>
                    <div class="pull-right">
                        <a href="<?=site_url('pertemuan/tambah')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-plus-square"></i>Tambah Pertemuan</a>
                    </div>
                <?php } ?>
            </div>
        
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="example2">
                    <thead>
                        <tr>
                            <!-- <th>ID Pertmuan</th> -->
                            <th>Sekolah</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Pert. Ke-</th>
                            <th>Tanggal</th>
                            <!-- <th>Materi</th> -->
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody id="pertemuan">
                        <?php foreach ($row as $data){ ?>                           
                        <tr>
                            <!-- <td><?=$data->idpertemuan?></td> -->
                            <td><?php echo $data['namasekolah']; ?></td>
                            <td><?php echo $data['namamapel']; ?></td>
                            <td><?php echo $data['namakelas']; ?></td>
                            <td><?php echo $data['pertemuan_ke']; ?></td>
                            <td><?php echo $data['tanggal']; ?></td>
                            <!-- <td><?=$data->materi?></td> -->

                            <td class="text-center" width="160px">
                                <form action="<?=site_url('pertemuan/hapus')?>" method="post">
<!-- non aktif -->                  <?php if($this->session->userdata('jabatan')=="Admin" || $this->session->userdata('jabatan')=="Pengajar") {}?>
                                        <?php if($this->fungsi->user_login()->iduser == $data['iduser1'] || $this->fungsi->user_login()->iduser == $data['iduser2'] || $this->session->userdata('jabatan')=="Admin"){?>
                                            <input type="hidden" name="idpertemuan" value="<?php echo $data['idpertemuan'];?>">
                                            <button onclick="return confirm('Beneran?')" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i> Hapus</a>
                                            </button>
                                            <a href="<?php echo site_url('pertemuan/ubah/'.$data['idpertemuan'])?>" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i> Edit
                                            </a>
                                            <a href="<?php echo site_url('pertemuan/ubah/'.$data['idpertemuan'])?>" class="btn bg-yellow btn-xs">
                                                <i class="fa fa-calendar-check-o"></i> Absen
                                            </a>
                                            <a href="<?php echo site_url('pertemuan/ubah/'.$data['idpertemuan'])?>" class="btn bg-maroon btn-xs">
                                                <i class="fa  fa-tree"></i> Nilai
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
                    var html = '<option value=""> - Pilih - </option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].idjadwalkelas+'">'+data[i].namakelas+'</option>';
                    }
                    $('#kelas').html(html);
                     
                }
            });
        });
        $('.data').load("data.php");
	    $("#search").click(function(){
	    	var jurusan = $("#s_jurusan").val();
	    	var keyword = $("#s_keyword").val();
	    	$.ajax({
	            type: 'POST',
	            url: "data.php",
	            data: {jurusan: jurusan, keyword:keyword},
	            success: function(hasil) {
	                $('.data').html(hasil);
	            }
	        });
	    });
    });
</script>