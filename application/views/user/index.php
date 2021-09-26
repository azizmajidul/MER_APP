<!-- Begin Page Content -->



<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?> Information</h1>
    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="main-body">



        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?= base_url('assets/img/profil/') . $user['image'] ?>" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?= $user['name'] ?></h4>
                                <p class="text-secondary mb-1"><?= $user['role_id'] == 1 ? "Admin" : "Merchandiser" ?></p>
                                <p class="text-muted font-size-sm"><?= $user['address'] ?></p>
                                <a href="<?= base_url('user/edit_profil'); ?>" class="btn btn-success"><i class="fas fa-user-edit"></i> Edit</a>
                                <a href="<?= base_url('user/change_password'); ?>" class="btn btn-outline-primary"><i class="fas fa-key"></i> Change Password</a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card mb-3 shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0"><i class="fas fa-user"></i> Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user['name'] ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0"><i class="fas fa-envelope"></i> Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user['email'] ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0"><i class="fas fa-map-marked-alt"></i> Area</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user['area_coverage'] ?>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0"><i class="fas fa-map-marker-alt"></i> Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user['address'] ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0"><i class="fas fa-pencil-alt"></i> Member Since</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= date('d F Y', $user['date_created']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0"><i class="fas fa-question-circle"></i> Status</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6 style="color: green;"> <?= $user['is_active'] == 1 ? "Active" : "Non Active" ?></h6>
                            </div>
                        </div>


                    </div>
                </div>





            </div>
        </div>

    </div>
</div>







<!-- <div class="container mt-3">
    <div class="row">
        <div class="col-5">
            <div id="accordion">
                <div class="card">
                    <div class="card-header">
                        <a class="card-link text-center" data-toggle="collapse" href="#collapseOne">
                            <img src="<?= base_url('assets/img/profil/') . $user['image'] ?>" class="card-img" height="400px">
                            <h4>I'am Jhon Boloh</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <p><i class="fas fa-user-tie"></i> <span class="font-weight-bold">Jhon Boloh</span></p>
                            <p><i class="fas fa-map-marker-alt"></i> <span class="font-weight-bold">Jl. Mawar Merah No - 22, Jakarta - Indonesia</span></p>
                            <p><i class="fas fa-at"></i> <span class="font-weight-bold">jhonboloh@gmail.com</span></p>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <i class="fab fa-facebook-square"></i>
                        <i class="fab fa-twitter-square"></i>
                        <i class="fab fa-linkedin"></i>
                        <i class="fab fa-youtube-square"></i>
                        <i class="fab fa-instagram"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- <style>
    .card-link h4,
    .card-body .fas,
    .card-footer .fab {
        color: #14abac
    }

    .card-footer .fab:hover {
        color: #f1bc19
    }

    .card p {
        color: #503534
    }

    .card-footer .fab {
        font-size: 35px !important;
        margin: 0 5px;
    }
</style> -->



<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->