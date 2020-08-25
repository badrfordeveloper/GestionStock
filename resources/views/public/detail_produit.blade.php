@extends('layouts.public')

@section('content')


        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <ul>
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                    <li>{{ $produit->nom }}</li>
                </ul>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Products Details Area -->
        <section class="products-details-area ptb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="products-page-gallery">
                            <div class="product-page-gallery-main">
                                <div class="item">
                                    <img src="{{asset('storage/'.$produit->image) }}" alt="{{ $produit->nom }}">
                                </div>

                                @foreach($produit->photos as $img)
                                <div class="item">
                                    <img src="{{asset('storage/'.$img->image) }}" alt="{{ $produit->nom }}">
                                </div>
                                @endforeach
                                
                            </div>

                            <div class="product-page-gallery-preview">
                                <div class="item">
                                    <img src="{{asset('storage/'.$produit->image) }}" alt="{{ $produit->nom }}">
                                </div>
                                @foreach($produit->photos as $img)
                                <div class="item">
                                    <img src="{{asset('storage/'.$img->image) }}" alt="{{ $produit->nom }}">
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="product-details-content">
                            <h3> 👉{{ $produit->nom }}👈 </h3>

                            <div class="price" id="priceSection">
                                <span class="new-price">{{ $produit->prix.' '.$currency }}</span>                                
                            </div>

                            <div class="product-review">
                               
                            </div>
                            @if($produit->quantite  > 0)

                            <form method="POST" action="{{ url('envoyerdemmandenow') }}" >

                            {{ csrf_field() }}
                            <input type="hidden" id="key" name="key" value="{{ $produit->id }}">

                                
                                <div class="row">
                                    <div class="form-group col-sm-2 col-3 col-qte">
                                        <label for="quantite_stock">Quantité :</label>
                                        <input type="number" class="form-control" id="qty" name="qty" value="1">
                                    </div>
                                </div>

                                @if(@count($produit->attributes) >0)
                                <div class="row lx-product-qty">
                                    <div class="col-md-12 ">
                                        <div class="row">
                                            @foreach($produit->attributes as $attr)
                                            <div class="col-md-6">
                                                <div class="row row-attr">
                                                    <div class="col-md-12 title" >{{ $attr->nom_attr }}</div>
                                                     <input type="hidden" id="attrs" name="attrs[]" value="{{ $attr->id }}">

                                                    <div class="col-md-12 text-left">

                                                        <?php $i = 0 ?>
                                                        @foreach($attr->valeurs as $val)

                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="valattrs{{$attr->id}}" id="val{{$val->id}}" value="{{ $val->valeur }}" <?=($i==0) ? 'checked' : '' ?> >
                                                          <label class="form-check-label" for="val{{$val->id}}">
                                                            {{ $val->valeur }}
                                                          </label>
                                                        </div>

                                                        <?php $i++; ?>
                                                        @endforeach
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="col-md-12">
                                        <div class="lx-g2">
                                            <div class="lx-cart-total">
                                                <div class="lx-cart-info-address">
                                                    <h3>S'il vous plaît remplir le formulaire pour compléter la demande</h3>

                                                    <div class="form-group">
                                                        <label for="nom">Nom Complet </label>
                                                        <input type="text" class="form-control" placeholder="Nom Complet" name="nom" id="nom" value="{{ old('nom') }}" />
                                                        <span class="error" id="error-nom">
                                                            @if ($errors->has('nom'))
                                                               {{$errors->first('nom')}} 
                                                            @endif
                                                        </span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tel">Téléphone </label>
                                                        <input type="text" class="form-control" placeholder="Téléphone" name="tel" id="tel" value="{{ old('tel') }}" />
                                                        <span class="error" id="error-tel">
                                                             @if ($errors->has('tel'))
                                                                {{$errors->first('tel')}}
                                                            @endif
                                                        </span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tel">Confirmation téléphone </label>
                                                        <input type="text" class="form-control" placeholder="Confirmation téléphone" name="confirmation_tel" id="confirmation_tel" value="{{ old('confirmation_tel') }}" />

                                                        <span class="error" id="error-confirmation_tel">
                                                            @if ($errors->has('confirmation_tel'))
                                                                {{$errors->first('confirmation_tel')}}
                                                            @endif
                                                        </span>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email </label>
                                                        <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="{{ old('email') }}" />
                                                        

                                                        <span class="error" id="error-email">@if ($errors->has('email')){{$errors->first('email')}}@endif</span>
                                                        
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="adresse">Adresse </label>
                                                        <input type="text" class="form-control" placeholder="Adresse" name="adresse" id="adresse" value="{{ old('adresse') }}" />

                                                        <span class="error" id="error-adresse"> 
                                                            @if ($errors->has('adresse'))
                                                                {{$errors->first('adresse')}}
                                                            @endif
                                                        </span>

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="ville">Ville </label>
                                                        <input type="text" class="form-control" placeholder="Ville" name="ville" id="ville" value="{{ old('ville') }}" />

                                                        <span class="error" id="error-ville">
                                                            @if ($errors->has('ville'))
                                                                {{$errors->first('ville')}}
                                                            @endif
                                                        </span>

                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="description">Notes sur la Commande(facultatif)</label>
                                                        <input type="textarea" class="form-control" placeholder="Notes sur la Commande(facultatif)" name="description" id="description" value="{{ old('description') }}" />

                                                        <span class="error" id="error-description">
                                                            @if ($errors->has('description'))
                                                                {{$errors->first('description')}}
                                                            @endif
                                                        </span>
                                                        
                                                    </div>

                                                    @if(1==2)

                                                    <div class="form-group">
                                                        <label for="email">{{ __('msg.frm_email_cl')}} </label>
                                                        <input type="text" class="form-control" placeholder="{{ __('msg.frm_email_cl')}}" name="email" id="email" value="{{ old('email') }}" />

                                                        <span class="error" id="error-email">
                                                            @if ($errors->has('email'))
                                                                {{$errors->first('email')}}
                                                            @endif
                                                        </span>

                                                    </div>

                                                    @endif

                                                    <input type="hidden" id="produits" name="produits" class="form-control" value="" />
                                        
                                                    <input type="hidden" name="date" class="form-control" value="<?=date("Y-m-d H:i:s") ?>" />

                                                    <div class="lx-clear-fix"></div>    
                                                </div>

                                                <div class="product-add-to-cart lx-cart-next-step ">
                                                    <button type="submit" class="btn btn-primary send-request-cart-detail lx-add-to-cart"><i class="fas fa-cart-plus"></i> {{ __('msg.commander') }}</button>
                                              
                                                </div>  
                                                <div class="lx-clear-fix"></div>                    

                                        </div>
                                    </div>
                                    
                                </div>
                                </form>
                                @endif
                                <div class="col-md-12">
                                    <div class="lx-share row">
                                        <div class="col-md-4 text-center"><a href="tel:212619682004" class="btn btn-default lx-color1"><i class="fa fa-phone"></i> 212619682004 </a></div>

                                        <div class="col-md-4 text-center"><a href="https://wa.me/212619682004" class="btn btn-default lx-color3"><i class="fab fa-whatsapp"></i> 212619682004 </a></div>
                                        <div class="col-md-4 text-center"><a href="https://www.facebook.com/messages" target="_blank" class="btn btn-default lx-color4"><i class="fab fa-facebook-messenger"></i> Messenger </a></div>
                                         
                                         

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="tab products-details-tab">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <ul class="tabs">
                                        <li><a href="#">
                                            <div class="dot"></div> Description
                                        </a></li>

                                        <li><a href="#">
                                            <div class="dot"></div> Livraison
                                        </a></li>
                                    </ul>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="tab_content">
                                        <div class="tabs_item">
                                            <div class="products-details-tab-content">
                                                {!! $produit->description !!}
                                            </div>
                                        </div>

                                        <div class="tabs_item">
                                            <div class="products-details-tab-content">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td>Livraison</td>
                                                                <td style="color: red; font-size: 18px;">
                                                                Merci pour votre commande </br>
                                                                Le service livraison va vous contacter le plus proche possible ( 24H maximum ) pour vous livrer votre commande.
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="related-products-area">
                <div class="container">
                    <div class="section-title">
                        <h2><span class="dot"></span> Produits Connexes</h2>
                    </div>

                    @if(@count($similaireProduct) > 0)

                    <div class="row">
                        <div class="trending-products-slides-two owl-carousel owl-theme">
                            @foreach($similaireProduct as $pr)

                            <div class="col-lg-12 col-md-12">
                                <div class="single-product-box">
                                    <div class="product-image">
                                        <a href="{{ url('detail-produit/'.$pr->id.'/'.urldecode($pr->nom_pr))}}">
                                           <img src="@if($pr->image!= null) {{asset('storage/'.$pr->image) }} @else {{asset('img/default.png')}} @endif" alt="{{ $pr->nom_pr }}" />
                                            @if( @$pr->photos[0]->image )
                                            <img src="{{ asset('storage/'.$pr->photos[0]->image) }}" alt="{{ $pr->nom_pr }}" />
                                            @endif
                                        </a>
                                    </div>

                                    <div class="product-content">
                                        <h3><a class="trunc" href="{{ url('detail-produit/'.$pr->id.'/'.urldecode($pr->nom_pr))}}">{{ $pr->nom_pr}}</a></h3>

                                        <div class="product-price">

                                            @if( $pr->prix_promo != null)

                                            <span class="old-price">{{ $pr->prix_unitaire.' '.$currency }}</span>

                                            <span class="new-price">{{ $pr->prix_promo.' '.$currency }}</span>
                                            @else

                                            <span class="new-price">{{ $pr->prix_unitaire.' '.$currency }}</span>

                                            @endif
                                        </div>

                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>

                                        <a href="{{ url('/addtocart/'.$pr->id)}}" class="btn btn-light trunc" title="Ajouter au Panier">Ajouter au Panier</a>
                                        <a href="{{ url('/commander/'.$pr->id)}}" class="btn btn-primary" title="Commander">Commander</a>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </section>
        <!-- End Products Details Area -->

