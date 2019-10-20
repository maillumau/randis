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
                            <h2 class="pageheader-title">Data Tables</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
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
                            <h5 class="card-header">Basic Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first" id="datatable_randis">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>User Name</th>
                                                <th>User Type</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $no = 1; ?>
                                            <?php foreach($users as $user){?>
                                              <tr>
                                                  <td><?php echo $no++; ?></td>
                                                  <td><?php echo $user->user_name; ?></td>
                                                  <td><?php if($user->user_type_id=="1"){ echo "Front User"; } else echo "Admin" ?></td>
                                                  <td>   
                                                          
                                                            <label for='cb_<?php echo $user->user_id; ?>' class="ckbox">
                                                                <input type="checkbox" class="tgl_checkbox i-checks"
                                                                           data-table="users" 
                                                                           data-status="user_status" 
                                                                           data-idfield="user_id"
                                                                           data-id="<?php echo $user->user_id; ?>" 
                                                                           id='cb_<?php echo $user->user_id; ?>'
                                                                           <?php echo ($user->user_status==1)? "checked" : ""; ?>
                                                                            >
                                                                      <span></span>
                                                              </label>
                                                           
                                                        
                                                    
                                                    </td>
                                                    <td>
                                                          <a href="<?php echo site_url("users/edit_user/".$user->user_id); ?>">
                                                          <i class="fa fa-pencil"></i></a>
                                                                    &nbsp;&nbsp;&nbsp;&emsp;
                                                          <a href="<?php echo site_url("users/delete_user/".$user->user_id); ?>" onclick="return confirm('are you sure to delete?')" class=""> 

                                                          <!--  <a class="waves-effect waves-light m-b-xs sweetalert-warning"> -->
                                                          <i class="fa fa-trash"></i></a>
                                                    </td>

                                              </tr>
                                        <?php } ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>User Name</th>
                                                <th>User Type</th>
                                                <th>Status</th>
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

<script>
      $(function(){
        'use strict'

        // Toggles
        $('.toggle').toggles({
          on: true,
          height: 26
        });
       
      });
    </script>
    <script>
        $(function () {
          
          $("body").on("change",".tgl_checkbox",function(){
              var table = $(this).data("table");
              var status = $(this).data("status");
              var id = $(this).data("id");
              var id_field = $(this).data("idfield");
              var bin=0;
              if($(this).is(':checked')){
                  bin = 1;
              }
              $.ajax({
                method: "POST",
                url: "<?php echo site_url("admin/change_status"); ?>",
                data: { table: table, status: status, id : id, id_field : id_field, on_off : bin }
              })
                .done(function( msg ) {
                  //alert(msg);
                }); 
          });
        });
       </script>
 
</html>