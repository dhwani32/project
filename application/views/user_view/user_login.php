
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>offersnearme</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- <meta name="author" content="Free-Template.co" /> -->
    <meta name="google-signin-client_id" content="441194230592-mlejk885a7dfmq5q19eqvomtgslr6djk.apps.googleusercontent.com">


    <!-- require the csslinks file  -->
    <?php require('user_csslinks.php'); ?>
    <?php 

    // $root = $_SERVER['DOCUMENT_ROOT'];
    // require($root.'/offersnearmeAPI/properties.php');

    ?>

  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <!-- requrie the header file -->
    <?php require('user_header.php'); ?>
  <meta name="google-signin-client_id" content="441194230592-mlejk885a7dfmq5q19eqvomtgslr6djk.apps.googleusercontent.com">


    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?=base_url('assets/assets_logo/');?>hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1>Login</h1>
                <p> Dear Customer, Please Login in to your account.<br> so, we can give you more offers and notification of new offers. </p>
                <!-- <p data-aos="fade-up" data-aos-delay="100">Handcrafted free templates by <a href="https://free-template.co/" target="_blank">Free-Template.co</a></p> -->
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5"  data-aos="fade">

            

            <form action="<?=base_url('uc_login')?>" method="post" class="p-5 bg-white" style="margin-top: -150px;">
             

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="UserName">User Name</label> 
                  <input type="text" id="UserName" name="UserName" class="form-control" value="<?=set_value('UserName')?>">
                  <?php echo form_error('UserName','<span class="text-danger">', '</span>'); ?>
                
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="UserPassword">User Password</label> 
                  <input type="password" id="UserPassword" name="UserPassword" class="form-control">
                  <?php echo form_error('UserPassword','<span class="text-danger">', '</span>'); ?>

                </div>
              </div>
              <span class="text-danger">

                <!-- flashdata('temporarySessionname') is the method for the retriving the temporary session -->
                <?php echo $this->session->flashdata('errMsg'); ?>
              </span>

              <div class="row form-group">
                <div class="col-md-3">
                  <input type="submit" value="Login" name="UserLoginButton" class="btn btn-primary btn-md text-white">
                </div>

                <!-- <div class="col-md-3">
                  <div class="col-md-12 p-3 onm-login"> ONM Login </div>
                </div> -->
                OR


                <div class="col-md-3  g-signin2" data-height="63" data-width="170 "  data-onsuccess="onSignIn"></div>



              </div>


              <div class="row">
                <div class="col-6">
                  <a href="<?=base_url('uc_register_page'); ?>"> Don't Have Account ? </a>
                </div>
                <div class="col-6">
                  <a href="<?=base_url('ForgetPassword');?>"> Forgot password ? </a>
                </div>
                <!-- <div class="col-6">
                  <a href="<?=base_url('user/third_party');?>"> Third party login </a>
                </div> -->
              </div>
            </form>

          </div>
         
        </div>
      </div>
    </div>


    <div class="py-5 bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mr-auto mb-4 mb-lg-0">
            <h2 class="mb-3 mt-0 text-white">Login To Find Offers</h2>
          </div>
        </div>
      </div>
    </div>


    
    <!-- require the footer file -->
    <?php require('user_footer.php'); ?>

  </div>

  <!-- require the js links file -->
  <?php require('user_jslinks.php'); ?>


   <script src="https://apis.google.com/js/platform.js" async defer></script>



  </body>
</html>



<?php 
  
  if(isset($_SESSION['accNotCreatedErr'])){
    ?>

    <script type="text/javascript">
      
      alert('You do not have any account with this email. \n Please Create new account.');

    </script>

    <?php
  }

?>


<script>

      // function onSignIn(googleUser) {
      //   var profile = googleUser.getBasicProfile();
      //   console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
      //   console.log('Name: ' + profile.getName());
      //   console.log('Image URL: ' + profile.getImageUrl());
      //   console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
      // }



      function onSignIn(googleUser) 
      {
          var profile = googleUser.getBasicProfile();
          var UserName = profile.getName();
          var UserEmail = profile.getEmail();
          


          // alert(profile);
          // console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
          // console.log('Name: ' + profile.getName());
          // console.log('Image URL: ' + profile.getImageUrl());
          // console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

          $.ajax({

            url:'<?=base_url('sociallogin/')?>',
            data:{"UserEmail":UserEmail,"UserName":UserName},
            method:'POST',
            success:function(result)
            {
              window.location="<?=base_url('')?>";
            }
         });
      }
      
</script>


<script type="text/javascript">

    var OnmUserName = getUserName();
    var OnmUserEmail = getUserEmail();

  $('.onm-login').click(function(){
    if(OnmUserName != null || OnmUserName != "" || OnmUserEmail != null || OnmUserEmail != ""){
            $.ajax({
              url:'<?=base_url('socialloginOnm/')?>',
              data:{"UserEmail":OnmUserEmail,"UserName":OnmUserName},
              method:'POST',
              success:function(result)
              {
                window.location="<?=base_url('')?>";
              }
           });
    }  
  });
  

</script>
