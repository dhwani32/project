<?php
  date_default_timezone_set('Asia/Kolkata');

  /// count the second to add in the time..
  $DateFiveDaysRemainingTimeAdd = 5*24*60*60;
  $DateTwoDaysRemainingTimeAdd = 2*24*60*60;
  $DateOneDaysRemainingTimeAdd = 1*24*60*60;

  $DateFiveDaysRemaining = date("Y-m-d",time()+$DateFiveDaysRemainingTimeAdd);
  $DateTwoDaysRemaining = date("Y-m-d",time()+$DateTwoDaysRemainingTimeAdd);
  $DateOneDaysRemaining = date("Y-m-d",time()+$DateOneDaysRemainingTimeAdd);

  // print_r($DateFiveDaysRemaining);
  // print_r($DateTwoDaysRemaining);
  // print_r($DateOneDaysRemaining);
  $UserId = $_SESSION['userDetails'][0]['UserId'];

  $BusinessDetails = $this->MBusiness->getBusinessId($UserId);
// print_r($BusinessDetails);
  $notification = $this->MPackages->getExpirenotifications($BusinessDetails[0]['BusinessId'], $DateFiveDaysRemaining, $DateTwoDaysRemaining, $DateOneDaysRemaining);
  $notificationMsg = "";
  if(empty($notification['dataDay5'])){
    if(empty($notification['dataDay2'])){
      if(!empty($notification['dataDay1'])){
        $notificationMsg = "Dear Provider! You have only one day remaining. Please renew your package plan before it will expire.";
      }
    }else{
      $notificationMsg = "Dear Provider! You have only two day remaining. Please renew your package plan before it will expire.";

    }
  }else{
    $notificationMsg = "Dear Provider! You have only five day remaining. Please renew your package plan before it will expire.";
  }


?>


<script>
  function packageExpireNotification(){
    var notificationMsg = "<?=$notificationMsg?>";
    if(notificationMsg != ""){
      alert(notificationMsg);
    }
  }


