<!-- Begin Page Content -->
<script src="<?= base_url() ?>assets/sbadmin2/vendor/jquery/jquery.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>




    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Audit <i class="far fa-building"></i></h6>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('audit_c/add_report') ?>" method="POST">

                        <div class="form-group row">
                            <!-- <input type="text" id="store_name" name="store_name" value="<?= $store['schedule_id']; ?>"> -->
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-store-alt"></i> Store Name</label>
                            <div class="col-sm-9 mb-2">
                                <input type="hidden" id="id_toko" name="id_toko" value="<?= $store['id_toko'] ?>">
                                <input type="text" class="form-control" id="store_id" name="store_id" value="<?= $store['store_id']; ?> - <?= $store['store_name']; ?>" readonly>

                            </div>
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-cubes"></i> Product Name</label>
                            <div class="col-sm-9 mb-2">
                                <input type="hidden" id="product_id" name="product_id" value="<?= $product['product_id'] ?>">
                                <input type="hidden" id="category_id" name="category_id" value="<?= $product['category_id'] ?>">
                                <input type="text" class="form-control" id="category_name" name="category_name" value="<?= $product['product_name']; ?>" readonly>
                            </div>
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-calculator"></i> Stock</label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" class="form-control" id="qty" name="qty" placeholder="Stock">

                            </div>

                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-ruler"></i> Facing</label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" class="form-control" id="facing" name="facing" placeholder="Facing">
                            </div>
                            <label for="name" class="col-sm-3 col-form-label mt-0"><i class="fas fa-barcode"></i> Price Card</label>
                            <div class="col-sm-9 mb-2">
                                <!-- Default inline 1-->

                                <input type="radio" name="price_card" id="price_card" value="Yes" /> Yes
                                <input type="radio" name="price_card" id="price_card" value="No" /> No



                            </div>

                            <label for="name" class="col-sm-3 col-form-label mt-0"><i class="fas fa-map-signs"></i> Fifo Product</label>
                            <div class="col-sm-9 mb-2">
                                <input type="radio" name="fifo" id="fifo" value="Yes" /> Yes
                                <input type="radio" name="fifo" id="fifo" value="No" /> No

                            </div>

                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-money-check-alt"></i> Normal Price</label>
                            <div class="col-sm-9 mb-2">
                                <input type="number" class="form-control" id="normal_price" name="normal_price" placeholder="Normal Price">
                            </div>
                            <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-money-check-alt"></i> Promo Price</label>
                            <div class="col-sm-9 mb-2">
                                <input type="number" class="form-control" id="promo_price" name="promo_price" placeholder="Promo Price">
                            </div>


                            <div class="form-group row">

                                <div class="col-sm-4"> <i class="fas fa-camera"></i> Picture </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">
                            <div class="float-right mr-2">
                                <a href="<?= site_url('audit_c/audit_store/' . $store['id_toko']); ?>" class="btn btn-danger"><i class="far fa-hand-point-left"> Back</i></a>
                                <button type="submit" name="" class="btn btn-primary"><i class="fas fa-paper-plane"> Save</i></button>
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