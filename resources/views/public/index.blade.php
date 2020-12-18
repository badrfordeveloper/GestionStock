<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Promo Shop Online</title>
  <link rel="icon" href="{{ asset('assets/home/img/favicon.png') }}" type="image/png" sizes="16x16">


  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/home/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('assets/home/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/home/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/home/css/landing-page.min.css') }}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container" style="text-align: center;
    display: initial;">
      <a class="navbar-brand" href="#"> <img src="{{ asset('assets/home/img/logo.png') }}"  height="90px" ></a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5"></h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <!-- <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
              </div>
            </div>
          </form> -->
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
          @forelse($produits as $pr)
            <div class="col-lg-4">
              <div class="card" style="">
                 <img  class="card-img-top" src="@if($pr->image!= null) {{asset('storage/'.$pr->image) }} @else {{asset('img/default.png')}} @endif" alt="{{ $pr->nom_pr }}" />
                <div class="card-body">
                  <h5 class="card-title">{{ $pr->nom}}</h5>
                  <p class="card-text" style ="direction:ltr">{{ $pr->prix.' '.$currency }}</p>
                  <a href="{{ url(''.$pr->landingPage) }}" class="btn btn-primary">أطلب الآن</a>
                </div>
              </div>
            </div>
            @empty
        @endforelse
        
       
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2020. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="https://www.facebook.com/PromoShopOnlinee" target="_blank">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://www.instagram.com/promoshoponline2020/"  target="_blank">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('assets/home/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
