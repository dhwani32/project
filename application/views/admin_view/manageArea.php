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
                                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('admin/manageArea');?>" >Manage Area</a></li>
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
                            <h5 class="card-header">Area Table 
                            <button class="offset-8 col-2 btn btn-purple"  data-toggle="modal" data-target="#AddAreaModal">Add Area</button></h5>
                            <div class="card-header">
                                <label class="offset-0 col-3">Select Country</label>
                                <select name="CountryDropDown" id="CountryDropDown" class="offset-0 col-6 form-control selectpicker"> 
                                    <?php 
                                    $country = $this->MLocation->getCountry();
                                    foreach($country as $ac){ ?>

                                        <option value="<?=$ac['CountryId']?>"><?=$ac['CountryName']?></option>
                                    <?php } ?>

                                </select>

                                <label class="offset-0 col-3">Select State</label>
                                <select name="StateDropDown" id="StateDropDown" class="offset-0 col-6 form-control selectpicker"> 
                                   
                                </select>

                                <label class="offset-0 col-3">Select City</label>
                                <select name="CityDropDown" id="CityDropDown" class="offset-0 col-6 form-control selectpicker"> 
                                   
                                </select>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>State Name</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody id="AreaTable">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>State Name</th>
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
    
    <div class="modal fade" id="AddAreaModal" tabindex="-1" role="dialog" aria-labelledby="AddAreaModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AddAreaModalTitle">Add Area</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/addArea');?>" method="post">
            <div class="modal-body">
                
                <label>Select Country Name</label>
                <select name="CountryId" id="CountryId" class="form-control">
                    <?php 
                    $country = $this->MLocation->getCountry();
                    foreach($country as $ac){ ?>
                        <option value="<?=$ac['CountryId']?>"><?=$ac['CountryName']?></option>
                    <?php } ?>
                </select>

                <label>Select State Name</label>
                <select name="StateId" id="StateId" class="form-control">
                </select>

                <label>Select City Name</label>
                <select name="CityId" id="CityId" class="form-control">
                </select>

                <label>Enter Area Name</label>
                <input type="text" name="AreaName" id="AreaName" class="form-control" required>
            
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="AddAreaButton" value="Add Area">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <!-- Modal  -->
    
    <div class="modal fade" id="editAreaModel" tabindex="-1" role="dialog" aria-labelledby="editAreaModelTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editAreaModelTitle">Edit Area</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/editArea');?>" method="post">
            <div class="modal-body">
                <label>Area Id</label>
                <input type="text" name="AreaId1" id="AreaId1" value="" readonly class="form-control">
                <label>Enter Area Name</label>
                <input type="text" name="AreaName1" id="AreaName1" value="" class="form-control" required>
               
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="AddAreaButton" value="Edit Area">
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
    $('#CountryDropDown').click(function(){
        cid = $('#CountryDropDown').val();
        $.ajax({
            url:'<?=base_url('admin/getState/')?>'+cid,
            success:function(result){
                $('#StateDropDown').html(result);
            }
        });
    });


    $('#CountryId').click(function(){
        cid = $('#CountryId').val();
        // alert(cid);
        $.ajax({
            url:'<?=base_url('admin/getState/')?>'+cid,
            success:function(result){
                // alert(result);
                $('#StateId').html(result);
            }
        });
    });

    $('#StateId').click(function(){
        cid = $('#StateId').val();
        // alert(cid);
        $.ajax({
            url:'<?=base_url('admin/getCity/')?>'+cid,
            success:function(result){
                // alert(result);
                $('#CityId').html(result);
            }
        });
    });

    $('#StateDropDown').click(function(){
        cid = $('#StateDropDown').val();
        $.ajax({
            url:'<?=base_url('admin/getCity/')?>'+cid,
            success:function(result){
                $('#CityDropDown').html(result);
            }
        });
    });


    $('#CityDropDown').click(function(){
        cid = $('#CityDropDown').val();
        $.ajax({
            url:'<?=base_url('admin/getAreaTable/')?>'+cid,
            success:function(result){
                $('#AreaTable').html(result);
            }
        });
    });


     $(document).on("click", ".open-EditCategoryModel", function () {
        var AreaId1 = $(this).data('id');
        var AreaName1 = $(this).data('name');

        $(".modal-body #AreaId1").val(AreaId1);
        $(".modal-body #AreaName1").val(AreaName1);
        

    });


</script>