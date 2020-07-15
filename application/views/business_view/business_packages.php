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
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="<?=base_url();?>" class="btn btn-primary">Back to Userside</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="text-center custom-login">
                    <h3>Packages</h3>
                    <p>Select any one package for your business</p>
                </div>


                <?php
                    // print_r($businessdetails); 
                    $packageData = $this->MPackages->getAllPackages();
                    foreach ($packageData as $p) {
                ?>

                <div class="card-custom col-md-3 col-md-3">
                    
                        <div style="font-weight: 900; font-size: 18px; padding: 5px;" class="text-center col-md-12 card-field-custom">
                            <?=$p['PackageName']?>
                        </div>
                        <div style="font-weight: 700; font-size: 18px; padding: 5px;" class="col-md-12 card-field-custom">
                            <?=$p['PackagePrice']?> ₹
                        </div>
                        <div style="font-weight: 300; font-size: 18px; padding: 5px;" class="col-md-12 card-field-custom">
                            <?=$p['PackageDuration']?>
                        </div>
                        <div style="font-weight: 300; font-size: 18px; padding: 5px;" class="col-md-12 card-field-custom">
                            <?=$p['TotalOffers']?>
                        </div>
                        <div style="min-height: 150px; font-weight: 300; font-size: 18px; padding: 5px;" class="col-md-12 card-field-custom">
                            <?=$p['PackageDescription']?>
                            
                        </div>
                        <div class="col-md-12 card-field-custom">&nbsp;</div>
                         <a href="<?=base_url('business/selectPackage/')?><?=$p['PackageId']?>/<?=$businessdetails[0]['UserId']?>" class="col-md-12 btn btn-package-custom">Select Package</a>
                        

                    
                </div>

                <?php } ?>
        
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
              <p> Take your business on Heights. </p>
            </div>
        </div>
    </div>

    <?php require('business_js_links.php'); ?>

</body>

</html>


<style type="text/css">
    
    .card-custom{
        background: linear-gradient(150deg, rgb(200, 100, 100),rgb(200, 100, 100), rgb(250, 200, 200), rgb(250, 200, 200), rgb(256, 256, 256), rgb(256, 256, 256)) !important;
        border-radius: 15px;
        box-shadow: 2px 2px 5px #eee;
        transition: 0.4s;
        margin: 10px;
        padding: 40px;
        min-height: 400px;
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