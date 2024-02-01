

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
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
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


<section style="background-color: #f9c9aa;">
    <div class="container py-5">
      <div class="row d-flex justify-content-center">
        <div class="col-md-9 col-lg-7 col-xl-5">
          <div class="card">
            <div class="card mb-4">
                <h5 class="card-header">{{$cart->packages->name}}</h5>
                <div class="card-body">
                  <h5 class="card-title">RP {{ number_format($cart->packages->price, 0, ',', '.') }}</h5>
                  
                  
                  <ul>
                    @if ($cart->packages->description5 != null)
             
                  <li>{{$cart->packages->description1}}</li>
                  <li>{{$cart->packages->description2}}</li>
                  <li>{{$cart->packages->description3}}</li>
                  <li>{{$cart->packages->description4}}</li>
                 
                  <li {{-- class="na" --}}>{{$cart->packages->description5}}</li>
            
              
                  @else
                
                  <li>{{$cart->packages->description1}}</li>
                  <li>{{$cart->packages->description2}}</li>
                  <li>{{$cart->packages->description3}}</li>
                  <li>{{$cart->packages->description4}}</li>
                  <li class="text-decoration-line-through text-secondary">1X Photoshoot</li>

                  <!-- buttton -->
              
                  
                  @endif
               
                </ul>
               
           
                </div>
              </div>
            <div class="card-body">
              <div class="card-title d-flex justify-content-between mb-0">
                <p class="text-muted mb-0">{{$cart->packages->name}}</p>
                <p class="mb-0">RP {{ number_format($cart->packages->price, 0, ',', '.') }}</p>
              </div>
            </div>
            <div class="rounded-bottom" style="background-color: #eee;">
                <form method="post" action="/payment-package/{{$cart->slug}}">
                    @method('delete')
                    @csrf
                    <div class="card-body">
                        <p class="mb-4">Your payment details</p>
          
                        <div class="form-outline mb-3">
                          <input type="text" id="formControlLgXM8" class="form-control"
                            placeholder="1234 5678 1234 5678" />
                          <label class="form-label" for="formControlLgXM8">Card Number</label>
                        </div>
          
                        <div class="row mb-3">
                          <div class="col-6">
                            <div class="form-outline">
                              <input type="password" id="formControlLgExpk8" class="form-control"
                                placeholder="MM/YYYY" />
                              <label class="form-label" for="formControlLgExpk8">Expire</label>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-outline">
                              <input type="password" id="formControlLgcvv8" class="form-control" placeholder="Cvv" />
                              <label class="form-label" for="formControlLgcvv8">Cvv</label>
                            </div>
                          </div>
                        </div>
          
                        <a href="/" class="btn btn-danger btn-block ">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-block">Pay Now</button>
                      </div>
                </form>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
    


    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="{{asset('assets/js/main.js')}}"></script>
  </body>
</html>