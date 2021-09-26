<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Password <i class="fas fa fa-key"></i></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="<?= base_url('user/change_password'); ?>" method="POST">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                    <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="new_password_1">New Password</label>
                                    <input type="password" class="form-control" id="new_password_1" name="new_password_1">
                                    <?= form_error('new_password_1', '<small class="text-danger">', '</small>'); ?>

                                </div>
                                <div class="form-group">
                                    <label for="new_password_2">Repeat Password</label>
                                    <input type="password" class="form-control" id="new_password_2" name="new_password_2">
                                    <?= form_error('new_password_2', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <a href="<?= site_url('user'); ?>" class="btn btn-warning"><i class="far fa-hand-point-left"> Back</i></a>
                                    <button type="submit" class="btn btn-primary"> Change Password <i class="fas fa-key"></i>
                                    </button>
                                </div>
                            </form>
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