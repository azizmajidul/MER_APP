<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1> -->

    <div class="row">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8">
            <?= form_error(
                'menu',
                '<div class="alert alert-danger" role="alert">',

                '</div>'
            ); ?>

            <?= $this->session->flashdata('message'); ?>
            <a href="" class=" btn btn-success mb-3" data-toggle="modal" data-target="#roleModal"> <i class="fas fa-plus"></i> New Role Acces</a>
            <br>
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Data Role Access</h6>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-striped" id="table1" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Role Access</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($role as $r) : ?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <th><?= $r['role'] ?></th>
                                    <th>
                                        <a href="<?= base_url('admin/role_access/') . $r['role_id'] ?>" class="badge badge-success   btn-xs"><i class="far fa-eye"></i> Access</a>
                                        <a href="" class="badge badge-primary btn-xs" data-toggle="modal" data-target="#edit_modal<?= $r['role_id'] ?>"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?= site_url('admin/delete_role/' . $r['role_id']) ?>" onclick=" return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?') " class="badge badge-danger btn-xs "><i class="fas fa-trash"> Delete</i></a>
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
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel">Add New Role Access</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/add_role'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">

                        </div>
                        <input type="text" class="form-control" name="role" id="role" placeholder="Role Name ">

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
<?php foreach ($role as $r) : $no++ ?>
    <div class="modal fade" id="edit_modal<?= $r['role_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_modalLabel">New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/edit_role'); ?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="role_id" value="<?= $r['role_id'] ?>">
                        <div class="form-group">
                            <div class="input-group">
                            </div>
                            <input type="text" class="form-control" name="role" id="role" placeholder="Role Name " value="<?= $r['role'] ?>">

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