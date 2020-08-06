<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require('mainCssLinks.php'); ?>
    <title>offersnearme</title>
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"></script>

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
                                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('admin/manageUsers');?>" >Registered Users</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>



                <div class="row">
                    <div class="col-6">
                        <div class="col-12 card bg-dark">
                            <h1 align="center" class="text text-muted"> Total Users  </h1>
                            <h2 align="center" class="text text-white"><?=$totalUsers?></h2>
                        </div>
                    </div>

                    <div class="col-5 pt-4 mb-3">
                        <input style="width:100%;" type="text" placeholder="searchUserByName" name="searchUserByName" id="searchUserByName" class="searchUserByName"> 
                    </div>  

                    <div class="col-md-12 col-xl-12 col-md-12">
                        <div class="searchedAreaUser row">
                        <?php
                        foreach($users as $user){?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <!-- .card -->
                            <div class="card card-figure">
                                <!-- .card-figure -->
                                <figure class="figure">
                                    <!-- .figure-img -->
                                    <div class="figure-img">
                                        <img width="100%" height="150" class="img-fluid" src="<?=base_url('assets/assets_user_images/');?><?=$user['UserImage'];?>" alt="Card image cap">
                                        <div class="figure-description">
                                            <h4 class="figure-title"> <?php echo $user['UserName'];?> </h4>
                                            <p>  <?=$user['JoinDate']?></p>
                                            <p> <?=$user['UserPhone']?> </p>

                                        </div>
                                        <div class="figure-tools">
                                            <a href="#" class="tile tile-circle tile-sm mr-auto"><span class="oi oi-data-transfer-download"></span></a>
                                        </div>
                                        <div class="figure-action">
                                            <a href="<?=base_url('admin/manageUserDetails/');?><?=$user['UserId']?>" class="btn btn-block btn-sm btn-primary">Profile</a>
                                        </div>
                                    </div>
                                    <!-- /.figure-img -->
                                    <figcaption class="figure-caption">
                                        <ul class="list-inline d-flex text-muted mb-0">
                                            <li class="list-inline-item mr-auto">
                                                <span class="oi oi-paperclip"><?php echo $user['UserName'];?></span></li>
                                            <li class="list-inline-item">
                                                <span class="oi oi-calendar"><?php echo $user['UserGender'];?></span>
                                            </li>
                                        </ul>
                                    </figcaption>
                                </figure>
                                <!-- /.card-figure -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <?php } ?>
                        </div>
                    </div>


                        <div class="col-12">
                            <div align="center" class="col-12 center">

                            <?php echo $links;?>

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
    $('#searchUserByName').on('keyup',function(){
        userName = $(this).val();
        
        $.ajax({
            url:'<?=base_url('admin/searchUserByNameAjax/')?>'+userName,
            success:function(result){
                $('.searchedAreaUser').html(result);
            }
        });

    });
</script>