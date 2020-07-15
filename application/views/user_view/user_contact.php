
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

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSCerG8WrIjldYWF8q67_kr2R7VxV9VkE&callback=initMap">
    </script>

    <script type="text/javascript">
      function initMap() {
        // The location of Uluru
        var uluru = {lat: 21.170240, lng: 72.831062};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 4, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});


        var mapProp= {
          center:new google.maps.LatLng(21.170240,72.831062),
          zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("map"),mapProp);



      }
    </script>






    <style>
      #map {
        height: 100%;
        width: 100%;
      }
    </style>








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
                <h1>Contact us</h1>
                <p> Dear Customer, When you have any Query or Suggession then please contact us on below informations.  </p>
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
            <form action="<?=base_url('user/sendMsgToAdminFromUser')?>" method="post" class="p-5 bg-white" style="margin-top: -150px;">
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">First Name</label>
                  <input type="text" id="fname" name="fname" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Last Name</label>
                  <input type="text" id="lname" name="lname" class="form-control" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="subject">Subject</label> 
                  <input type="subject" id="subject" name="subject" class="form-control" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label> 
                  <textarea required name="message" id="message" cols="30" rows="7" name="message" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                </div>
              </div>

  
            </form>
          </div>
          <div class="col-md-5"  data-aos="fade" data-aos-delay="100">
            
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">102 - S.V.Patel, Katargam, Surat, Gujarat</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+91 898 021 2296</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">offersnearme@gmail.com</a></p>

            </div>
            
            <!-- <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur? Fugiat quaerat eos qui, libero neque sed nulla.</p>
              <p><a href="#" class="btn btn-primary px-4 py-2 text-white">Learn More</a></p>
            </div> -->

          </div>
        </div>


        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-12" >
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.486309715174!2d72.88727801403182!3d21.212555986856174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f7a31c50185%3A0x87232d67295bc2a3!2sYogi%20Chowk%2C%20Sanman%20Society%2C%20Yoginagar%20Society%2C%20Surat%2C%20Gujarat%20395010!5e0!3m2!1sen!2sin!4v1584812582852!5m2!1sen!2sin" width="100%" height="500" frameborder="0" style="border:none;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
<!--               <div class="col-6">
                <div id="map"></div>
              </div> -->
            </div>
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