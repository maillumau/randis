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
       <?php  $this->load->view("kelompok4/common/left_sidebar"); ?>
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
                                        <li class="breadcrumb-item active" aria-current="page">Data Randis</li>
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
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Data Randis</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first" id="datatable_randis">
                                        <thead>
                                            <tr>
                                            	<th>No</th>
                                                <th>Jabatan</th>
                                                <th>No Plat</th>
                                                <th>No Rangka</th>
                                                <th>No Mesin</th>
                                                <th>Jenis</th>
                                                <th>Type</th>
                                                <th>Merk</th>
                                                <th>Silinder</th>
                                                <th>Tahun</th>
                                                <th>Gambar</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach($data_randis as $randis){?>

                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $randis->JABATAN; ?></td>
                                                <td class="no_plat"><?php echo $randis->NO_PLAT; ?></td>
                                                <td><?php echo $randis->NO_RANGKA; ?></td>
                                                <td><?php echo $randis->NO_MESIN; ?></td>
                                                <td><?php echo $randis->JENIS; ?></td>
                                                <td><?php echo $randis->TYPE; ?></td>
                                                <td><?php echo $randis->MERK; ?></td>
                                                <td><?php echo $randis->SILINDER; ?></td>
                                                <td><?php echo $randis->TAHUN; ?></td>
                                                <td>
                                                     <?php
                                                            $img = base_url("uploads/default.png");
                                                            if($randis->GAMBAR != ""){
                                                                $img = $this->config->item('base_url').'uploads/foto_mobil/'.$randis->GAMBAR; 
                                                            }  
                                                     ?>
                                                        <img src="<?php echo $img; ?>" class="img-circle" style="height: 50px; width: 50px;" >
                              
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-dark active kartu">
                                                    <input type="hidden" value="<?php echo $randis->NO_PLAT;?>" class="NO_PLAT"><div><i class="fa fa-credit-card"></i></div>
                                                    </a>
                                                    &nbsp;&nbsp;



                                                </td>
                                            </tr>

                                            <?php } ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            	<th>No</th>
                                                <th>Jabatan</th>
                                                <th>No Plat</th>
                                                <th>No Rangka</th>
                                                <th>No Mesin</th>
                                                <th>Jenis</th>
                                                <th>Type</th>
                                                <th>Merk</th>
                                                <th>Silinder</th>
                                                <th>Tahun</th>
                                                <th>Gambar</th>
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
                            var barcode_path = base + "uploads/foto_mobil/";

                            var no_plat = $(this).closest('tr').find('.no_plat').text();

                            alert(no_plat);


                            $.ajax({
                                    type: "POST",
                                    url: base + "kelompok4/cetak_QR",
                                    data:{  "no_plat": no_plat},
                                    dataType: "html",
                                    cache: false,
                                    success: function(data) {

                                      console.log(data);
                                      // $('#nama').html(nama);
                                      // $('#my_image').attr('src',foto);
                                      // $('#image_barcode').attr('src',barcode_path);
                                      // $('#casis_no').val(no_casis);   
                                      // $('#modaldemo1').modal('show');                             

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