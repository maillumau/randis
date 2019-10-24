<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Tables</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/bootstrap/css/bootstrap.min.css"); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/fonts/circular-std/style.css"); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/libs/css/style.css"); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/fonts/fontawesome/css/fontawesome-all.css"); ?>">

     <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/css/dataTables.bootstrap4.css"); ?>">
     <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/css/buttons.bootstrap4.css"); ?>">
     <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/css/select.bootstrap4.css"); ?>">
     <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/css/fixedHeader.bootstrap4.css"); ?>">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php  $this->load->view("common/dashboard_header"); ?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
       <?php  $this->load->view("kelompok3/common/left_sidebar"); ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Randis</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Randis</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Jenis Kendaraan</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Tambah Jenis Kendaraan</h5>
                                <div class="card-body">
                                    <form id="form" data-parsley-validate="" novalidate="" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Jenis</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="jenis" type="text" required="" placeholder="Masukkan Jenis Kendaraan" class="form-control" name="jenis">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputWebSite" class="col-3 col-lg-2 col-form-label text-right">Kode</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="kode" type="text" required="" placeholder="Masukkan Kode" class="form-control" name="kode">
                                            </div>
                                        </div>
                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="card">
                            <h5 class="card-header">Daftar Jenis Kendaraan</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first" id="datatable_randis">
                                        <thead>
                                            <tr>
                                            	<th>No</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Kode</th>           
                                                <th></th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($jenis_kendaraan as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td> <?php echo $value->jenis;?></td>
                                                <td><?php echo $value->kode;?> </td>
                                                <td> <button>
                                                        <a href="<?php echo site_url("kelompok3/delete_jenis/".$value->id); ?>" onclick="return confirm('Yakin di hapus?')" class="" style="color:#FF0000;"> 
                                                         <i class="fa fa-trash"></i></a>
                                                    </button> </td>
                                             </tr>   
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Kode</th>           
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2018. All rights reserved.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->


    <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="no_plat"></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
            <div class="modal-body">
              <p id="merek"></p>
              <!-- <p><img id="image_qr"> </p> -->

                             <div class="card card-figure">
                                    <!-- .card-figure -->
                                    <figure class="figure">
                                        <!-- .figure-img -->
                                        <div class="figure-attachment">
                                            <img id="image_qr" alt="Card image cap" class="img-fluid"> </div>
                                        <!-- /.figure-img -->
                                        <figcaption class="figure-caption">
                                            <ul class="list-inline d-flex text-muted mb-0">
                                                <li class="list-inline-item text-truncate mr-auto"> download QRCode </li>
                                                 <li class="list-inline-item">
                                                        <a id="ref_download" download="" style="color:#FF0000;">  <span><i class="fas fa-download "></i></span></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#" class="btn btn-reset text-muted" title="More actions">
                                                            <span class="fas fa-caret-down"></span>
                                                        </a>
                                                    </li>
                                            </ul>
                                        </figcaption>
                                    </figure>
                                    <!-- /.card-figure -->
                                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>



     <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/jquery/jquery-3.3.1.min.js"); ?>"></script>
     <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/bootstrap/js/bootstrap.bundle.js"); ?>"></script>
     <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/slimscroll/jquery.slimscroll.js"); ?>"></script>
     <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/multi-select/js/jquery.multi-select.js"); ?>"></script>
     <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/libs/js/main-js.js"); ?>"></script>
   


     <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/jquery.dataTables.min.js"); ?>"></script>


    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"); ?>"></script>

    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/dataTables.buttons.min.js"); ?>"></script>

    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/buttons.bootstrap4.min.js"); ?>"></script>

    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/data-table.js"); ?>"></script>

    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/jszip.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/pdfmake.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/vfs_fonts.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/buttons.html5.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/buttons.print.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/buttons.colVis.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/dataTables.rowGroup.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/dataTables.select.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datatables/js/dataTables.fixedHeader.min.js"); ?>"></script>
    
</body>




       <script type="text/javascript">

                $(document).ready( function () {

                         $('#datatable_randis').on('click', 'tbody tr .kartu', function () {
                            var base = '<?=base_url()?>';
                            var barcode_path = base + "uploads/foto_qrcode/";

                            var no_plat = $(this).closest('tr').find('.no_plat').text();
                            var merek = $(this).closest('tr').find('.merek').text();

                            //alert(no_plat);


                            $.ajax({
                                    type: "POST",
                                    url: base + "kelompok4/cetak_QR",
                                    data:{  "no_plat": no_plat},
                                    dataType: "html",
                                    cache: false,
                                    success: function(data) {

                                      console.log(data);
                                       $('#no_plat').text(no_plat);
                                       $('#merek').text(merek);
                                      $('#image_qr').attr('src',barcode_path+no_plat+'.png');
                                       $('#ref_download').attr('href',barcode_path+no_plat+'.png');
                                                               
                                    },
                                    error: function (data) {
                                        console.log('An error occurred.');
                                        console.log(data);
                                    }
                                });

                            event.preventDefault();

                        });

                                            
                } );

        </script>
 
</html>