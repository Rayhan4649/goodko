<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Numeric Software</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!--<link href="assets/img/favicon.png" rel="icon">-->
  <link href="{{URL::to('public/fontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon"/>
   <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
   <link href="{{URL::to('public/fontend/assets/vendor/aos/aos.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('public/fontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('public/fontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('public/fontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('public/fontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('public/fontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('public/fontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Template Main CSS File -->
  <link href="{{URL::to('public/fontend/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
  <!-- <link href="assets/css/style.css" rel="stylesheet"> -->

  <!-- =======================================================
  * Template Name: Dewi - v4.8.1
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top"style="background-color:#444A51 ;">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="{{URL::to('/')}}" >NUMERIC SOFTWARE</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
  
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{URL::to('/')}}">Home</a></li>
          <li style="display: none">
            <a class="nav-link scrollto" href="#about">About</a>
          </li>
          <li style="display: none"><a class="nav-link scrollto" href="#services">Services</a></li>
          <li style="display: none">
            <a class="nav-link scrollto" href="#portfolio">Portfolio</a>
          </li>
          <li style="display: none">
            <a class="nav-link scrollto" href="#team">Team</a>
          </li>
          <li class="dropdown">
            <a href="#"
              ><span>PRODUCTS</span> <i class="bi bi-chevron-down"></i
            ></a>
            <ul>
              <?php foreach($product as $menu_products){?>
              <li><a href="{{URL::to('details/'.$menu_products->id)}}"><?php echo $menu_products->name ; ?></a></li>

            <?php } ?>



              <li class="dropdown" style="display:none;">
                <a href="#"
                  ><span>Accounting (POS) Software</span>
                  <i class="bi bi-chevron-right"></i
                ></a>
                <ul>
                  <li><a href="#">Super Shop Software</a></li>
                  <li><a href="#">Electroics Showroom Software</a></li>
                  <li><a href="#">Motor Bike Showroom Software</a></li>
                  <li><a href="#">Mobile Showroom Software</a></li>
                  <li><a href="#">Cement/Rod/TIN Showroom Software</a></li>
                  <li><a href="#">Sanitary/Tiles Showroom Software</a></li>
                </ul>
              </li>
              <li class="dropdown" style="display:none;">
                <a href="#"
                  ><span>Production Based Software</span>
                  <i class="bi bi-chevron-right"></i
                ></a>
                <ul>
                  <li><a href="#">Flour Mill Management Software</a></li>
                  <li><a href="#">Automatic Rice Mill Management Software</a></li>
                  <li>
                    <a href="#">Semi Auto Rice Mill Management Software </a>
                  </li>
                </ul>
              </li>
              <li class="dropdown" style="display:none;">
                <a href="#"
                  ><span>Educational Management Software</span>
                  <i class="bi bi-chevron-right"></i
                ></a>
                <ul>
                  <li><a href="#">Primary School Management</a></li>
                  <li><a href="#">High School Management</a></li>
                  <li><a href="#">College Management </a></li>
                  <li><a href="#">Madrasha Management </a></li>
                </ul>
              </li>
              <li style="display:none;"><a href="#">Hospital / Diagonostic Management</a></li>
              <li style="display:none;"><a href="#">Online Voting Management</a></li>
              <li style="display:none;"><a href="#">Chemical Management Software</a></li>

                  <li style="display:none;"><a href="#">Hhhjhj Management</a></li>
            </ul>
          </li>
          <li style="display:none;"><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li style="display: none">
            <a class="getstarted scrollto" href="#about">Get Started</a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->
  
  <!-- ======= Hero Section ======= -->
  <section id="hero" style="display:none;">
    <div class="hero-container" data-aos="fade-up" data-aos-delay="150">
      <h1>NUMERIC SOFTWARE </h1>
      <h2>a trusted customize software provide company</h2>
      <div class="d-flex" style="display: none;">
        <a style="display: none;" href="#about" class="btn-get-started scrollto">Get Started</a>
        <a style="display: none;" href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about" style="display:none;">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-end">
          <div class="col-lg-11">
            <div class="row justify-content-end">

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="bi bi-emoji-smile"></i>
                  <span data-purecounter-start="0" data-purecounter-end="125" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Happy Clients</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="bi bi-journal-richtext"></i>
                  <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Projects</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="bi bi-clock"></i>
                  <span data-purecounter-start="0" data-purecounter-end="35" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Years of experience</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="bi bi-award"></i>
                  <span data-purecounter-start="0" data-purecounter-end="48" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Awards</p>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-lg-6 video-box align-self-baseline" data-aos="zoom-in" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-lg-6 pt-3 pt-lg-0 content">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bx bx-check-double"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bx bx-check-double"></i> Voluptate repellendus pariatur reprehenderit corporis sint.</li>
              <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
          </div>

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= About Boxes Section ======= -->
    <section id="about-boxes" class="about-boxes" style="display:none;">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <img src="assets/img/about-boxes-1.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-brush-4-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Our Mission</a></h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <img src="assets/img/about-boxes-2.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-calendar-check-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Our Plan</a></h5>
                <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <img src="assets/img/about-boxes-3.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-movie-2-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Our Vision</a></h5>
                <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet. </p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Boxes Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients" style="display: none;">
      <div class="container" data-aos="zoom-in">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features" style="display:none;">
      <div class="container" data-aos="fade-up">

        <ul class="nav nav-tabs row d-flex">
          <li class="nav-item col-3">
            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
              <i class="ri-gps-line"></i>
              <h4 class="d-none d-lg-block">Modi sit est dela pireda nest</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
              <i class="ri-body-scan-line"></i>
              <h4 class="d-none d-lg-block">Unde praesenti mara setra le</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
              <i class="ri-sun-line"></i>
              <h4 class="d-none d-lg-block">Pariatur explica nitro dela</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
              <i class="ri-store-line"></i>
              <h4 class="d-none d-lg-block">Nostrum qui dile node</h4>
            </a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                </ul>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-1.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Neque exercitationem debitis soluta quos debitis quo mollitia officia est</h3>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                  <li><i class="ri-check-double-line"></i> Provident mollitia neque rerum asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</li>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-2.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Voluptatibus commodi ut accusamus ea repudiandae ut autem dolor ut assumenda</h3>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
                <ul>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                  <li><i class="ri-check-double-line"></i> Provident mollitia neque rerum asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</li>
                </ul>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-3.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Omnis fugiat ea explicabo sunt dolorum asperiores sequi inventore rerum</h3>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-4.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg" style="padding-top: 120px;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Product</h2>
          <p>Product Details</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
      
          <div class="col-md-12">
            <div class="icon-box">
              <i class="bi bi-laptop"></i>
              <h4><?php echo $result->name ; ?></h4>
              
            </div>
          </div>
             <div class="col-md-12">
            <div class="icon-box">
              
              <h4><?php echo $result->des ; ?></h4>
              
            </div>
          </div>
      
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials" style="display:none;">
      <div class="container" data-aos="zoom-in">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
