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
    <label class="col-sm-2 col-form-label">Client</label>

    <div class="col-sm-10">
        <select  class="select2 form-control custom-select" id="user_id" name="user_id" style="width: 100%; height:36px;">
                    <option value="" selected>Selectionnez</option>
                    @if(count($clients))
                        @foreach($clients as $obj)
                            <option value="{{ $obj->id }}"  @if(isset($commande->user_id) && $commande->user_id== $obj->id )selected @endif>{{ $obj->nom .' '.$obj->prenom }}</option>
                        @endforeach
                    @endif
        </select>

        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-primary btn-sm" type="submit">{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}</button>
    </div>
</div>

