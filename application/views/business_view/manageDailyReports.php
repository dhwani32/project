<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>offersnearme</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <?php require('business_css_links.php'); ?>

</head>

<body>
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
                        <!-- <div class="product-sales-chart">
                            <button class="float-right btn btn-pink  mb-5 pb-5 " data-toggle="modal" data-target="#addOffersModel">Add Offers</button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>




 <div class="traffic-analysis-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="white-box tranffic-als-inner">
                            <h3 class="box-title"> Daily Report Of ( <?=date("d-m-Y");?> )</h3>
                            <a href="<?=base_url('business/generateExl/daily/').$businessDetails[0]['BusinessId']?>"><button class="btn btn-pink"> Download Daily Reports </button></a> 
                            <a href="<?=base_url('business/generateExl/weekly/').$businessDetails[0]['BusinessId']?>"><button class="btn btn-pink"> Download weekly Reports </button></a>
                            <a href="<?=base_url('business/generateExl/monthly/').$businessDetails[0]['BusinessId']?>"><button class="btn btn-pink"> Download monthly Reports </button></a>



                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">

                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">

                                                <div class="col-md-12">
                                                    <div class="row">
                                                    <?php
                                                        if(isset($orders)){
                                                            $totalAmount = 0;
                                                            $state = 0;
                                                            foreach ($orders as $msg) {

                                                                // print_r($orders);
                                                                // print_r($businessDetails);
                                                                $totalAmount = $totalAmount + $msg['OrderAmount'] ;
                                                                $offerDetails = $this->MOffers->getOffersForReports($businessDetails[0]['BusinessId'], $orders[$state]['OfferId']);

                                                                $images = $this->MOffers->getOfferImageForFavorite($orders[$state]['OfferId']);
                                                                // print_r($images);
                                                                // print_r($offerDetails);
                                                                if(count($offerDetails) > 0){

                                                                ?>

                                                                <div style="border-bottom: 1px solid #ddd; padding-bottom: 5px; padding-top: 5px;" class="col-lg-12">
                                                                    <div class="col-lg-2 ">
                                                                        <img style="height: 100px; width: 100px;" src="<?=base_url('assets/assets_offers_images/').$images[0]['Image']?>">
                                                                    </div>
                                                                    <div class="col-lg-2 ">
                                                                        <?php print_r($offerDetails[0]['OfferName']); ?>
                                                                    </div>
                                                                    <div class="col-lg-2 ">
                                                                        <?php print_r($msg['OrderAmount']); ?> ₹
                                                                    </div>

                                                                    <div class="col-lg-6 ">
                                                                        <?php
                                                                        if($msg['OfferDistributeState'] == 1){
                                                                            echo "<b style=\"color:green;\"> Already Distributed </b>";
                                                                        }else{
                                                                            echo "<b style=\"color:red;\"> Not Distributed </b>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>

                                                                <?php
                                                                }
                                                                $state++;
                                                            }
                                                        }
                                                    ?>
                                                        <div class="col-md-12">
                                                            <div class="col-lg-2"> </div>
                                                            <div class="col-lg-1"> </div>
                                                            <div class="col-lg-3">Total Amount : <b> <?=$totalAmount;?> ₹</b> </div>
                                                            <div class="col-lg-6"> </div>
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>









                            <div id="sparkline8"></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>














<!--

        <div class="traffic-analysis-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="white-box tranffic-als-inner">
                            <h3 class="box-title"> Redeem Form </h3>
                            <div class="stats-row">


                                <form>

                                    <div class="">
                                        <input type="text" name="">
                                    </div>

                                </form>


                            </div>
                            <div id="sparkline8"></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
         -->


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

    .form-control:focus{
        border-color: #EA9696 !important;

    }

    .btn-primary{
        background: linear-gradient(100deg, rgb(200, 100, 100), rgb(250, 200, 200)) !important;
        border:none;
    }


</style>


<!-- <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

 -->
