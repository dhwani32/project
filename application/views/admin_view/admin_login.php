<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Offersnearme</title>
   <?php require('mainCssLinks.php'); ?>
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
            <div class="card-header text-center"><a href=""><img width="150" height="150" class="logo-img" src="<?=base_url('assets/assets_logo/');?>logo3.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form action="<?=base_url('admin/login');?>" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="AdminName" name="AdminName" type="text" placeholder="AdminName" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="AdminPassword" name="AdminPassword" type="password" placeholder="AdminPassword">
                        <span style="font-size: 15px;" class="text-danger"> 
                            <?php echo $this->session->flashdata('Admin_Ermsg'); ?>
                        </span>
                    </div>
                    
                    <button type="submit" name="BtnAdminLogin" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="<?=base_url('admin/forgotPasswordPage')?>" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    
    <?php require('mainJsLinks.php'); ?> 

    </body>
 
</html>