<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>




    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"><?= ucfirst($page) ?> Product <i class="fas fa-fw fa-boxes"></i></h6>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('produk_c/process') ?>" method="POST">

                        <div class="form-group row">
                            <input type="hidden" name="product_id" value="<?= $row->product_id ?>">
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-boxes"></i> Produk Name</label>
                            <div class="col-sm-9 mb-4">
                                <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $row->product_name ?>" required>

                            </div>
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-truck"></i> Distributor</label>
                            <div class="col-sm-9 mb-4">
                                <input type="text" class="form-control" id="company" name="company" value="<?= $row->company ?>" required>

                            </div>
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-font"></i> Category</label>
                            <div class="col-sm-9 mb-4 form-group">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value=""> -Select Category- </option>
                                    <?php foreach ($category->result() as $key => $data) { ?>
                                        <option value="<?= $data->category_id ?>" <?= $data->category_id == $row->category_id ? "selected" : null ?>><?= $data->category_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="float-right mr-2">
                                <a href="<?= site_url('produk_c'); ?>" class="btn btn-danger"><i class="far fa-hand-point-left"> Back</i></a>
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