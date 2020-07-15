<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require('mainCssLinks.php'); ?>
    <title>offersnearme</title>
    

</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php require('admin_header.php'); ?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php require('admin_sidebar.php'); ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Offersnearme</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?=base_url('admin/admin_home');?>" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('admin/manageBusiness');?>" >Registered Business</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>


                
                <div class="row">
                    <div class="col-12">
                        <div class="col-4 card bg-dark">
                            <h1 align="center" class="text text-muted"> Total Business  </h1>
                            <h2 align="center" class="text text-white"><?=$totalBusiness?></h2>
                        </div>
                    </div>

                    <?php 
                    foreach($business as $user){
                        
                        $Location = $this->MLocation->getLocation($user['AreaId']);
                        // print_r($Location);

                        $Category = $this->MCategory->getCategoryForAdmin($user['CategoryId']);
                        // print_r($Category);
                            
                        $Offers = $this->MOffers->getOfferesOfBusinessOffers($user['BusinessId']);

                        // print_r($Offers);
                        $totalReview = 0;
                        foreach ($Offers as $o) {
                            $review = $this->MReview->getAllReviewForBusiness($o['OfferId']);
                            $totalReview = $totalReview + $review;
                        }

                        ?>

                        




                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="user-avatar float-xl-left pr-4 float-none">
                                                <img width="120" height="120" src="<?=base_url('assets/assets_business_images/')?><?=$user['BusinessImage']?>" alt="User Avatar" class="rounded-circle">
                                                    </div>
                                                <div class="pl-xl-3">
                                                    <div class="m-b-0">
                                                        <div class="user-avatar-name d-inline-block">
                                                            <a href="<?=base_url("admin/getOffersOfBusiness/")?><?=$user['BusinessId']?>"><h2 class="font-24 m-b-10"><?=$user['CompanyName']?></h2></a>
                                                        </div>
                                                        <div class="rating-star d-inline-block pl-xl-2 mb-2 mb-xl-0">
                                                            <p class="d-inline-block text-dark"><?=$totalReview?> Reviews </p>
                                                        </div>
                                                    </div>
                                                    <div class="user-avatar-address">
                                                        <p class="mb-2"><i class="fa fa-map-marker-alt mr-2  text-primary"></i>
                                                            <?=$Location['AreaDetails'][0]['AreaName']?>, <?=$Location['CityDetails'][0]['CityName']?>, <?=$Location['StateDetails'][0]['StateName']?>, <?=$Location['CountryDetails'][0]['CountryName']?>
                                                        </p>
                                                        <div class="mt-3">
                                                            <a href="" class="mr-1 badge badge-light"><?=$Category[0]['CategoryName']?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="float-xl-right float-none mt-xl-0 mt-4">
                                                    <a id="<?=$user['BusinessId']?>" href="" data-target="#SendMsgToBusiness" data-toggle="modal" class="btn btn-secondary btnSendMsg">Send Messages</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>

                            </div>








                    <?php } ?>
                </div>
 
                



                <div class="col-12"> 
                    <div align="center" class="col-12 center">

                    <?php echo $links;?> 

                    </div>
                </div>









<div class="modal fade" id="SendMsgToBusiness" tabindex="-1" role="dialog" aria-labelledby="SendMsgToBusinessTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="SendMsgToBusinessTitle">Send Message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/sendMessageToBusiness');?>" method="post">
            <div class="modal-body">
                

                <input type="hidden" name="BusinessId" id="BusinessId"> 


                <label>Enter Message</label>
                <input type="text" name="Message" id="Message" class="form-control" required>
                
            
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="AddCategoryButton" value="Send Message">
            </div>
          </form>
        </div>
      </div>
    </div>






                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                </div>
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <?php require('mainJsLinks.php');?>   
</body>
 
</html>





<script type="text/javascript">
    

    $('.btnSendMsg').click(function(){
        BusinessId = $(this).attr('id');
        $('.modal .modal-body #BusinessId').val(BusinessId);
    });

</script>