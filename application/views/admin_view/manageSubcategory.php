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
                                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('admin/manageSubcategory');?>" >Manage Subcategory</a></li>
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
                            <h5 class="card-header">Subcategory Table 
                            <button class="offset-8 col-2 btn btn-purple"  data-toggle="modal" data-target="#AddSubcategoryModal">Add Subcategory</button></h5>
                            <div class="card-header">
                                <label class="offset-0 col-3">Select Subcategory</label>
                                <select name="CategoryDropDown" id="CategoryDropDown" class="offset-0 col-6 form-control selectpicker"> 
                                    <?php 
                                    $allCategory = $this->MCategory->getAllCategory();
                                    foreach($allCategory as $ac){ ?>

                                        <option value="<?=$ac['CategoryId']?>"><?=$ac['CategoryName']?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Subcategory Name</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody id="SubcategoryTable">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Image</th>
                                                <th>Subcategory Name</th>
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
    
    <div class="modal fade" id="AddSubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="AddSubcategoryModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AddSubcategoryModalTitle">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/addSubcategory');?>" method="post">
            <div class="modal-body">
                
                <label>Select Category Name</label>
                <select name="CategoryId" id="CategoryId" class="form-control">
                    <?php 
                    $allCategory = $this->MCategory->getAllCategory();
                    foreach($allCategory as $ac){ ?>
                        <option value="<?=$ac['CategoryId']?>"><?=$ac['CategoryName']?></option>
                    <?php } ?>
                </select>

                <label>Enter Subcategory Name</label>
                <input type="text" name="SubcategoryName" id="SubcategoryName" class="form-control" required>
                <label>Select Subcategory Image</label>
                <input type="file" name="SubcategoryImage" id="SubcategoryImage" class="form-control" multiple required>
                
            
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="AddSubcategoryButton" value="Add Subcategory">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <!-- Modal  -->
    
    <div class="modal fade" id="editSubcategoryModel" tabindex="-1" role="dialog" aria-labelledby="editSubcategoryModelTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editSubcategoryModelTitle">Edit Subcategory</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/editSubcategory');?>" method="post">
            <div class="modal-body">
                <label>Subcategory Id</label>
                <input type="text" name="CategoryId" id="CategoryId" value="" readonly class="form-control">
                <label>Enter Subcategory Name</label>
                <input type="text" name="CategoryName" id="CategoryName" value="" class="form-control" required>
                <label>Select New Image For Subcategory</label>
                <input type="file" name="CategoryImage" id="CategoryImage" class="form-control" multiple required>
            
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="AddSubcategoryButton" value="Edit Subcategory">
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
    $('#CategoryDropDown').click(function(){
        cid = $('#CategoryDropDown').val();
        $.ajax({
            url:'<?=base_url('admin/getSubcategoryTable/')?>'+cid,
            success:function(result){
                $('#SubcategoryTable').html(result);
            }
        });
    });



     $(document).on("click", ".open-EditCategoryModel", function () {
        var CategoryId = $(this).data('id');
        var CategoryName = $(this).data('name');

        $(".modal-body #CategoryId").val(CategoryId);
        $(".modal-body #CategoryName").val(CategoryName);
        

    });


</script>