<?php foreach($product as $products){?>
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3><a href="{{URL::to('details/'.$products->id)}}"><?php echo $products->name ; ?></a></h3>
            
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left" style="display:none;"></i>
                  <span style="display:none;">

                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                  <i class="bx bxs-quote-alt-right quote-icon-right" style="display:none;"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

<?php }?>
            


          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio" style="display:none;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Check our Portfolio</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100" style="display:none;">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <?php foreach($client as $clientss){?>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <!--<img src="public/fontend/assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">-->
                <p> <?php if($clientss->image == null):?>
                                                    <span width="241" height="200"></span>
                                                    <?php else :?>    
                                                    <img width="241" height="200" src="<?php echo $clientss->image ;?>">
                                                    <?php endif;?></p>
                <h3><strong><?php echo $clientss->client_name ; ?></h3>
                <h4><?php echo $clientss->client_institution ; ?></h4>
            
            <!--<div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="public/fontend/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details">hhhhhhhhhh<i class="bx bx-link"></i></a>
            </div>-->
          </div>
        <?php } ?>

       
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg" style="display:none;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Check our Team</p>
        </div>

        <div class="row">

          <?php foreach($officer as $offiers){?>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="pic"><img src="<?php echo $offiers->image ; ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo $offiers->officer_name ; ?></h4>
                <span><?php echo $offiers->officer_designation ; ?></span>
                <div class="social" style="display:none;">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>


        

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="display:none;">
      <div class="container" data-aos="fade-up">

    <div class=" section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>

      <div class="row">


        <div class="col-lg-6">
 <?php foreach($footer as $footers){?>
          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p><?php echo $footers->company_address ; ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p><?php echo $footers->company_email ; ?><br></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>+881788497174</p>
                <p>+88<?php echo $footers->company_number ; ?></p>
              </div>
            </div>
          </div>
<?php } ?>
        </div>

        <div class="col-lg-6 mt-4 mt-lg-0">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
             <?php foreach($footer as $footers){?>
            <div class="footer-info">
              <h3>NUMERIC SOFTWARE</h3>
              <p><strong><?php echo $footers->company_address ; ?></strong>
                
              <br><br>
                <strong >Mobile:+88<?php echo $footers->company_number ; ?></strong> <br>
                <strong>Email: <?php echo $footers->company_email ; ?></strong> <br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter" style="display:none;"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/100086201779267/posts/pfbid0TssstysMGJV6Uym6DsQt4LsRiYTbGX6SZHUvF43awvx5cNwW6fyehAqUTT6dtUxYl/" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram" style="display:none;"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus" style="display:none;"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin" style="display:none;"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
            <?php } ?>
          </div>

          <div class="col-lg-2 col-md-6 footer-links" style="display:none;">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" style="display:none;">
            <h4>Our Services</h4>
            <?php foreach($service as $services){?>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#"><?php echo $services->service ; ?></a></li>
            </ul>
 <?php } ?>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter" style="display: none;">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Numeric Soft</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/ -->
        Designed by <a href="https://www.numericsoftbd.com/">http://numericsoftbd.com/</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
<script src="{{URL::to('public/fontend/assets/vendor/purecounter/purecounter_vanilla.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/fontend/assets/vendor/aos/aos.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/fontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/fontend/assets/vendor/glightbox/js/glightbox.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/fontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/fontend/assets/vendor/swiper/swiper-bundle.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/fontend/assets/vendor/php-email-form/validate.js')}}" type="text/javascript"></script>

<!--<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="{{URL::to('public/fontend/assets/js/main.js')}}"></script>
  <!-- <script src="assets/js/main.js"></script> -->

</body>

</html>