@if(1==2)

<div class="container">
    
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="row">
                    <div class="col-md-6">
                        <div class="lx-g2">
                            <div class="lx-product-details">
                                
                                <div class="lx-share">
                                    <ul>
                                                                                            
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" class="popup lx-facebook"><i class="fab fa-facebook-square"></i> Facebook</a></li>
                                        <li><a href="https://twitter.com/intent/tweet?url={{url()->current()}}" class="popup lx-twitter"><i class="fab fa-twitter"></i> Twitter</a></li>
                                        <li><a href="whatsapp://send?text={{url()->current()}}" data-action="share/whatsapp/share" class="popup lx-whatsapp"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
                                        <div class="lx-clear-fix"></div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<style type="text/css">
	.sticky-cart-bar {
    padding: 10px;
    background-color: #fff;
    box-shadow: 0 -5px 20px -10px rgba(0,0,0,.1);
    border-top: 1px solid #f0f0f0;
}
.sticky-cart-bar {
    position: fixed;
    bottom: 0;
    width: 100%;
    z-index: 1;
    display: -webkit-box;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: center;
    justify-content: center;
}
</style>


                                
                                                
<div class="sticky-cart-bar show-on-desktop show-on-mobile">
	<div class="product-section add-to-cart-section single-buy gap-control no-devider" style="width: 50%;text-align: center;">
<button type="button" onclick="location.href='https://api.whatsapp.com/send?phone=212619682004&text=&source=&data=&app_absent=';"  
class="btn btn-primary send-request-cart-detail lx-add-to-cart" style="margin: 0 5%;"><i class="fas fa-cart-plus"></i> Commander par WhatsApp</button>
	</div> 
	<div class="share-box"><!----> <!----> <!----></div>
</div>

@endsection
