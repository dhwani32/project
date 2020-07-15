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
                                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('admin/manageState');?>" >Manage State</a></li>
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
                            <h5 class="card-header">State Table 
                            <button class="offset-8 col-2 btn btn-purple"  data-toggle="modal" data-target="#AddStateModal">Add State</button></h5>
                            <div class="card-header">
                                <label class="offset-0 col-3">Select Country</label>
                                <select name="CountryDropDown" id="CountryDropDown" class="offset-0 col-6 form-control selectpicker"> 
                                    <?php 
                                    $country = $this->MLocation->getCountry();
                                    foreach($country as $ac){ ?>

                                        <option value="<?=$ac['CountryId']?>"><?=$ac['CountryName']?></option>
                                    <?php } ?>

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
                                        <tbody id="StateTable">
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
    
    <div class="modal fade" id="AddStateModal" tabindex="-1" role="dialog" aria-labelledby="AddStateModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AddStateModalTitle">Add State</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/addState');?>" method="post">
            <div class="modal-body">
                
                <label>Select Country Name</label>
                <select name="CountryId" id="CountryId" class="form-control">
                    <?php 
                    $country = $this->MLocation->getCountry();
                    foreach($country as $ac){ ?>
                        <option value="<?=$ac['CountryId']?>"><?=$ac['CountryName']?></option>
                    <?php } ?>
                </select>

                <label>Enter State Name</label>
                <input type="text" name="StateName" id="StateName" class="form-control" required>
            
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="AddStateButton" value="Add State">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <!-- Modal  -->
    
    <div class="modal fade" id="editStateModel" tabindex="-1" role="dialog" aria-labelledby="editStateModelTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editStateModelTitle">Edit State</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('admin/editState');?>" method="post">
            <div class="modal-body">
                <label>State Id</label>
                <input type="text" name="StateId1" id="StateId1" value="" readonly class="form-control">
                <label>Enter State Name</label>
                <input type="text" name="StateName1" id="StateName1" value="" class="form-control" required>
               
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="AddStateButton" value="Edit State">
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
            url:'<?=base_url('admin/getStateTable/')?>'+cid,
            success:function(result){
                $('#StateTable').html(result);
            }
        });
    });



     $(document).on("click", ".open-EditCategoryModel", function () {
        var StateId = $(this).data('id');
        var StateName = $(this).data('name');

        $(".modal-body #StateId1").val(StateId);
        $(".modal-body #StateName1").val(StateName);
        

    });


</script>