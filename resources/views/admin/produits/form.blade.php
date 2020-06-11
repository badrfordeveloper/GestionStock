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
<!-- <div class="form-group row {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="col-sm-2 col-form-label">{{ 'Image' }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="image" type="text" id="image" value="{{ isset($produit->image) ? $produit->image : old('image') }}" >

    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->

<div class="form-group row {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="col-sm-2 col-form-label">{{ 'Image' }}</label>
    <div class="col-sm-10">
         <div class="custom-file">
            <input id="image" name="image" type="file" class="custom-file-input">
            <label for="image" class="custom-file-label">Selectionez une image...</label>
        </div> 
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
<div class="form-group row {{ $errors->has('quantite') ? 'has-error' : ''}}">
    <label for="quantite" class="col-sm-2 col-form-label">{{ 'Quantite' }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="quantite" type="number" id="quantite" value="{{ isset($produit->quantite) ? $produit->quantite : old('quantite') }}" >

    {!! $errors->first('quantite', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('categorie_id') ? 'has-error' : ''}}">
    <label class="col-sm-2 col-form-label">Categorie</label>

    <div class="col-sm-10">
        <select  class="select2 form-control custom-select" id="categorie_id" name="categorie_id" style="width: 100%; height:36px;">
                    <option value="" selected>Selectionnez</option>
                    @if(count($categories))
                        @foreach($categories as $obj)
                            <option value="{{ $obj->id }}"  @if(isset($produit->categorie_id) && $produit->categorie_id== $obj->id )selected @endif>{{ $obj->libelle }}</option>
                        @endforeach
                    @endif
        </select>

        {!! $errors->first('categorie_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-primary btn-sm" type="submit">{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}</button>
    </div>
</div>

