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
                                            <li class="breadcrumb-item" aria-current="page">Location</li>
                                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('admin/manageCountry');?>" >Manage Country</a></li>
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
                            <h5 class="card-header">Country Table 
                            <button class="offset-8 col-2 btn btn-purple"  data-toggle="modal" data-target="#AddCountryModal">Add Country</button></h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                            $country = $this->MLocation->getCountry();
                                            foreach($country as $c){ ?>

                                            <tr>
                                                
                                                <td><?php echo $c['CountryName'];?></td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#EditCountryModel" data-name="<?=$c['CountryName']?>" data-id="<?=$c['CountryId']?>" class="open-EditCategoryModel fa fa-edit btn btn-success"></a>
                                                </td> 
                                                <td>
                                                    <a href="<?=base_url('admin/deleteCountry/');?><?=$c['CountryId'];?>" class="fa fa-trash btn btn-danger"></a>
                                                </td>
                                            </tr>
                                            
                                            <?php } ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                
                                                <th>Name</th>
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
    
    <div class="modal fade" id="AddCountryModal" tabindex="-1" role="dialog" aria-labelledby="AddCountryModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AddCountryModalTitle">Add Country</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/addCountry');?>" method="post">
            <div class="modal-body">
            
                <label>Enter Country Name</label>
                <input type="text" name="CountryName" id="CountryName" class="form-control" required>
                
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="AddCountryButton" value="Add Country">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal -->





    <!-- Modal  -->
    
    <div class="modal fade" id="EditCountryModel" tabindex="-1" role="dialog" aria-labelledby="EditCountryModelTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="EditCountryModelTitle">Edit Country</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/editCountry');?>" method="post">
            <div class="modal-body">
                <label>Country Id</label>
                <input type="text" name="CountryId" id="CountryId" value="" readonly class="form-control">
                <label>Enter Country Name</label>
                <input type="text" name="CountryName" id="CountryName" value="" class="form-control" required>
            
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="AddCategoryButton" value="Edit Category">
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
        var CountryId = $(this).data('id');
        var CountryName = $(this).data('name');

        $(".modal-body #CountryId").val(CountryId);
        $(".modal-body #CountryName").val(CountryName);
        

    });

</script>