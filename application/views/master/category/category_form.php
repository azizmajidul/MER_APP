<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>




    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Create category <i class="far fa-building"></i></h6>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('category_c/process') ?>" method="POST">

                        <div class="form-group row">
                            <input type="hidden" name="category_id" value="<?= $row->category_id ?>">
                            <label for="name" class="col-sm-3 col-form-label"><i class="far fa-building"></i> Category_Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="category_name" name="category_name" value="<?= $row->category_name ?>" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="float-right mr-2">
                                <a href="<?= site_url('category_c'); ?>" class="btn btn-danger"><i class="far fa-hand-point-left"> Back</i></a>
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