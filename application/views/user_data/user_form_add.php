<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>




    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Create New User <i class="fas fa fa-user-plus"></i></h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('user_data_c/add') ?>" method="POST">


                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-user"></i> Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name">
                                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><i class="fas fa-envelope"></i> Email </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email">
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-user-tie"></i> Role</label>
                            <div class="col-sm-9 mb-1 form-group">
                                <select name="role" id="role" class="form-control">
                                    <option value=""> -Select Role As- </option>
                                    <?php foreach ($role->result() as $key => $data) { ?>
                                        <option value="" <?= $data->role_id == $data->role_id ? "selected" : null ?>><?= $data->role ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label"><i class="fas fa-key"></i> Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_1" name="password_1">
                                <?= form_error('password_1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"><i class="fas fa-key"></i> Repeat Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_2" name="password_2">
                                <?= form_error('password_2', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="area_coverage" class="col-sm-3 col-form-label"><i class="fas fa-map-marker-alt"></i> Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="area_coverage" class="col-sm-3 col-form-label"><i class="fas fa-map-marked-alt"></i> Area Cover</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="area_coverage" name="area_coverage">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="area_coverage" class="col-sm-3 col-form-label"><i class="fas fa-building"></i> City</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="city" name="city">
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