<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1> -->



    <div class="row">
        <div class="col-lg-9    ">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <?= form_open_multipart('user/edit_profil'); ?>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Area Coverage</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="area_coverage" name="area_coverage" value="<?= $user['area_coverage']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="address" name="address" value="<?= $user['address']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Kota</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="city" name="city" value="<?= $user['city']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"> Picture </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/profil/') . $user['image'] ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <a href="<?= site_url('user'); ?>" class="btn btn-outline-warning"><i class="far fa-hand-point-left"> Back</i></a>
                                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-paper-plane"> Save</i></button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>








        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->