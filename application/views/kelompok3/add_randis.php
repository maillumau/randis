<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Tambah Data Randis</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/bootstrap/css/bootstrap.min.css"); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/fonts/circular-std/style.css"); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/libs/css/style.css"); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/fonts/fontawesome/css/fontawesome-all.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/datepicker/tempusdominus-bootstrap-4.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/inputmask/css/inputmask.css"); ?>">

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
                            <h2 class="pageheader-title">Form Tambah Data Randis </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Form Tambah Data Randis</li>
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
                        <!-- basic form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Tambah Data Randis</h5>
                                <div class="card-body">
                                    <?php if (@$sukses) { ?>
                                        <div class="card-body border-top">
                                            
                                            <div class="alert alert-primary" role="alert">
                                                <h4 class="alert-heading">Selamat !</h4>
                                                <p>Anda berhasil menambahkan data.</p>
                                                <hr>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                   <?php } ?>
                                    <form action="#" id="basicform" data-parsley-validate="" method="post" enctype="multipart/form-data">
                                        <div class="form-group col-lg-4">

                                            <label for="">No Reg Lama</label>
                                            <input id="" type="text" name="noreg_lama" data-parsley-trigger="change" required="" placeholder="Masukkan No Reg Lama" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="">No Reg Baru</label>
                                            <input id="" type="text" name="noreg_baru" data-parsley-trigger="change" required="" placeholder="Masukkan No Reg Baru" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="">No Rangka</label>
                                            <input id="" type="text" name="no_rangka" data-parsley-trigger="change" required="" placeholder="Masukkan No Mesin" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="">No Mesin</label>
                                            <input id="" type="text" name="no_mesin" data-parsley-trigger="change" required="" placeholder="Masukkan No Rangka" autocomplete="off" class="form-control">
                                        </div>


                                        <div class="form-group col-lg-3">
                                            <label for="jenis">Jenis Kendaraan</label>
                                            <select name="jenis"  class="form-control form-control-lg" data-placeholder="Pilih JENIS KENDARAAN">
                    
                                                <?php foreach($jenis as $jenis){?>
                                                  <option value="<?php echo $jenis->jenis; ?>"><?php echo $jenis->jenis; ?> </option>
                                       
                                                <?php } ?>
                                          </select>
                                        </div>






                                        <div class="form-group col-lg-3">
                                            <label for="merk">Merek Kendaraan</label>
                                            <select name="merek"  class="form-control form-control-lg" data-placeholder="Pilih MEREK KENDARAAN">
                                                
                                                <?php 

                                                foreach($merk as $merek){?>

                                                  <option value="<?php echo $merek->merek; ?>"><?php echo $merek->merek; ?></option>
                                       
                                                <?php } 
                                                ?>
                                          </select>
                                        </div>


                                        <div class="form-group col-lg-3">
                                            <label for="type">Tipe Kendaraan</label>
                                            <select name="type"  class="form-control form-control-lg" data-placeholder="Pilih TYPE KENDARAAN">
                    
                                                <?php foreach($type as $type){?>
                                                  <option value="<?php echo $type->type; ?>"><?php echo $type->type; ?>
                                       
                                                <?php } ?>
                                          </select>
                                        </div>

                                        <div class="form-group col-lg-2">
                                            <label for="">Bahan Bakar</label>
                                            <select name="bahan_bakar"  class="form-control form-control-lg" data-placeholder="Pilih Bahan Bakar ">
                                                <option value="RON 88">RON 88</option>
                                                <option value="RON 91">RON 91</option>
                                                <option value="HSD">HSD</option>                                      
                                          </select>
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label for="silinder">Silinder Kendaraan</label>
                                            <select name="silinder"  class="form-control form-control-lg" data-placeholder="Pilih SILINDER KENDARAAN">
                    
                                                <?php foreach($silinder as $silinders){?>
                                                  <option value="<?php echo $silinders->silinder; ?>"><?php echo $silinders->silinder; ?> CC</option>
                                       
                                                <?php } ?>
                                          </select>
                                        </div>



                                         <div class="form-group col-lg-2">
                                            <label for="">Tahun</label>
                                            <input id="" name ="tahun" type="text" placeholder="Tahun Kendaraan" required="" class="form-control" id="datepicker" >
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label for="">Kondisi Kendaraan</label>
                                            <select name="kondisi"  class="form-control form-control-lg" data-placeholder="Pilih Kondisi Kendaraan">
                                                <option value="B">B</option>
                                                <option value="RR">RR</option>
                                                <option value="RB">RB</option>                                      
                                          </select>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label for="jabatan">Pemegang</label>
                                            <select name="pemegang"  class="form-control form-control-lg" data-placeholder="Pilih Jabatan">
                    
                                                <?php foreach($jabatan as $jabatan){?>
                                                  <option value="<?php echo $jabatan->pemegang; ?>"><?php echo $jabatan->pemegang; ?>
                                       
                                                <?php } ?>
                                          </select>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label for="">Foto Kendaraan</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="preview_gambar" name="foto">
                                                <label class="custom-file-label" for="customFile" id="label_foto">Upload</label>
                                            </div>

                                        </div>

                                        <div class="form-group col-lg-3">
                                        <div class="card card-figure">
                                            <!-- .card-figure -->
                                            <figure class="figure">
                                                <!-- .figure-img -->
                                                <div class="figure-attachment">
                                                    <img src="../assets/images/card-img.jpg" alt="Card image cap" class="img-fluid" id="foto"> </div>
                                                <!-- /.figure-img -->
                                                <figcaption class="figure-caption">
                                                    <ul class="list-inline d-flex text-muted mb-0">
                                                        <li class="list-inline-item text-truncate mr-auto">Preview </li>
                                                         
                                                           
                                                    </ul>
                                                </figcaption>
                                            </figure>
                                            <!-- /.card-figure -->
                                        </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <label class="">
                                                    <span class=""></span>
                                                </label>
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>

                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                    <?php if (@$sukses) { ?>
                                        <div class="card-body border-top">
                                            
                                            <div class="alert alert-primary" role="alert">
                                                <h4 class="alert-heading">Selamat !</h4>
                                                <p>Anda berhasil menambahkan data.</p>
                                                <hr>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                   <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form -->
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
        <!-- jquery 3.3.1 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/jquery/jquery-3.3.1.min.js"); ?>"></script>
   
    <!-- bootstap bundle js -->
     <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/bootstrap/js/bootstrap.bundle.js"); ?>"></script>
    <!-- slimscroll js -->
     <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/slimscroll/jquery.slimscroll.js"); ?>"></script>

     <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/parsley/parsley.js"); ?>"></script>

    <!-- main js -->
     <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/libs/js/main-js.js"); ?>"></script>

     <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/inputmask/js/jquery.inputmask.bundle.js"); ?>"></script>

    <script>
    $('#form').parsley();
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();





    </script>

    <script type="text/javascript">
       
         function bacaGambar(input) {
             if (input.files && input.files[0]) {
                var reader = new FileReader();
           
                reader.onload = function (e) {
                    $('#foto').attr('src', e.target.result);
                }
           
                reader.readAsDataURL(input.files[0]);
             }
          }

          $("#preview_gambar").change(function(){
                   bacaGambar(this);
                   
          });

          $(document).ready(function(){

            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                $('#label_foto').html(fileName);
                // alert('The file "' + fileName +  '" has been selected.');
            });

        });
    
    </script>
</body>
 
</html>