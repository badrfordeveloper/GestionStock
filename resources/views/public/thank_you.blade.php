<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <title>Promo Shop Online</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="keywords">

  <meta content="" name="description">



  <!-- Favicons -->

  <link href="{{ asset('assets/lp/img/favicon.png')}}" rel="icon">


  <!-- Google Fonts -->

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">



  <!-- Bootstrap CSS File -->

  <link href="{{ asset('assets/lp/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">



  <!-- Libraries CSS Files -->

  <link href="{{ asset('assets/lp/lib/unveil-effects/animations.css') }}" rel="stylesheet">



  <!-- Main Stylesheet File -->

  <link href="{{ asset('assets/lp/css/style.css') }}" rel="stylesheet">

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '171574484639743');
    fbq('track', 'PageView');
    </script>
    <script>
    fbq('track', 'Purchase');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=171574484639743&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
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

                
               <button class="btn btn-success"  style="float: none;font-size: 20PX;font-weight: 700;" onclick="goBack()"><i class="fa fa-angle-left"></i> الاستمرار بالتسوق </button>

<script>
function goBack() {
  window.history.back();
}
</script>
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

