<html><head>
<title>Laporan Daftar Hadir Dan Nilai</title>
</head><body>
<h3 style="text-align: center">Laporan Daftar Hadir Dan Nilai <br> Join Program TIK <br>
<?php foreach($keterangan as $data){?><?php echo $data['namasekolah']?><?php }?><br></h3>

<table>
    <tr>
        <td><b>Kelas</b></td>
        <td><?php foreach($keterangan as $data) {?>: <?php echo $data['namakelas']?><?php }?></td>
    </tr>
    <tr>    
        <td width="90px"><b>Waktu</b></td>
        <td width=""><?php foreach($keterangan as $data) {?>: 
            <?php if($data['kodehari']==1){
                    echo "Senin";
                }else if($data['kodehari']==2){
                    echo "Selasa";
                }else if($data['kodehari']==3){
                    echo "Rabo";
                }else if($data['kodehari']==4){
                    echo "Kamis";
                }else{
                    echo "Jum'at";
            }?> (<?php echo $data['ketwaktu']?>) <?php }?></td>
    </tr>
    <tr>
        <td><b>Materi</b></td>
        <td><?php foreach($keterangan as $data) {?>: <?php echo $data['namamapel']?><?php }?></td>
    </tr>
    <tr>
        <td width="90px"><b>Pengajar</b></td>
        <td width=""><?php foreach($keterangan as $data) {?>: <?php echo $data['guru1']?> & <?php echo $data['guru2']?><?php }?></td>           
    </tr>
</table><br/><hr />
<table border="1" cellpadding="2">
    <thead><tr>
            <th width="30px" class="text-center" rowspan="2">No</th>
            <th width="200px" class="text-center" rowspan="2">Nama Siswa</th>
            <th class="text-center" colspan="4">Kehadiran</th>
            <th class="text-center" colspan="4">Nilai</th>
            <th class="text-center" rowspan="2">Keterangan</th><tr>
            <th width="38px" class="text-center">Hadir</th>
            <th width="38px" class="text-center">Absen</th>
            <th width="38px" class="text-center">Sakit</th>
            <th width="38px" class="text-center">Izin</th>                        
            <th width="38px" class="text-center">Tugas</th>
            <th width="38px" class="text-center">TA</th>
            <th width="38px" class="text-center">Sikap</th>
            <th width="38px" class="text-center">Total</th>                        
    </tr></thead>
	<tbody><?php $no=1;?><?php foreach($laporan as $data){ ?><tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $data->namasiswa;?></td>
			<td align="center"><?php echo $data->hadir;?></td>
			<td align="center"><?php echo $data->sakit;?></td>
			<td align="center"><?php echo $data->absen;?></td>
			<td align="center"><?php echo $data->izin;?></td>
			<td align="center"><?php $tugas = $data->nilai_tugas/($data->hitung-1); 
                if($tugas > 70){
                    echo $tugas;
                }else{
                    echo "<b><font color='red'>".$tugas."</font></b>"; } ?></td>
            <td align="center"><?php $ta = $data->nilai_tugas_akhir;
                echo $ta ?></td>
            <td align="center"><?php $sikap = $data->nilai_sikap/$data->hitung; 
                if($sikap > 89){
                    echo "A";
                }else if($sikap > 79){
                    echo "B+";
                }else{
                    echo "B"; } ?></td>
            <td align="center"><?php $total = $tugas*0.3+$sikap*0.3+$ta*0.4?>
                <?php echo $total;?></td>
            <td></td> 
    </tr></tbody><?php } ?>
</table><br><br><?php $tgl=date('d M Y'); ?>
<p style="text-align:right"><?php echo "Malang, ".$tgl ?></p>
</body></html>