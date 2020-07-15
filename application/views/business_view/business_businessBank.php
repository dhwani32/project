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
                            <h3 class="box-title"> Bank And Wallet Details </h3>
                            
                            <button data-toggle="modal" data-target="#helpBusinessLocation" class="btn btn-pink"> Help </button>


                            <?php 
                                if(count($businessWallet) > 0 ){ 
                                    if($businessWallet[0]['BusinessWallate'] >= 1000){
                            ?>
                            
                            <button data-toggle="modal" data-target="#requestCash" class="btn btn-pink"> Request Cash </button>
                            <?php echo "<p class=\"text text-danger\">" . $this->session->flashdata('RQFCErr') . "</p>"; ?>
                            <?php echo "<p class=\"text text-success\">" . $this->session->flashdata('RQFCScc') . "</p>"; ?>
                            <?php   
                                    }else{
                                    ?>
                                        <p class="text text-danger"> You have less then 1000 Rs. </p> 
                                    <?php 
                                    } 
                                }
                            ?>

                            <hr>

                            <div class="col-lg-12">
                                
                                <?php 
                                    if(count($businessWallet) > 0 ){ 
                                ?>
                                    <h5 class="col-lg-6"> Business Wallet : 
                                <?php 
                                    if($businessWallet[0]['BusinessWallate'] == ''){
                                        echo "0";
                                    }else{
                                        echo $businessWallet[0]['BusinessWallate']; 
                                    }
                                ?> 
                                    Rs. </h5> 
                                <?php 

                                    if($businessWallet[0]['BusinessBankName'] != null && $businessWallet[0]['BusinessBankAccNo'] != null && $businessWallet[0]['BusinessBankIFSC'] != null && $businessWallet[0]['BusinessPanNo'] != null && $businessWallet[0]['BusinessBankBranch'] != null){
                                        echo "<button data-toggle=\"modal\" data-target=\"#setBankDetails\" class=\"btn btn-pink
                                    \">Change Bank Details</button>";
                                    }else{
                                        echo "<button data-toggle=\"modal\" data-target=\"#setBankDetails\" class=\"btn btn-pink
                                    \">Set Bank Details</button>";
                                    }

        
                                    }
                                ?>
                            </div>
                            <hr>
                            <div class="col-lg-12">



                                <?php 
                                    if(count($businessWallet) > 0 ){ 
                                        if($businessWallet[0]['BusinessBankName'] != null && $businessWallet[0]['BusinessBankAccNo'] != null && $businessWallet[0]['BusinessBankIFSC'] != null && $businessWallet[0]['BusinessPanNo'] != null && $businessWallet[0]['BusinessBankBranch'] != null){
                                ?>
                                 <span class="col-lg-3"> Bank Name :  </span>
                                <span class="col-lg-7"> <?php echo $businessWallet[0]['BusinessBankName']; ?> </span>
                                <span class="col-lg-3"> Bank Account No. :  </span>
                                <span class="col-lg-7"> <?php echo $businessWallet[0]['BusinessBankAccNo']; ?> </span>
                                <span class="col-lg-3"> Bank IFSC Code. :  </span>
                                <span class="col-lg-7"> <?php echo $businessWallet[0]['BusinessBankIFSC']; ?>  </span>
                                <span class="col-lg-3"> Bank Branch Name :  </span>
                                <span class="col-lg-7"> <?php echo $businessWallet[0]['BusinessBankBranch']; ?>  </span>
                                <span class="col-lg-3"> PAN No.  :  </span>
                                <span class="col-lg-7"> <?php echo $businessWallet[0]['BusinessPanNo']; ?>  </span>
                                <?php 
                                    }else{
                                        echo "Please Set Bank Details !";
                                    }
                                    }
                                ?>



                               
                            </div>
                            <br><br><br><br><br><br>
                            <hr>
                            <p class="text text-danger"> *Please Check All The Details And Make Sure That All The Details Are Correct. <br> *If You Enter The Incorrect Details Then We Are Not Responsible For Any Mistransactions.  </p>

                            <div id="sparkline8"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







