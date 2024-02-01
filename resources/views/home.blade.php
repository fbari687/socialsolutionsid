

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Social Solutions</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link  href="assets/img/pohon.png" rel="icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!--  Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- SWEETALERT 2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>

  <style>
    .bg-success1{
        background-color: #05433b;
        color: white;
    }

    .bg-success1:hover{
        background-color: #05433b;
        color: white;
    }
  </style>
  <body>
    <!-- ======= Top Bar ======= -->

    <!-- ======= Header ======= -->
    @if (session('status'))
    <script>
      Swal.fire({
          title: "Berhasil!",
          text: "{{ session('status') }}!",
          icon: "success"
          });
    </script>
    @endif
    @if (session('success'))
    <script>
      Swal.fire({
          title: "Berhasil!",
          text: "{{ session('success') }}!",
          icon: "success"
          });
    </script>
    @endif
    <header id="header" class="d-flex align-items-center">
      <div class=" d-flex align-items-center">
        <a href="index.html"  class="logo me-3 me-md-4 ms-md-4 ms-2"><img width="100%" height="50%" src="assets/img/pohon.png" alt="" /></a>
        <h1 class="logo me-5 me-md-7 ">
          <a href="index.html">Social Solutions<span>.</span></a>
        </h1>
    </div>

        <div class="d-flex align-items-center gap-3 flex-md-row-reverse">
            @if (Auth::user())
           
            <a class="me-md-5 ms-md-5 me-2 position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="fa-solid fa-cart-shopping">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $countCarts ? $countCarts : "0" }}
                <span class="visually-hidden">unread messages</span>
                </i>
            </a>
        
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Your carts</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">

            @if ($carts->count() > 0 )
            @php
                $userId = 0;
            @endphp
                @foreach ($carts as $cart)
                {{-- @php
                    $userId +=
                @endphp --}}
                <div class="card mb-4">
                    <h5 class="card-header">{{$cart->packages->name}}</h5>
                    <div class="card-body">
                      <h5 class="card-title">RP {{ number_format($cart->packages->price, 0, ',', '.') }}</h5>
                      
                      
                      <ul>
                        @if ($cart->packages->description5 != null)
                        <form method="post" action="/deleteFromCart/{{$cart->slug}}">
                            @method('delete')
                            @csrf
                      <li>{{$cart->packages->description1}}</li>
                      <li>{{$cart->packages->description2}}</li>
                      <li>{{$cart->packages->description3}}</li>
                      <li>{{$cart->packages->description4}}</li>
                     
                      <li {{-- class="na" --}}>{{$cart->packages->description5}}</li>
                      <a href="/payment/{{ $cart->slug }}" class="btn btn-primary mt-4">Checkout</a>
                    
                      <button type="submit" class="btn btn-danger mt-4" ">Delete Item </button>
                    </form>
                  
                      @else
                      <form method="post" action="/deleteFromCart/{{$cart->slug}}">
                        @method('delete')
                        @csrf
                      <li>{{$cart->packages->description1}}</li>
                      <li>{{$cart->packages->description2}}</li>
                      <li>{{$cart->packages->description3}}</li>
                      <li>{{$cart->packages->description4}}</li>
                      <li class="text-decoration-line-through text-secondary">1X Photoshoot</li>

                      <!-- buttton -->
                      <a href="/payment/{{ $cart->slug }}" class="btn btn-primary mt-4">Checkout</a>
                   
                      <button type="submit" class="btn btn-danger mt-4" ">Delete Item </button>
                      </form>
                      @endif
                   
                    </ul>
                   
               
                    </div>
                  </div>

                  
                

    

          
          
                @endforeach
        
            @else
            Anda Belum Menambah Package ke dalam Cart
        
            @endif


            
              
          </div>
        </div>

        @else 
        <a href="/login" class="me-md-5 ms-md-5 me-2 position-relative" type="button" d>
            <i class="fa-solid fa-cart-shopping">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ $countCarts ? $countCarts : "0" }}
            <span class="visually-hidden">unread messages</span>
            </i>
        </a>
        @endif
        <nav id="navbar" class="navbar">
          <ul>
            @if (Auth::user())
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li class="dropdown">
                <a href="#"><span>Service</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="#services">Advantage</a></li>
                 
                  <li><a href="#pricing">Pricing</a></li>
            
                </ul>
              </li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>

            <li><a class="nav-link scrollto" href="#portfolio">Gallery</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
            
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li> <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/logout" class="btn bg-success1 me-md-2 px-3 py-2 text-white" type="button">Logout</a>
               
              </div>
            </li>
        
            @else
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li class="dropdown">
                <a href="#"><span>Service</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="#services">Advantage</a></li>
                 
                  <li><a href="#pricing">Pricing</a></li>
            
                </ul>
              </li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>

            <li><a class="nav-link scrollto" href="#portfolio">Gallery</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
            
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li> <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/login" class="btn bg-success1 me-md-2 px-3 py-2 text-white" type="button">SIgn In</a>
                <a href="/register" class="btn bg-success1 text-white px-3 py-2" type="button">Sign Up</a>
              </div>
            </li>
            @endif
          </ul>
          <i class="bi bi-list mobile-nav-toggle me-3"></i>

        </nav>
      <!-- cart -->

      <!-- end cart -->
    </div>
        
        <!-- .navbar -->
        
     

    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
      <div class="container text-nowrap " data-aos="zoom-out" data-aos-delay="100">
        <h1>Welcome to <span>Social Solutions</span></h1>
        <h2></h2>
        <div class="d-flex">
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
          <a href="https://drive.google.com/file/d/1GWhWhz6IFM_dftQ-yvWzn5jPDYRHYS1e/view?usp=sharing" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div>
      </div>
    </section>
    <!-- End Hero -->

    <main id="main">
      <!-- ======= Featured Services Section ======= -->
      
      <!-- ======= Services Section ======= -->

      <section id="services" class="services">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Services</h2>
            <h3>Check our <span>Services</span></h3>
            
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bx bxl-instagram"></i></div>
                <h4><a href="">Social Media Management</a></h4>
                <p>Serahkan konten social media Anda ke kami, sehingga Anda bisa fokus menangani usaha Anda.</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-slideshow"></i></div>
                <h4><a href="">Tingkatkan Sales</a></h4>
                <p>Social media aktif = Dikenal banyak
                  orang = Lebih banyak penjualan!</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-money"></i></div>
                <h4><a href="">Jaminan Uang Kembali 100%</a></h4>
                <p>Tidak berdampak? Kami kembalikan biaya jasa kami, tanpa syarat.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
        <!-- End Services Section -->
      
 

 

     

      <!-- ======= Clients Section ======= -->
      <section id="clients" class="clients section-bg">
        <div class="container" data-aos="zoom-in">
          
          <div class="row">
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-1.png" class="img-fluid" alt="" />
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-2.png" class="img-fluid" alt="" />
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-3.png" class="img-fluid" alt="" />
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-4.png" class="img-fluid" alt="" />
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-5.png" class="img-fluid" alt="" />
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-6.png" class="img-fluid" alt="" />
            </div>
          </div>
        </div>
      </section>
      <!-- End Clients Section -->

      <!-- ======= About Section ======= -->
      <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title mb-5">
            <h2>About</h2>
            <h3>Find Out More <span>About Us</span></h3>
           
          </div>

          <div class="row">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
              <img src="assets/img/aboutus.png" class="img-fluid" alt="" />
              <p class="mt-5">
                Social Solutions didirikan oleh para ahli dan kreator konten media sosial di mana kami berkembang untuk membantu dan memberdayakan UKM dan Pemilik Merek Lokal di Indonesia untuk mengembangkan bisnis mereka di platform digital.
              </p>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
              <h3>Apa itu Social Solutions?</h3>
              <p class="fst-italic">Social Solutions merupakan sebuah platform atau layanan yang bertujuan menjadi solusi dalam ranah pemasaran digital, khususnya untuk Usaha Mikro, Kecil, dan Menengah (UMKM).</p>
              <ul>
                <li>
                  <i class="bx bx-store-alt"></i>
                  <div>
                    <h5>Bergerak di bidang?</h5>
                    <p>Social Solutions merupakan sebuah usaha di bidang social media marketing yang berdiri pada tahun 2022.</p>
                  </div>
                </li>
                <li>
                  <i class="bx bx-briefcase"></i>
                  <div>
                    <h5>Apa yang Kami Lakukan?</h5>
                    <p>Memberikan layanan pemasaran yang berfokus pada konten kreator, membangun hubungan yang berkelanjutan antara UMKM dan pasar yang lebih luas melalui platform seperti TikTok.</p>
                  </div>
                </li>
                <li>
                  <i class="bx bx-map"></i>
                  <div>
                    <h5>Lokasi?</h5>
                    <p>Kantor di Grogol Petamburan, Jakarta Barat.</p>
                  </div>
                </li>
              </ul>
          
            </div>
          </div>
        </div>
      </section>
           <!-- End About Section -->
      
      
    


      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Gallery</h2>
            <h3>Check our <span>Gallery</span></h3>
            <p></p>
          </div>

    

          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="assets/img/live.jpg" class="img-fluid" alt="" />
              <div class="portfolio-info">
                <h4>Live Shoping</h4>
                <p>TikTok</p>
                <a href="assets/img/live.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="TikTok Live Shoping"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img src="assets/img/feeds2.png" class="img-fluid" alt="" />
              <div class="portfolio-info">
                <h4>Feeds</h4>
                <p>Instagram</p>
                <a href="assets/img/feeds2.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Instagram Feeds"><i class="bx bx-plus"></i></a>
            
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="assets/img/photoshoot2.jpg" class="img-fluid" alt="" />
              <div class="portfolio-info">
                <h4>Photoshoot</h4>
                <p></p>
                <a href="assets/img/photoshoot2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
           
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="" />
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="" />
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="" />
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="" />
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="" />
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="" />
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Portfolio Section -->

      <!-- ======= Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Team</h2>
            <h3>Our Hardworking <span>Team</span></h3>
            <p>Pendiri Social Solutions Indonesia.</p>
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <div class="member-img">
                  <img src="assets/img/mare.jpg" class="img-fluid" alt="" />
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/amare.santoso/"><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Amare Maliq Aradhana</h4>
                  <span>Admin</span>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="member">
                <div class="member-img">
                  <img src="assets/img/fikri.jpg" class="img-fluid" alt="" />
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/_fixdc/"><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Fikri Aidhil</h4>
                  <span>CEO</span>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
              <div class="member">
                <div class="member-img">
                  <img src="assets/img/bari.jpg" class="img-fluid" alt="" />
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/fbariaja/"><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Fathul Bari</h4>
                  <span>Superviser</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Team Section -->

      <!-- ======= Pricing Section ======= -->
      <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Pricing</h2>
            <h3>Check our <span>Pricing</span></h3>
            <p>SOCIAL <span>PRICELIST.</span></p>
          </div>

          <div class="row">
            @foreach ($pricing as $package)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="box featured">
                <h3>{{$package->name}}</h3>
                <h4><sup>RP</sup>{{ number_format($package->price, 0, ',', '.') }}</h4>
                <ul>
                    @if ($package->description5 != null)
                  <li>{{$package->description1}}</li>
                  <li>{{$package->description2}}</li>
                  <li>{{$package->description3}}</li>
                  <li>{{$package->description4}}</li>
                 
                  <li {{-- class="na" --}}>{{$package->description5}}</li>
                  @else
                  <li>{{$package->description1}}</li>
                  <li>{{$package->description2}}</li>
                  <li>{{$package->description3}}</li>
                  <li>{{$package->description4}}</li>
                  <li class="text-decoration-line-through text-secondary">1X Photoshoot</li>
                  @endif
               
                </ul>
                <div class="btn-wrap">
                    
                    <form action="{{ url('/addToCart') }}" method="POST">
                        @csrf
        
                        @if (Auth::user())
                            <button type="submit" class="cart-btn btn-buy" name="packageSlug" value="{{ $package->slug }}">
                                Add To Cart
                            </button>
                  @else
                      <a href="{{ url('/login') }}" class="cart-btn btn-buy">Add To Cart</a>
                  @endif
                </form>
                </div>
              </div>
            </div>

    

          
            @endforeach
          </div>
        </div>
      </section>
      <!-- End Pricing Section -->

      <!-- ======= Frequently Asked Questions Section ======= -->
      <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>F.A.Q</h2>
            <h3>Frequently Asked <span>Questions</span></h3>
            <p>Ada yang bisa kami bantu?</p>
          </div>

          <div class="row justify-content-center">
            <div class="col-xl-10">
              <ul class="faq-list">
                <li>
                  <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Apa Itu Social Solutions? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                  <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                    <p>Kami adalah Social Media Management Platform yang berfokus untuk membantu UMKM dan Local Brand dalam pembuatan konten social media di TikTok dan Instagram, jasa manajemen influencer, dan beriklan di social media.</p>
                  </div>
                </li>

                <li>
                  <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">
                    Dimana lokasi kantor Social Solutions? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                  </div>
                  <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      Jl. S. Parman Kav 28, Jakarta Barat,Ruko GSA Central Park, Tanjung Duren, Jakarta Barat, DKI Jakarta
                    </p>
                  </div>
                </li>

                <li>
                  <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">
                    Bagaimana Social Solutions membantu UMKM untuk mengembangkan bisnis di platform digital?
                    <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                  </div>
                  <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      Social Solutions hadir untuk membantu UMKM dalam pembuatan konten media sosial Tiktok dan Instagram (Social Media Management) berupa : 12x TikTok Video, 4x IG Feeds/ IG Story (Mirroring TikTok) 1x sesi photoshoot (15 hasil foto dengan 4 yang akan di post, dan 11 akan menjadi hak milik user. Konsep photoshoot berfokus pada 5W1H & what to communicate, user’s experience & Color graded akan diberikan dan menjadi hak milik user).
                    </p>
                  </div>
                </li>

                <li>
                  <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">
                    Apakah 12 konten TikTok akan di post di akun brand? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                  </div>
                  <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      Untuk seluruh konten akan di posting di akun brand atau bisnis
                    </p>
                  </div>
                </li>

                <li>
                  <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">
                    Jika saya menggunakan jasa Social Solutions, apa akan ada jaminan kenaikan angka followers? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                  </div>
                  <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      Untuk peningkatan followers Social Solutions tidak bisa menjanjikan, karena Social Solutions lebih berfokus kepada dampak yang diberikan untuk bisnis anda.
                    </p>
                  </div>
                </li>

                <li>
                  <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">
                    Apa saya bisa memilih atau request creator tertentu yang akan membantu brand saya? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                  </div>
                  <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      <ul>
                        
                        <li>
                          Creator dan talent adalah dari tim internal Social Solutions yang sudah dilatih dan di edukasi mengenai pembuatan konten. Kami akan sesuaikan dengan bidang bisnis kakak dengan creator kami.
                        </li>
                       
                        <li>
                          Jika ingin ada talent dari eksternal juga bisa, namun untuk biaya dan keperluan lainnya akan ditanggung oleh pihak brand.

                        </li>
        
                      </ul>
                    </p>
                  </div>
                </li>
                
                <li>
                  <div data-bs-toggle="collapse" href="#faq7" class="collapsed question">
                    Berapa biaya jasa Social Solutions? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                  </div>
                  <div id="faq7" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      Social Solutions hadir untuk membantu UMKM dalam pembuatan konten media sosial pada Tiktok dan Instagram (Social Media Management) dengan biaya mulai dari 5.000.000.00 Rupiah
                    </p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- End Frequently Asked Questions Section -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Contact</h2>
            <h3><span>Contact Us</span></h3>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
              <div class="info-box mb-4">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>Jl. S. Parman Kav 28, Tanjung Duren, Jakarta Barat, DKI Jakarta.</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="info-box mb-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>@socialsolutions.com</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="info-box mb-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>+62-878-7202-5271</p>
              </div>
            </div>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.657549763551!2d106.7875998736585!3d-6.176577360521293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7d9bc4300eb%3A0x7ca7d3f7dbacd728!2sOfficeplus%20-%20Best%20Virtual%20Office!5e0!3m2!1sen!2sid!4v1697502484137!5m2!1sen!2sid"
                width="500"
                height="380"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>

            <div class="col-lg-6">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required />
                  </div>
                  <div class="col form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required />
                </div>
                <div class="form-group">
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
      </section>
      <!-- End Contact Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container py-4">
        <div class="footer-top">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-6 footer-contact">
                <h3>SocialSolutions<span>.</span></h3>
                <p>
                  Jl. S. Parman Kav 28<br />
                  Tanjung Duren, Jakarta Barat<br />
                  DKI Jakarta<br /><br />
                  <strong>Phone:</strong>+62 878-7202-5271<br />
                  <strong>Email:</strong>@socialsolutions.com<br />
                </p>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Our Services</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Our Social Networks</h4>
           
                <div class="social-links mt-3">
                  <a href="https://www.instagram.com/socialsolutionsid/" class="instagram"><i class="bx bxl-instagram"></i></a>
                  <a href="#" class="google-plus"><i class="bx bxl-whatsapp"></i></a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="assets/js/main.js"></script>
  </body>
</html>

    <!-- Main JS File -->
    
  </body>
</html>
