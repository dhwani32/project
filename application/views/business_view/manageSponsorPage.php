
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>offersnearme</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <?php require('business_css_links.php'); ?>

</head>

<body>

        <?php require('business_sidebar.php'); ?>


    <!-- Start Welcome area -->
    <div class="all-content-wrapper">

        <?php require('business_header.php'); ?>


        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="h1 text text-danger"><center>Select Your SponsorShip Plan </center></div>

        <div class="product-new-list-area">
            <div class="container-fluid">
              <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                  <?php 
                  $businessDetails = $this->db->query('select * from `businessdetails` where UserId='.$_SESSION['userDetails'][0]['UserId'])->result_array();
                  $planinfo = $this->db->where(array('BusinessId' => $businessDetails[0]['BusinessId']))->get('sponsordetails')->result_array();


                  if(count($planinfo) <= 0){

                    $planDetails = $this->MSponsor->getAllPlans();
                    // print_r($planDetails);
                    if(count($planDetails) > 0){
                      foreach ($planDetails as $p) {
                        ?>

                      <div class="card-custom col-lg-2">
                        <div style="font-weight: 900; font-size: 18px; padding: 5px;" class="text-center col-md-12 card-field-custom">
                            <?=$p['PlanName']?>
                        </div>

                        <div style="font-weight: 700; font-size: 18px; padding: 5px;" class="col-md-12 card-field-custom">
                            <?=$p['PlanPrice']?> ₹
                        </div>
                        
                        <div style="font-weight: 300; font-size: 18px; padding: 5px;" class="col-md-12 card-field-custom">
                            <?=$p['PlanDuration']?>
                        </div>
                        
                        <div class="col-md-12 card-field-custom">&nbsp;</div>

                         <a href="<?=base_url('business/selectSponsorPlan/')?><?=$p['SponsorPlanId']?>" class="col-md-12 btn btn-package-custom">Select Plan</a>
                       
                      </div>


                        <?php 
                      }
                      }
                    }else{

                      $p = $planinfo[0];
                      $planDetails = $this->db->where(array("SponsorPlanId"=>$p['SponsorPlanId']))->get('sponsorplans')->result_array()[0];
                      $businessDetails = $this->db->where(array("BusinessId"=>$p['BusinessId']))->get('businessdetails')->result_array()[0];
                      ?>
                      <div class="card-custom col-lg-3">
                        <div style="font-weight: 900; font-size: 18px; padding: 5px;" class="text-center col-md-12 card-field-custom">
                            <?=$businessDetails['CompanyName']?>
                        </div>

                        <div style="font-weight: 300; font-size: 18px; padding: 5px;" class="col-md-12 card-field-custom">
                            <?=$planDetails['PlanName']?> 
                        </div>
                        
                        <div style="font-weight: 300; font-size: 18px; padding: 5px;" class="col-md-12 card-field-custom">
                            <?=$planDetails['PlanDuration']?> 
                        </div>

                        <div style="font-weight: 300; font-size: 18px; padding: 5px;" class="col-md-12 card-field-custom">
                            <?=$p['TransactionAmount']?> ₹ /  <?=$p['TransactionMode']?>
                        </div>

                        <div style="font-weight: 300; font-size: 18px; padding: 5px;" class="col-md-12 card-field-custom">
                            <?=$p['TransactionDate']?>
                        </div>
                        
                        <div class="col-md-12 card-field-custom">&nbsp;</div>

                        <div class="h4 text text-success">You are alredy Sponsor..</div>
                       
                      </div>
                      <?php
                    }
                  ?>
                    </div>
                </div>
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

    
    .card-custom{
        background: linear-gradient(150deg, rgb(200, 100, 100),rgb(200, 100, 100), rgb(250, 200, 200), rgb(250, 200, 200), rgb(256, 256, 256), rgb(256, 256, 256)) !important;
        border-radius: 15px;
        box-shadow: 2px 2px 5px #eee;
        transition: 0.4s;
        margin: 10px;
        padding: 40px;
        min-height: 250px;
    }


    .card-custom:hover{
        box-shadow: 5px 5px 10px #ddd;
    }


    .btn-package-custom{
        background: linear-gradient(0deg, #fff,#a00);
        border:none;
        transition: 0.4s;
        margin-bottom: 0px;
        text-decoration: none;
        color: #000;
        font-weight: 600;
    }

    .btn-package-custom:hover{
        background: linear-gradient(0deg, #a00, #fff);
        box-shadow: 1px 1px 10px #888;
    }
</style>