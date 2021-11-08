<style>
    .modal-header {
        color: blue;
    }
</style>
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

    <?= form_error(
        'menu',
        '<div class="alert alert-danger" role="alert">',

        '</div>'
    ); ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header" style="height: 50px;">
                    <div class="row">
                        <div class="col-lg-8">
                            <h6 class="m-0 font-weight-bold text-primary">Data Submenu</h6>
                        </div>
                        <div class="col-lg-4">
                            <a href="" class=" btn btn-success btn-sm mb-3 float-right" data-toggle="modal" data-target="#New_sub_menu"> <i class="fas fa-plus"></i> Add</a>
                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-striped" id="table1" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title Sub Menu</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Url</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($subMenu as $sm) : ?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <th><?= $sm['title'] ?></th>
                                    <th><?= $sm['menu'] ?></th>
                                    <th><?= $sm['url'] ?></th>
                                    <th><?= $sm['icon'] ?></th>
                                    <th><?= $sm['is_active']  == 1 ? '<label class="badge badge-success badge-sm"> Active </label>' : '<label class="badge badge-danger badge-sm">Non Active </label>' ?></th>
                                    <th>
                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit_sub_menu<?= $sm['id'] ?>"><i class=" fas fa-pencil-alt"></i></a>
                                        <a href="<?= base_url('menu/delete_SubMenu/' . $sm['id']) ?>" onclick=" return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?') " class="btn btn-danger btn-sm "><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="New_sub_menu" tabindex="-1" role="dialog" aria-labelledby="New_sub_menuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="New_sub_menuLabel">New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">

                        </div>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Insert Menu Name " required>

                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value=""> -Select Menu- </option>
                            <?php foreach ($menu as $m) : ?>

                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <div class="input-group">

                        </div>
                        <input type="text" class="form-control" name="url" id="url" placeholder="Insert URL Menu " required>

                    </div>
                    <div class="form-group">
                        <div class="input-group">

                        </div>
                        <input type="text" class="form-control" name="icon" id="icon" placeholder="Insert Icon Menu" required>

                    </div>
                    <div class="form-group">
                        <div class="row ml-2">
                                <div class="form-check col-lg-4">
                                    <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active">

                                    <label for="" class="form-check-label" for="is_active"> Active?</label>
                                </div>
                                <div class="form-check col-lg-4">
                                    <input type="checkbox" class="form-check-input" value="0" name="is_active" id="is_active">

                                    <label for="" class="form-check-label" for="is_active"> Non Active? </label>
                                </div>

                            </div>
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


<!-- modal edit -->
<?php $no = 0; ?>
<?php foreach ($subMenu as $sm) : $no++ ?>

    <div class="modal fade" id="Edit_sub_menu<?= $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="Edit_sub_menuLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Edit_sub_menuLabel">Edit Sub Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/EditSubMenu'); ?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $sm['id'] ?>">


                        <div class="form-group">
                            <div class="input-group">

                            </div>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Insert Menu Name " value="<?= $sm['title'] ?>" required>

                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value=""> -Select Menu- </option>
                                <?php foreach ($menu as $m) : ?>

                                    <option value="<?= $m['id'] ?>"><?= $m['menu'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <div class="input-group">

                            </div>
                            <input type="text" class="form-control" name="url" id="url" value="<?= $sm['url'] ?>" placeholder="Insert URL Menu " required>

                        </div>
                        <div class="form-group">
                            <div class="input-group">

                            </div>
                            <input type="text" class="form-control" name="icon" id="icon" value="<?= $sm['icon'] ?>" placeholder="Insert Icon Menu" required>

                        </div>
                        <div class="form-group">
                            <div class="row ml-2">
                                <div class="form-check col-lg-4">
                                    <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active">

                                    <label for="" class="form-check-label" for="is_active"> Active?</label>
                                </div>
                                <div class="form-check col-lg-4">
                                    <input type="checkbox" class="form-check-input" value="0" name="is_active" id="is_active">

                                    <label for="" class="form-check-label" for="is_active"> Non Active? </label>
                                </div>

                            </div>


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

<?php endforeach; ?>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 1500);


    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>