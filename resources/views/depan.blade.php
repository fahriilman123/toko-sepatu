@php
    $site_name = getSettingsValue('_site_name');
    $hero = getSectionData('HERO');
    $location = getSettingsValue('_location');
    $youtube = getSettingsValue('_youtube');
    $instagram = getSettingsValue('_instagram');
    $github = getSettingsValue('_github');
    $linkedin = getSettingsValue('_linkedin');
    $products = getProducts();
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{$site_name}}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="#page-top">{{$site_name}}</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#product">Product</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#profile">Profile</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
      <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="{{ Storage :: url($hero->thumbnail)}}" alt="..." />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{$hero->title}}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">{!! strip_tags($hero->content)!!}</p>
      </div>
    </header>
    <!-- Partner Section-->
    <section class="page-section portfolio" id="product">
      <div class="container">
        <!-- Partner Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Product</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- Partner Grid Items-->
        <div class="row justify-content-center">
          @php 
            $i = 1;
          @endphp
          @foreach ($products as $product)
          <!-- product Item 1-->
          <div class="col col-md-5 col-lg-3 mb-5">
            <div class="card h-100">
              <!-- Product image-->
              <img
                class="card-img-top"
                src="{{Storage::url($product->foto)}}"
                alt="{{$product->nama}}"
                width="150px"
                height="200px"
              />
              <!-- Product details-->
              <div class="card-body card-body-custom pt-4">
                <div class="text-center">
                  <!-- Product name-->
                  <h5 class="fw-bolder">{{$product->nama}}</h5>
                  <!-- Product price-->
                  <div class="rent-price mb-3">
                    <span class="text-primary">@currency($product->harga)
                  </div>
                  <ul class="list-unstyled list-style-group">
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Brand</span>
                      <span style="font-weight: 600">{{$product->brand}}</span>
                    </li>
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Kategori</span>
                      <span style="font-weight: 600">{{$product->kategori}}</span>
                    </li>
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Ukuran</span>
                      <span style="font-weight: 600">{{$product->ukuran}}</span>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer border-top-0 bg-transparent">
                <div class="text-center">
                  <a class="btn btn-primary mt-auto" href="https://api.whatsapp.com/send?phone=0812345678&text=Halo+ka,+saya+ingin+membeli+produk+ini+{{$product->foto}}">Beli</a>
                  <a
                    class="btn btn-info mt-auto text-white"
                    data-bs-toggle="modal" data-bs-target="#portfolioModal{{$i}}"
                    >Detail</a
                  >
                </div>
              </div>
            </div>
          </div>
          @php
              $i++;
          @endphp
          @endforeach
        </div>
      </section>
      <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
      <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
          <div class="col-lg-3 ms-auto text-center"><img src="assets/img/about.png" class="w-75" /></div>
          <div class="col-lg-5 me-auto lead">
            <p>Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional SASS stylesheets for easy customization.</p>
            <p>You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer-->
    <footer class="footer text-center" id="profile">
      <div class="container">
        <div class="row">
          <!-- Footer Location-->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Location</h4>
            <p class="lead mb-0">
              {{$location}}
            </p>
          </div>
          <!-- Footer Social Icons-->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Around the Web</h4>
            <a class="btn btn-outline-light btn-social mx-1" target="_blank" href="{{$youtube}}"><i class="fab fa-fw fa-youtube"></i></a>
            <a class="btn btn-outline-light btn-social mx-1" target="_blank" href="{{$instagram}}"><i class="fab fa-fw fa-instagram"></i></a>
            <a class="btn btn-outline-light btn-social mx-1" target="_blank" href="{{$github}}"><i class="fab fa-fw fa-github"></i></a>
            <a class="btn btn-outline-light btn-social mx-1" target="_blank" href="{{$linkedin}}"><i class="fab fa-fw fa-linkedin"></i></a>
          </div>
          <!-- Footer About Text-->
          <div class="col-lg-4">
            <h4 class="text-uppercase mb-4">About Freelancer</h4>
            <p class="lead mb-0">
              Freelance is a free to use, MIT licensed Bootstrap theme created by
              <a href="http://startbootstrap.com">Start Bootstrap</a>
              .
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
      <div class="container"><small>Copyright &copy; {{$site_name}} 2023</small></div>
    </div>
    <!-- Partner Modals-->
    @php
        $i=1;
    @endphp
    @foreach ($products as $product)
    <div class="portfolio-modal modal fade" id="portfolioModal{{$i}}" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
          <div class="modal-body pb-5">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8">
                  <!-- Partner Modal - Title-->
                  <h2 class="portfolio-modal-title text-center text-secondary text-uppercase mb-0">{{$product->nama}}</h2>
                  <!-- Icon Divider-->
                  <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                  </div>
                  <!-- Partner Modal - Image-->
                  <div class="text-center">
                    <img class="img-fluid rounded mb-5" src="{{Storage::url($product->foto)}}" alt="{{$product->nama}}" />
                  </div>
                  <!-- Partner Modal - Text-->
                    {!! $product->deskripsi !!}
                    <div class="text-center">
                      <a class="btn text-center btn-primary" target="_blank" href="https://api.whatsapp.com/send?phone=0812345678&text=Halo+ka,+saya+ingin+membeli+produk+ini" data-bs-dismiss="modal">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                         Beli
                      </a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>    
    @php
        @$i++;
    @endphp
    @endforeach
    <!-- Partner Modal 1-->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  </body>
</html>
