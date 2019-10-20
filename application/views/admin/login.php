<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/bootstrap/css/bootstrap.min.css"); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/fonts/circular-std/style.css"); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/libs/css/style.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/fonts/fontawesome/css/fontawesome-all.css"); ?>"> 
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">


            <div class="card-header text-center"><a href="<?php echo site_url("admin/login"); ?>"><img class="logo-img" src="<?php echo base_url($this->config->item("theme_admin")."/assets/images/mabes_tni.png"); ?>" alt="logo">
            <br/>
            <br/>

            </a><span class="splash-description">Masukkan Username dan Password.</span></div>

            <div class="card-body">
                <form method="post" action="#">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" type="text" placeholder="Username" autocomplete="off" name="user_name">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" placeholder="Password" name="user_password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link"></a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link"></a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/jquery/jquery-3.3.1.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/assets/vendor/bootstrap/js/bootstrap.bundle.js"); ?>"></script>
</body>
 
</html>