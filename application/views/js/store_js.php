<script type="text/javascript">
    var table;
    table = $(document).ready(function() {
        $('#table2').DataTable({
            "processing ": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('store_c/get_ajax') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                    "targets": [5, 6],
                    "className": 'text-right'

                },
                {
                    "targets": [7, 8],
                    "className": 'text-center'
                },
                {
                    "targets": [0, 7, 8],
                    "orderable": false
                }

            ],
            "order": []
        });
    });

    // window.onload = function() {
    //     if (window.jQuery) {
    //         // jQuery is loaded  
    //         alert("Yeah!");
    //     } else {
    //         // jQuery is not loaded
    //         alert("Doesn't Work");
    //     }
    // }
</script>