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
            <div class="card-header text-center"><a href=""><img width="150" height="150" class="logo-img" src="<?=base_url('assets/assets_logo/');?>logo3.png" alt="logo"></a><span class="splash-description">Reset Password</span></div>
            <div class="card-body">
                <form action="<?=base_url('admin/resetPassword');?>" method="post">
                    <div class="form-group">
                        <input type="hidden" value="<?=$details[0]['AdminId']?>" name="AdminId" required>
                        <label> New Password </label>
                        <input class="form-control form-control-lg" id="Password" name="Password" type="Password" placeholder="Password" autocomplete="off" required>
                        <label> Confirm Password </label>
                        <input class="form-control form-control-lg" id="ConfirmPassword" name="ConfirmPassword" type="Password" placeholder="ConfirmPassword" autocomplete="off" required>
                    </div>
                    <p class="text text-danger"> <?=$this->session->flashdata('resetPasswordMsg');?> </p>
                    <button type="submit" name="BtnSubmit" class="btn btn-primary btn-lg btn-block">Submit</button>
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