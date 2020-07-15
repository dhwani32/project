<header class="site-navbar" role="banner">

  <div class="container">
    <div class="row align-items-center">

      <div class="col-11 col-xl-2">
        <h1 class="mb-0 site-logo"><a href="index.html" class="text-white h2 mb-0">OffersNearMe</a></h1>
      </div>
      <div class="col-12 col-md-10 d-none d-xl-block">
        <nav class="site-navigation position-relative text-right" role="navigation">

        <!-- menues in the header file -->
          <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">

            <li><a href="<?=base_url(); ?>"><span>Home</span></a></li>
            <li><a href="<?=base_url('vc_about'); ?>"><span>About</span></a></li>
            <li><a href="<?=base_url('vc_contact'); ?>"><span>Contact</span></a></li>
           
            <!-- login and registration buttons -->
            <li><a href="<?=base_url('vc_register_page'); ?>"><span>Register</span></a></li>
            <li class="active"><a href="<?=base_url('vc_login_page'); ?>"><span id="btn-login">LogIn</span></a></li>

          </ul>
        </nav>
      </div>


      <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

    </div>

  </div>
  </div>

</header>

