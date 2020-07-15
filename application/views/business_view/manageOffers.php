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
                            <p class="text text-danger"> <?php echo $this->session->flashdata('offerDeleteErrMsg'); ?> </p>




                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">

                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">

                                        <div style="border-bottom: 1px solid #ddd; padding-bottom: 5px; padding-top: 5px;" class="col-lg-12">
                                                    <div class="col-lg-1">
                                                       Image
                                                    </div>
                                                    <div class="col-lg-2 ">
                                                      Offer Name
                                                    </div>
                                                    <div class="col-lg-2 ">
                                                        Description
                                                    </div>
                                                    <div class="col-lg-2 ">
                                                        Start Date
                                                    </div>
                                                    <div class="col-lg-2 ">
                                                        End Date
                                                    </div>
                                                   
                                                </div>

                                      <?php foreach ($offersDetails as $o) {
                                        $image=$this->MOffers->getOfferImageForFavorite($o['OfferId']);
                                      ?>
                                                <div style="border-bottom: 1px solid #ddd; padding-bottom: 5px; padding-top: 5px;" class="col-lg-12">
                                                    <div class="col-lg-1">
                                                        <img style="width: 100%; " src="<?=base_url('assets/assets_offers_images/').$image[0]['Image']?>">
                                                    </div>
                                                    <div class="col-lg-2 ">
                                                      <h4>  <?=$o['OfferName']?> </h4>
                                                    </div>
                                                    <div class="col-lg-2 ">
                                                        <h4>  <?=$o['OfferDescription']?> </h4>
                                                    </div>
                                                    <div class="col-lg-2 ">
                                                        <h4>  <?=$o['StartDate']?> </h4>
                                                    </div>
                                                    <div class="col-lg-2 ">
                                                        <h4>  <?=$o['EndDate']?> </h4>
                                                    </div>
                                                    <div class="col-lg-1 ">
                                                        <h4>  <?=$o['OfferPayablePrice']?> </h4>
                                                    </div>
                                                    <div class="col-lg-4 ">
                                                      <button class="btn btn-pink">
                                                        <a style="color:#fff;"
                                                        data-toggle="modal"
                                                        data-target="#editOfferModel"
                                                        data-name="<?=$o['OfferName']?>"
                                                        data-description="<?=$o['OfferDescription']?>"
                                                        data-id="<?=$o['OfferId']?>"
                                                        data-price="<?=$o['OfferPrice']?>"
                                                        data-pr="<?=$o['OfferPr']?>"
                                                        class="open-EditCategoryModel"
                                                        href=""> <i class="fa fa-edit"> </i> EDIT
                                                        </a></button>
                                                      <button class="btn btn-pink"><a style="color:#fff;" href="<?=base_url('business/deleteOffers/').$o['OfferId']?>"> <i class="fa fa-trash"> </i> DELETE </a></button>
                                                      <button class="btn btn-pink"><a style="color:#fff;" href="<?=base_url('business/allOfferDetails/').$o['OfferId']?>"> <i class="fa fa-file-text-o"> </i> &nbsp;DETAILS </a></button>
                                                    </div>
                                                </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>









            <!-- Modal  -->

            <div class="modal fade" id="editOfferModel" tabindex="-1" role="dialog" aria-labelledby="editOfferModelTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editOfferModelTitle">Edit Offers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form enctype="multipart/form-data" action="<?=base_url('business/editOffers');?>" method="post">
                    <div class="modal-body">
                        <label>Offer Id</label>
                        <input type="text" name="OfferId" id="OfferId" value="" readonly class="form-control">
                        <label>Enter Offer Name</label>
                        <input type="text" name="OfferName" id="OfferName" value="" class="form-control" required>
                        <label>Enter Offer Description</label>
                        <input type="text" name="OfferDescription" id="OfferDescription" value="" class="form-control" required>
                        <label>Enter Offer Price</label>
                        <input type="text" name="OfferPrice" id="OfferPrice" value="" class="form-control" required>
                        <label>Enter Offer Pr</label>
                        <input type="text" name="OfferPr" id="OfferPr" value="" class="form-control" required>
                        <label>Enter Offer Start</label>
                        <input type="date" name="OfferStartDate" id="OfferStartDate" value="" class="form-control" required>
                        <label>Enter Offer End</label>
                        <input type="date" name="OfferEndDate" id="OfferEndDate" value="" class="form-control" required>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="AddCategoryButton" value="Edit Offer">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End Modal -->







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
