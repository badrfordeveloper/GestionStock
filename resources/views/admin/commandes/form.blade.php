<div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="col-sm-2 col-form-label">{{ 'Date' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="date" type="datetime-local" id="date" value="{{ isset($commande->date) ? $commande->date : old('date')}}" >
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('total') ? 'has-error' : ''}}">
    <label for="total" class="col-sm-2 col-form-label">{{ 'Total' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="total" type="number" id="total" value="{{ isset($commande->total) ? $commande->total : old('total') }}" >

    {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-sm-2 col-form-label">{{ 'Status' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="status" type="text" id="status" value="{{ isset($commande->status) ? $commande->status : old('status') }}" >

    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-sm-2 col-form-label">{{ 'User Id' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($commande->user_id) ? $commande->user_id : old('user_id') }}" >

    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-primary btn-sm" type="submit">{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}</button>
    </div>
</div>

