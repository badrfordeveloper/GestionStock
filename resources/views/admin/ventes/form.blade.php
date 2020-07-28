<div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="col-sm-2 col-form-label">{{ 'Date' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="date" type="datetime-local" id="date" value="{{ isset($vente->date) ? $vente->date : old('date')}}" >
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('etat') ? 'has-error' : ''}}">
    <label for="etat" class="col-sm-2 col-form-label">{{ 'Etat' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="etat" type="text" id="etat" value="{{ isset($vente->etat) ? $vente->etat : old('etat') }}" >

    {!! $errors->first('etat', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('commande_id') ? 'has-error' : ''}}">
    <label for="commande_id" class="col-sm-2 col-form-label">{{ 'Commande Id' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="commande_id" type="number" id="commande_id" value="{{ isset($vente->commande_id) ? $vente->commande_id : old('commande_id') }}" >

    {!! $errors->first('commande_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>





<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-primary btn-sm" type="submit">{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}</button>
    </div>
</div>

