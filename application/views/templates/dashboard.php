<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?> | Aplikasi Purchasing</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/css/fonts.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Datepicker -->
    <link href="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="" rel="">
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/gijgo/css/gijgo.min.css" rel="stylesheet">

    <style>
        #accordionSidebar,
        .topbar {
            z-index: 1;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-white sidebar sidebar-info text-info accordion shadow-sm" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand text-info d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-parking"></i>
                </div>
                <div class="sidebar-brand-text text-info mx-3">Purchasing</div>
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-info" href="<?= base_url('dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php if (is_admin()) : ?>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Data Master
                </div>

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link text-info pb-0" href="<?= base_url('supplier'); ?>">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Supplier</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-info pb-0" href="<?= base_url('requistion'); ?>">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Requistion</span>
                    </a>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link text-info collapsed " href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Barang</span>
                    </a>
                    <div id="collapseMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-light py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Master Barang:</h6>
                            <a class="collapse-item" href="<?= base_url('satuan'); ?>">Satuan Barang</a>
                            <a class="collapse-item" href="<?= base_url('jenis'); ?>">Jenis Barang</a>
                            <a class="collapse-item" href="<?= base_url('barang'); ?>">Data Barang</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
            <?php endif; ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>
            <!-- <hr class="sidebar-divider"> -->

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
                <a class="nav-link text-info pb-0" href="<?= base_url('barangmasuk'); ?>">
                    <i class="fas fa-fw fa-download"></i>
                    <span>Barang Masuk</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-info" href="<?= base_url('barangkeluar'); ?>">
                    <i class="fas fa-fw fa-download"></i>
                    <span>Barang Keluar</span>
                </a>
            </li> -->
            <?php if (is_divisi()) : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link text-info" href="<?= base_url('request_order/add'); ?>">
                        <i class="fas fa-fw fa-edit"></i>
                        <span>Create Request Order</span>
                    </a>
                </li>

                <div class="sidebar-heading">
                    Data
                </div>

                <li class="nav-item">
                    <a class="nav-link text-info pb-0" href="<?= base_url('request_order'); ?>">
                        <i class="fas fa-list-ul"></i>
                        <span>List Request Order</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-info" href="<?= base_url('request_order/histori'); ?>">
                        <i class="fas fa-history"></i>
                        <span>Histori Request Order</span>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link text-info" href="<?= base_url('purchase_order'); ?>">
                        <i class="fas fa-list-ul"></i>
                        <span>List Purchase Order</span>
                    </a>
                </li> -->
            <?php endif; ?>

            <?php if (is_purchasing()) : ?>
                <!-- <li class="nav-item">
                    <a class="nav-link text-info pb-0" href="<?= base_url('purchase_order/dataRo'); ?>">
                        <i class="fas fa-fw fa-download"></i>
                        <span>Request Order Masuk</span>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link text-info" href="<?= base_url('purchase_order/add'); ?>">
                        <i class="fas fa-fw fa-edit"></i>
                        <span>Create Purchase Order</span>
                    </a>
                </li>

                <div class="sidebar-heading">
                    Data
                </div>

                <li class="nav-item">
                    <a class="nav-link text-info pb-0" href="<?= base_url('purchase_order'); ?>">
                        <i class="fas fa-list-ul"></i>
                        <span>List Purchase Order</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-info" href="<?= base_url('purchase_order/histori'); ?>">
                        <i class="fas fa-history"></i>
                        <span>Histori Purchase Order</span>
                    </a>
                </li>
            <?php endif; ?>


            <!-- Divider -->

            <?php if (is_manager()) : ?>
                <li class="nav-item">
                    <a class="nav-link text-info" href="<?= base_url('manager'); ?>">
                        <i class="fas fa-edit"></i>
                        <span>Approve PO</span>
                    </a>
                </li>

                <div class="sidebar-heading">
                    Data
                </div>

                <li class="nav-item">
                    <a class="nav-link text-info pb-0" href="<?= base_url('manager/data_ro'); ?>">
                        <i class="fas fa-database"></i>
                        <span>Data Request Order(RO)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-info" href="<?= base_url('manager/data_po'); ?>">
                        <i class="fas fa-database"></i>
                        <span>Data Purchase Order(PO)</span>
                    </a>
                </li>

            <?php endif; ?>




            <?php if (is_divisi()) : ?>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Report
                </div>
                <li class="nav-item">
                    <a class="nav-link text-info" href="<?= base_url('request_order/report_ro'); ?>">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Cetak Laporan</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (is_purchasing()) : ?>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Report
                </div>
                <li class="nav-item">
                    <a class="nav-link text-info" href="<?= base_url('purchase_order/report_po'); ?>">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Cetak Laporan</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (is_admin()) : ?>
                <!-- Divider -->
                <!-- <hr class="sidebar-divider"> -->
                <!-- Nav Item -->
                <li class="nav-item">
                    <a class="nav-link text-info pb-0" href="<?= base_url('admin/ro'); ?>">
                        <i class="fas fa-fw fa-user-plus"></i>
                        <span>Data Request Order(RO)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-info" href="<?= base_url('admin/po'); ?>">
                        <i class="fas fa-fw fa-user-plus"></i>
                        <span>Data Purchase Order(PO)</span>
                    </a>
                </li>


                <!-- Heading -->
                <div class="sidebar-heading">
                    Settings
                </div>

                <!-- Nav Item -->
                <li class="nav-item">
                    <a class="nav-link text-info" href="<?= base_url('user'); ?>">
                        <i class="fas fa-fw fa-user-plus"></i>
                        <span>User Management</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-info topbar mb-4 static-top shadow-sm">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link bg-transparent d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars text-white"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small text-capitalize">
                                    <?= userdata('nama'); ?>
                                </span>
                                <img class="img-profile rounded-circle" src="<?= base_url() ?>assets/img/avatar/<?= userdata('foto'); ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('profile'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url('profile/setting'); ?>">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="<?= base_url('profile/ubahpassword'); ?>">
                                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <?= $contents; ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-light">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Aplikasi Purchasing &bull; by Ruby</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "Logout" dibawah ini jika anda yakin ingin logout.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a class="btn btn-info" href="<?= base_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Datepicker -->
    <script src="<?= base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/jszip/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>

    <script src="<?= base_url(); ?>assets/vendor/gijgo/js/gijgo.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $('.date').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd'
            });

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#tangal').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
            }

            $('#tanggal').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Hari ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
                    '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
                    'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'Tahun ini': [moment().startOf('year'), moment().endOf('year')],
                    'Tahun lalu': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
                }
            }, cb);

            cb(start, end);
        });

        $(document).ready(function() {
            <?php
            $image = base_url('assets/img/Logo_Rucika.png');

            // Read image path, convert to base64 encoding
            $type = pathinfo($image, PATHINFO_EXTENSION);
            $data = file_get_contents($image);

            $imgData = base64_encode($data);

            // Format the image SRC:  data:{mime};base64,{data};
            $src = 'data:image/' . $type . ';base64,' . $imgData;
            ?>
            var table = $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'print', 'excel',
                    {
                        extend: 'pdfHtml5',
                        customize: function(doc) {
                            doc.content.splice(0, 0, {
                                margin: [0, 0, 0, 12],
                                alignment: 'center',
                                image: '<?= $src ?>'
                            });
                        }
                    }
                ],
                dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu: [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ],
                columnDefs: [{
                    targets: -1,
                    orderable: false,
                    searchable: false
                }]
            });

            table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
        });
    </script>

    <!-- Contoh export image -->
    <!-- <script>
        $(document).ready(function() {
            var logo;
            // Function to convert an img URL to data URL
            function getBase64FromImageUrl(url) {
                var img = new Image();
                img.crossOrigin = "anonymous";
                img.onload = function() {
                    var canvas = document.createElement("canvas");
                    canvas.width = this.width;
                    canvas.height = this.height;
                    var ctx = canvas.getContext("2d");
                    ctx.drawImage(this, 0, 0);
                    var dataURL = canvas.toDataURL("image/png");
                    return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
                };
                img.src = url;
            }
            logo = getBase64FromImageUrl('http://4.bp.blogspot.com/-lReYLgBjpR8/WKA_TG2J4XI/AAAAAAAAAQU/v67E2s4BmtIeyelnP7skweDqP7nui2TrQCK4B/s752/ReddyInfoSoft%2BIcon%2B128%2BTransparent.png');
            //logo = getBase64FromImageUrl('https://datatables.net/media/images/logo.png');
            //logo = getBase64FromImageUrl('./datatables.png');
            //logo = getBase64FromImageUrl('./ReddyInfoSoft.png');
            $('#tblFeStaging').DataTable({
                "ordering": false,
                "pageLength": 25,
                dom: 'Blrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    title: "Main Title",
                    pageSize: 'A4',
                    exportOptions: {
                        search: 'applied',
                        order: 'applied',
                        stripNewlines: false
                    },
                    customize: function(doc) {
                        var rdoc = doc;
                        var rcout = doc.content[doc.content.length - 1].table.body.length - 1;
                        // doc.content.splice(0, 1);
                        doc.content.splice( 1, 0, {
                        margin: [ 0, 0, 0, 12 ],
                        alignment: 'center',
                        image: '<?= base_url('assets/img/logo_rucika.jpg') ?>'});
                        var now = new Date();
                        var jsDate = now.getDate() + '/' + (now.getMonth() + 1) + '/' + now.getFullYear() + '  and Time:' + now.getHours() + ':' + now.getMinutes() + ':' + now.getSeconds();
                        doc.pageMargins = [30, 90, 30, 30];
                        doc.defaultStyle.fontSize = 8;
                        doc.styles.tableHeader.fontSize = 9;
                        doc.content[doc.content.length - 1].table.headerRows = 2;
                        for (var i = 0; i < rcout; i++) {
                            var obj = doc.content[doc.content.length - 1].table.body[i + 1];
                            doc.content[doc.content.length - 1].table.body[(i + 1)][0] = {
                                text: obj[0].text,
                                style: [obj[0].style],
                                bold: true
                            };
                            doc.content[doc.content.length - 1].table.body[(i + 1)][3] = {
                                text: obj[3].text,
                                style: [obj[3].style],
                                alignment: 'center',
                                bold: obj[3].text > 60 ? true : false,
                                fillColor: obj[3].text > 60 ? 'red' : null
                            };

                        }

                        doc['header'] = (function(page, pages) {
                            return {
                                table: {
                                    //widths: ['100%'],
                                    widths: ['auto', 'auto'],
                                    headerRows: 0,
                                    body: [
                                        [{
                                                //margin: [0, 10, 0, 0],
                                                width: 38, //'auto',
                                                alignment: 'center',
                                                /*ReddyInfoSoft*/
                                                //image: 'data:image/png;base64,' + logo,
                                                image: 'data:image/png;base64,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',
                                                //image: './ReddyInfoSoft.png'
                                            },
                                            {
                                                text: 'Sample Main Title',
                                                alignment: 'center',
                                                fontSize: 14,
                                                bold: true,
                                                width: 'auto'
                                                //, margin: [0, 10, 0, 0]
                                            }
                                        ],

                                    ]
                                },
                                layout: 'noBorders',
                                margin: 10
                            }
                        });

                        doc['footer'] = (function(page, pages) {
                            return {
                                columns: [{
                                        alignment: 'left',
                                        text: ['Created Date: ', {
                                            text: jsDate.toString()
                                        }]
                                    },
                                    {
                                        alignment: 'center',
                                        text: 'Total ' + rcout.toString() + ' rows'
                                    },
                                    {
                                        alignment: 'right',
                                        text: ['page ', {
                                            text: page.toString()
                                        }, ' of ', {
                                            text: pages.toString()
                                        }]
                                    }
                                ],
                                margin: 10
                            }
                        });

                        var objLayout = {};
                        objLayout['hLineWidth'] = function(i) {
                            return .8;
                        };
                        objLayout['vLineWidth'] = function(i) {
                            return .5;
                        };
                        objLayout['hLineColor'] = function(i) {
                            return '#aaa';
                        };
                        objLayout['vLineColor'] = function(i) {
                            return '#aaa';
                        };
                        objLayout['paddingLeft'] = function(i) {
                            return 5;
                        };
                        objLayout['paddingRight'] = function(i) {
                            return 35;
                        };
                        doc.content[doc.content.length - 1].layout = objLayout;

                    }
                }]
            });
        });
    </script> -->

    <!-- Untuk modal select RO di bikin PO -->
    <script>
        let satuan = $('#satuan');
        let stok = $('#stok');
        let total = $('#total_stok')

        $(document).ready(function() {
            $(document).on('click', '#select', function() {
                var ro_id = $(this).data('id');
                var divisi_id = $(this).data('divisi');
                var barang_id = $(this).data('barang');
                var quantity = $(this).data('quantity');
                var keterangan = $(this).data('ket');
                $('#id_ro').val(ro_id);
                $('#divisi_id').val(divisi_id);
                $('#barang_id').val(barang_id);
                $('#quantity').val(quantity);
                $('#keterangan').val(keterangan);
                $('#pilihro').modal('hide');
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#selectsup', function() {
                var requistion_id = $(this).data('id');
                var supplier_id = $(this).data('supplier_id');
                var harga = $(this).data('harga');
                var total = 0;
                // var total = parseInt(harga) * parseInt(jumlah);
                $('#requistion_id').val(requistion_id);
                $('#supplier_id').val(supplier_id);
                $('#harga').val(harga);
                var qty = document.getElementById('quantity').value;
                total = qty * harga;
                document.getElementById('total').value = total;
                $('#pilihsup').modal('hide');
            });
        });

        // $(document).ready(function() {
        //     $("#quantity, #harga").keyup(function() {
        //         var harga = $("#harga").val();
        //         var jumlah = $("#jumlah").val();

        //         var total = parseInt(harga) * parseInt(jumlah);
        //         $("#total").val(total);
        //     });
        // });
    </script>

    <script type="text/javascript">
        let hal = '<?= $this->uri->segment(1); ?>';

        let satuan = $('#satuan');
        let stok = $('#stok');
        let total = $('#total_stok');
        let jumlah = hal == 'barangmasuk' ? $('#jumlah_masuk') : $('#jumlah_keluar');

        $(document).on('change', '#barang_id', function() {
            let url = '<?= base_url('barang/getstok/'); ?>' + this.value;
            $.getJSON(url, function(data) {
                satuan.html(data.nama_satuan);
                stok.val(data.stok);
                total.val(data.stok);
                jumlah.focus();
            });
        });

        $(document).on('keyup', '#jumlah_masuk', function() {
            let totalStok = parseInt(stok.val()) + parseInt(this.value);
            total.val(Number(totalStok));
        });

        $(document).on('keyup', '#jumlah_keluar', function() {
            let totalStok = parseInt(stok.val()) - parseInt(this.value);
            total.val(Number(totalStok));
        });
    </script>


    <?php if ($this->uri->segment(1) == 'dashboard') : ?>
        <!-- Chart -->
        <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

        <script type="text/javascript">
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            function number_format(number, decimals, dec_point, thousands_sep) {
                // *     example: number_format(1234.56, 2, ',', ' ');
                // *     return: '1 234,56'
                number = (number + '').replace(',', '').replace(' ', '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            // Area Chart Example
            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                    datasets: [{
                            label: "Total Barang Masuk",
                            lineTension: 0.3,
                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                            borderColor: "rgba(78, 115, 223, 1)",
                            pointRadius: 3,
                            pointBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointBorderColor: "rgba(78, 115, 223, 1)",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "#5a5c69",
                            pointHoverBorderColor: "#5a5c69",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: <?= json_encode($cbm); ?>,
                        },
                        {
                            label: "Total Barang Keluar",
                            lineTension: 0.3,
                            backgroundColor: "rgba(231, 74, 59, 0.05)",
                            borderColor: "#e74a3b",
                            pointRadius: 3,
                            pointBackgroundColor: "#e74a3b",
                            pointBorderColor: "#e74a3b",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "#5a5c69",
                            pointHoverBorderColor: "#5a5c69",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: <?= json_encode($cbk); ?>,
                        }
                    ],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: 5
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                            }
                        }
                    }
                }
            });

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Barang Masuk", "Barang Keluar"],
                    datasets: [{
                        data: [<?= $barang_masuk; ?>, <?= $barang_keluar; ?>],
                        backgroundColor: ['#4e73df', '#e74a3b'],
                        hoverBackgroundColor: ['#5a5c69', '#5a5c69'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 80,
                },
            });
        </script>
    <?php endif; ?>
</body>

</html>