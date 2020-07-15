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
                                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('admin/manageMessageFromBusiness');?>" >Inquiry From Business</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div style="text-transform: uppercase;" class="p-2 bg-dark text-white border rounded-left rounded-right col-12 h4 text-center">
                            Inquiry From Business
                        </div>

                        <div class="col-12">
                            <div class="row"> 
                                <div class="col-lg-12"> 
                                    <a href="<?=base_url('admin/deleteMessageFromBusiness')?>"><button class="btn btn-danger col-lg-3 float-right">Delete</button></a>
                                </div>
                                <?php

                                if (!empty($mainRecord)) {
                                
                                 foreach($mainRecord as $record){ 

                                    if(!empty($record)){

                                        
                                        $businessDetails = $this->db->query('SELECT * FROM `businessdetails` WHERE BusinessId='.$record['FromBusiness'])->result_array(); 
                                        // print_r($record);
                                        // print_r($businessDetails);

                                        if(!empty($businessDetails)){

                                    
                                ?>

                                    <div  class="col-12 border-bottom pt-2 pb-2">
                                        <div class="row"> 
                                            <div class="col-2 ">
                                                <?=$businessDetails[0]['CompanyName']?>
                                            </div>
                                            <div class="col-3">
                                                <?=$businessDetails[0]['BusinessEmail']?>
                                            </div>
                                            <div class="col-3">
                                                <?=$record['Message']?>
                                            </div>
                                            <div class="col-2"> 
                                                <?=$record['date']?>
                                            </div>
                                            <div class="col-2"> 
                                                <?=$record['time']?>
                                            </div>
                                        </div>  
                                    </div>

                                <?php } }  }  }?>
                                
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