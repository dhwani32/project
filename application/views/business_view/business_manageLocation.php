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
                            <h3 class="box-title"> Business Location </h3>
                            <?php 

                                $UserId = $_SESSION['userDetails'][0]['UserId'];
                                $data['businessDetails'] = $this->db->query('SELECT * FROM `businessdetails` WHERE UserId='.$UserId)->result_array();

                                if(count($data['businessDetails']) >= 1){
                                
                                    if($data['businessDetails'][0]['BusinessLocation'] != ""){
                                        $LocationSrc = $data['businessDetails'][0]['BusinessLocation'];
                               
                                        echo "<iframe src=\"".$LocationSrc."\" width=\"100%\" height=\"400\" frameborder=\"0\" style=\"border:none;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>";


                                        echo "<br><hr>";
                                        echo "Click on <b>HELP</b> button to learn how to set location.";
                                        echo "<hr>";
                                        echo "<button class=\"btn btn-pink\" data-toggle=\"modal\" data-target=\"#addOffersModel\" id=\"setBusinessLocation\"> Change Location </button> ";
                                        echo "<button data-toggle=\"modal\" data-target=\"#helpBusinessLocation\" class=\"btn btn-pink\"> Help </button>";

                        
                                
                                    }else{ 
                                        echo "<hr>";
                                        echo "Click on <b>HELP</b> button to learn how to set location.";
                                        echo "<hr>";
                                        echo "<button class=\"btn btn-pink\" data-toggle=\"modal\" data-target=\"#addOffersModel\" id=\"setBusinessLocation\"> Set Location </button> ";
                                        echo "<button data-toggle=\"modal\" data-target=\"#helpBusinessLocation\" class=\"btn btn-pink\"> Help </button>";
                                    }
                                
                                }
                            ?>  

                            <div id="sparkline8"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







    <!-- Modal to set or change the business location... -->
        <div class="modal fade" id="addOffersModel" tabindex="-1" role="dialog" aria-labelledby="addOffersModelLable" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addOffersModelLable">Business Location</h5>

                    </div>
                    <form action="<?=base_url('business/setBusinessLocation');?>" method="post">
                    <div class="modal-body">
                            <div>
                                <?php
                                $UserId = $_SESSION['userDetails'][0]['UserId'];
                                $BusinessDetails = $this->MBusiness->getBusinessId($UserId);?>

                                <input type="hidden" name="BusinessId" value="<?php echo $BusinessDetails[0]['BusinessId']; ?>">
                               
                                <label>Business Location Src</label>
                                <input class="form-control" type="text" name="BusinessLocationSrc" id="BusinessLocationSrc" required>

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-pink" name="btnLocationAdd" value="Set Location">
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
                        <h5 class="modal-title" id="helpBusinessLocationLable">Guide To Set Business Location</h5>

                    </div>
                    <div class="modal-body">
                            <div>
                                <ol> 
                                    <li>
                                        <a href="https://www.google.com/maps/"> Click Here </a>, OR Open the Google Map.
                                    </li>
                                    <hr>
                                    <li>
                                        Find your shop, and Mark your shop / select your shop. 
                                        <br>
                                        <img width="400" height="300" src="<?=base_url('assets/assets_business/assets_help_map/')?>11.png">
                                    </li>
                                    <hr>
                                    <li>
                                        Then, Click on the Three lines shown at left side.
                                        <br>
                                        <img width="400" height="300" src="<?=base_url('assets/assets_business/assets_help_map/')?>1.png">

                                    </li>
                                    <hr>
                                    <li>
                                        Click on the SHARE AND EMBED MAP link. 
                                        <br>
                                        <img width="300" height="600" src="<?=base_url('assets/assets_business/assets_help_map/')?>2.png">

                                    </li>
                                    <hr>
                                    <li>
                                        Click on the EMBED A MAP link.
                                        <br>
                                        <img width="400" height="500" src="<?=base_url('assets/assets_business/assets_help_map/')?>3.png">
                                    </li>
                                    <hr>
                                    <li>
                                        Click on the COPY HTML button.
                                        <br>
                                        <img width="400" height="300" src="<?=base_url('assets/assets_business/assets_help_map/')?>4.png">
                                    </li>
                                    <hr>
                                    <li>
                                        Past that Link in notepad.
                                        <br>
                                        <img width="600" height="600" src="<?=base_url('assets/assets_business/assets_help_map/')?>5.png">
                                    </li>
                                    <hr>
                                    <li>
                                        Select the text between Double-Quotes of src.
                                        <br>
                                        <img width="600" height="600" src="<?=base_url('assets/assets_business/assets_help_map/')?>6.png">
                                    </li>
                                    <hr>
                                    <li>
                                        Now past that link in the text box. and click on the Set Location Button.
                                        <br>
                                        <img width="600" height="600" src="<?=base_url('assets/assets_business/assets_help_map/')?>7.png">
                                    </li>
                                    <hr>
                                    <li>
                                        Now, you can see that your Business Location has been selected.
                                    </li>
                                    <hr>
                                    <li> 
                                        Same Process for the Changing Business Location.
                                    </li>
                                    <hr>
                                    <li>
                                        If you have any Confusion, or Truble to Set the Location then you can contect us.
                                        <br> email : mr.vaghasiya197@gmail.com
                                        Or you can do Inquiry about this from you home page..
                                    </li>

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


