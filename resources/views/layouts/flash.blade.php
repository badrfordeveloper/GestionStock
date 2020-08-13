@if(session()->has('success'))
<div class="container" id="msgSuccess">
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
		</div>
	</div>
</div>
@else
<div class="container hide" id="msgSuccess">
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
		</div>
	</div>
</div>
@endif

@if(session()->has('erreurs'))
<div class="container" id="msgError">
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-warning" role="alert">{{ session()->get('erreurs') }}</div>
		</div>
	</div>
</div>
@else
<div class="container hide" id="msgError">
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-warning" role="alert">{{ session()->get('erreurs') }}</div>
		</div>
	</div>
</div>
@endif