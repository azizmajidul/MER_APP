<div class="container">


    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    Merchandiser Information System
                                    <h1 class="h4 text-gray-900 mb-4">Welcome To MIS!</h1>
                                </div>
                                <br>
                                <?= $this->session->flashdata('message') ?>
                                <form class="user" method="POST" action="<?= base_url('auth_login'); ?>">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Enter Email Address...">
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-user btn-block">
                                        Login
                                    </button>

                                    <hr>

                                </form>

                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url() ?>auth_login/register">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>