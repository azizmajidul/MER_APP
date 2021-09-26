<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <?= form_error(
        'menu',
        '<div class="alert alert-danger" role="alert">',

        '</div>'
    ); ?>
    <?= $this->session->flashdata('message'); ?>


    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('user') ?>"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header" style="height: 50px;">
                    <div class="row">
                        <div class="col-lg-8">
                            <h6 class="m-0 font-weight-bold text-primary">List Produk</h6>
                        </div>
                        <div class="col-lg-4">

                        </div>
                    </div>


                </div>
                <div class="card-body">
                    STORE NAME : <?= $store['store_id'] ?> - <?= $store['store_name'] ?>
                    <table class="table table-hover table-bordered table-striped" id="table1" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Produk Name</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($row->result() as $key => $data) : ?>
                                <tr>

                                    <th><?= $no ?></th>
                                    <th> <?= $data->product_name ?></th>

                                    <th>
                                        <a href="<?= base_url('audit_c/audit/'  . $store['schedule_id']. '/'. $data->product_id) ?>"><i class="fas fa-pen"></i> Audit</a>

                                    </th>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>
            </div>




        </div>
    </div>



</div>