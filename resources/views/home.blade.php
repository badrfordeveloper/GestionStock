@extends('layouts.public')

@section('content')


        <!-- Start Main Banner Area -->
        <div class="home-slides owl-carousel owl-theme">
            <div class="main-banner item-bg2">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <!-- <div class="main-banner-content">
                                <span>New Inspiration 2019</span>
                                <h1>Clothing made for you!</h1>
                                <p>Trending from men and women style collection</p>
                            
                                <a href="#" class="btn btn-primary">Shop Women's</a>
                                <a href="#" class="btn btn-light">Shop Men's</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-banner item-bg1">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <!-- <div class="main-banner-content">
                                <span>New Inspiration 2019</span>
                                <h1>Clothing made for you!</h1>
                                <p>Trending from men and women style collection</p>
                            
                                <a href="#" class="btn btn-primary">Shop Women's</a>
                                <a href="#" class="btn btn-light">Shop Men's</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-banner item-bg3">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <!-- <div class="main-banner-content">
                                <span>New Inspiration 2019</span>
                                <h1>Clothing made for you!</h1>
                                <p>Trending from men and women style collection</p>
                            
                                <a href="#" class="btn btn-primary">Shop Women's</a>
                                <a href="#" class="btn btn-light">Shop Men's</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Banner Area -->
        <!-- Start Facility Area -->
        <section class="facility-area black-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="facility-box">
                            <div class="icon">
                                <i class="fas fa-plane"></i>
                            </div>
                            <h3>Free Shipping World Wide</h3>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="facility-box">
                            <div class="icon">
                                <i class="fas fa-money-check-alt"></i>
                            </div>
                            <h3>100% money back guarantee</h3>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="facility-box">
                            <div class="icon">
                                <i class="far fa-credit-card"></i>
                            </div>
                            <h3>Many payment gatways</h3>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="facility-box">
                            <div class="icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <h3>24/7 online support</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Facility Area -->
        <br/>
        <!-- Start Best Sellers Area -->
        <section class="best-sellers-area pb-60">
            <div class="container">
                <div class="section-title without-bg">
                    <h2><span class="dot"></span>Nouvelle Arrivee</h2>
                </div>

                <div class="row">
                    <div class="best-sellers-products-slides owl-carousel owl-theme">
                       @if(@count($produits) > 0)

                       @foreach($produits as $pr)
                        <div class="col-lg-12 col-md-12">
                            <div class="single-product-box">
                                <div class="product-image">
                                    <a href="{{ url('detail-produit/'.$pr->id.'/'.urldecode($pr->nom))}}">
                                        <img src="@if(count($pr->photos) > 0) {{asset('storage/'.$pr->photos[0]->image) }} @else {{asset('img/default.png')}} @endif" alt="{{ $pr->nom_pr }}" />
                                        @if( @$pr->photos[1]->image != null)
                                        <img src="{{ asset('storage/'.$pr->photos[1]->image) }}" alt="{{ $pr->nom_pr }}" />
                                        @endif
                                    </a>
                                </div>

                                <div class="product-content">
                                    <h3 ><a class="trunc" href="{{ url('detail-produit/'.$pr->id.'/'.urldecode($pr->nom))}}">{{ $pr->nom}}</a></h3>

                                    <div class="product-price">

                                        <span class="new-price">{{ $pr->prix.' '.$currency }}</span>

                                    </div>
                                     @if($pr->quantite <= 0) <p class="outofstock">Répture en stock </p> @endif

                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>

                                    @if($pr->quantite > 0)

                                    <a href="#" data-key="{{$pr->id}}" class="btn btn-light addToCart">Ajouter au Panier</a>
                                    <a href="{{ url('/commander/'.$pr->id)}}" class="btn btn-primary">Commander</a>
                                    
                                    @else

                                    <a href="#" class="btn btn-light disabled" disabled="disabled">Ajouter au Panier</a>
                                    <a href="#" class="btn btn-primary disabled" disabled="disabled">Commander</a>

                                    @endif
                                </div>
                            </div>
                        </div>

                        @endforeach

                        @endif
                                               
                    </div>
                </div>
            </div>
        </section>
        <!-- End Best Sellers Area -->


    <div class="container">
            
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="single-category-box">
                        <img src="{{ asset('img/category-products-img4.jpg') }}" alt="image">

                        <div class="category-content">
                            <h3>LIVRAISON À DOMICILE</h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        






        <!-- Start Best Sellers Area -->
        <section class="best-sellers-area pb-60">
            <div class="container">
                <div class="section-title without-bg">
                    <h2><span class="dot"></span>Promotion</h2>
                </div>

                <div class="row">
                    <div class="best-sellers-products-slides owl-carousel owl-theme">
                       @if(@count($produitsPromo) > 0)

                       @foreach($produitsPromo as $pr)
                        
                        <div class="col-lg-12 col-md-12">
                            <div class="single-product-box">
                                <div class="product-image">
                                    <a href="{{ url('detail-produit/'.$pr->id.'/'.urldecode($pr->nom))}}">
                                        <img src="@if(count($pr->photos) > 0) {{asset('storage/'.$pr->photos[0]->image) }} @else {{asset('img/default.png')}} @endif" alt="{{ $pr->nom_pr }}" />
                                        @if( @$pr->photos[1]->image != null)
                                        <img src="{{ asset('storage/'.$pr->photos[1]->image) }}" alt="{{ $pr->nom_pr }}" />
                                        @endif
                                    </a>
                                </div>

                                <div class="product-content">
                                    <h3 ><a class="trunc" href="{{ url('detail-produit/'.$pr->id.'/'.urldecode($pr->nom))}}">{{ $pr->nom}}</a></h3>

                                    <div class="product-price">

                                        <span class="new-price">{{ $pr->prix.' '.$currency }}</span>

                                    </div>
                                    @if($pr->quantite <= 0) <p class="outofstock">Répture en stock </p> @endif

                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>

                                    @if($pr->quantite > 0)

                                    <a href="#" data-key="{{$pr->id}}" class="btn btn-light addToCart">Ajouter au Panier</a>
                                    <a href="{{ url('/commander/'.$pr->id)}}" class="btn btn-primary">Commander</a>
                                    
                                    @else

                                    <a href="#" class="btn btn-light disabled" disabled="disabled">Ajouter au Panier</a>
                                    <a href="#" class="btn btn-primary disabled" disabled="disabled">Commander</a>

                                    @endif
                                </div>
                            </div>
                        </div>

                        @endforeach

                        @endif
                                               
                    </div>
                </div>
            </div>
        </section>
        <!-- End Best Sellers Area -->    
  
        <!-- Start Facility Area -->
        <section class="facility-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="facility-box">
                            <div class="icon">
                                <i class="fas fa-plane"></i>
                            </div>
                            <h3>Livraison Gratuite</h3>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="facility-box">
                            <div class="icon">
                                <i class="fas fa-money-check-alt"></i>
                            </div>
                            <h3>100% garantie de remboursement</h3>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="facility-box">
                            <div class="icon">
                                <i class="far fa-credit-card"></i>
                            </div>
                            <h3>Livraison à domicile</h3>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="facility-box">
                            <div class="icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <h3>Support en ligne 24/7</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Facility Area -->

@endsection
