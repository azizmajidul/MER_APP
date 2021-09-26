<!-- Begin Page Content -->





<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data User <i class="fas fa fa-user-plus"></i></h6>
                </div>

                <div class="card-body">
                    <!-- <?= form_open_multipart('user_data_c/edit') ?> -->
                    <form action="<?= base_url('user_data_c/edit') ?>" method="POST">

                        <input type="hidden" name="id" id="id" value="<?= $users['id']; ?>">



                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-user"></i> Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="<?= $users['name']; ?>">
                                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><i class="fas fa-envelope"></i> Email </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email" value="<?= $users['email']; ?>" readonly>
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area_coverage" class="col-sm-3 col-form-label"><i class="fas fa-map-marker-alt"></i> Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="address" name="address" value="<?= $users['address']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role_id" class="col-sm-3 col-form-label"><i class="fas fa-user-tie"></i> Position</label>
                            <div class="col-sm-9">
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">Select</option>
                                    <?php foreach ($role as $r) : ?>

                                        <option value="<?= $r['role_id'] ?>"><?= $r['role']; ?> </option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area_coverage" class="col-sm-3 col-form-label"><i class="fas fa-map-marked-alt"></i> Area Cover</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="area_coverage" name="area_coverage" value="<?= $users['area_coverage']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="area_coverage" class="col-sm-3 col-form-label"><i class="fas fa-building"></i> City</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="city" name="city" value="<?= $users['city']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="float-right mr-2">
                                <a href="<?= site_url('user_data_c'); ?>" class="btn btn-danger"><i class="far fa-hand-point-left"> Back</i></a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"> Save</i></button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->