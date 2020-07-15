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
                                <h2 class="pageheader-title">Offernearme</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?=base_url('admin/admin_home');?>" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item" aria-current="page">Packages</li>
                                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('admin/SponsorPlanPage');?>" >Add SponsorPlan</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Sponsore Table 
                            <button class="offset-8 col-2 btn btn-purple"  data-toggle="modal" data-target="#AddPlanModal">Add SponsorPlan</button></h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Duration</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                            $allPlans = $this->MSponsor->getAllPlans();
                                            foreach($allPlans as $ac){ ?>

                                            <tr>
                                                <td><?php echo $ac['PlanName'];?></td>
                                                <td><?php echo $ac['PlanPrice'];?></td>
                                                <td><?php echo $ac['PlanDuration'];?></td>

                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#editPlanModel" 
                                                    data-name="<?=$ac['PlanName']?>" 
                                                    data-id="<?=$ac['SponsorPlanId']?>"
                                                    data-price="<?=$ac['PlanPrice']?>"
                                                    data-duration="<?=$ac['PlanDuration']?>"
                                                    class="open-EditPlanModel fa fa-edit btn btn-success"></a>
                                                </td> 
                                                <td>
                                                    <a href="<?=base_url('admin/deletePlan/');?><?=$ac['SponsorPlanId'];?>" class="fa fa-trash btn btn-danger"></a>
                                                </td>
                                            </tr>
                                            
                                            <?php } ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Duration</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->



    <!-- Modal  -->
    
    <div class="modal fade" id="AddPlanModal" tabindex="-1" role="dialog" aria-labelledby="AddPlanModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AddPlanModalTitle">Add Plan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/addPlan');?>" method="post">
            <div class="modal-body">
            
                <label>Enter Plan Name</label>
                <input type="text" name="PlanName" id="PlanName" class="form-control" required>
                <label>Enter Plan Price</label>
                <input type="text" name="PlanPrice" id="PlanPrice" class="form-control"  required>
                <label>Enter Plan Duration</label>
                <input type="text" name="PlanDuration" id="PlanDuration" class="form-control"  required>
                
                
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="AddPlanButton" value="Add Plan">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal -->





    <!-- Modal  -->
    
    <div class="modal fade" id="editPlanModel" tabindex="-1" role="dialog" aria-labelledby="editPlanModelTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editPlanModelTitle">Edit Plan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/editPlan');?>" method="post">
            <div class="modal-body">
                <label>Plan Id</label>
                <input type="text" name="PlanId" id="PlanId" value="" readonly class="form-control">
                <label>Enter Plan Name</label>
                <input type="text" name="PlanName" id="PlanName" value="" class="form-control" required>
                <label>Enter Plan Price</label>
                <input type="text" name="PlanPrice" id="PlanPrice" value="" class="form-control" required>
                <label>Enter Plan Duration</label>
                <input type="text" name="PlanDuration" id="PlanDuration" value="" class="form-control" required>
               
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="EditPlanButton" value="Edit Plan">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal -->






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
    

    $(document).on("click", ".open-EditPlanModel", function () {
        var PlanId = $(this).data('id');
        var PlanName = $(this).data('name');
        var PlanDuration = $(this).data('duration');
        var PlanPrice = $(this).data('price');
 
        $(".modal-body #PlanId").val(PlanId);
        $(".modal-body #PlanName").val(PlanName);
        $(".modal-body #PlanDuration").val(PlanDuration);
        $(".modal-body #PlanPrice").val(PlanPrice);
 
        

    });



</script>