
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>offersnearme</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- <meta name="author" content="Free-Template.co" /> -->




















<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_admin/');?>vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?=base_url('assets/assets_admin/');?>vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/assets_admin/');?>libs/css/style.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_admin/');?>vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_admin/');?>vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_admin/');?>vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_admin/');?>vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_admin/');?>vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_admin/');?>vendor/fonts/flag-icon-css/flag-icon.min.css">






    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/assets_admin/');?>vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/assets_admin/');?>vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/assets_admin/');?>vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/assets_admin/');?>vendor/datatables/css/fixedHeader.bootstrap4.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/assets_design_extra/');?>style.css">


    


     <link rel="stylesheet" href="<?=base_url('assets/assets_admin/');?>vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?=base_url('assets/assets_admin/');?>vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/assets_admin/');?>libs/css/style.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_admin/');?>vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_admin/');?>vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
 








   <style>
    
    .btn-purple{
        background: #6610f2;
        color:#fff;
        transition: 0.5s;
    }

    .btn-purple:hover{
        background: #343a40;
    }

    .badge-purple{
        background: #0E0C28;
        color:#fff;
        transition: 0.5s;
    }

    .badge-purple:hover{
        background: #343a40;
    }

   </style>
















    <?php require('user_csslinks.php');?>
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="noprint site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <span class="noprint"> 
      <?php require('user_header.php');?>
    </span>

    <div class="noprint site-blocks-cover inner-page-cover overlay" style="background-image: url(<?=base_url('assets/assets_logo/');?>hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1>Invoice</h1>
                
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  
    

    <div class="site-section bg-light">
      <div class="container">




                      <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header p-4">
                                     <a class="pt-2 d-inline-block" href="<?=base_url()?>">Offersnearme</a>
                                   
                                    <div class="float-right"> <h3 class="mb-0">Invoice </h3>
                                    Date: <?=$successData['addedon']?></div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">                                          
                                            <h3 class="text-dark mb-1"><?=$userdetails[0]['UserName']?></h3>
                                            <div>Email: <?=$userdetails[0]['UserEmail']?></div>
                                            <div>Phone: <?=$userdetails[0]['UserPhone']?></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h3 class="text-dark mb-1"><?=$businessdetails[0]['CompanyName']?></h3>
                                            <div>Email: <?=$businessdetails[0]['BusinessEmail']?></div>
                                            <div>Phone: <?=$businessdetails[0]['BusinessPhone']?></div>
                                        </div>
                                        <div class="col-12">
                                          <div><b>Transaction Id: <?=$orderDetails[0]['TransectionId']?></b></div>
                                          <div><b>Redeem Code: <?=$orderDetails[0]['OfferRedeemCode']?></b></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="center">#</th>
                                                    <th>Item</th>
                                                    <th>Description</th>
                                                    <th class="right">Unit Cost</th>
                                                    <th class="center">Qty</th>
                                                    <th class="right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="center">1</td>
                                                    <td class="left strong"><?=$offerdetails[0]['OfferName']?></td>
                                                    <td class="left"><?=$offerdetails[0]['OfferDescription']?></td>
                                                    <td class="right"><?=$offerdetails[0]['OfferPrice']?></td>
                                                    <td class="center">1</td>
                                                    <td class="right"><?=$offerdetails[0]['OfferPrice']?></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5">
                                        </div>
                                        <div class="col-lg-4 col-sm-5 ml-auto">
                                            <table class="table table-clear">
                                                <tbody>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Subtotal</strong>
                                                        </td>
                                                        <td class="right"><?=$offerdetails[0]['OfferPrice']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Discount (<?=$offerdetails[0]['OfferPr']?>%)</strong>
                                                        </td>
                                                        <td class="right"><?php echo $offerdetails[0]['OfferPrice'] - $offerdetails[0]['OfferPayablePrice']; ?> </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Total</strong>
                                                        </td>
                                                        <td class="right">
                                                            <strong class="text-dark"><?=$offerdetails[0]['OfferPayablePrice']?></strong>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="left">
                                                          <?php if($orderDetails[0]['OfferOrderPayment'] == 'Payed'){ ?>
                                                            <strong class="text-success"><?=$orderDetails[0]['OfferOrderPayment']?></strong>
                                                          <?php } else { ?>
                                                            <strong class="text-danger"><?=$orderDetails[0]['OfferOrderPayment']?></strong>
                                                          <?php } ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="noprint card-footer bg-white">
                                   <button onclick="PrintInvoice()" class="btn btn-pink">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





    
      </div>
    </div>

    

    
  
    <span class="noprint">
      
    <?php require('user_footer.php');?>
    </span>
  </div>

  <span class="noprint"> 
    
  <?php require('user_jslinks.php');?>
  </span>
  
  </body>
