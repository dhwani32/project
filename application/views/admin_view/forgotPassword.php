<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>offersnearme</title>
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
            <div class="card-header text-center"><a href=""><img width="150" height="150" class="logo-img" src="<?=base_url('assets/assets_logo/');?>logo3.png" alt="logo"></a><span class="splash-description">Please enter your Admin Name to verify..</span></div>
            <div class="card-body">
                <form action="<?=base_url('admin/verifyName');?>" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="AdminName" name="AdminName" type="text" placeholder="AdminName" autocomplete="off" required>
                    </div>
                    <p class="text text-danger"> <?=$this->session->flashdata('AdminNameNotFound');?> </p>
                    <button type="submit" name="BtnAdminVerify" class="btn btn-primary btn-lg btn-block">Verify</button>
                </form>
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