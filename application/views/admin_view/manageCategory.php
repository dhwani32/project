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
                                            <li class="breadcrumb-item" aria-current="page">Category</li>
                                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('admin/manageCategory');?>" >Manage Category</a></li>
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
                            <h5 class="card-header">Category Table 

                                <button class="offset-8 col-2 btn btn-purple"  data-toggle="modal" data-target="#AddCategoryModal">Add Category</button>
                                <span class="text text-danger"><?php if(isset($error))echo $error."Only \"jpg\" and \"png\" allowed.";?> </span>
                            </h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                            $allCategory = $this->MCategory->getAllCategory();
                                            foreach($allCategory as $ac){ ?>

                                            <tr>
                                                <td><img width="70" height="70" src="<?=base_url('assets/assets_category_images/');?><?php echo $ac['CategoryImage'];?>">
                                                </td>
                                                <td><?php echo $ac['CategoryName'];?></td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#editCategoryModel" data-name="<?=$ac['CategoryName']?>" data-id="<?=$ac['CategoryId']?>" class="open-EditCategoryModel fa fa-edit btn btn-success"></a>
                                                </td> 
                                                <td>
                                                    <a href="<?=base_url('admin/deleteCategory/');?><?=$ac['CategoryId'];?>/<?=$ac['CategoryImage'];?>" class="fa fa-trash btn btn-danger"></a>
                                                </td>
                                            </tr>
                                            
                                            <?php } ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Image</th>
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
    
    <div class="modal fade" id="AddCategoryModal" tabindex="-1" role="dialog" aria-labelledby="AddCategoryModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AddCategoryModalTitle">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/addCategory');?>" method="post">
            <div class="modal-body">
            
                <label>Enter Category Name</label>
                <input type="text" name="CategoryName" id="CategoryName" class="form-control" required>
                <label>Select Category Image</label>
                <input type="file" name="CategoryImage" id="CategoryImage" class="form-control" multiple required>
                
            
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="AddCategoryButton" value="Add Category">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal -->





    <!-- Modal  -->
    
    <div class="modal fade" id="editCategoryModel" tabindex="-1" role="dialog" aria-labelledby="editCategoryModelTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editCategoryModelTitle">Edit Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/editCategory');?>" method="post">
            <div class="modal-body">
                <label>Category Id</label>
                <input type="text" name="CategoryId" id="CategoryId" value="" readonly class="form-control">
                <label>Enter Category Name</label>
                <input type="text" name="CategoryName" id="CategoryName" value="" class="form-control" required>
                <label>Select New Image For Category</label>
                <input type="file" name="CategoryImage" id="CategoryImage" class="form-control" multiple required>
            
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
        var CategoryId = $(this).data('id');
        var CategoryName = $(this).data('name');

        $(".modal-body #CategoryId").val(CategoryId);
        $(".modal-body #CategoryName").val(CategoryName);
        

    });



</script>