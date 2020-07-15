<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>offersnearme</title>
    <?php require('mainCssLinks.php'); ?>
    

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
            <div class="dashboard-influence">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2">Offersnearme</h3>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?=base_url('admin/admin_home');?>" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url('admin/manageBusiness');?>">Registered Business</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('admin/manageBusinessDetails/');?><?=$businessDetails['BusinessId']?>">Business</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- content  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- influencer profile  -->
                    <!-- ============================================================== -->




                    <?php 

                        $Location = $this->MLocation->getLocation($businessDetails['AreaId']);
                        // print_r($Location);

                        $Category = $this->MCategory->getCategoryForAdmin($businessDetails['CategoryId']);
                        // print_r($Category); 

                        $totalReview = 0;
                        foreach ($offers as $o) {
                            $data = $this->MReview->getAllReviewForBusiness($o['OfferId']);
                            $totalReview = $totalReview + $data;
                        }


                        ?>

                   <div class="row">
                        <!-- ============================================================== -->
                        <!-- profile -->
                        <!-- ============================================================== -->
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card profile -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar text-center d-block">
                                        <img height="150" width="150" src="<?=base_url('assets/assets_business_images/')?><?=$businessDetails['BusinessImage']?>" alt="User Avatar" class="rounded-circle ">
                                    </div>
                                    <div class="text-center">
                                        <h2 class="font-24 mb-0"><?=$businessDetails['CompanyName']?></h2>
                                        
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16">Contact Information</h3>
                                    <div class="">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-2 text text-primary"><i class="fas fa-fw fa-envelope mr-2"></i><?=$businessDetails['BusinessEmail']?></li>
                                        <li class="mb-0 text text-primary"><i class="fas fa-fw fa-phone mr-2"></i><?=$businessDetails['BusinessPhone']?></li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16"> Address </h3>
                                    <div class="rating-star">
                                        <p class="d-inline-block text-secondary">
                                             <?=$Location['AreaDetails'][0]['AreaName']?>, <?=$Location['CityDetails'][0]['CityName']?>, <?=$Location['StateDetails'][0]['StateName']?>, <?=$Location['CountryDetails'][0]['CountryName']?>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16"> Reviews </h3>
                                    <div class="rating-star">
                                        <p class="d-inline-block text-dark"><?=$totalReview?> Reviews </p>
                                    </div>
                                </div>
                                <!-- <div class="card-body border-top">
                                    <h3 class="font-16">Social Channels</h3>
                                    <div class="">
                                        <ul class="mb-0 list-unstyled">
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-facebook-square mr-1 facebook-color"></i>fb.me/michaelchristy</a></li>
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-twitter-square mr-1 twitter-color"></i>twitter.com/michaelchristy</a></li>
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-instagram mr-1 instagram-color"></i>instagram.com/michaelchristy</a></li>
                                        <li class="mb-1"><a href="#"><i class="fas fa-fw fa-rss-square mr-1 rss-color"></i>michaelchristy.com/blog</a></li>
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-pinterest-square mr-1 pinterest-color"></i>pinterest.com/michaelchristy</a></li>
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-youtube mr-1 youtube-color"></i>youtube/michaelchristy</a></li>
                                    </ul>
                                    </div>
                                </div> -->
                                <div class="card-body border-top">
                                    <h3 class="font-16">Category</h3>
                                    <div>
                                        <a href="#" style="background: rgb(250, 0, 100) !important;" class="badge badge-danger mr-1"><?=$Category[0]['CategoryName']?></a>
                                    </div>
                                </div>

                                <div class="card-body border-top">
                                    <h3 class="font-16">Bank Info</h3>
                                    <div class="rating-star"> <b>
                                        <p class="d-inline-block text-dark">Bank Name : <?=$businessDetails['BusinessBankName']?></p>
                                        <p class="d-inline-block text-dark">Bank Account No : <?=$businessDetails['BusinessBankAccNo']?></p>
                                        <p class="d-inline-block text-dark">Bank IFSC Code : <?=$businessDetails['BusinessBankIFSC']?></p>
                                        <p class="d-inline-block text-dark">Bank Branch Name : <?=$businessDetails['BusinessBankBranch']?></p>
                                        <p class="d-inline-block text-dark">Pan No : <?=$businessDetails['BusinessPanNo']?></p>
                                    </b>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end card profile -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end profile -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- campaign data -->
                        <!-- ============================================================== -->
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- campaign tab one -->
                            <!-- ============================================================== -->
                            <div class="influence-profile-content pills-regular">
                                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active " id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Provider</a>
                                    </li>
                                     <li class="nav-item">
                                        <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#offers" role="tab" aria-controls="pills-packages" aria-selected="false">Offers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages" aria-selected="false">Package</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Reviews</a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                        <div class="row">

                                            <?php 
                                            // print_r($businessDetails);
                                            $totalPurchaseAllOffers = $this->MOffers->getTotalPurchaseOfAllOffers($businessDetails['BusinessId']);
                                            $totalOffers = $this->MOffers->getOffersOfBusiness($businessDetails['BusinessId']);
                                            $totalSubscribers = count($this->MSubscription->getTotalSubscribersOfBusiness($businessDetails['BusinessId']));


                                            ?>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="section-block">
                                                    <h3 class="section-title">All Details Of Provider</h3>
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1"><?=$totalOffers?></h1>
                                                        <p>Offers</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1"><?=$totalPurchaseAllOffers?></h1>
                                                        <p">Purchased</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1 text text-danger" ><?=$totalSubscribers?></h1>
                                                        <p class="text text-danger">Subscribers</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        

                                        <!-- <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="media influencer-profile-data d-flex align-items-center p-2">
                                                            <div class="mr-4">
                                                                <img src="assets/images/dribbble.png" alt="User Avatar" class="rounded-circle user-avatar-lg">
                                                            </div>
                                                            <div class="media-body">
                                                                 <h3 class="m-b-10">Your Campaign Title Here</h3>
                                                                <p><span class="m-r-20 d-inline-block">Draft Due Date<span class="m-l-10 d-inline-block text-primary">28 Jan 2018</span></span><span class="m-r-20 d-inline-block"> Publish Date<span class="m-l-10 text-secondary">20 March 2018</span></span><span class="m-r-20">Ends<span class="m-l-10 text-info">10 July, 2018</span></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-top card-footer p-0">
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0 ">35k</h4>
                                                    <p>Total Reach</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0 ">45k</h4>
                                                    <p>Total Views</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">8k</h4>
                                                    <p>Total Click</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0 ">10k</h4>
                                                    <p>Engagement</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">3k</h4>
                                                    <p>Conversion</p>
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                    </div>
                                    

                                    <div class="tab-pane fade" id="offers" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                        
                                        <div class="section-block">
                                            <h3 class="section-title">Offers List</h3>
                                        </div>
                                        
                                        <?php foreach($offers as $o){
                                            // print_r($o);
                                            // $offerImage = $this->db->query('select * from `images` where OfferId='.$o['OfferId'].' group by OfferId');

                                              $totalPurchase = $this->MOffers->totalPurchaseOfOffers($o['OfferId']);
                                              $offerImage = $this->MOffers->getOfferImageForFavorite($o['OfferId']);

                                        ?>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="media influencer-profile-data d-flex align-items-center p-2">
                                                            <div class="mr-4">
                                                                <img src="<?=base_url('assets/assets_offers_images/')?><?php echo$offerImage[0]['Image']; ?>" alt="User Avatar" class="user-avatar-lg">
                                                            </div>
                                                            <div class="media-body ">
                                                                <div class="influencer-profile-data">
                                                                    <h3 class="m-b-10"><?=$o['OfferName']?></h3>
                                                                    <p>
                                                                        <span class="m-r-20 d-inline-block">Offer Start Date
                                                                            <span class="m-l-10 text-primary"><?=$o['StartDate']?></span>
                                                                        </span>
                                                                        <span class="m-r-20 d-inline-block"> Offer End Date
                                                                            <span class="m-l-10 text-secondary"><?=$o['EndDate']?></span>
                                                                        </span>
                                                                            
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-top card-footer p-0">
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0"> <?=$totalPurchase;?> </h4>
                                                    <p>Total Purchase</p>
                                                </div>
                                               <!--  <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">29k</h4>
                                                    <p>Total Views</p>
                                                </div> -->
                                                <!-- <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">5k</h4>
                                                    <p>Total Click</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">4k</h4>
                                                    <p>Engagement</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">2k</h4>
                                                    <p>Conversion</p>
                                                </div> -->
                                            </div>
                                        </div>

                                    <?php } ?>
                                        

                                        <!-- <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="media influencer-profile-data d-flex align-items-center p-2">
                                                            <div class="mr-4">
                                                                <img src="assets/images/dribbble.png" alt="User Avatar" class="rounded-circle user-avatar-lg">
                                                            </div>
                                                            <div class="media-body">
                                                                 <h3 class="m-b-10">Your Campaign Title Here</h3>
                                                                <p><span class="m-r-20 d-inline-block">Draft Due Date<span class="m-l-10 d-inline-block text-primary">28 Jan 2018</span></span><span class="m-r-20 d-inline-block"> Publish Date<span class="m-l-10 text-secondary">20 March 2018</span></span><span class="m-r-20">Ends<span class="m-l-10 text-info">10 July, 2018</span></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-top card-footer p-0">
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0 ">35k</h4>
                                                    <p>Total Reach</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0 ">45k</h4>
                                                    <p>Total Views</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">8k</h4>
                                                    <p>Total Click</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0 ">10k</h4>
                                                    <p>Engagement</p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">3k</h4>
                                                    <p>Conversion</p>
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                    </div>


                                    <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="section-block">
                                                    <h2 class="section-title">My Packages</h2>
                                                </div>
                                            <?php 
                                                if($businessDetails['PackageId'] != NULL || $businessDetails['PackageId'] != 0){
                                                    $packageDetails = $this->MPackages->getPackageList($businessDetails['PackageId']);
                                                }else{
                                                    $packageDetails = array('0'=>array('PackageName'=>'Not Selected','PackagePrice'=>'0','PackageDuration'=>'Not Active','PackageDescription'=>'This business Does Not Have Any Active Package'));
                                                }
                                                // print_r($packageDetails);
                                            ?>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-header bg-primary text-center p-3 ">
                                                        <h4 class="mb-0 text-white"> <?=$packageDetails[0]['PackageName']?> </h4>
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <h1 class="mb-1"><?=$packageDetails[0]['PackagePrice']?>₹</h1>
                                                        <p><?=$packageDetails[0]['PackageDuration']?></p>
                                                    </div>
                                                    <div class="card-body border-top">
                                                        <ul class="list-unstyled bullet-check font-14">
                                                            <li><?=$packageDetails[0]['PackageDescription']?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                        
                                    <?php
                                    // print_r($review);
                                    if($review != NULL){
                                     foreach($review as $r){ 
                                        $customerName = $this->MAUser->getReviewerName($r['UserId']);
                                        // print_r($customerName);
                                        ?>    
                                        
                                        <div class="card">
                                            <h5 class="card-header">Offers Reviews</h5>
                                            <div class="card-body border-top">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“ <?=$r['Review']?> ”</p>
                                                    <div class="rating-star mb-2">
                                                        
                                                    </div>
                                                    <span class="text-dark float-right font-weight-bold">- <?=$customerName[0]['UserName']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } /** foreach end **/    } /** if end **/?>

                                        <nav aria-label="Page navigation example">
                                           <??>
                                        </nav>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end campaign tab one -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end campaign data -->
                        <!-- ============================================================== -->
                    </div>
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















                            