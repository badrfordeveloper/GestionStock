@extends('layouts.public')

@section('content') 


	 <!-- Start Succes Area -->
		<section class="error-area ptb-60">
            <div class="container">
                <div class="error-content text-center" >
                    <img src="{{ asset('img/success.png') }}" alt="Succes" height="100px">

                    
                    <h3 style="color: red;">Votre commande a été enregistrée,</h3>
                    <h5 style="color: red;">Nous vous contacterons dans moins de 24 heures <br>pour confirmer la commande,<br> Merci ! </h5>

                    <a href="{{ url('/') }}" class="btn btn-success" style="float: none;"><i class="fa fa-angle-left"></i> Continue Shopping </a>
                </div>
            </div>
        </section>
		<!-- End Succes Area -->

@endsection
