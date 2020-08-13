<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head><meta charset="gb18030">

  <!-- Required meta tags -->
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Font family -->
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
        <!-- Bootstrap Min CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
        <!-- Font Awesome Min CSS -->
        <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
        <!-- Owl Carousel Min CSS -->
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <!-- niceSelect CSS -->
        <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
        <!-- Magnific Popup Min CSS -->
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.min.css') }}">
        <!-- MeanMenu CSS -->
        <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
        <!-- ION rangeSlider Min CSS -->
        <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.min.css') }}">
    <!-- Slick CSS -->
        <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
        <!-- Slick Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

        <title>SHOPDIALI</title>
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}"> 
   
</head>
<body>

      <!-- Start Top Panel Area
        <div class="top-panel" style="background-color: #C9C9C9 ;">
            <div class="container">
                <div class="panel-content">
                    <div class="top-panel-slides owl-carousel owl-theme">
                        <div class="single-item-box">
                            <p ><strong style="color: red;">ðŸ”¥Achetez 2 et obtenezðŸ˜±15% de rabaisðŸ”¥</strong>ðŸ‘‰<a href="http://sni.daka-mall.com/detail-produit/35/Velform%20Sauna%20Slimmer" >Voir Plus...</a></p>
                        </div>

                        <div class="single-item-box">
                            <p ><strong style="color: red;">ðŸ”¥Achetez 2 et obtenezðŸ˜±15% de rabaisðŸ”¥</strong>ðŸ‘‰<a href="http://sni.daka-mall.com/detail-produit/35/Velform%20Sauna%20Slimmer" >Voir Plus...</a></p>
                        </div>

                    </div>

                    <i class="fas fa-times panel-close-btn"></i>
                </div>
            </div>
        </div>
         End Top Panel Area -->

        <!-- Start Navbar Area -->
        
        <div class="navbar-area">
            <div class="comero-mobile-nav">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="logo" height="55px"></a>
                </div>
            </div>

            <div class="comero-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="logo" height="85px"></a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                              <li class="nav-item p-relative"><a href="{{ url('/') }}" class="nav-link active" title="{{ __('msg.home_public') }}" >Accueil</a></li>

                              

                              <?php foreach ($categories as $cat): ?>

                <li class="nav-item p-relative"><a href="{{ url('categorie-liste/'.$cat->id) }}" class="nav-link">{{ $cat->libelle }}</a></li>

                <?php endforeach ?>
                                
                            </ul>

                            <div class="others-option">
                                <div class="option-item"><i class="search-btn fas fa-search"></i>
                                    <i class="close-btn fas fa-times"></i>
                                    
                                    <div class="search-overlay search-popup">
                                        <div class='search-box'>
                                            <form class="search-form" method="post" action="{{ url('recherche')}}">
                                                {{ csrf_field() }}
                                                <input class="search-input" name="search" placeholder="Search" type="text">

                                                <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="option-item"><a href="{{ url('panier')}}"  ><span id="QtyStock">@if(@count(session('cart'))>0){{count(session('cart'))}} @else {{'0'}} @endif</span> <i class="fas fa-shopping-bag"></i></a></div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->
        <!-- Start Ads Popup Area -->
        @if(1== 2)
        <div class="bts-popup" role="alert">
            <div class="bts-popup-container">
                <h3>Free Shipping</h3>

                <p>Worldwide free shipping for all members. To become a member subscribe for our <strong>free offers / discount newsletter.</strong></p>

                <form>
                    <input type="email" class="form-control" placeholder="mail@name.com" name="EMAIL" required>
                    <button type="submit"><i class="far fa-paper-plane"></i></button>
                </form>

                <ul>
                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" class="linkdein"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>

                <div class="img-box">
                    <img src="{{ asset('img/women.png') }}" alt="image">
                    <img src="{{ asset('img/women2.png') }}" alt="image">
                </div>

                <a href="#0" class="bts-popup-close"></a>
            </div>
        </div>
        @endif
        <!-- End Ads Popup Area -->


