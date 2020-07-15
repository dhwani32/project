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
                            <h3 class="box-title"> Redeem Form </h3>
                           



                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                        
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form method="post" action="<?=base_url('business/OfferRedeemPage')?>">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Transaction Id : </label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" id="TransactionId" name="TransactionId" placeholder="Enter the Customer's TransactionId" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Redeem Code : </label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" id="RedeemCode" name="RedeemCode" placeholder="Enter the Customer's Redeem Code" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
                                                                    <div class="login-horizental cancel-wp pull-left">
                                                                        <button class="btn btn-white" type="submit">Cancel</button>
                                                                        <button name="btnRedeemCheck" class="btn btn-sm btn-primary login-submit-cs" type="submit">Check Customer's Code</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                        
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                
                                                <div id="DisplayAvailability" class="DisplayAvailability"> 
                                                    <span class="text text-success">
                                                    <?php if(isset($userDetails)){ ?>

                                                        <div class="row">
                                                            <div class="col-lg-12"> 
                                                                <div style="color: black;" class="col-md-2"> 
                                                                    <h5> User Name : </h5>
                                                                </div>
                                                                <div style="color: black;" class="col-md-2">
                                                                    <h4> <?=$userDetails[0]['UserName']?> </h4>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12"> 
                                                                <div style="color: black;" class="col-md-2"> 
                                                                    <h5> User Email : </h5>
                                                                </div>
                                                                <div style="color: black;" class="col-md-2">
                                                                    <h4> <?=$userDetails[0]['UserEmail']?> </h4>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12"> 
                                                                <div style="color: black;" class="col-md-2"> 
                                                                    <h5> User Phone : </h5>
                                                                </div>
                                                                <div style="color: black;" class="col-md-2">
                                                                    <h4> <?=$userDetails[0]['UserPhone']?> </h4>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12"> 
                                                                <div style="color: black;" class="col-md-2"> 
                                                                    <h5> Transaction Id : </h5>
                                                                </div>
                                                                <div style="color: black;" class="col-md-2">
                                                                    <h4> <?=$TransactionData['TransactionId']?> </h4>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12"> 
                                                                <div style="color: black;" class="col-md-2"> 
                                                                    <h5> Redeem Code : </h5>
                                                                </div>
                                                                <div style="color: black;" class="col-md-2">
                                                                    <h4> <?=$TransactionData['RedeemCode']?> </h4>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12"> 
                                                                <div style="color: black;" class="col-md-2"> 
                                                                    <h5> Payment Status : </h5>
                                                                </div>
                                                                <div style="color: black;" class="col-md-2">
                                                                    <h4> <?=$TransactionRecords[0]['OfferOrderPayment']?> </h4>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12"> 
                                                            <a href="<?=base_url('business/DistributeOffer/').$TransactionData['TransactionId'].'/'.$TransactionData['RedeemCode']?>"> <button class="btn btn-pink"> Distribute </button> </a>
                                                        </div>

                                                    <?php  } ?>
                                                    </span>

                                                    <span class="text text-danger">
                                                    <?php
                                                        if(!isset($userDetails)){
                                                            echo $this->session->flashdata('invalidTIdCode');
                                                        } 
                                                    ?>
                                                    </span>
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


<!-- hF5bm1U -->



                            
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

