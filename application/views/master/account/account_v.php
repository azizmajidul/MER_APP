<style>
    .modal-header {
        color: blue;
    }
</style>

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
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><i class="fas fa-home"></i> Home</a></li>
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
                            <h6 class="m-0 font-weight-bold text-primary">Data Mater Account</h6>
                        </div>
                        <div class="col-lg-4">
                            <a href="<?= site_url('account_c/add') ?>" class=" btn btn-success btn-sm mb-3 float-right"> <i class="fas fa-plus"></i> Add</a>
                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-striped" id="table1" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Account Name</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Updated By</th>

                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($row->result() as $key => $data) : ?>
                                <tr>

                                    <th><?= $no++ ?></th>
                                    <th><?= $data->account_name ?></th>
                                    <th><?= $data->created_by ?></th>
                                    <th><?= $data->updated_by ?></th>

                                    <th>
                                        <a href="<?= base_url('account_c/edit/' . $data->account_id) ?>" class="badge badge-success btn-xs "><i class="fas fa-pencil-alt"> update</i></a>
                                        <a href="<?= base_url('account_c/del/' . $data->account_id) ?>" onclick=" return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?') " class="badge badge-danger btn-xs "><i class="fas fa-trash"> Delete</i></a>

                                    </th>
                                </tr>
                                <?php $no; ?>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>
            </div>




        </div>
    </div>



</div>