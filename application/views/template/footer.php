<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SMART MD - MERCHANDISER INFORMATION SYSTEM <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth_login/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>assets/sbadmin2/vendor/jquery/jquery.min.js"></script>
<!-- <script src="<?= base_url() ?>vendor/jquery/jquery-3.1.1.min.js"></script> -->



<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script src="<?= base_url() ?>assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/sbadmin2/js/sb-admin-2.min.js"></script>

<script src="<?= base_url() ?>assets/sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


<!-- export DataTable Js -->
<script src="//cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>





<script>
    $(function() {
        $("#start_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
        $("#end_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
    });
</script>


<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(300, 0).slideUp(300, function() {
            $(this).remove();
        });
    }, 1500);
</script>

<!-- Data Table -->


<script>
    $(document).ready(function() {

        var table = $('#table1').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            }
        })
    })
</script>






<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });



    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/change_Access'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/role_access/'); ?>" + roleId;
            }


        });


    });



    // $(document).ready(function() {

    //     var table = $('#table_report').DataTable({
    //         scrollY: "300px",
    //         scrollX: true,
    //         scrollCollapse: true,
    //         paging: true,
    //         fixedColumns: {
    //             leftColumns: 1,
    //             rightColumns: 1
    //         }
    //     })
    // })


    function getData(start_date, end_date) {
        $.ajax({
            url: "report_c/tampil",
            type: "POST",
            data: {
                start_date: start_date,
                end_date: end_date
            },
            dataType: "json",
            success: function(data) {
                // dataTables
                var i = "1";
                $('#table_report').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: true,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    },
                    "data": data,
                    dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

                    buttons: [{
                            extend: 'csv',
                            className: 'btn-info'
                        },
                        {
                            extend: 'excel',
                            className: 'btn-info'
                        }
                    ],
                    "columns": [{
                            "data": "id_user"
                        },
                        {
                            "data": "user_name"
                        },

                        {
                            "data": "email"
                        },
                        {
                            "data": "area_coverage"
                        },
                        {
                            "data": "store_id"
                        },
                        {
                            "data": "store_name"
                        },
                        {
                            "data": "store_type"
                        },
                        {
                            "data": "dc"
                        },
                        {
                            "data": "product_name"
                        },
                        {
                            "data": "category_name"
                        },
                        {
                            "data": "company"
                        },
                        {
                            "data": "qty"
                        },
                        {
                            "data": "facing"
                        },
                        {
                            "data": "price_card"
                        },
                        {
                            "data": "fifo_product"
                        },
                        {
                            "data": "normal_price"
                        },
                        {
                            "data": "promo_price"
                        },
                        {
                            "data": "tanggal",

                        },
                    ]
                });

            }

        });

    }
    getData();
    // fetch();




    // Filter
    $(document).on("click", "#filter", function(e) {
        e.preventDefault();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();


        if (start_date == "" || end_date == "") {
            alert("Please Select The Date!!!");
        } else {

            $('#table_report').DataTable().destroy();
            getData(start_date, end_date);
            // alert(start_date + end_date);


        }

    });
    $(document).on("click", "#reset", function(e) {
        e.preventDefault();
        $("#start_date").val("");
        $("#end_date").val("");
        $('#table_report').DataTable().destroy();
        getData();


    });
</script>


</body>

</html>
