<!DOCTYPE html>
<html lang="en">

<head>
  <title>Browse &mdash; Free Website Template by Free-Template.co</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="Free-Template.co" />

  <!-- require the php file for the css links  -->
  <?php require('visitor_csslinks.php'); ?>

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
    <?php require('visitor_header.php'); ?>


    <div class="site-blocks-cover overlay" style="background-image: url(<?= base_url('assets/assets_user/') ?>images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10">


            <div class="row justify-content-center mb-4">
              <div class="col-md-10 text-center">
                <!-- search for text  -->
                <h1 data-aos="fade-up">Search For <span class="typed-words"></span></h1>
                <!-- <p data-aos="fade-up" data-aos-delay="100">Handcrafted free templates by <a href="https://free-template.co/" target="_blank">Free-Template.co</a></p> -->
              </div>
            </div>


            <!-- Search bar in the body of the page -->
            <div class="form-search-wrap p-2" style="border-radius:50px;" data-aos="fade-up" data-aos-delay="200">
              <form method="post">
                <div class="row align-items-center">
                  <div class="col-lg-12 col-xl-4 no-sm-border border-right">
                    <input type="text" class="form-control" placeholder="What are you looking for ?">
                  </div>
                  <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                    <div class="wrap-icon">
                      <span class="icon icon-room"></span>
                      <input type="text" class="form-control" placeholder="Location">
                    </div>

                  </div>


                  <!-- list of the categories -->
                  <div class="col-lg-12 col-xl-3">
                    <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="" id="">
                        <option value="">All Categories</option>
                        <option value="">Hotels</option>
                        <option value="">Restaurant</option>
                        <option value="">Eat &amp; Drink</option>
                        <option value="">Events</option>
                        <option value="">Fitness</option>
                        <option value="">Others</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-2 ml-auto text-right">
                    <input type="submit" class="btn text-white btn-primary" value="Search">
                  </div>

                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>





    <!-- category area to display some of the popular categories -->
    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Popular Categories</h2>
            <p class="color-black-opacity-5">There are some categories which are very popular in this days.</p>
          </div>
        </div>

        <div class="row align-items-stretch">
          
          <?php 
          $result = $this->MCategory->getLimitedCategory();
          foreach($result as $r){ 
            $count =  $this->MCategory->countSubcategory($r['CategoryId']);
            ?>
              <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                <a href="#" class="popular-category h-100">
                  <span class="icon mb-3"><img width="70" height="70" src="<?=base_url('assets/assets_category_images/');?><?php echo $r['CategoryImage'];?>"></span>
                  <span class="caption mb-2 d-block"><?=$r['CategoryName']?></span>
                  <span class="number"><?=$count?></span>
                </a>
              </div>
          <?php }?>

        </div>

        <div class="row mt-5 justify-content-center tex-center">
          <div class="col-md-4"><a href="<?=base_url('allCategory');?>" class="btn btn-block btn-outline-primary btn-md px-5">View All Categories</a></div>
        </div>
      </div>
    </div>


    <div class="site-section" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Most Visited Places</h2>
            <p class="color-black-opacity-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

            <div class="listing-item">
              <div class="listing-image">
                <img src="<?= base_url('assets/assets_user/') ?>images/img_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a href="listings-single.html" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
                <a class="px-3 mb-3 category" href="#">Hotels</a>
                <h2 class="mb-1"><a href="listings-single.html">Luxe Hotel</a></h2>
                <span class="address">West Orange, New York</span>
              </div>
            </div>

          </div>
          <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

            <div class="listing-item">
              <div class="listing-image">
                <img src="<?= base_url('assets/assets_user/') ?>images/img_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a href="listings-single.html" class="bookmark"><span class="icon-heart"></span></a>
                <a class="px-3 mb-3 category" href="#">Restaurants</a>
                <h2 class="mb-1"><a href="listings-single.html">Jones Grill &amp; Restaurants</a></h2>
                <span class="address">Brooklyn, New York</span>
              </div>
            </div>

          </div>
          <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

            <div class="listing-item">
              <div class="listing-image">
                <img src="<?= base_url('assets/assets_user/') ?>images/img_3.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a href="listings-single.html" class="bookmark"><span class="icon-heart"></span></a>
                <a class="px-3 mb-3 category" href="#">Events</a>
                <h2 class="mb-1"><a href="listings-single.html">Live Band</a></h2>
                <span class="address">West Orange, New York</span>
              </div>
            </div>

          </div>

          <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

            <div class="listing-item">
              <div class="listing-image">
                <img src="<?= base_url('assets/assets_user/') ?>images/img_4.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a href="listings-single.html" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
                <a class="px-3 mb-3 category" href="#">Others</a>
                <h2 class="mb-1"><a href="listings-single.html">Gourmet Coffees</a></h2>
                <span class="address">New York City</span>
              </div>
            </div>

          </div>
          <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

            <div class="listing-item">
              <div class="listing-image">
                <img src="<?= base_url('assets/assets_user/') ?>images/img_5.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a href="listings-single.html" class="bookmark"><span class="icon-heart"></span></a>
                <a class="px-3 mb-3 category" href="#">Spa</a>
                <h2 class="mb-1"><a href="listings-single.html">La Italia Spa</a></h2>
                <span class="address">Italy</span>
              </div>
            </div>

          </div>
          <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

            <div class="listing-item">
              <div class="listing-image">
                <img src="<?= base_url('assets/assets_user/') ?>images/img_6.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a href="listings-single.html" class="bookmark"><span class="icon-heart"></span></a>
                <a class="px-3 mb-3 category" href="#">Stores</a>
                <h2 class="mb-1"><a href="listings-single.html">Super Market Mall</a></h2>
                <span class="address">West Orange, New York</span>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>





    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-5">
            <img src="<?= base_url('assets/assets_user/') ?>images/img_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid rounded">
          </div>
          <div class="col-md-5 ml-auto">
            <h2 class="text-primary mb-3">Why Us</h2>
            <div class="row mt-4">
              <div class="col-12">
                <div class="border p-3 rounded mb-2">
                  <a data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1" class="accordion-item h5 d-block mb-0">How to list my item?</a>

                  <div class="collapse" id="collapse-1">
                    <div class="pt-2">
                      <p class="mb-0">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    </div>
                  </div>
                </div>

                <div class="border p-3 rounded mb-2">
                  <a data-toggle="collapse" href="#collapse-4" role="button" aria-expanded="false" aria-controls="collapse-4" class="accordion-item h5 d-block mb-0">Is this available in my country?</a>

                  <div class="collapse" id="collapse-4">
                    <div class="pt-2">
                      <p class="mb-0">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    </div>
                  </div>
                </div>

                <div class="border p-3 rounded mb-2">
                  <a data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false" aria-controls="collapse-2" class="accordion-item h5 d-block mb-0">Is it free?</a>

                  <div class="collapse" id="collapse-2">
                    <div class="pt-2">
                      <p class="mb-0">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                    </div>
                  </div>
                </div>

                <div class="border p-3 rounded mb-2">
                  <a data-toggle="collapse" href="#collapse-3" role="button" aria-expanded="false" aria-controls="collapse-3" class="accordion-item h5 d-block mb-0">How the system works?</a>

                  <div class="collapse" id="collapse-3">
                    <div class="pt-2">
                      <p class="mb-0">The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">How It Works</h2>
            <p class="color-black-opacity-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
            <div class="how-it-work-step">
              <div class="img-wrap">
                <img src="<?= base_url('assets/assets_user/') ?>images/step-1.svg" alt="Free website template by Free-Template.co" class="img-fluid">
              </div>
              <span class="number">1</span>
              <h3>Decide What To Do</h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
            <div class="how-it-work-step">
              <div class="img-wrap">
                <img src="<?= base_url('assets/assets_user/') ?>images/step-2.svg" alt="Free website template by Free-Template.co" class="img-fluid">
              </div>
              <span class="number">2</span>
              <h3>Find What You Want</h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
            <div class="how-it-work-step">
              <div class="img-wrap">
                <img src="<?= base_url('assets/assets_user/') ?>images/step-3.svg" alt="Free website template by Free-Template.co" class="img-fluid">
              </div>
              <span class="number">3</span>
              <h3>Explore Amazing Places</h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Website Developer</h2>
          </div>
        </div>

        <div class="slide-one-item home-slider owl-carousel">
          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="<?= base_url('assets/assets_user/') ?>images/person_3_sq.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid mb-3">
                <p>Mitul Vaghasiya</p>
              </figure>
              <blockquote>
                <p>&ldquo;I'm Website Developer.&rdquo;<br>We are trying to provide you best facilities,
              so every user can get their best reasults. If you have any suggessions for more facility then please feel free to contact us.</p>
              </blockquote>
            </div>
          </div>
          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="<?= base_url('assets/assets_user/') ?>images/person_2_sq.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid mb-3">
                <p>Kaushik Suhagiya</p>
              </figure>
              <blockquote>
                <p>&ldquo;I'm Website Designer.&rdquo;<br>We are trying to make the best design of this website,
              so you can feel more comfortable to surf you offers. If you have any suggessions then please infirm us.</p>
              </blockquote>
            </div>
          </div>

          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="<?= base_url('assets/assets_user/') ?>images/person_5_sq.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid mb-3">
                <p>Hardik Raval</p>
              </figure>
              <blockquote>
                <p>&ldquo;I'm Database Manager.&rdquo;<br>We are trying to make the best database and give the best surfing experiance to our user.
              If ther are any troubles in surfing this site then please contact us.</p>
              </blockquote>
            </div>
          </div>

        </div>
      </div>
    </div>



    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Tips &amp; Articles</h2>
            <p class="color-black-opacity-5">See Our Daily tips &amp; articles</p>
          </div>
        </div>
        <div class="row mb-3 align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="<?= base_url('assets/assets_user/') ?>images/img_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
              <div class="h-entry-inner">
                <h2 class="font-size-regular"><a href="#">Etiquette tips for travellers</a></h2>
                <div class="meta mb-4">by <a href="#">Jeff Sheldon</a> <span class="mx-2">&bullet;</span> May 5th, 2019</div>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="<?= base_url('assets/assets_user/') ?>images/img_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
              <div class="h-entry-inner">
                <h2 class="font-size-regular"><a href="#">Etiquette tips for travellers</a></h2>
                <div class="meta mb-4">by <a href="#">Jeff Sheldon</a> <span class="mx-2">&bullet;</span> May 5th, 2019</div>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="<?= base_url('assets/assets_user/') ?>images/img_3.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
              <div class="h-entry-inner">
                <h2 class="font-size-regular"><a href="#">Etiquette tips for travellers</a></h2>
                <div class="meta mb-4">by <a href="#">Jeff Sheldon</a> <span class="mx-2">&bullet;</span> May 5th, 2019</div>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- following code is for the use sign up and registration of the user....  -->
    <div class="py-5 bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mr-auto mb-4 mb-lg-0">
            <h2 class="mb-3 mt-0 text-white">Let's get started. Create your account</h2>
            <p class="mb-0 text-white">For find the offers in your selected area, must sign up first. </p>
          </div>
          <div class="col-lg-4">
            <p class="mb-0"><a href="signup.html" class="btn btn-outline-white text-white btn-md px-5 font-weight-bold btn-md-block">Sign Up</a></p>
          </div>
        </div>
      </div>
    </div>

    <!-- require the footer for the visitor page....  -->
    <?php require('visitor_footer.php'); ?>


  </div>

  <!-- require the js links for the jquery and javascript -->
  <?php require('visitor_jslinks.php'); ?>



  <script>
    var typed = new Typed('.typed-words', {
      strings: ["Offers.", "Coupons.", "Discounts.", "Sales."],
      typeSpeed: 80,
      backSpeed: 80,
      backDelay: 2000,
      startDelay: 500,
      loop: true,
      showCursor: false
    });
  </script>



</body>

</html>