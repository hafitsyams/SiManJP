<html><head>
<title>Berita Acara</title>
</head><body>
<h3 style="text-align: center">Berita Acara <br> Join Program TIK <br>
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
            }?> 
            (<?php echo $data['ketwaktu']?>) <?php }?></td>
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
<table border="1" cellpadding="10">
    <thead><tr>
            <th width="50px">Ke -</th>
            <th width="100px">Tanggal</th>
            <th width="300px">Materi Bahasan</th>
            <th width="100px">Metode</th>
            <th>Pengajar 1 : 
                <?php foreach($keterangan as $data) {?>
                    <?php echo $data['guru1']?>
                <?php }?>
            </th>
            <th>Pengajar 2 : 
                <?php foreach($keterangan as $data) {?>
                    <?php echo $data['guru2']?>
                <?php }?>
            </th>
    </tr></thead>
    <tbody><?php foreach ($berita as $data){?><tr>
                <td><?php echo $data['pertemuan_ke']; ?></td>
                <td><?php echo $data['tanggal']; ?></td>
                <td><?php echo $data['materi']; ?></td>
                <td><?php echo $data['metode']; ?></td>
                <td><?php if($data['abspgjr1']==0){
                        echo "Tidak Hadir";
                    }else{ echo "Hadir";
                } ?></td>
                <td><?php if($data['abspgjr2']==0){
                        echo "Tidak Hadir";
                    }else{ echo "Hadir";
                } ?></td>
            </tr></tbody><?php } ?>    
</table> 
</body></html>