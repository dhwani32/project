<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>offersnearme</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <?php require('business_css_links.php'); ?>

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <?php require('business_sidebar.php'); ?>

        
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">

        <?php require('business_header.php'); ?>
        

        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- <div class="product-sales-chart">
                            <button class="float-right btn btn-pink  mb-5 pb-5 " data-toggle="modal" data-target="#addOffersModel">Add Offers</button>  
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

















 <div class="traffic-analysis-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="white-box tranffic-als-inner">
                            <h3 class="box-title"> User Messages </h3>
                           



                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                        
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                               
                                                <div class="col-md-12">
                                                    <?php 
                                                        if(isset($msgFromUser)){
                                                            foreach ($msgFromUser as $msg) {
                                                                ?>

                                                                <div style="border-bottom: 1px solid #ddd; padding-bottom: 5px; padding-top: 5px;" class="col-lg-12">
                                                                    <div class="col-lg-2 ">
                                                                        <?php print_r($msg['ChatDate']); ?>
                                                                    </div>
                                                                    <div class="col-lg-2 ">
                                                                        <?php print_r($msg['ChatTime']); ?>
                                                                    </div>
                                                                    <div class="col-lg-6 ">
                                                                        <?php print_r($msg['Message']); ?>
                                                                    </div>

                                                                    <!-- <?php print_r($msg);?>  -->

                                                                    <div class="col-lg-2">
                                                                        <button data-toggle="modal" data-target="#ReplyMsgToUser" id="<?=$msg['ReceiverBusinessId']?>" ReceiverId="<?=$msg['SenderId']?>" class="ReplyMsgToUser col-lg-12 btn btn-primary"> Reply </button>
                                                                    </div>
                                                                </div>
                                                                


                                                                <?php 
                                                            }
                                                        }
                                                    ?>
                                                
                                                                

                                                </div>



    <div class="modal fade" id="ReplyMsgToUser" tabindex="-1" role="dialog" aria-labelledby="ReplyMsgToUserTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ReplyMsgToUserTitle">Send Message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('business/replyMsgToUser');?>" method="post">
            <div class="modal-body">
                

                <input type="hidden" name="SenderBusinessId" id="SenderBusinessId"> 
                <input type="hidden" name="ReceiverId" id="ReceiverId">


                <label>Enter Message</label>
                <input type="text" name="Message" id="Message" class="form-control" required>
                
            
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="ReplyMsgToUserBtn" value="Send Message">
            </div>
          </form>
        </div>
      </div>
    </div>





                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



          




                            
                            <div id="sparkline8"></div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>















<!-- 

        <div class="traffic-analysis-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="white-box tranffic-als-inner">
                            <h3 class="box-title"> Redeem Form </h3>
                            <div class="stats-row">
                                

                                <form>
                                    
                                    <div class=""> 
                                        <input type="text" name="">
                                    </div>    

                                </form>


                            </div>
                            <div id="sparkline8"></div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
         -->
        
        
    </div>


    <?php require('business_js_links.php'); ?>

</body>

</html>




<style> 

    /*.side-menu-custom{
        background: linear-gradient(100deg, rgb(200, 100, 100), rgb(250, 200, 200)) !important;
    }*/

    .side-menu-custom a:hover{
        background: linear-gradient(100deg, rgb(200, 100, 100), rgb(250, 200, 200)) !important;
    }

    .side-menu-custom a:focus{
        background: linear-gradient(100deg, rgb(200, 100, 100), rgb(250, 200, 200)) !important;
    }

    .form-control:focus{
        border-color: #EA9696 !important;

    }

    .btn-primary{
        background: linear-gradient(100deg, rgb(200, 100, 100), rgb(250, 200, 200)) !important;
        border:none;
    }


</style>





<script type="text/javascript">
    

    $('.ReplyMsgToUser').click(function(){
        SenderBusinessId = $(this).attr('id');
        ReceiverId = $(this).attr('ReceiverId');
        $('.modal .modal-body #SenderBusinessId').val(SenderBusinessId);
        $('.modal .modal-body #ReceiverId').val(ReceiverId);
    });

</script>