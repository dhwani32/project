<?php if(isset($_SESSION['userDetails'])){?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>offersnearme</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <!-- <meta name="author" content="Free-Template.co" /> -->

  <!-- require the php file for the css links  -->
  <?php require('user_csslinks.php'); ?>


</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <!-- require the header file for the header html code...  -->
    <?php require('user_header.php'); ?>


    <div class="site-blocks-cover overlay" style="background-image: url(<?= base_url('assets/assets_logo/') ?>hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">



          <div class="row align-items-center text-center justify-content-center ">
            <div class="col-md-8 text-white">
                <h1> User Profile </h1>
            </div>
          </div>

          

      </div>
    </div>




    <!-- category area to display some of the popular categories -->
    <div class="site-section">
      <div class="container ">
        



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card ">
              <div class="card-body">
                  <div class="row">
                        <div class="col-xl-2  mr-5 col-lg-4 col-md-4 col-sm-4 col-12">
                          <div class="text-center ">
                              <img width="200" height="200" src="<?=base_url('assets/assets_user_images/')?><?=$userDetails[0]['UserImage']?>" alt="User Avatar" class="rounded-circle user-avatar-xxl mb-2">
                              <a href="" data-img="<?=base_url('assets/assets_user_images/')?><?=$userDetails[0]['UserImage']?>" data-toggle="modal" data-target="#changeProfileImage" id="changeImageBtn" class="offset-2 col-12 btn btn-pink"> Change Image </a>
                          </div>
                        </div>



                        <!-- Modal For change Image -->



                        <!-- Button trigger modal -->
                          

                          <!-- Modal -->
                          <div class="modal fade" id="changeProfileImage" tabindex="-1" role="dialog" aria-labelledby="changeProfileImageLable" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="changeProfileImageLable">Change Profile Image</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="<?=base_url('user/changeUserProfileImage')?>" method="post" enctype="multipart/form-data">
                                    
                                    <input type="hidden" value="<?=$userDetails[0]['UserId']?>" name="UserId">
                                    <div class="col-12"> 
                                      <input type="file" class="form-control" name="UserProfileImage" id="UserProfileImage">
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                      <button type="submit" class="float-right btn btn-pink">Update Profile</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>



                        <!-- Change image modal ends -->






                          <div class="col-xl-9 col-lg-7 col-md-7 col-sm-7 col-12">
                              <div class="">
                                  <div class="m-b-20">
                                      <div class="user-avatar-name">
                                          <h5 class="mb-1">User Name : <?=$userDetails[0]['UserName']?>
                                            <a data-toggle="modal" data-target="#changeProfileData" class="btn float-right btn-pink text-white" href="">Edit Profile </a>

                                          </h5>

                                      </div>
                                      
                                  </div>
                                  <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
                                  <div class="">
                                      <p class="border-bottom pb-3">
                                          <div class="d-xl-block d-block mb-2"> Address : <?=$userDetails[0]['UserAddress']?></div>
                                          <div class="mb-2 ml-xl-4 d-xl-block d-block">Joined date : <?=$userDetails[0]['JoinDate']?>  </div>
                                          <div class=" mb-2 d-xl-block d-block ml-xl-4">Gender : <?=$userDetails[0]['UserGender']?>
                                                  </div>
                                          <div class=" mb-2 d-xl-block d-block ml-xl-4">Mobile  : <?=$userDetails[0]['UserPhone']?>
                                                  </div>

                                      </p>
                                      <div class="mt-3">
                                       
                                          <span class="h6">Referal Code : </span>
                                          <span class="badge badge-purple m-1 p-2"><?=$userDetails[0]['ReferalCode']?></span>
                                        
                                        <div class="float-right">
                                          <span class="h6">Referal Earning : </span>
                                          <span class="badge badge-purple m-1 p-2"> <?=$userDetails[0]['ReferalPoints']?> &#x20B9</span>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                          </div>



                          <!-- modal for user profile data -->



                          <div class="modal fade" id="changeProfileData" tabindex="-1" role="dialog" aria-labelledby="changeProfileDataLable" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="changeProfileDataLable">Change Profile Details</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="<?=base_url('user/changeUserProfileDetails')?>" method="post">
                                    
                                    <div class="col-12">
                                      <input type="hidden" value="<?=$userDetails[0]['UserId']?>" name="UserId">
                                    </div>
                                    <div class="col-12"> 
                                      <lable> User Name </lable>
                                      <input type="text" class="form-control" name="UserName" id="UserName" >  
                                    </div>

                                    <div class="col-12"> 
                                      <lable> User Address </lable>
                                      <input type="text" class="form-control" name="UserAddress" id="UserAddress" >  
                                    </div>

                                    <div class="col-12"> 
                                      <lable> User Phone </lable>
                                      <input type="text" class="form-control" name="UserPhone" id="UserPhone" >  
                                    </div>


                                    <hr>
                                    <div class="col-12">
                                      <button type="submit" class="float-right btn btn-pink">Update Details</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>




                          <!-- end modal for user profile data -->






                      </div>
                  </div>
                  <!-- <div class="border-top user-social-box">
                      <div class="user-social-media d-xl-inline-block"><span class="mr-2 twitter-color"> <i class="fab fa-twitter-square"></i></span><span>13,291</span></div>
                      <div class="user-social-media d-xl-inline-block"><span class="mr-2  pinterest-color"> <i class="fab fa-pinterest-square"></i></span><span>84,019</span></div>
                      <div class="user-social-media d-xl-inline-block"><span class="mr-2 instagram-color"> <i class="fab fa-instagram"></i></span><span>12,300</span></div>
                      <div class="user-social-media d-xl-inline-block"><span class="mr-2  facebook-color"> <i class="fab fa-facebook-square "></i></span><span>92,920</span></div>
                      <div class="user-social-media d-xl-inline-block "><span class="mr-2 medium-color"> <i class="fab fa-medium"></i></span><span>291</span></div>
                      <div class="user-social-media d-xl-inline-block"><span class="mr-2 youtube-color"> <i class="fab fa-youtube"></i></span><span>1291</span></div>
                  </div> -->
              </div>
          </div>
      </div>






      </div>
    </div>





<!-- following code is for the use sign up and registration of the user....  -->
    <div class="py-5 bg-primary">
      <div class="container">
       
      </div>
    </div>

    <!-- require the footer for the visitor page....  -->
    <?php require('user_footer.php'); ?>


  </div>

  <!-- require the js links for the jquery and javascript -->
  <?php require('user_jslinks.php'); ?>

 


</body>

</html>
<?php }else{redirect(base_url(''));}?>



