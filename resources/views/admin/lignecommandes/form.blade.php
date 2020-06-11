<div class="form-group row {{ $errors->has('produit_id') ? 'has-error' : ''}}">
    <label for="produit_id" class="col-sm-2 col-form-label">{{ 'Produit Id' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="produit_id" type="number" id="produit_id" value="{{ isset($lignecommande->produit_id) ? $lignecommande->produit_id : old('produit_id') }}" >

    {!! $errors->first('produit_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('commande_id') ? 'has-error' : ''}}">
    <label for="commande_id" class="col-sm-2 col-form-label">{{ 'Commande Id' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="commande_id" type="number" id="commande_id" value="{{ isset($lignecommande->commande_id) ? $lignecommande->commande_id : old('commande_id') }}" >

    {!! $errors->first('commande_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('quantite') ? 'has-error' : ''}}">
    <label for="quantite" class="col-sm-2 col-form-label">{{ 'Quantite' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="quantite" type="number" id="quantite" value="{{ isset($lignecommande->quantite) ? $lignecommande->quantite : old('quantite') }}" >

    {!! $errors->first('quantite', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('prix_unite') ? 'has-error' : ''}}">
    <label for="prix_unite" class="col-sm-2 col-form-label">{{ 'Prix Unite' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="prix_unite" type="number" id="prix_unite" value="{{ isset($lignecommande->prix_unite) ? $lignecommande->prix_unite : old('prix_unite') }}" >

    {!! $errors->first('prix_unite', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-primary btn-sm" type="submit">{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}</button>
    </div>
</div>

