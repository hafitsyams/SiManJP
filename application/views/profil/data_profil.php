<section class="content-header">
    <h1>Profil</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>assets/dist/img/sandi.jpg" alt="User profile picture">
                    <?php foreach ($row as $data){ ?>
                    <h3 class="profile-username text-center"><?php echo $data['namauser']; ?></h3>
                    <p class="text-muted text-center"><?php echo $data['jabatan']; ?></p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="pull-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="pull-right">13,287</a>
                        </li>
                    </ul>
                    <?php }?>
                    <a href="#" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i> <b> Edit</b></a>
                </div>
            </div>
        </div>
    </div>    
</seciton>    