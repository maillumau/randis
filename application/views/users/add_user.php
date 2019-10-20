<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Validation</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/bootstrap/css/bootstrap.min.css"); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/fonts/circular-std/style.css"); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/libs/css/style.css"); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/fonts/fontawesome/css/fontawesome-all.css"); ?>">
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
        <?php  $this->load->view("common/left_sidebar"); ?>
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
                            <h2 class="pageheader-title">Form Validations </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
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
                                <h5 class="card-header">Add User</h5>
                                <div class="card-body">
                                    <form action="#" id="basicform" data-parsley-validate="" method="post">
                                        <div class="form-group">
                                            <label for="inputUserName">User Name</label>
                                            <input id="inputUserName" type="text" name="user_name" data-parsley-trigger="change" required="" placeholder="Enter username" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Password</label>
                                            <input id="inputPassword" name ="user_password" type="password" placeholder="Password" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="usertype">User Type</label>
                                            <select name="user_type"  class="form-control form-control-lg" data-placeholder="Pilih Tipe Pengguna">
                    
                                                <?php foreach($user_types as $user_type){?>
                                                  <option value="<?php echo $user_type->user_type_id; ?>"><?php echo $user_type->user_type_title; ?>
                                       
                                                <?php } ?>
                                          </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <label class="be-checkbox custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="status"><span class="custom-control-label">Status</span>
                                                </label>
                                            </div>
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
</body>
 
</html>