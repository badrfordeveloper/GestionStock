
		@if( Request::segment(1) == "detail-produit" )
		<script type="text/javascript">
		    
		    $('#infodataDirect').submit(function(event) {
		       event.preventDefault();

		        $('.lx-cart-next-step > button').attr('disabled', 'disabled').html("<img height='25px' src='{{ asset('img/loader.gif') }}' />");

		        var _form  =  $(this);
		        var _nom   = $('#nom').val();
		        var _nom   = $('#tel').val();
		        var _nom   = $('#adresse').val();
		        var _nom   = $('#ville').val();
		        var _email = $('#email').val();
		        var _email = $('#description').val();
		        
		        var _qty   = $('#qty').val();
		        var _attrs = $('#attrs').val();

		        $.ajax({
		            headers: {

		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

		                },
		            url: "{{ url('commander/'.$produit->id )}}",
		            type: 'POST',
		            data: _form.serialize(),
		        })
		        .done(function(data) {
		        	$.ajax({
		        		url: "{{ url('getAllProduct') }}",
		        	})
		        	.done(function(data) {

		        		$('#produits').val(data);

		        		$.ajax({
					        headers: {

					            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

					            },
					        url: '{{ url("/envoyerdemmande")}}',
					        type: 'POST',
					        data: _form.serialize(),
					       })
					       .done(function(data) {
					        if (data== "1") {

					            $.ajax({
					                url: 'https://script.google.com/macros/s/AKfycbwLnso-upxvEHwTyZphLZFX8mJkDXRuIfRNa5aduuamfdXW1hHI/exec',
					                type: 'GET',
					                dataType: 'json',
					                data: _form.serialize(),
					            })
					            .done(function(data) {
					                window.location.href = '{{ url("/merci") }}';
					                console.log("success");
					                
					            })
					            .fail(function() {
					                console.log("error");
					            })
					            .always(function() {
					                console.log("complete");
					            });
					        } 
					        
					        console.log("success");
					       })
					       .fail(function(xhr, status) {
					           $('.lx-cart-next-step > button').removeAttr('disabled').html("{{ __('msg.commander') }}");

					            json_format = $.parseJSON(xhr.responseText);
					            var _err_nom ="";
					            var _err_adresse ="";
					            var _err_tel ="";
					            var _err_ville ="";
					            var _confirmation_tel=""


					            if (!("nom" in json_format)==0 ) 
					            {
					                _err_nom = json_format.nom[0];
					                $('#error-nom').text(_err_nom);
					            }

					            if (!("tel" in json_format)==0 ) 
					            {
					                _err_tel = json_format.tel[0];
					                $('#error-tel').text(_err_tel);

					            }
					            if (!("confirmation_tel" in json_format)==0 ) 
					            {
					                _err_confirmation_tel = json_format.confirmation_tel[0];
					                $('#error-confirmation_tel').text(_err_confirmation_tel);

					            }

					            if (!("adresse" in json_format)==0 ) 
					            {
					                _err_adresse = json_format.adresse[0];
					                $('#error-adresse').text(_err_adresse);
					            }

					            if (!("ville" in json_format)==0 ) 
					            {
					                _err_ville = json_format.ville[0];
					                $('#error-ville').text(_err_ville);
					            }
					            
					            console.log("error");
					       })
					       .always(function() {
					        console.log("complete");
					       });

		        		console.log("success");
		        	})
		        	.fail(function() {
		        		console.log("error");
		        	})
		        	.always(function() {
		        		console.log("complete");
		        	});
		        	
		            console.log("success");
		        })
		        .fail(function() {
		            console.log("error");
		        })
		        .always(function() {
		            console.log("complete");
		        });
		        	       
		    });
		</script>
		@endif
		
		<script type="text/javascript">
	    
	    $('#infodata').submit(function(event) {
	       event.preventDefault();
	        
	        
	        $('.lx-cart-next-step > button').attr('disabled', 'disabled').html("<img height='25px' src='{{ asset('img/loader.gif') }}' />");
	        
	       var _form =  $(this);
	       var _nom = $('#nom').val();
	       var _nom = $('#tel').val();
	       var _nom = $('#adresse').val();
	       var _nom = $('#ville').val();
	       var _email = $('#email').val();
	       var _email = $('#description').val();
	       $.ajax({
	       	headers: {

	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

		        },
	       	url: '{{ url("/envoyerdemmande")}}',
	       	type: 'POST',
	        data: _form.serialize(),
	       })
	       .done(function(data) {
	       	if (data== "1") {

		        $.ajax({
		            url: 'https://script.google.com/macros/s/AKfycbwLnso-upxvEHwTyZphLZFX8mJkDXRuIfRNa5aduuamfdXW1hHI/exec',
		            type: 'GET',
		            dataType: 'json',
		            data: _form.serialize(),
		        })
		        .done(function(data) {
		            window.location.href = '{{ url("/merci") }}';
		            console.log("success");
		            
		        })
		        .fail(function() {
		            console.log("error");
		        })
		        .always(function() {
		            console.log("complete");
		        });
	       	} 
	       	
	       	console.log("success");
	       })
	       .fail(function(xhr, status) {
	           $('.lx-cart-next-step > button').removeAttr('disabled').html("{{ __('msg.commander') }}");

	       		json_format = $.parseJSON(xhr.responseText);
	       		var _err_nom ="";
	       		var _err_adresse ="";
	       		var _err_tel ="";
	       		var _err_ville ="";
	       		var _confirmation_tel=""


	       		if (!("nom" in json_format)==0 ) 
	       		{
	       			_err_nom = json_format.nom[0];
	       			$('#error-nom').text(_err_nom);
	       		}

	       		if (!("tel" in json_format)==0 ) 
	       		{
	       			_err_tel = json_format.tel[0];
	       			$('#error-tel').text(_err_tel);

	       		}
	       		if (!("confirmation_tel" in json_format)==0 ) 
	       		{
	       			_err_confirmation_tel = json_format.confirmation_tel[0];
	       			$('#error-confirmation_tel').text(_err_confirmation_tel);

	       		}

	       		if (!("adresse" in json_format)==0 ) 
	       		{
	       			_err_adresse = json_format.adresse[0];
	       			$('#error-adresse').text(_err_adresse);
	       		}

	       		if (!("ville" in json_format)==0 ) 
	       		{
	       			_err_ville = json_format.ville[0];
	       			$('#error-ville').text(_err_ville);
	       		}
	            
	            console.log("error");
	       })
	       .always(function() {
	       	console.log("complete");
	       });
	       
	    });
	    
	    </script>