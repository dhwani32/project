<!DOCTYPE html>
<html lang="en">
<head>
    <title>offersnearme</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
        require('logincsslinks.php');
    ?>
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?=base_url('assets/assets_admin/login/');?>images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="<?=base_url('admin/login');?>" method="post">
                    <span class="login100-form-title">
                        Admin Login
                    </span>

                    <div class="wrap-input100">
                        <input class="input100" name="AdminName" type="text" placeholder="Name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="password" name="AdminPassword" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        <span style="font-size: 15px;" class="text-danger"> 
                            <?php echo $this->session->flashdata('Admin_Ermsg'); ?>
                        </span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <input type="submit" name="BtnAdminLogin" class="login100-form-btn" value="Login">
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>

                    <!-- <div class="text-center p-t-136">
                        <a class="txt2" href="#">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
        
    <?php 
        require('loginjslinks.php');
    ?>

    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    

</body>
</html>