<!-- Modal to set or change the business location... -->
        <div class="modal fade" id="requestCash" tabindex="-1" role="dialog" aria-labelledby="requestCashLable" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="requestCashLable">Request For Cash</h5>

                    </div>
                    <form action="<?=base_url('business/requestForCash');?>" method="post">
                    <div class="modal-body">
                        <p> Wallet Balance : <?=$businessWallet[0]['BusinessWallate']?> Rs. </p>
                        <?php
                            $UserId = $_SESSION['userDetails'][0]['UserId'];
                            $BusinessDetails = $this->MBusiness->getBusinessId($UserId);
                        ?>

                        <input type="hidden" name="BusinessId" value="<?php echo $BusinessDetails[0]['BusinessId']; ?>">
                        <input type="hidden" name="MaxAmount" id="MaxAmount" value="<?=$businessWallet[0]['BusinessWallate']?>">
                        <input required type="text" class="form-control" placeholder="Enter The Amount More Then 1000 And Less Then <?=$businessWallet[0]['BusinessWallate']?>" name="AmountToConvert" id="AmountToConvert">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-pink" name="btnRequest" value="Request To Convert Rs.">
                    </div>
                    </form>
                </div>
            </div>
        </div>




    <!-- Modal to set or change the business location... -->
        <div class="modal fade" id="setBankDetails" tabindex="-1" role="dialog" aria-labelledby="setBankDetailsLable" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="setBankDetailsLable">Business Bank Details</h5>

                    </div>
                    <form action="<?=base_url('business/setBusinessBank');?>" method="post">
                    <div class="modal-body">
                            <div>
                                <?php
                                $UserId = $_SESSION['userDetails'][0]['UserId'];
                                $BusinessDetails = $this->MBusiness->getBusinessId($UserId);?>

                                <input type="hidden" name="BusinessId" value="<?php echo $BusinessDetails[0]['BusinessId']; ?>">
                               
                                <label>Bank Name</label>
                                <input class="form-control" type="text" name="BusinessBankName" id="BusinessBankName" required>
                                <label>Bank Account No. </label>
                                <input class="form-control" tabindex="" ype="text" name="BusinessBankAccNo" id="BusinessBankAccNo" required>
                                <label>Bank IFSC</label>
                                <input class="form-control" type="text" name="BusinessBankIFSC" id="BusinessBankIFSC" required>
                                <label>Bank Branch</label>
                                <input class="form-control" type="text" name="BusinessBankBranch" id="BusinessBankBranch" required>
                                <label>Pan No.</label>
                                <input class="form-control" type="text" name="BusinessPanNo" id="BusinessPanNo" required>

                            </div>

                    </div>
                    <div class="modal-footer">
                        <h6 class="text text-danger"> *Make sure we are not responsible for any misstransaction if you enter the incorrect bank details. So, please fill all the fields very carefully. </h6>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-pink" name="btnSetBank" value="Set Bank Details">
                    </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- Modal for help to set the business location... -->
        <div class="modal fade" id="helpBusinessLocation" tabindex="-1" role="dialog" aria-labelledby="helpBusinessLocationLable" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="helpBusinessLocationLable">Guide To Connect With Bank </h5>

                    </div>
                    <div class="modal-body">
                            <div>
                                <ol> 
                                    <li> All the offers or your orders will be credited in your wallet. </li>
                                    <li> Once you have Rs. more then 1000 Rs. then you can request for convert it into real cash in your bank account.</li>
                                    <li> You need to provide all the bank details for the Transaction. </li>
                                    <li> If you provide wrong bank details for we are not responsible for any misstransaction. so, please fill the correct bank details. </li>
                                    <li> After the request to convert Rs. into cash it takes minimun 3 days to credite cash in your bank account. </li>
                                    <li> If you don't get cash in your bank account after 10 days, then you can do inquery about it with your request id. </li>
                                    <li> If no one give reply to your inqury regarding to covnert Rs. into cash then you can take legal actions after 10 days of request.(Please remember that Request Id is very important) </li>
                                    <li> Your Rs. are also represent your real cash. because there are not any cut of company or website in your cash. </li>
                                    <li> Suppose you have 5000 Rs. as Rs. in your wallet then you will get 5000Rs. as cash in your account. (Company will deduct nothing from your cash)</li>
                                    <li> If you don't get complete money then also you can take legal actions against company. </li>
                                </ol>    
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


