<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require('mainCssLinks.php'); ?>
    <title>Offersnearme</title>







 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    

 <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Months');
        data.addColumn('number', 'Orders');
        data.addRows([
          <?php

          $Orders = $this->db->query('SELECT count(OrderId) as TotalOrder, OrderDate FROM `Orders` WHERE substr(OrderDate, 1, 7) = "'.date('Y-m').'" group by OrderDate')->result_array();

          foreach ($Orders as $o) {
            echo "['".$o['OrderDate']."', ".$o['TotalOrder']."],";  
          }

           ?>


          // ['sdf',4],
          // ['sdf',3],
          // ['sdf',2],
          // ['sdf',5],
          // ['sdf',8],
          // ['sdf',3],
         
        ]);

        // Set chart options
        var options = {'title':'Total Orders Of Month',
                       'height':135};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>












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
                                
                                <p class="text text-danger"> <?=$this->session->flashdata('changePasswordMsg');?>  </p>
                                <p class="text text-success"> <?=$this->session->flashdata('changePasswordSuccessMsg');?>  </p>
                                <p class="text text-success"> <?=$this->session->flashdata('SQMsgSusscess');?>  </p>
                                <p class="text text-danger"> <?=$this->session->flashdata('SQMsg');?>  </p>

                                <h2 class="pageheader-title">Offersnearme</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">
                            <!-- new customer  -->
                            <!-- ============================================================== -->

                            <?php 
                                $newUsers = $this->MAUser->getNewUsers();
                                $allUsers = count($this->MAUser->getAllUsers());
                                if($allUsers == 0){
                                    $allUsers = 1;
                                }
                                $NewUserPr = $newUsers * 100 / $allUsers;
                                // print_r($newUsers);

                            ?>

                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div id="chart_div"></div>
                            </div>


                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">New Customer</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?=$newUsers?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1"><?=$NewUserPr?>%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                          
                        </div>

                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Some Recent Orders</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Image</th>
                                                        <th class="border-0">Product Name</th>
                                                        <th class="border-0">Price</th>
                                                        <th class="border-0">Order Date</th>
                                                        <th class="border-0">Customer</th>
                                                        <th class="border-0">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <?php 

                                                    $ordersDetails = $this->MOrders->getRecentOrders();
                                                    $counter = 0;
                                                    // print_r($ordersDetails);
                                                    
                                                    foreach ($ordersDetails as $od) {
                                                        $counter++;
                                                        $offerDetails = $this->MOffers->getOffersForRecentOrders($od['OfferId']);
                                                        // echo "<pre>";
                                                        // print_r($od);
                                                        // echo "</pre>";

                                                        // print_r($offerDetails);
                                                        $images = $this->MOffers->getOfferImageForFavorite($od['OfferId']);
                                                        // print_r($images);
                                                        $user = $this->MOrders->getUserName($od['UserId']);
                                                        // print_r($user);
                                                        if(!empty($images) && !empty($user) && !empty($offerDetails)){

                                                    ?>

                                                    <tr>
                                                        <td><?=$counter?></td>
                                                        <td>
                                                            <div class="m-r-10"><img src="<?=base_url('assets/assets_offers_images/').$images[0]['Image']?>" alt="Image" class="rounded" width="45"></div>
                                                        </td>
                                                        <td><?=$offerDetails[0]['OfferName']?></td>
                                                        <td><?=$od['OrderAmount']?> ₹</td>
                                                        <td><?=$od['OrderDate']?></td>
                                                        <td><?php echo $user[0]['UserEmail'];  
                                                         ?></td>
                                                        <td>
                                                            <?php 
                                                            if($od['OfferDistributeState'] == 1){ ?>
                                                                <span class="badge-dot badge-success mr-1"></span>Already Distributed 
                                                            <?php }else{ ?>
                                                                <span class="badge-dot badge-brand mr-1"></span>Not Distributed 
                                                            <?php } ?>

                                                        </td>
                                                    </tr>
                                                    
                                                    <?php } } ?>
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->
                        </div>
                        
                        
                        
                        <div class="row">                        
                            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Sales By Country Traffic Source</h5>
                                    <div class="card-body p-0">
                                        <ul class="country-sales list-group list-group-flush">
                                            <li class="specialClass country-sales-content list-group-item">
                                                <span class="">Country Name</span>
                                                <span class="float-right text-dark"> Percentage</span>
                                            </li>
                                            <?php 

                                            $data = $this->MLocation->selectAllCountry();

                                            $CountryCounter = 0;
                                            foreach ($data as $d) {
                                                
                                                $CountryCounter++;

                                                $businessDetails = $this->MABusiness->getBusiness();
                                                $countryBusiness = 0;

                                                foreach ($businessDetails as $b) {
                                                    $Country = $this->MLocation->getLocationCountry($b['AreaId']);
                                                    // print_r($Country);
                                                    if($Country == $d['CountryName']){
                                                        $countryBusiness++;
                                                    }
                                                }

                                                $totalBusiness = count($businessDetails);
                                                if($totalBusiness == 0){
                                                    $totalBusiness = 1;
                                                }
                                                $businessPer = $countryBusiness * 100 / $totalBusiness;

                                            ?>

                                            <li id="<?=$CountryCounter?>" wid="<?=$businessPer?>" class="specialClass country-sales-content list-group-item">
                                                <span id="CountryNm<?=$CountryCounter?>"><?=$d['CountryName']?></span>
                                                <span style="visibility: hidden;" id="CountryBar<?=$CountryCounter?>">
                                                    <div id="Bar<?=$CountryCounter?>"></div>
                                                </span>



                                                <span class="float-right text-dark" id="CountryPr<?=$CountryCounter?>"><?=$businessPer?>%</span>
                                                <span style="display: none;" class="float-right text-primary" id="CountryCn<?=$CountryCounter?>"><?=$countryBusiness?> Businesses</span>
                                            </li>



                                            <!-- 
                                            <li class="list-group-item country-sales-content"><span class="mr-2"><i class="flag-icon flag-icon-ca" title="ca" id="ca"></i></span><span class="">Canada</span><span class="float-right text-dark">7%</span>
                                            </li>
                                            <li class="list-group-item country-sales-content"><span class="mr-2"><i class="flag-icon flag-icon-ru" title="ru" id="ru"></i></span><span class="">Russia</span><span class="float-right text-dark">4%</span>
                                            </li>
                                            <li class="list-group-item country-sales-content"><span class=" mr-2"><i class="flag-icon flag-icon-in" title="in" id="in"></i></span><span class="">India</span><span class="float-right text-dark">12%</span>
                                            </li>
                                            <li class="list-group-item country-sales-content"><span class=" mr-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i></span><span class="">France</span><span class="float-right text-dark">16%</span>
                                            </li>
 -->

                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
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
    

$('.specialClass').mouseenter(function(){

    var id = $(this).attr('id');
    var progress = $(this).attr('wid');


    $('#Bar'+id).css({
        "background":"linear-gradient(90deg, #300c63,  #7a31e0 , #fff,  #fff)",
        "width":progress+"%",
        "height":"18px",
    });


    // alert(id);
    $('#CountryPr'+id).css({
        "display":"none",
    });

    $('#CountryCn'+id).css({
        "display":"block",
    });

    $('#CountryNm'+id).css({
        "display":"none",
    });

    $('#CountryBar'+id).css({
        "visibility":"visible",
    });


});

$('.specialClass').mouseleave(function(){
    var id = $(this).attr('id');

    // alert(id);
    $('#CountryPr'+id).css({
        "display":"block",
    });

    $('#CountryCn'+id).css({
        "display":"none",
    });

    $('#CountryNm'+id).css({
        "display":"block",
    });

    $('#CountryBar'+id).css({
        "visibility":"hidden",
    });
});
</script>


