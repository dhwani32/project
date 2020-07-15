<?php 
    if(!isset($_SESSION['userDetails'])){
        redirect(base_url());
    }
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>offersnearme</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php require('business_css_links.php'); ?> 

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="<?=base_url();?>" class="btn btn-primary">Back to Userside</a>
                </div>
            </div>

            

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3>Registration</h3>
                    <p>Register your business and take it on the hights.</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <?php if(isset($error)){print_r($error);}?>
                        <form action="<?=base_url('business/businessRegister');?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="UserId" value="<?=$_SESSION['userDetails'][0]['UserId'];?>">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="CompanyName" id="CompanyName" class="form-control" placeholder="Comapny Name" required>
                        </div>
                        <div class="form-group">

                            <label>Select Country</label>
                                <select required name="CountryDropDown" id="CountryDropDown" class="offset-0 col-6 form-control selectpicker"> 
                                    <?php 
                                    $country = $this->MLocation->getCountry();
                                    foreach($country as $ac){ ?>

                                        <option value="<?=$ac['CountryId']?>"><?=$ac['CountryName']?></option>
                                    <?php } ?>

                                </select>

                                <label>Select State</label>
                                <select required name="StateDropDown" id="StateDropDown" class="offset-0 col-6 form-control selectpicker"> 
                                   
                                </select>

                                <label>Select City</label>
                                <select required name="CityDropDown" id="CityDropDown" class="offset-0 col-6 form-control selectpicker"> 
                                   
                                </select>

                                <label>Select Area</label>
                                <select required name="AreaDropDown" id="AreaDropDown" class="offset-0 col-6 form-control selectpicker"> 
                                   
                                </select>

                        </div>
                        <div class="form-group">
                            <label>Pincode </label>
                            <input type="text" required class="form-control" name="Pincode" id="Pincode" placeholder="Pincode">
                        </div>

                        <div class="form-group">
                            <label>Select Category</label>
                            <select required name="CategoryDropDown" id="CategoryDropDown" class="offset-0 col-6 form-control selectpicker"> 
                                <?php 
                                $allCategory = $this->MCategory->getAllCategory();
                                foreach($allCategory as $ac){ ?>

                                    <option value="<?=$ac['CategoryId']?>"><?=$ac['CategoryName']?></option>
                                <?php } ?>

                            </select>

                            <label>Select Subcategory</label>
                            <select required name="SubcategoryDropDown" id="SubcategoryDropDown" class="offset-0 col-6 form-control selectpicker"> 
                                
                            </select>
                        </div>


                        <div class="form-group">
                            <input type="file" name="BusinessImage" id="BusinessImage" required class="form-control">
                        </div>

                        <input type="submit" name="btnBusinessRegister" class="btn btn-primary btn-flat m-b-30 m-t-30" value="Register Business">
                        
                        
                    </form>














                        <!-- <form action="#" id="loginForm">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repeat Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                    <input class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repeat Email Address</label>
                                    <input class="form-control">
                                </div>
                                <div class="checkbox col-lg-12">
                                    <input type="checkbox" class="i-checks" checked> Sigh up for our newsletter
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success loginbtn">Register</button>
                                <button class="btn btn-default">Cancel</button>
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
              <p> Have a great customers. </p>
            </div>
        </div>
    </div>

    <?php require('business_js_links.php'); ?>

</body>

</html>





<script type="text/javascript">
    $('#CountryDropDown').click(function(){
        // alert('asd');
        cid = $('#CountryDropDown').val();
        $.ajax({
            url:'<?=base_url('admin/getState/')?>'+cid,
            success:function(result){
                $('#StateDropDown').html(result);
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
            url:'<?=base_url('admin/getArea/')?>'+cid,
            success:function(result){
                $('#AreaDropDown').html(result);
            }
        });
    });

    $('#CategoryDropDown').click(function(){
        cid = $('#CategoryDropDown').val();
        $.ajax({
            url:'<?=base_url('admin/getSubcategory/')?>'+cid,
            success:function(result){
                // alert(result);
                $('#SubcategoryDropDown').html(result);
            }
        });
    });

   

</script>