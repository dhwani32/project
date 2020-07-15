
<header class="site-navbar" role="banner">

  <div class="container">
    <div class="row align-items-center">

      <div class="col-11 col-xl-2">
        <h1 class="mb-0 site-logo"><a href="<?=base_url();?>" class="text-white h2 mb-0">Offersnearme</a></h1>
      </div>
      <div class="col-12 col-md-10 d-none d-xl-block">
        <nav class="site-navigation position-relative text-right" role="navigation">

        <!-- menues in the header file -->
          <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">

            <li><a href="<?=base_url(); ?>"><span>Home</span></a></li>
            <li><a href="<?=base_url('user/allCategory'); ?>"><span>Category</span></a></li>
            <li><a href="<?=base_url('uc_contact'); ?>"><span>Contact</span></a></li>

            <!-- login and registration buttons -->

            <?php if(!isset($_SESSION['userDetails'])){?>
              <li><a href="<?=base_url('uc_register_page'); ?>"><span>Register</span></a></li>
              <li class="active"><a href="<?=base_url('uc_login_page'); ?>"><span id="btn-login">LogIn</span></a></li>
            <?php } else { 
                $notification = $this->MUser->offerNotification();
              ?>

              <li class="has-children">
                  <a><span>Subscription <?php if($notification > 0){ ?> <badge class="badge badge-primary"> <?=$notification;?> </badge> <?php } ?></span></a>
                  <ul class="dropdown arrow-top">
                    <li><a href="<?php echo base_url('user/offerProvidersDetails/'); ?>"> Offer Providers </a></li>
                    <li><a href="<?php echo base_url('user/SubscriptionsDetails/'); ?>"> Subscriptions </a></li>
                    <li><a href="<?php echo base_url('user/subscribedOffersNotifications/'); ?>"> Offer Notifications <?php if($notification > 0){ ?> <badge class="badge badge-danger"> <?=$notification;?> new </badge> <?php } ?></a></li>
                  </ul>
                </li>



              <li class="has-children">
                  <a><span>Profile</span></a>
                  <ul class="dropdown arrow-top">
                    <li><a href="<?php echo base_url('user/addOffers/');?>">Add Offers</a></li>
                    <li><a href="<?php echo base_url('user/userProfile/');?>">User Profile</a></li>
                    <li><a href="<?php echo base_url('user/favoritePage/');?>">Favorite Offers</a></li>
                    <li><a href="<?php echo base_url('user/msgFromBusinessPage');?>">Message From Business</a></li>
                    <li><a href="<?php echo base_url('user/userLogPage/');?>">User Log</a></li>
                    <li><a href="<?php echo base_url('user/userOrdersPage/');?>">User Orders</a></li>
                  </ul>
                </li>

              <li ><a href="<?=base_url('uc_logout'); ?>" ><span id="btn-login">LogOut</span></a></li>

             <?php } ?>
          </ul>

        </nav>
      </div>



      <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

    </div>

  </div>
  </div>

</header>
