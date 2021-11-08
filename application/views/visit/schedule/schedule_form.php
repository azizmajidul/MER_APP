<!-- Begin Page Content -->



<script src="<?= base_url() ?>assets/sbadmin2/vendor/jquery/jquery.min.js"></script>
<!-- <script src="<?= base_url() ?>assets/sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->
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
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"><?= ucfirst('') ?> Schedule <i class="fas fa-fw fa-road"></i></h6>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('schedule_visit_c/process') ?>" method="POST">

                        <div class="input-group">
                            <input type="hidden" name="schedule_id" id="schedule_id" value="<?= $row->schedule_id ?>">
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-store-alt"></i> Store Code</label>
                            <div class="input-group col-sm-9 mb-3">
                                <!-- id store  -->
                                <input type="hidden" class="form-control" id="id_toko" value="<?= $row->id_store ?>" name="id" placeholder="ID TOKO" aria-describedby="basic-addon2">
                                <input type="text" class="form-control" id="store_id" value="<?= $row->store_id ?>" placeholder="" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-store">
                                        <i class="fas fa-fw fa-search"></i>
                                    </button>
                                </div>
                            </div>


                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-store"></i> Store Name</label>
                            <div class="col-sm-9 mb-4">
                                <input type="text" class="form-control" id="store_name" name="store_name" value="<?= $row->store_name ?>" readonly required placeholder="Store Name">

                            </div>
                            <!-- id account hidden  -->
                            <input type="hidden" class="form-control" id="account_id" name="account_id" value="<?= $row->account_id ?>" readonly required placeholder="account">


                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-store"></i> Store Type</label>
                            <div class="col-sm-9 mb-4">
                                <input type="text" class="form-control" id="store_type" name="store_type" value="<?= $row->store_type ?>" readonly required placeholder="Store Type">

                            </div>
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-warehouse"></i> DC</label>
                            <div class="col-sm-9 mb-4">
                                <input type="text" class="form-control" id="dc" name="dc" value="<?= $row->dc ?>" readonly required placeholder="Distribution Center">

                            </div>


                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-user-edit"></i> User Id</label>
                            <div class="input-group col-sm-9 mb-3">
                                <input type="text" id="id_user" name="id_user" value="<?= $row->user_id ?>" class="form-control" placeholder="User Id" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-user">
                                        <i class="fas fa-fw fa-search"></i>
                                    </button>
                                </div>
                            </div>


                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-user"></i> Name</label>
                            <div class="col-sm-9 mb-4">
                                <input type="text" class="form-control" id="name" name="name" value="<?= $row->user_name ?>" readonly required placeholder="User Name">

                            </div>
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-fw fa-map-marked-alt"></i> Area Coverage</label>
                            <div class="col-sm-9 mb-4">
                                <input type="text" class="form-control" id="area_coverage" name="area_coverage" value="<?= $row->area_coverage ?>" readonly required placeholder="Area coverage">

                            </div>

                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-user-tag"></i> Position</label>
                            <div class="col-sm-9 mb-4">
                                <!-- <input type="text" class="form-control" id="role_id" name="role" value="" readonly required placeholder="role_id"> -->
                                <input type="text" class="form-control" id="role_id" name="role_id" value="<?= $row->role_id ?>" readonly required placeholder="Position">
                            </div>

                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-calendar-check"></i> Date Of Visit</label>
                            <div class="col-sm-9 mb-4">
                                <input type="date" class="form-control" id="date" name="date" value="<?= $row->date ?>" required>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="float-right mr-2">
                                <button type="submit" class="btn btn-primary" name="<?= $page ?>"><i class="fas fa-paper-plane"> Save</i></button>
                                <a href="<?= site_url('schedule_visit_c'); ?>" class="btn btn-danger"><i class="far fa-hand-point-left"> Back</i></a>
                                <!-- <button type="submit" name="<?= $page ?>" class="btn btn-primary"><i class="fas fa-paper-plane"> Save</i></button> -->
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

<div class="modal fade" id="modal-store" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel">Select Store</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-hover table-bordered table-striped" id="table2" style="width: 100%;" class="display">
                    <thead style="width: 100%;">
                        <tr>
                            <th>No</th>
                            <th>Store Code</th>
                            <th>Account Name</th>
                            <th>Store Name</th>
                            <th>Store Type</th>
                            <th>Distribution Center</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($store->result() as $key => $data) : ?>
                            <tr>

                                <td><?= $no ?></td>
                                <td><?= $data->store_id ?></td>
                                <td><?= $data->account_name ?></td>
                                <td><?= $data->store_name ?></td>
                                <td><?= $data->store_type ?></td>
                                <td><?= $data->dc ?></td>
                                <td>
                                    <button class="btn btn-sm btn-info" id="pilih" data-id="<?= $data->id ?>" data-store_id="<?= $data->store_id ?>" data-account_id="<?= $data->account_id ?>" data-store_name="<?= $data->store_name ?>" data-dc="<?= $data->dc ?>" data-store_type="<?= $data->store_type ?>">
                                        <i class="fas fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>

                </table>




            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>

        </div>

    </div>
</div>



<script>
    $(document).ready(function() {

        $(document).on('click', '#pilih', function() {
            var id = $(this).data('id');
            var store_id = $(this).data('store_id');
            var account_id = $(this).data('account_id');
            var store_name = $(this).data('store_name');
            var store_type = $(this).data('store_type');
            var dc = $(this).data('dc');
            $('#id_toko').val(id);
            $('#store_id').val(store_id);
            $('#account_id').val(account_id);
            $('#store_name').val(store_name);
            $('#store_type').val(store_type);
            $('#dc').val(dc);
            $('#modal-store').modal('hide');
        })

    })
</script>








<div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel">Select User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-hover table-bordered table-striped" id="table3" class="display" style="width: 100%;">
                    <thead style="width: 100%;">
                        <tr>
                            <th>No</th>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th>Area Coverage</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($user_data as $key => $data) : ?>
                            <tr>

                                <td><?= $no ?></td>
                                <td><?= $data['id'] ?></td>
                                <td><?= $data['name'] ?></td>
                                <td><?= $data['area_coverage'] ?></td>
                                <td><?= $data['role'] ?></td>
                                <td>
                                    <button class="btn btn-sm btn-info" id="select" data-id="<?= $data['id'] ?>" data-name="<?= $data['name'] ?>" data-area_coverage="<?= $data['area_coverage'] ?>" data-role="<?= $data['role_id']    ?>">
                                        <i class="fas fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>

                </table>





            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>




        </div>

    </div>
</div>



<script>
    $(document).ready(function() {

        $(document).on('click', '#select', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var area_coverage = $(this).data('area_coverage');
            var role = $(this).data('role');

            $('#id_user').val(id);
            $('#name').val(name);
            $('#area_coverage').val(area_coverage);
            $('#role_id').val(role);

            $('#modal-user').modal('hide');
        })

    })
</script>


<script>
    $('#user').on('change', function() {
        // const name = $('#user option:selected').data('id');
        const name = $('#user option:selected').data('name');
        const area_coverage = $('$user option:selected').data('area_coverage');

        $('[id = name]').val(name);
        $('[id = area_coverage]').val(area_coverage);

        // $('#name').val(id);
        // $('#name').val(name);
        // $('#area_coverage').val(area_coverage);

    })
</script>


<script>
    $(document).ready(function() {
        $('#table2').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#table3').DataTable();
    });
</script>







<!--  -->