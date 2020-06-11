<div class="form-group row {{ $errors->has('nom') ? 'has-error' : ''}}">
    <label for="nom" class="col-sm-2 col-form-label">{{ 'Nom' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="nom" type="text" id="nom" value="{{ isset($produit->nom) ? $produit->nom : old('nom') }}" >

    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-sm-2 col-form-label">{{ 'Description' }}</label>
	<div class="col-sm-10">
    	<textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($produit->description) ? $produit->description : old('description')}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="col-sm-2 col-form-label">{{ 'Image' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="image" type="text" id="image" value="{{ isset($produit->image) ? $produit->image : old('image') }}" >

    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('prix') ? 'has-error' : ''}}">
    <label for="prix" class="col-sm-2 col-form-label">{{ 'Prix' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="prix" type="number" id="prix" value="{{ isset($produit->prix) ? $produit->prix : old('prix') }}" >

    {!! $errors->first('prix', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('qunatite') ? 'has-error' : ''}}">
    <label for="qunatite" class="col-sm-2 col-form-label">{{ 'Qunatite' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="qunatite" type="number" id="qunatite" value="{{ isset($produit->qunatite) ? $produit->qunatite : old('qunatite') }}" >

    {!! $errors->first('qunatite', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('categorie_id') ? 'has-error' : ''}}">
    <label for="categorie_id" class="col-sm-2 col-form-label">{{ 'Categorie Id' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="categorie_id" type="number" id="categorie_id" value="{{ isset($produit->categorie_id) ? $produit->categorie_id : old('categorie_id') }}" >

    {!! $errors->first('categorie_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-primary btn-sm" type="submit">{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}</button>
    </div>
</div>

