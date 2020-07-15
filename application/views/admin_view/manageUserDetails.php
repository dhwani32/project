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
                                            <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url('admin/manageUsers');?>">Registered Users</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('admin/manageUserDetails/');?><?=$userDetails['UserId']?>">User</a></li>
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
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card influencer-profile-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="text-center">
                                                <img src="<?=base_url('assets/assets_user_images/')?><?=$userDetails['UserImage']?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <div class="user-avatar-info">
                                                    <div class="m-b-20">
                                                        <div class="user-avatar-name">
                                                            <h2 class="mb-1"><?=$userDetails['UserName']?></h2>
                                                        </div>
                                                        <div class="rating-star  d-inline-block">
                                                            <p class="d-inline-block text-dark">give <?=$review?> Reviews </p>
                                                        </div>
                                                    </div>
                                                    <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
                                                    <div class="user-avatar-address">
                                                        <p class="border-bottom pb-3">
                                                            <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-primary "></i><?=$userDetails['UserAddress']?></span>
                                                            <span class="mb-2 ml-xl-4 d-xl-inline-block d-block">Joined date: <?=$userDetails['JoinDate']?>  </span>
                                                            <span class=" mb-2 d-xl-inline-block d-block ml-xl-4"><?=$userDetails['UserGender']?>
                                                                    </span>
                                                            
                                                        </p>
                                                        <div class="mt-3">
                                                            <span class="h6">Referal Code : </span>
                                                            <span class="badge badge-purple m-1 p-2"><?=$userDetails['ReferalCode']?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="border-top user-social-box">
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2 twitter-color"> <i class="fab fa-twitter-square"></i></span><span>13,291</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2  pinterest-color"> <i class="fab fa-pinterest-square"></i></span><span>84,019</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2 instagram-color"> <i class="fab fa-instagram"></i></span><span>12,300</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2  facebook-color"> <i class="fab fa-facebook-square "></i></span><span>92,920</span></div>
                                        <div class="user-social-media d-xl-inline-block "><span class="mr-2 medium-color"> <i class="fab fa-medium"></i></span><span>291</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2 youtube-color"> <i class="fab fa-youtube"></i></span><span>1291</span></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end influencer profile  -->
                        <!-- ============================================================== -->
                       
                        <div class="row">


                            <!-- ============================================================== -->
                            <!-- total earned   -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-inline-block">
                                            <h5 class="text-muted">Total Earned</h5>
                                            <h2 class="mb-0"> &#x20B9 <?=$userDetails['ReferalPoints']?> Rs</h2>
                                        </div>
                                        <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                            <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end total earned   -->
                            <!-- ============================================================== -->

                            <div class=" offset-xl-6 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <a href="<?=base_url('admin/changeUserAllow/');?><?=$userDetails['UserId']?>/<?=$userDetails['UserAllow']?>" class="btn btn-purple offset-3 offset-xl-0 offset-sm-3 col-xl-12 col-sm-6 col-m-6 col-6">
                                    <?php 
                                        if($userDetails['UserAllow'] == 1){
                                            echo "Disabble User";
                                        }else{
                                            echo "Enable User";
                                        }
                                    ?>

                                </a>
                            </div>
                            




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















                            