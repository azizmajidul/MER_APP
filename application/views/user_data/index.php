<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= form_error(
        'menu',
        '<div class="alert alert-danger" role="alert">',

        '</div>'
    ); ?>
    <?= $this->session->flashdata('message'); ?>
    <a href="<?= base_url('user_data_c/add'); ?>" class=" btn btn-success mb-3"> <i class="fas fa-user-plus"></i> Create New User</a>
    <br>



    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Data Sub Menu</h6>
                </div>
                <div class="card-body">

                    <table class="table table-hover table-bordered table-striped" id="table1" style="width: 100%;">
                        <thead class="">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Area Coverage</th>
                                <th scope="col">Address</th>
                                <th scope="col">Position</th>
                                <!-- <th scope="col">Profil Image</th> -->
                                <th scope="col">Status</th>
                                
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($data_user as $data) : ?>
                                <tr>
                                    <th style="width: 5%"><?= $no; ?></th>
                                    <td><?= $data['name'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td><?= $data['area_coverage'] ?></td>
                                    <td><?= $data['address'] ?></td>
                                    <td><?= $data['role_id'] == 1 ? "Admin" : "Merchandiser" ?></td>
                                    <!-- <td>
                                        <img src="<?= base_url('assets/img/profil/') . $data['image'] ?>" class="img-thumbnail" style="width:100px">
                                    </td> -->
                                    <td>

                                        <?= $data['is_active'] == 1 ? '<label class="badge badge-success badge-sm"> Active </label>' : '<label class="badge badge-danger badge-sm">Non Active </label>'  ?>


                                    </td>
                                    




                                    <td>
                                        <a href="<?= base_url('user_data_c/edit/') . $data['id'] ?> " class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit  "><i class="fas fa-pencil-alt"></i></a>
                                        <a href="" onclick=" return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?') " class="btn btn-danger btn-sm " data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
                                    </td>
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