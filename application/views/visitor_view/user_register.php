
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
                <h1>Register</h1>
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

            

            <form action="<?=base_url('vc_register');?>" method="post" class="p-5 bg-white" style="margin-top: -150px;">
            
            <!-- the following function is the function of the form_validation library of codeigniter..
            we can use this function to show all the errors in the form .
            This function noramlly show all the errors accures in the form...  -->
            
            <!-- <?php // echo validation_errors(); ?> -->

            <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="UserName">User Name</label> 
                  <input type="text" id="UserName" name="UserName" class="form-control" value="<?=set_value('UserName')?>">
                  <!-- form_error() method for the showing error message
                    there are three parameters 
                    1. field name : required / compalsory
                    2. pretag : optional
                    3. posttag : optional
                     -->
                  <?php echo form_error('UserName','<span class="text-danger">', '</span>'); ?>
               
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="UserEmail">User Email</label> 
                  <input type="text" id="UserEmail" name="UserEmail" class="form-control" value="<?=set_value('UserEmail')?>">
                  <?php echo form_error('UserEmail','<span class="text-danger">', '</span>'); ?>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="UserPhone">User Phone</label> 
                  <input type="text" id="UserPhone" name="UserPhone" size="10" class="form-control" value="<?=set_value('UserPhone')?>">
                  <?php echo form_error('UserPhone','<span class="text-danger">', '</span>'); ?>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="UserGender">User Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                  
                  <input type="radio" id="UserGender" name="UserGender" value="male"><lable>Male</lable>
                  <?php echo form_error('UserGender','<span class="text-danger">', '</span>'); ?>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" id="UserGender" name="UserGender" value="female"><lable>Female</lable>
                  <?php echo form_error('UserGender','<span class="text-danger">', '</span>'); ?>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="UserPassword">User Password</label> 
                  <input type="password" id="UserPassword" name="UserPassword" class="form-control" >
                  <?php echo form_error('UserPassword','<span class="text-danger">', '</span>'); ?>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="UserConfirmPassword">User Confirm Password</label> 
                  <input type="password" id="UserConfirmPassword" name="UserConfirmPassword" class="form-control" >
                  <?php echo form_error('UserConfirmPassword','<span class="text-danger">', '</span>'); ?>
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Register" name="UserRegisterButton" class="btn btn-primary btn-md text-white">
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
            <h2 class="mb-3 mt-0 text-white">Register To Use Offers</h2>
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