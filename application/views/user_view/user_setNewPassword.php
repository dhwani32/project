
<!-- 
////////////////////////////////////////////////////////////////

Author: Free-Template.co
Author URL: http://free-template.co.
License: https://creativecommons.org/licenses/by/3.0/
License URL: https://creativecommons.org/licenses/by/3.0/
Site License URL: https://free-template.co/template-license/
  
Website:  https://free-template.co
Facebook: https://www.facebook.com/FreeDashTemplate.co
Twitter:  https://twitter.com/Free_Templateco
RSS Feed: https://feeds.feedburner.com/Free-templateco

////////////////////////////////////////////////////////////////
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>offersnearme</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- <meta name="author" content="Free-Template.co" /> -->

    <!-- require the csslinks file  -->
    <?php require('user_csslinks.php'); ?>

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
  

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?=base_url('assets/assets_logo/');?>hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1>Reset Password</h1>
                <p> Dear Customer, Please enter the confirmation password salt, and reset your new password..</p>
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
            <form action="<?=base_url('setNewPassword/')?><?=$confirmSalt?>" method="post" class="p-5 bg-white" style="margin-top: -150px;">
              <div class="row form-group">

                <div class="col-md-12 mb-12 mb-md-0">
                  <label class="text-black" for="email">Email</label>
                  <input required type="email" name="Email" id="Email" value="" placeholder="Enter your email" class="form-control">
                  <span class="text text-danger"><?php echo $this->session->flashdata('emailErr'); ?></span> 
                </div>

                <div class="col-md-12 mb-12 mb-md-0">
                  <label class="text-black" for="confirmSalt">Confirmation Salt</label>
                  <input required type="text" name="confirmSalt" id="confirmSalt" placeholder="Enter your Confirmation Salt" class="form-control">
                  <span class="text text-danger"><?php echo $this->session->flashdata('saltErr'); ?></span> 
                </div>

                <div class="col-md-12 mb-12 mb-md-0">
                  <label class="text-black" for="NewPassword">New Password</label>
                  <input required type="text" name="NewPassword" id="NewPassword" placeholder="Set New Password" class="form-control">
                </div>

                <div class="col-md-12 mb-12 mb-md-0">
                  <label class="text-black" for="ConfirmPassword">Confirm Password</label>
                  <input required type="text" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password" class="form-control">
                  <span class="text text-danger"><?php echo $this->session->flashdata('passErr'); ?></span> 
                  <span class="text text-danger"><?php echo $this->session->flashdata('passValErr'); ?></span> 
                  
                </div>

                <!-- <div class="col-md-6">
                  <label class="text-black" for="lname">Last Name</label>
                  <input type="text" id="lname" class="form-control">
                </div> -->
              </div>

             
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="changePassword" value="Reset Password" class="btn btn-primary btn-md text-white">
                </div>
              </div>

  
            </form>
          </div>
         
            
            <!-- <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur? Fugiat quaerat eos qui, libero neque sed nulla.</p>
              <p><a href="#" class="btn btn-primary px-4 py-2 text-white">Learn More</a></p>
            </div> -->

          </div>
        </div>
      </div>
    </div>


    <div class="py-5 bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mr-auto mb-4 mb-lg-0">
            <h2 class="mb-3 mt-0 text-white">Send Message For Any Help.</h2>
          </div>
        </div>
      </div>
    </div>


    
    <!-- require the footer file -->
    <?php require('user_footer.php'); ?>

  </div>

  <!-- require the js links file -->
  <?php require('user_jslinks.php'); ?>
  </body>
</html>