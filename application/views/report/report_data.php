<script src="<?= base_url() ?>assets/sbadmin2/vendor/jquery/jquery.min.js"></script>

<div class="container-fluid">

    <!-- Page Heading -->
    
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
       
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Start Date" id="start_date" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="End Date" id="end_date" readonly>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <button id="filter" class="btn btn-outline-info btn-sm">Filter </button>
                                <button id="reset" class="btn btn-outline-warning btn-sm">Reset </button>
                            </div>
                        </div>

                    </div>

                </div>


            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header" style="height: 50px;">
                    <div class="row">
                        <div class="col-lg-8">
                            <h6 class="m-0 font-weight-bold text-primary">Data Report Visit</h6>
                        </div>
                        <div class="col-lg-4">

                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-striped" id="table_report" style="width: 100%;">
                        <thead>
                            <tr>
                                <!-- <th scope="col">No</th> -->
                                <th scope="col">User ID</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Area Coverage</th>
                                <th scope="col">Store Code</th>
                                <th scope="col">Store Name</th>
                                <th scope="col">Store Type</th>
                                <th scope="col">DC</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Distributor</th>
                                <th scope="col">QTY</th>
                                <th scope="col">Facing</th>
                                <th scope="col">Price Card</th>
                                <th scope="col">Fifo</th>
                                <th scope="col">Normal Price</th>
                                <th scope="col">Promo Price</th>
                                <!-- <th scope="col">Image</th> -->
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php $no = 1; ?>
                            <?php foreach ($row->result() as $key => $data) : ?>
                                <tr>
                                    <th><?= $no ?></th>
                                    <th><?= $data->user_id ?></th>
                                    <th><?= $data->user_name ?></th>
                                    <th><?= $data->role ?></th>
                                    <th><?= $data->email ?></th>
                                    <th><?= $data->area_coverage ?></th>
                                    <th><?= $data->store_id ?></th>
                                    <th><?= $data->store_name ?></th>
                                    <th><?= $data->store_type ?></th>
                                    <th><?= $data->dc ?></th>
                                    <th><?= $data->product_name ?></th>
                                    <th><?= $data->category_name ?></th>
                                    <th><?= $data->company ?></th>
                                    <th><?= $data->qty ?></th>
                                    <th><?= $data->facing ?></th>
                                    <th><?= $data->price_card ?></th>
                                    <th><?= $data->fifo_product ?></th>
                                    <th><?= $data->normal_price ?></th>
                                    <th><?= $data->promo_price ?></th>
                                    <th><?= $data->image_documentation ?></th>
                                    <th><?= indo_date($data->created_date) ?>


                                    </th>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?> -->
                        </tbody>

                    </table>

                </div>
            </div>




        </div>
    </div>



</div>

<script>
    $(document).ready(function() {

    })
</script>