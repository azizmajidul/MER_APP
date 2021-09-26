<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>




    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"><?= ucfirst($page) ?> Store <i class="fas fa-fw fa-boxes"></i></h6>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('store_c/process') ?>" method="POST">

                        <div class="form-group row">
                            <input type="hidden" name="id" value="<?= $row->id ?>">
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-store"></i> Store Code</label>
                            <div class="col-sm-9 mb-4">
                                <input type="text" class="form-control" id="store_id" name="store_id" value="<?= $row->store_id ?>" required unique>

                            </div>
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-store"></i> Store Name</label>
                            <div class="col-sm-9 mb-4">
                                <input type="text" class="form-control" id="store_name" name="store_name" value="<?= $row->store_name ?>" required>

                            </div>
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-font"></i> Category</label>
                            <div class="col-sm-9 mb-4 form-group">
                                <select name="account_id" id="account_id" class="form-control">
                                    <option value=""> -Select Account- </option>
                                    <?php foreach ($account->result() as $key => $data) { ?>
                                        <option value="<?= $data->account_id ?>" <?= $data->account_id == $row->account_id ? "selected" : null ?>><?= $data->account_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-warehouse"></i> DC </label>
                            <div class="col-sm-9 mb-4">
                                <input type="text" class="form-control" id="dc" name="dc" value="<?= $row->dc ?>" required>

                            </div>
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-map-marked-alt"></i> Address</label>
                            <div class="col-sm-9 mb-4">
                                <input type="text" class="form-control" id="address" name="address" value="<?= $row->address ?>" required>

                            </div>
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-store-alt"></i> Store Type</label>
                            <div class="col-sm-9 mb-4">
                                <input type="text" class="form-control" id="store_type" name="store_type" value="<?= $row->store_type ?>" required>

                            </div>

                        </div>

                        <div class="form-group">
                            <div class="float-right mr-2">
                                <a href="<?= site_url('store_c'); ?>" class="btn btn-danger"><i class="far fa-hand-point-left"> Back</i></a>
                                <button type="submit" name="<?= $page ?>" class="btn btn-primary"><i class="fas fa-paper-plane"> Save</i></button>
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