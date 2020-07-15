
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Browse &mdash; Free Website Template by Free-Template.co</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />

    <!-- require the csslinks file  -->
    <?php require('visitor_csslinks.php'); ?>

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
    <?php require('visitor_header.php'); ?>
  

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?=base_url('assets/assets_user/');?>images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1>Login</h1>
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

            

            <form action="<?=base_url('vc_login')?>" method="post" class="p-5 bg-white" style="margin-top: -150px;">
             

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
                <div class="col-md-12">
                  <input type="submit" value="Login" name="UserLoginButton" class="btn btn-primary btn-md text-white">
                </div>
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
    <?php require('visitor_footer.php'); ?>

  </div>

  <!-- require the js links file -->
  <?php require('visitor_jslinks.php'); ?>
  </body>
</html>