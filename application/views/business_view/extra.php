<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>offersnearme</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require('business_css_links.php');?>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    <form action="<?=base_url('business/businessRegister');?>" method="post">
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

                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                        </div>
                        <input type="submit" name="btnBusinessRegister" class="btn btn-primary btn-flat m-b-30 m-t-30" value="Register Business">
                        
                        
                    </form>
                </div>
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