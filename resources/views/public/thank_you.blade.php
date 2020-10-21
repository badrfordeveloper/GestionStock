<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <title>Minimallanding - Bootstrap Landing Template</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="keywords">

  <meta content="" name="description">



  <!-- Favicons -->

  <link href="{{ asset('assets/lp/img/favicon.png')}}" rel="icon">

  <link href="{{ asset('assets/lp/img/apple-touch-icon.png') }}" rel="apple-touch-icon">



  <!-- Google Fonts -->

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">



  <!-- Bootstrap CSS File -->

  <link href="{{ asset('assets/lp/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">



  <!-- Libraries CSS Files -->

  <link href="{{ asset('assets/lp/lib/unveil-effects/animations.css') }}" rel="stylesheet">



  <!-- Main Stylesheet File -->

  <link href="{{ asset('assets/lp/css/style.css') }}" rel="stylesheet">



  <!-- =======================================================

    Template Name: MinimalLanding

    Template URL: https://templatemag.com/minimallanding-bootstrap-landing-template/

    Author: TemplateMag.com

    License: https://templatemag.com/license/

  ======================================================= -->

</head>



<body>

 <!-- Start Succes Area -->
    <section class="error-area ptb-60" style="padding: 35px;">
            <div class="container">
                <div class="error-content text-center" >
                    <img src="{{ asset('img/success.png') }}" alt="Succes" height="100px">

                    
                    <h3 style="color: red;font-size: 32px;font-weight: 600;">لقد تم تسجيل طلبك ، </h3>
                    <h5 style="color: red;font-size: 24px"> سوف نتصل بك في أقل من 24 ساعة  <br> لتأكيد الطلب ،
 <br> شكرا لك ! </h5>

                    <a href="{{ url('/') }}" class="btn btn-success" style="float: none;font-size: 20PX;font-weight: 700;"><i class="fa fa-angle-left"></i> الاستمرار بالتسوق  </a>
                </div>
            </div>
        </section>
    <!-- End Succes Area -->

  <!--  ********** FOOTER SECTION ********** -->


  <div id="copyrights" style="position: fixed;bottom: 0;width: 100%;">

    <div class="container">

      <p style="direction: ltr;">

        &copy; Copyrights <strong>Promo Shop Online</strong>. Tous les droits sont réservés.

      </p>

      <div class="credits">

        <!--

          You are NOT allowed to delete the credit link to TemplateMag with free version.

          You can delete the credit link only if you bought the pro version.

          Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/minimallanding-bootstrap-landing-template/

          Licensing information: https://templatemag.com/license/

        -->

        Créer par <a href="https://websites-ideal.com/">Web Ideal</a>

      </div>

    </div>

  </div>

  <!-- / copyrights -->



  <!-- JavaScript Libraries -->

  <script src="{{ asset('assets/lp/lib/jquery/jquery.min.js') }}"></script>

  <script src="{{ asset('assets/lp/lib/bootstrap/js/bootstrap.min.js') }}"></script>

  <script src="{{ asset('assets/lp/lib/php-mail-form/validate.js') }}"></script>

  <script src="{{ asset('assets/lp/lib/unveil-effects/unveil-effects.js') }}"></script>



  <!-- Template Main Javascript File -->

  <script src="{{ asset('assets/lp/js/main.js') }}"></script>


</body>

</html>