<!-- Header -->
    <div class="lx-header">
      <div class="lx-clear-fix"></div>
      <div class="lx-contact-us" style="display: none;">
         <a href="javascript:;"><i class="fa fa-phone"></i></a>
         <div class="lx-contact-us-content">
           <ul>
                           <li><a href="tel:212619682004" class="lx-color1"><i class="fa fa-phone"></i> 212619682004 </a></li>

             <li><a href="https://api.whatsapp.com/send?phone=212619682004&text=&source=&data=&app_absent=6¦9" class="lx-color3"><i class="fab fa-whatsapp"></i> 2126196820046¦96¦9 6¦9 </a></li>
             <li><a href="https://www.facebook.com/" target="_blank" class="lx-color4"><i class="fab fa-facebook-messenger"></i> Messenger </a></li>
           </ul>
         </div>
      </div>
      <input type="hidden" id="websiteurl" value="" />       
    </div>
    
    <!-- Main -->

    @include('layouts.flash')

    @yield('content')

    <!-- Start Footer Area -->
        <footer class="footer-area">

            <div class="copyright-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <p>Copyright @ 2020 Igrain. All Rights Reserved</p>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <ul class="payment-card">
                                <li><a href="#" target="_blank"><img src="{{ asset('img/fb-icon.png') }}" height="50px" alt="Facebook"></a></li>
                                <li><a href="#" target="_blank"><img src="{{ asset('img/insta-icon.png') }}" height="50px" alt="Instagram"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Area -->

        <div class="go-top"><i class="fas fa-arrow-up"></i><i class="fas fa-arrow-up"></i></div>
        <div class="lx-contact-us">
                 <a href="javascript:;"><i class="fa fa-phone"></i></a>
                 <div class="lx-contact-us-content">
                     <ul>
                                                   <li><a href="tel:212619682004" class="lx-color1"><i class="fa fa-phone"></i> 212619682004 </a></li>

                         <li><a href="https://api.whatsapp.com/send?phone=212619682004&text=&source=&data=&app_absent=6¦9" class="lx-color3"><i class="fab fa-whatsapp"></i>212619682004</a></li>
                         <li><a href="https://www.facebook.com" target="_blank" class="lx-color4"><i class="fab fa-facebook-messenger"></i> Messenger </a></li>
                     </ul>
                 </div>
            </div>

        <!-- JQuery Min Js -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- Popper Min JS -->
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <!-- Bootstrap Min Js -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Parallax Min JS -->
        <script src="{{ asset('js/parallax.min.js') }}"></script>
    <!-- Slick Min JS -->
    <script src="{{ asset('js/slick.js') }}"></script>
        <!-- Owl Carousel Min JS -->
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <!-- Magnific Popup Min JS -->
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <!-- niceSelect Min JS -->
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
        <!-- MeanMenu JS -->
        <script src="{{ asset('js/jquery.meanmenu.js') }}"></script>
        <!-- ION rangeSlider Min JS  -->
        <script src="{{ asset('js/ion.rangeSlider.min.js') }}"></script>
        <!-- Form Validator Min JS -->
        <script src="{{ asset('js/form-validator.min.js') }}"></script>
        <!-- Contact Form Min JS -->
        <script src="{{ asset('js/contact-form-script.js') }}"></script>
        <!-- ajaxChimp Min JS -->
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Comero Map JS FILE -->
        <script src="{{ asset('js/comero-map.js') }}"></script>
        <!-- Main JS -->
        <script src="{{ asset('js/main.js') }}"></script>

    <!-- Main Script -->

        <script type="text/javascript">
     
            $(".update-cart").click(function (e) {
               e.preventDefault();
     
               var ele = $(this);
     
                $.ajax({
                   url: "{{ url('update-cart') }}",
                   method: "patch",
                   data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
                   success: function (response) {
                       window.location.reload();
                   }
                });
            });
     
            $(".remove-from-cart").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("êtes-vous sur ?")) {
                    $.ajax({
                        url: "{{ url('remove-from-cart') }}",
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
     
        </script>
        <script type="text/javascript">
             $('#btnFocusForm').hide();
            $('#btnFocusForm').click(function(event) {
              window.location.href ="#priceSection"; 
              $('#nom').focus();
            });
            $(window).scroll(function() {
                if ($(this).scrollTop()) {
                    $('#btnFocusForm:hidden').stop(true, true).fadeIn();
                } else {
                    $('#btnFocusForm').stop(true, true).fadeOut();
                }
            });
        </script>

        <script type="text/javascript">
            
            $('.addToCart').click(function(event) {
                event.preventDefault();
                var _this = $(this);
                _this.html("<img src='{{ asset('img/loader.gif') }}'style='    width: 13px;height: 13px;margin: 0 auto;' alt=''>");
                var _link= "<?=url('addtocart').'/'?>"+$(this).attr('data-key');

                $.ajax({
                    url: _link,
                })
                .done(function(data) {
                    if(data["valid"]==1)
                    {
                        var _msgSuccess = data["msg"];
                        // Get Quantité Panier
                           $.ajax({
                               url: "{{ url('getCountCart') }}",
                           })
                           .done(function(data) {
                                var _qtyStock = data;
                                $('#QtyStock').text(_qtyStock);
                                 _this.html("Ajouter au Panier");
                                 $('#msgSuccess').removeClass('hide').find('.alert-success').text(_msgSuccess);
                                  setInterval(function(){ 
                                if(!$('#msgSuccess').hasClass('hide')) { $('#msgSuccess').addClass('hide')} 
                                if(!$('#msgError').hasClass('hide')) { $('#msgError').addClass('hide')} 
                            }, 3000);
                                console.log("success");
                           })
                           .fail(function() {
                               console.log("error");
                           })
                           .always(function() {
                               console.log("complete");
                           });

                        // End get Quantité Panier                       
                    }
                    console.log("success");
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
                
            return false;
            });



        </script>
        
    </body>

</html>