</script>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>offersnearme</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <style>


        /* Callout box - fixed position at the bottom of the page */
        .callout {
          position: fixed;
          bottom: 35px;
          right: 20px;
          margin-left: 20px;
          max-width: 300px;
        }

        /* Callout header */
        .callout-header {
          padding: 25px 15px;
          background: linear-gradient(90deg, rgb(200, 100, 100), rgb(280, 180, 180)) !important;
          font-size: 30px;
          color: white;
        }

        /* Callout container/body */
        .callout-container {
          padding: 15px;
          background: linear-gradient(90deg, rgb(200, 100, 100), rgb(280, 180, 180)) !important;
          color: black;
          font-size: 18px;
        }

        /* Close button */
        .closebtn {
          position: absolute;
          top: 5px;
          right: 15px;
          color: white;
          font-size: 30px;
          cursor: pointer;
          transition: 0.4s;
        }

        /* Change color on mouse-over */
        .closebtn:hover {
          color: black;
        }

    </style>



 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    

 <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Months');
        data.addColumn('number', 'Orders');
        data.addRows([
          <?php
          foreach ($Orders as $o) {
            echo "['".$o['OrderDate']."', ".$o['TotalOrder']."],";  
          }

           ?>
         
        ]);

        // Set chart options
        var options = {'title':'Total Orders Of Month',
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>









    <?php require('business_css_links.php'); ?>

</head>

<body onload="packageExpireNotification()">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <?php require('business_sidebar.php'); ?>


    <!-- Start Welcome area -->
    <div class="all-content-wrapper">

        <?php require('business_header.php'); ?>


        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <button class="float-right btn btn-pink  mb-5 pb-5 " data-toggle="modal" data-target="#addOffersModel">Add Offers</button>
                            <h1> Your Offers  </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>





                    <!-- Modal to add the offers... -->
                    <div class="modal fade" id="addOffersModel" tabindex="-1" role="dialog" aria-labelledby="addOffersModelLable" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addOffersModelLable">Add Offers</h5>

                                </div>
                                <form action="<?=base_url('business/addOffers');?>" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                        <div>
                                            <?php
                                            $UserId = $_SESSION['userDetails'][0]['UserId'];
                                            $BusinessDetails = $this->MBusiness->getBusinessId($UserId);?>

                                            <input type="hidden" name="BusinessId" value="<?php echo $BusinessDetails[0]['BusinessId']; ?>">
                                            <input type="hidden" name="CategoryId" value="<?php echo $BusinessDetails[0]['CategoryId']; ?>">
                                            <!-- <label>Select Category</label>
                                            <select required name="CategoryDropDown" id="CategoryDropDown" class="offset-0 col-12 form-control selectpicker">
                                                <?php
                                                $allCategory = $this->MCategory->getAllCategory();
                                                foreach($allCategory as $ac){ ?>

                                                    <option value="<?=$ac['CategoryId']?>"><?=$ac['CategoryName']?></option>
                                                <?php } ?>

                                            </select>

                                            <label>Select Subcategory</label>
                                            <select required name="SubcategoryDropDown" id="SubcategoryDropDown" class="offset-0 col-12 form-control selectpicker">

                                            </select> -->

                                            <label>Offer Name</label>
                                            <input class="form-control" type="text" name="OfferName" id="OfferName" required>

                                            <label>Offer Price</label>
                                            <input class="form-control" type="text" name="OfferPrice" id="OfferPrice" required>

                                            <label>Offer Percentage</label>
                                            <input class="form-control" type="text" name="OfferPr" id="OfferPr" required>

                                            <label>Offer Description</label>
                                            <input class="form-control" type="text" name="OfferDescription" id="OfferDescription" required>

                                            <label>Offer PaymentMode</label>
                                            <select class="form-control" name="OfferPaymentMode" id="OfferPaymentMode" required>
                                              <option value="CC"> CC </option>
                                              <option value="COD"> COD </option>
                                            </select>


                                            <label>Offer StartDate</label>
                                            <input class="form-control" type="date" name="StartDate" id="StartDate" required>

                                            <label>Offer EndDate</label>
                                            <input class="form-control" type="date" name="EndDate" id="EndDate" required>

                                            <lable>Offer Images</lable>
                                            <input type="file" multiple name="OfferImages[]" id="OfferImages" required class="form-control">
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <input type="submit" class="btn btn-pink" name="btnAddOffers" value="Add Offers">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- End modal to add the offers -->




        <div class="product-new-list-area">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="chart_div"></div>
          <!-- <?php print_r($Orders);?> -->

                  </div>
                </div>
            </div>
        </div>







        <div class="product-new-list-area">
            <div class="container-fluid">
                <div class="row">

                    <?php

                    $Offers = $this->MOffers->getOfferesOfBusinessOffers($businessDetails[0]['BusinessId']);
                    // print_r($Offers);

                    foreach ($Offers as $o) {
                        $image = $this->MOffers->getOfferImageForFavorite($o['OfferId']); ?>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="single-new-trend mg-t-30">
                                <a href="#"><img style="height: 230px; " src="<?=base_url('assets/assets_offers_images/');?><?=$image[0]['Image']?>" alt=""></a>
                                <!-- <div class="overlay-content">
                                    <a>
                                        <h2>₹ <?=$o['OfferPrice']?></h2>
                                    </a>
                                </div> -->

                                <div class="col-lg-12 col-md-12"> <hr> </div>
                                <div> <center> <h2> ₹ <?=$o['OfferPayablePrice']?> </h2> </center> </div>
                                <div> <center> <h5> <?=$o['OfferName']?> </h5> </center> </div>
                            </div>
                        </div>

                    <?php } ?>



                </div>
            </div>
        </div>




        <div class="calender-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="calender-inner">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






<!-- Inquiry to admin -->

<div class="callout">
  <div class="callout-header">Inquiry To Admin</div>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <div class="callout-container">
    <form action="sendMsgToAdmin" method="post">
    <input type="text" class="form-control" placeholder="Your Message ..." name="Message">
    <input type="hidden" class="form-control" name="BusinessId" value="<?=$BusinessDetails[0]['BusinessId']?>" >
    <hr>
    <button type="submit" class="form-control btn btn-pink"> Send Inquiry  </button>
    </form>
  </div>
</div>


    <?php require('business_js_links.php'); ?>

</body>

</html>




<style>

    /*.side-menu-custom{
        background: linear-gradient(100deg, rgb(200, 100, 100), rgb(250, 200, 200)) !important;
    }*/

    .side-menu-custom a:hover{
        background: linear-gradient(100deg, rgb(200, 100, 100), rgb(250, 200, 200)) !important;
    }

    .side-menu-custom a:focus{
        background: linear-gradient(100deg, rgb(200, 100, 100), rgb(250, 200, 200)) !important;
    }
</style>
