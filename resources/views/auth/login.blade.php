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

    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      {{-- SWEETALERT 2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>

  <body>
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
    <!-- ======= Top Bar ======= -->

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
      <div class=" d-flex align-items-center">
        <a href="index.html"  class="logo me-3 me-md-4 ms-md-4 ms-2"><img width="100%" height="50%" src="assets/img/pohon.png" alt="" /></a>
        <h1 class="logo me-5 ">
          <a href="index.html">Social Solutions<span>.</span></a>
        </h1>
    </div>

        <div class="d-flex align-items-center gap-3 flex-md-row-reverse">
           
          
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto " href="/#hero">Home</a></li>
            <li class="dropdown">
                <a href="#"><span>Service</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="/#services">Advantage</a></li>
                 
                  <li><a href="/#pricing">Pricing</a></li>
            
                </ul>
              </li>
            <li><a class="nav-link scrollto" href="/#about">About</a></li>

            <li><a class="nav-link scrollto" href="/#portfolio">Gallery</a></li>
            <li><a class="nav-link scrollto" href="/#team">Team</a></li>
            
            <li><a class="nav-link scrollto" href="/#contact">Contact</a></li>
            <li> <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/login" class="btn bg-success1 me-md-2 px-3 py-2 text-white" type="button">SIgn In</a>
                <a href="/register" class="btn bg-success1 text-white px-3 py-2" type="button">Sign Up</a>
              </div>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle me-3"></i>

        </nav>
      <!-- cart -->

      <!-- end cart -->
    </div>
        
        <!-- .navbar -->
        
     

    </header>
    <!-- End Header -->

    <style>
        .bg-pic {
            background-image: url("assets/img/hero-bg.jpg");
                background-size: cover;
        }
    </style>
    
    <section class="bg-pic  dark:bg-gray-900 ">
     
    
        @if (session('status'))
    <script>
      Swal.fire({
          title: "Berhasil!",
          text: "{{ session('message') }}!",
          icon: "success"
          });
    </script>
    @endif
        @if (session('failed'))
    <script>
      Swal.fire({
          title: "Gagal!",
          text: "{{ session('failed') }}!",
          icon: "error"
          });
    </script>
    @endif
    
      
        <div class="flex flex-col mt-10 items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            @if ($errors->any())
            <div class="alert alert-danger bg-red-500 px-3 py-2 w-96 ml-5 mt-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    {{-- <a href="/#hero" class="flex items-end  mb-10 text-2xl font-semibold text-gray-900 dark:text-white">
                        <img class="w-8 h-8 mr-2" src="assets/img/pohon.png" alt="logo">
                        Social Solutions  
                    </a> --}}
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                     Sign In
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="#" method="post">
                        @csrf
                        <div>
                            <label for="Username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Username</label>
                            <input type="username" name="username" id="Username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username" required>
                        </div>
                   
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                       
                       
                        <button type="submit" class="w-full text-white bg-[#05433b] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login</button>
                        <p class="text-sm font-bold  dark:text-gray-400">
                            Dont have an account? <a href="/register" class="font-medium text-red-600 hover:text-red-400 dark:text-primary-500">Register here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
      </section>


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
                      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci ullam qui!</p>
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
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        </body>
      </html>
      
          <!-- Main JS File -->
          <script src="assets/js/main.js"></script>
        </body>
      </html>
      