</html>



<style type="text/css">
  
  @media print{
    .noprint{
      display: none;
    }
  }
</style>




<script type="text/javascript">
  function PrintInvoice(){
    window.print();
  }
</script>







<!--===============================================================================================-->  
  <script src="<?=base_url('assets/assets_admin/login/');?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url('assets/assets_admin/login/');?>vendor/bootstrap/js/popper.js"></script>
  <script src="<?=base_url('assets/assets_admin/login/');?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url('assets/assets_admin/login/');?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url('assets/assets_admin/login/');?>vendor/tilt/tilt.jquery.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url('assets/assets_admin/login/');?>js/main.js"></script>














<!-- 
<script type="text/javascript">
  $('.btn-heart-icon').click(function(){
    OfferId = $(this).attr('data-OfferId');
    UserId = $(this).attr('data-UserId');
    Stars = $(this).attr('data-stars'); 
    // alert(Stars);
    
    $.ajax({
      url:'<?=base_url('user/checkStars/')?>'+OfferId+'/'+UserId+'/'+Stars,
      success:function(result){
        
        if(result==0){
          $('#'+OfferId).addClass('icon-click');
          $('#star'+OfferId).addClass('icon-heart-click');
          $('#star'+OfferId).removeClass('icon-heart-noclick');
        }else{
          $('#'+OfferId).removeClass('icon-click');
          $('#star'+OfferId).removeClass('icon-heart-click');
          $('#star'+OfferId).addClass('icon-heart-noclick');
        }
      }
    });

  });
</script>



<style> 
  .icon-click{
    background: #F38181 !important;
  }

  .icon-click:hover{
    background: rgba(243,129,129, 0.5) !important;
  }

  .btn-heart-icon:hover{
    background: #F38181 !important;
    cursor: pointer;
  }

  .btn-heart-icon2:hover{
    background: #F38181 !important;
    cursor: pointer;
  }

  .icon-heart-click{
    color: #fff !important;
  }


  .icon-heart-noclick{
    color: #f38181;
  }

  .review-default{
    border: 1px solid #F38181; 
    border-radius: 40px;  
    padding-left: 0px;  
    width: 40px;
    transition: 0.5s;
  }


  .review-default-input{
    border: none;
    width: 0px; 
    transition: 0.4s;
    border-radius: 10px;
  
  }

  .review-default-button{
    border: none; 
    border-radius: 40px;
    transition: 0.3s;
  
  }

</style>

<script type="text/javascript">
  $('.review-default').mouseenter(function(){
    
    OfferId = $(this).attr('id');

    $(this).css({
      "width":"60%",
    });
    $('.review-default #rw-input-'+OfferId).css({
      "width":"80%",
      "visibility":"visible",
      "margin-top":"3px",
      "margin-left":"5px",
      "outline":"none",
    });
  });

  $('.review-default').mouseleave(function(){
    $(this).css({
      "width":"10%",
    });   
    $('.review-default #rw-input-'+OfferId).css({
      "width":"0px",
      "visibility":"hidden",   
      "margin-top":"0px",
      "margin-left":"0px",
    });
  });
</script> -->