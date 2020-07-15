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
                                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('admin/paymentRequest');?>" >Payment Requests</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>


                
                <div class="row">
                    <div class="col-12">
                        <div class="col-4 card bg-dark">
                            <h1 align="center" class="text text-muted"> Total Requests  </h1>
                            <h2 align="center" class="text text-white"><?=$totalRequests?></h2>
                        </div>
                    </div>

                    <?php 
                        foreach($businesstransactiondetails as $user){
                            $businessDetails = $this->db->query('select * from `businessdetails` where BusinessId = '.$user['BusinessId'])->result_array();
                            // print_r($businessDetails);
                    ?>

                        




                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="pl-xl-3">
                                        <div class="m-b-0">
                                            <div class="user-avatar-name d-inline-block">
                                                <a href="<?=base_url("admin/getOffersOfBusiness/")?><?=$user['BusinessId']?>"><h2 class="font-24 m-b-10 text-primary"><?=$user['TransactionAmount']?> Rs/-</h2></a>
                                            </div>
                                            <div class="rating-star d-inline-block pl-xl-2 mb-2 mb-xl-0">
                                                <p class="d-inline-block text-danger"> <?=$businessDetails[0]['CompanyName']?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="float-xl-right float-none mt-xl-0 mt-4">
                                            <a href="<?=base_url('admin/paymentDone/').$user['BusinessTransactionId'].'/'.$user['BusinessId']?>" class="btn btn-secondary btnSendMsg">Payment Done</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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