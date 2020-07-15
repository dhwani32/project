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
                            <h3 class="box-title"> Manage Offers </h3>




                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">

                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">




                                        <div class="col-lg-12"> 
                                            <div class="col-lg-3"> 
                                                <img src="<?=base_url('assets/assets_offers_images/').$offerImages[0]['Image']?>">  
                                            </div>
                                            <div class="col-lg-9"> 
                                                <div class="row"> 
                                                    <div class="col-lg-12"> 
                                                        <div class="col-lg-3"> <h3> Name   </h3>  </div>
                                                        <div class="col-lg-9"> <h3> <?=$offerDetails[0]['OfferName']?> </h3>  </div>
                                                    </div>

                                                     <div class="col-lg-12"> 
                                                        <div class="col-lg-3"> <h3> Description   </h3>  </div>
                                                        <div class="col-lg-9"> <h3> <?=$offerDetails[0]['OfferDescription']?>  </h3>  </div>
                                                    </div>

                                                     <div class="col-lg-12"> 
                                                        <div class="col-lg-3"> <h3> Price  </h3>  </div>
                                                        <div class="col-lg-9"> <del> <h3> <?=$offerDetails[0]['OfferPrice']?> ₹</h3> </del> </div>
                                                    </div>

                                                    <div class="col-lg-12"> 
                                                        <div class="col-lg-3"> <h3> PayablePrice  </h3>  </div>
                                                        <div class="col-lg-9"> <h3> <?=$offerDetails[0]['OfferPayablePrice']?> ₹</h3>  </div>
                                                    </div>

                                                    <div class="col-lg-12"> 
                                                        <div class="col-lg-3"> <h3> Discount  </h3>  </div>
                                                        <div class="col-lg-9">  <h3> <?=$offerDetails[0]['OfferPr']?>%</h3> </div>
                                                    </div>

                                                    <div class="col-lg-12"> 
                                                        <div class="col-lg-3"> <h3> Start Date  </h3>  </div>
                                                        <div class="col-lg-9">  <h3> <?=$offerDetails[0]['StartDate']?> </h3>  </div>
                                                    </div>

                                                    <div class="col-lg-12"> 
                                                        <div class="col-lg-3"> <h3> End Date  </h3>  </div>
                                                        <div class="col-lg-9"> <h3> <?=$offerDetails[0]['EndDate']?> </h3> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-lg-12" style="margin-top: 20px;">
                                            <div style="height: 400px;" class="col-lg-4"> 
                                                <div class="col-lg-12"> 
                                                    <div class="row">
                                                       <div style="background: #333; border-radius: 20px;; font-size: 25px;  color: #fff; height: 100px; margin-top: 10px;" class="col-lg-12"> 
                                                            <p style="padding-top: 10px; text-align: center;"><b> Total Purchase </b></p>
                                                            <p style="font-size: 30px; text-align: center;"><b> <?=count($offerOrders)?> </b></p>
                                                       </div>


                                                        <div style="background: #333; border-radius: 20px;; font-size: 25px;  color: #fff; height: 100px; margin-top: 10px;" class="col-lg-12"> 
                                                            <p style="padding-top: 10px; text-align: center;"><b> Total Reviews </b></p>
                                                            <p style="font-size: 30px; text-align: center;"><b> <?=count($offerReviews)?> </b></p>
                                                       </div>

                                                        <div style="background: #333; border-radius: 20px;; font-size: 25px;  color: #fff; height: 100px; margin-top: 10px;" class="col-lg-12"> 
                                                            <p style="padding-top: 10px; text-align: center;"><b> Total Ratings </b></p>
                                                            <p style="font-size: 30px; text-align: center;"><b> <?=count($offerRatings)?> </b></p>
                                                       </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div style="height: 350px; overflow-y: scroll; " class="col-lg-4"> 
                                                <div class="col-lg-12"> 
                                                    <div class="row">
                                                       <div style="background: #333; border-radius: 20px;; font-size: 25px;  color: #fff; height: 50px; margin-top: 10px;" class="col-lg-12"> 
                                                            <p style="padding-top: 10px; text-align: center;"><b> Reviews </b></p>
                                                       </div>
                                                       <div style="padding: 10px;">
                                                            <?php

                                                                if(!empty($offerReviews)){

                                                                    $count = 0;
                                                                    foreach($offerReviews as $r){
                                                                    $count++;
                                                            ?>
                                                            <div> <?=$r['Review']?> </div>
                                                            <?php }
                                                            } ?>
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="height: 350px; overflow-y: scroll; " class="col-lg-4"> 
                                                <div class="col-lg-12"> 
                                                    <div class="row">
                                                       <div style="background: #333; border-radius: 20px;; font-size: 25px;  color: #fff; height: 50px; margin-top: 10px;" class="col-lg-12"> 
                                                            <p style="padding-top: 10px; text-align: center;"><b> Comments </b></p>
                                                       </div>
                                                       <div style="padding: 10px;">
                                                            <?php

                                                                if(!empty($offerComments)){

                                                                    $count = 0;
                                                                    foreach($offerComments as $r){
                                                                    $count++;
                                                            ?>
                                                            <div> <?=$r['Comment']?> </div>
                                                            <?php }
                                                            } ?>
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


<script type="text/javascript">


    $(document).on("click", ".open-EditCategoryModel", function () {
        var OfferId = $(this).data('id');
        var OfferName = $(this).data('name');
        var OfferDescription = $(this).data('description');
        var OfferPrice = $(this).data('price');
        var OfferPr = $(this).data('pr');

        $(".modal-body #OfferId").val(OfferId);
        $(".modal-body #OfferName").val(OfferName);
        $(".modal-body #OfferDescription").val(OfferDescription);
        $(".modal-body #OfferPrice").val(OfferPrice);
        $(".modal-body #OfferPr").val(OfferPr);


    });



</script>


<!-- <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

 -->
