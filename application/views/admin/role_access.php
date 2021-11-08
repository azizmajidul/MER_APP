<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    

    <style>
        .card {
            box-shadow: 5px 5px;
            outline: 5px;
        }
    </style>
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
            <?= $this->session->flashdata('message'); ?>

            <h5>Role Anda : <?= $role['role'] ?> </h5>



            <div class="card">
                <div class="card-header bg-info text-white">
                    Featured
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-striped" id="table1" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Accses</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($menu as $m) : ?>
                                <tr>
                                    <td scope="row"><?= $no; ?></td>
                                    <td><?= $m['menu'] ?></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" <?= cek_access($role['role_id'], $m['id']); ?> data-role="<?= $role['role_id']; ?>" data-menu="<?= $m['id']; ?>">

                                        </div>
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





<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(300, 0).slideUp(300, function() {
            $(this).remove();
        });
    }, 1500);
</script>