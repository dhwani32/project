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
                                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('admin/packagesPage');?>" >Add Package</a></li>
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
                            <h5 class="card-header">Packages Table 
                            <button class="offset-8 col-2 btn btn-purple"  data-toggle="modal" data-target="#AddPackageModal">Add Package</button></h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Duration</th>
                                                <th>Description</th>
                                                <th>Total Offers</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                            $allPackages = $this->MPackages->getAllPackages();
                                            foreach($allPackages as $ac){ ?>

                                            <tr>
                                                <td><?php echo $ac['PackageName'];?></td>
                                                <td><?php echo $ac['PackagePrice'];?></td>
                                                <td><?php echo $ac['PackageDuration'];?></td>
                                                <td><?php echo $ac['PackageDescription'];?></td>
                                                <td><?php echo $ac['TotalOffers'];?></td>

                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#editPackageModel" 
                                                    data-name="<?=$ac['PackageName']?>" 
                                                    data-id="<?=$ac['PackageId']?>"
                                                    data-duration="<?=$ac['PackageDuration']?>"
                                                    data-description="<?=$ac['PackageDescription']?>"
                                                    data-price="<?=$ac['PackagePrice']?>"
                                                    data-totaloffers="<?=$ac['TotalOffers']?>"
                                                    class="open-EditCategoryModel fa fa-edit btn btn-success"></a>
                                                </td> 
                                                <td>
                                                    <a href="<?=base_url('admin/deletePackage/');?><?=$ac['PackageId'];?>" class="fa fa-trash btn btn-danger"></a>
                                                </td>
                                            </tr>
                                            
                                            <?php } ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Duration</th>
                                                <th>Description</th>
                                                <th>Total Offers</th>
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
    
    <div class="modal fade" id="AddPackageModal" tabindex="-1" role="dialog" aria-labelledby="AddPackageModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AddPackageModalTitle">Add Packages</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/addPackage');?>" method="post">
            <div class="modal-body">
            
                <label>Enter Package Name</label>
                <input type="text" name="PackageName" id="PackageName" class="form-control" required>
                <label>Enter Package Price</label>
                <input type="text" name="PackagePrice" id="PackagePrice" class="form-control"  required>
                <label>Enter Package Duration</label>
                <input type="text" name="PackageDuration" id="PackageDuration" class="form-control"  required>
                <label>Enter Package Description</label>
                <input type="text" name="PackageDescription" id="PackageDescription" class="form-control"  required>
                <label>Enter Total Offers</label>
                <input type="text" name="TotalOffers" id="TotalOffers" class="form-control"  required>
                
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="AddPackageButton" value="Add Package">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal -->





    <!-- Modal  -->
    
    <div class="modal fade" id="editPackageModel" tabindex="-1" role="dialog" aria-labelledby="editPackageModelTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editPackageModelTitle">Edit Packages</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/editPackage');?>" method="post">
            <div class="modal-body">
                <label>Package Id</label>
                <input type="text" name="PackageId" id="PackageId" value="" readonly class="form-control">
                <label>Enter Package Name</label>
                <input type="text" name="PackageName" id="PackageName" value="" class="form-control" required>
                <label>Enter Package Price</label>
                <input type="text" name="PackagePrice" id="PackagePrice" value="" class="form-control" required>
                <label>Enter Package Duration</label>
                <input type="text" name="PackageDuration" id="PackageDuration" value="" class="form-control" required>
                <label>Enter Package Description</label>
                <input type="text" name="PackageDescription" id="PackageDescription" value="" class="form-control" required>
                <label>Enter Total Offers</label>
                <input type="text" name="TotalOffers" id="TotalOffers" class="form-control"  required>
                
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="AddCategoryButton" value="Edit Package">
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
    

    $(document).on("click", ".open-EditCategoryModel", function () {
        var PackageId = $(this).data('id');
        var PackageName = $(this).data('name');
        var PackageDuration = $(this).data('duration');
        var PackageDescription = $(this).data('description');
        var PackagePrice = $(this).data('price');
        var TotalOffers = $(this).data('totaloffers');

        $(".modal-body #PackageId").val(PackageId);
        $(".modal-body #PackageName").val(PackageName);
        $(".modal-body #PackagePrice").val(PackagePrice);
        $(".modal-body #PackageDuration").val(PackageDuration);
        $(".modal-body #PackageDescription").val(PackageDescription);
        $(".modal-body #TotalOffers").val(TotalOffers);

        

    });



</script>