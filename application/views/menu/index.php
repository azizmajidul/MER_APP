<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1> -->
    

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
            <?= form_error(
                'menu',
                '<div class="alert alert-danger" role="alert">',

                '</div>'
            ); ?>

            <?= $this->session->flashdata('message'); ?>

            <br>
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header" style="height: 50px;">
                    <div class="row">
                        <div class="col-lg-8">
                            <h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
                        </div>
                        <div class="col-lg-4">
                            <a href="" class=" btn btn-success btn-sm mb-3 float-right" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus"></i> Add</a>
                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-striped" id="table1" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($menu as $m) : ?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <th><?= $m['menu'] ?></th>
                                    <th>
                                        <a href="" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#edit_modal<?= $m['id'] ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="<?= site_url('menu/delete_menu/' . $m['id']) ?>" data-toggle="tooltip" data-placement="top" title="Delete" onclick=" return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?') " class="btn btn-danger btn-sm "><i class="fas fa-trash"> </i></a>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- Modal add -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">

                        </div>
                        <input type="text" class="form-control" name="menu" id="menu" placeholder="Menu Name ">

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Save</button>
                </div>
            </form>
        </div>

    </div>
</div>

<?php $no = 0; ?>
<?php foreach ($menu as $m) : $no++ ?>
    <div class="modal fade" id="edit_modal<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_modalLabel">New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/edit_menu'); ?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $m['id'] ?>">
                        <div class="form-group">
                            <div class="input-group">
                            </div>
                            <input type="text" class="form-control" name="menu" id="menu" placeholder="Menu Name " value="<?= $m['menu'] ?>">

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

<?php endforeach; ?>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(300, 0).slideUp(300, function() {
            $(this).remove();
        });
    }, 1500);
</script>