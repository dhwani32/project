<?php if(isset($_SESSION['userDetails'])){?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>offersnearme</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <!-- <meta name="author" content="Free-Template.co" /> -->

  <!-- require the php file for the css links  -->
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


    <!-- require the header file for the header html code...  -->
    <?php require('user_header.php'); ?>


    <div class="site-blocks-cover overlay" style="background-image: url(<?= base_url('assets/assets_logo/') ?>hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">



          <div class="row align-items-center text-center justify-content-center ">
            <div class="col-md-8 text-white">
                <h1> Messages From Business </h1>
            </div>
          </div>

          

      </div>
    </div>




    <!-- category area to display some of the popular categories -->
    <div class="site-section">
      <div class="container">
        <div class="row"> 
          

          <?php foreach ($msgFromBusiness as $log) { 

            if(!empty($log)){
              $businessDetails = $this->db->query('SELECT * FROM `businessdetails` WHERE BusinessId='.$log['SenderBusinessId'])->result_array();
            }
            
            ?>

            <div class="orderCard">
            <div class="col-12">
              <div class="row">
                <div class="col-2">
                  <?=$log['ChatDate']?>
                </div>
                <div class="col-2"> 
                  <?=$log['ChatTime']?>
                </div>
                <div class="col-2"> 
                  <?=$businessDetails[0]['CompanyName']?>
                </div>
                <div class="col-6">
                  <?=$log['Message']?>
                </div>      
            </div>
            </div>
          </div>
        

          <?php } ?>




        </div>
      </div>
    </div>





<!-- following code is for the use sign up and registration of the user....  -->
    <div class="py-5 bg-primary">
      <div class="container">
       
      </div>
    </div>

    <!-- require the footer for the visitor page....  -->
    <?php require('user_footer.php'); ?>


  </div>

  <!-- require the js links for the jquery and javascript -->
  <?php require('user_jslinks.php'); ?>

 


</body>

</html>
<?php }else{redirect(base_url(''));}?>





<style type="text/css">
  

  .orderCard{
    background: #eee;
    width: 100%;
    height: 30px;
    box-shadow: 5px 5px 10px 1px #ddd;
    margin-bottom: 20px;
    border-radius: 10px;
    overflow-wrap: break-word;
    overflow: hidden;
  }

</style>