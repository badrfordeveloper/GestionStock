@extends('layouts.public')

@section('content')
  <script>
    //fbq('track', 'AddToCart');
  </script>
  <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <ul>
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                    <li>Panier</li>
                </ul>
            </div>
        </div>
        <!-- End Page Title Area -->

<div class="container ptb-60">
    
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">

                	<div class="row">
                		<div class="col-md-7">

                			<!-- Start Cart Area -->
							<section class="cart-area">
					            <div class="container">
					                <div class="row">
					                    <div class="col-lg-12 col-md-12">
					                        <form>
					                            <div class="cart-table table">
					                                <table class="table table-cart table-bordered">
					                                    <thead>
					                                        <tr>
					                                            <th scope="col" class="name-pr">Produit</th>
					                                            <th scope="col" class="name-pr">Nom Produit</th>
						            							<th scope="col" class="price-pr" >Prix</th>
						            							<th scope="col" class="qte-pr" >Quantité</th>
						            							<th scope="col" class="price-total-pr text-center">Total</th>
						            							<th scope="col"  class="action-pr" ></th>

					                                        </tr>
					                                    </thead>

					                                    <tbody>

					                                    <?php $total = 0;$allproducts =""; ?>
						 
												        @if(session('cart'))
												            @foreach(session('cart') as $id => $details)
												 
												                <?php 
												                    $total += $details['price'] * $details['quantity'];
												                    $variants ="";
													                if (@count($details['attrs']) == count($details['valattrs'])) 
													                {
													                    
													                    for($i = 0 ; $i < count($details['attrs']) ;$i++)
													                    {
													                        $variants.=$details['attrs'][$i]." : ". $details['valattrs'][$i]. " - ";
													                    }

													                }

												                    $allproducts .= "( ".$details['quantity']." ) ( ".$variants." ) ".$details['name']." \n";
												        		?>
					                                        
					                                        <tr>
					                                            <td class="product-thumbnail" width="100px">
					                                                <a href="#">
					                                                    <img src="@if(@count($details['photos']) > 0) {{asset('storage/'.$details['photos'][0]->photo) }} @else {{asset('img/default.png')}} @endif" alt="item">
					                                                </a>
					                                            </td>

					                                            <td class="product-name">
					                                                <a href="#">{{ $details['name'] }}</a>
					                                            </td>

					                                            <td class="product-price">
					                                                <span class="unit-amount">{{ $details['price'].''.$currency }}</span>
					                                            </td>

					                                            <td class="product-quantity">
					                                                <div class="input-counter">
					                                                    <span class="minus-btn"><i class="fas fa-minus"></i></span>
					                                                    <input type="text" value="{{ $details['quantity'] }}" class="form-control quantity" />
					                                                    <span class="plus-btn"><i class="fas fa-plus"></i></span>
					                                                </div>
					                                            </td>

					                                            <td class="product-subtotal">
					                                                <span class="subtotal-amount">{{ $details['price'] * $details['quantity'].''.$currency }} </span>
					                                            </td>
					                                            <td class="product-subtotal">
					                                                
					                                                <a class="remove update-cart" data-id="{{ $id }}"><i class="fas fa-sync"></i></a>
						                        					<a class="remove remove-from-cart" data-id="{{ $id }}"><i class="far fa-trash-alt"></i></a>
					                                            </td>
					                                        </tr>
					                                      	@endforeach
						        						@endif
					                                    </tbody>
					                                    <tfoot>
												        <tr class="visible-xs">
												            <td class="text-center" colspan="6"><strong> Total  {{ $total.''.$currency }}</strong></td>
												        </tr>
												        <tr>
												            <td colspan="5"><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue SHopping </a></td>
												            <td class="hidden-xs text-center"><strong>Total {{ $total.''.$currency }}</strong></td>
												        </tr>
												        </tfoot>
					                                </table>
					                            </div>

					                        </form>
					                    </div>
					                </div>
					            </div>
					        </section>
							<!-- End Cart Area -->						                    			
                		</div>
                		<div class="col-md-5">
                			 <form method="POST" action="{{ url('envoyerdemmande') }}" id="infodata">
        					
                				{{ csrf_field() }}


								<div class="lx-g2">
									<div class="lx-cart-total">
										<div class="lx-cart-info-address">
											<h3>S'il vous plaît remplir le formulaire pour compléter la demande</h3>

											<div class="form-group">
												<label for="nom">Nom Complet </label>
												<input type="text" class="form-control" placeholder="Nom Complet" name="nom" id="nom" value="{{ old('nom') }}" />
												
												<span class="error" id="error-nom">@if ($errors->has('nom')){{$errors->first('nom')}}@endif</span>

											</div>

											<div class="form-group">
												<label for="tel">Téléphone </label>
												<input type="text" class="form-control" placeholder="Téléphone" name="tel" id="tel" value="{{ old('tel') }}" />
												
												<span class="error" id="error-tel">@if ($errors->has('tel')){{$errors->first('tel')}}@endif</span>
												
											</div>

											<div class="form-group">
												<label for="tel">Confirmation téléphone </label>
												<input type="text" class="form-control" placeholder="Confirmation Téléphone" name="confirmation_tel" id="confirmation_tel" value="{{ old('confirmation_tel') }}" />
												
												<span class="error" id="error-confirmation_tel">@if ($errors->has('confirmation_tel')){{$errors->first('confirmation_tel')}}@endif</span>

											</div>

											<div class="form-group">
												<label for="email">Email </label>
												<input type="text" class="form-control" placeholder="Email" name="email" id="email" value="{{ old('email') }}" />
												

												<span class="error" id="error-email">@if ($errors->has('email')){{$errors->first('email')}}@endif</span>
												
											</div>

											<div class="form-group">
												<label for="adresse">Adresse </label>
												<input type="text" class="form-control" placeholder="Adresse" name="adresse" id="adresse" value="{{ old('adresse') }}" />

												<span class="error" id="error-adresse">@if ($errors->has('adresse')){{$errors->first('adresse')}}@endif</span>
												
											</div>

											<div class="form-group">
												<label for="ville">Ville</label>
												<input type="text" class="form-control" placeholder="Ville" name="ville" id="ville" value="{{ old('ville') }}" />

												<span class="error" id="error-ville">@if ($errors->has('ville')){{$errors->first('ville')}}@endif</span>
												
											</div>

	                                    	<div class="form-group">
							                	<label for="description">Notes sur la Commande(facultatif)</label>
												<input type="textarea" class="form-control" placeholder="Notes sur la Commande(facultatif)" name="description" id="description" value="{{ old('description') }}" />

												<span class="error" id="error-description">@if ($errors->has('description')){{$errors->first('description')}}@endif</span>
											
											</div>
											

											<textarea id="produits" name="produits" rows="1" cols="33" style="display: none">
											{{ $allproducts }}
											</textarea>
                				
                							<input type="hidden" name="date" class="form-control" value="<?=date("Y-m-d H:i:s") ?>" />

											<div class="product-add-to-cart lx-cart-next-step">
												<button type="submit" id="submit" class="btn btn-primary send-request-cart-detail lx-add-to-cart"><i class="fas fa-cart-plus"></i> {{ __('msg.valid_frm') }}</button>
											</div>
											<div class="lx-clear-fix"></div>	
										</div>
									</div>
								</div>
								<div class="lx-clear-fix"></div>					
							</form>
                		</div>
                	</div>

                	                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
