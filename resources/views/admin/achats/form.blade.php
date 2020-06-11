<div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="col-sm-2 col-form-label">{{ 'Date' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="date" type="datetime-local" id="date" value="{{ isset($achat->date) ? $achat->date : old('date')}}" >
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('etat') ? 'has-error' : ''}}">
    <label for="etat" class="col-sm-2 col-form-label">{{ 'Etat' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="etat" type="text" id="etat" value="{{ isset($achat->etat) ? $achat->etat : old('etat') }}" >

    {!! $errors->first('etat', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-sm-2 col-form-label">{{ 'User Id' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($achat->user_id) ? $achat->user_id : old('user_id') }}" >

    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-primary btn-sm" type="submit">{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}</button>
    </div>
</div>

