<div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="col-sm-2 col-form-label">{{ 'Date' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="date" type="datetime-local" id="date" value="{{ isset($retour->date) ? $retour->date : old('date')}}" >
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('vente_id') ? 'has-error' : ''}}">
    <label for="vente_id" class="col-sm-2 col-form-label">{{ 'Vente Id' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="vente_id" type="number" id="vente_id" value="{{ isset($retour->vente_id) ? $retour->vente_id : old('vente_id') }}" >

    {!! $errors->first('vente_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-primary btn-sm" type="submit">{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}</button>
    </div>
</div>

