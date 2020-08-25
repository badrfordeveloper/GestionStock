@extends('layouts.public')

@section('content')

        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <ul>
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                    <li>{{ $cat->libelle }}</li>
                </ul>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Collections Area -->
        <section class="products-collections-area ptb-60">
            <div class="container">
                <div class="section-title">
                    <h2><span class="dot"></span> {{ $cat->libelle }}</h2>
                </div>

                <div class="row">
                    
                    <div class="col-lg-12 col-md-12">
                        <div class="products-filter-options">
                            <div class="row align-items-center">
                                <div class="col d-flex">
                                    <span class="d-none"><a href="#" data-toggle="modal" data-target="#myModal"><i class="fas fa-filter"></i> Filtrer</a></span>

                                    <span>Vue:</span>

                                    <div class="view-list-row">
                                        <div class="view-column">
                                            <a href="#" class="icon-view-two ">
                                                <span></span>
                                                <span></span>
                                            </a>

                                            <a href="#" class="icon-view-three">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </a>

                                            <a href="#" class="icon-view-four active">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>

                        <div id="products-filter" class="products-collections-listing row">
                            
                            @foreach($produits as $pr)

                            <div class="col-lg-3 col-6 col-md-6 products-col-item">
                                <div class="single-product-box">
                                    <div class="product-image">
                                        <a href="{{ url('detail-produit/'.$pr->id.'/'.urldecode($pr->nom))}}">
                                            <img src="@if($pr->image!= null) {{asset('storage/'.$pr->image) }} @else {{asset('img/default.png')}} @endif" alt="{{ $pr->nom_pr }}" />
                                            @if( @$pr->photos[0]->image )
                                            <img src="{{ asset('storage/'.$pr->photos[0]->image) }}" alt="{{ $pr->nom_pr }}" />
                                            @endif
                                        </a>
                                    </div>

                                    <div class="product-content">
                                        <h3><a class="trunc" href="{{ url('detail-produit/'.$pr->id.'/'.urldecode($pr->nom))}}">{{ $pr->nom}}</a></h3>
            
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

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                             
                        {{ $produits->links() }}
                                    
                    </div>
                </div>
            </div>
        </section>
        <!-- End Collections Area -->

@endsection
