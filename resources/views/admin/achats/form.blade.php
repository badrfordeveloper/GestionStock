<div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="col-sm-2 col-form-label">{{ 'Date' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="date" type="datetime-local" id="date" value="{{ isset($achat->date) ? $achat->date : old('date')}}" >
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('total') ? 'has-error' : ''}}">
    <label for="total" class="col-sm-2 col-form-label">{{ 'Total' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="total" type="text" id="total" value="{{ isset($achat->total) ? $achat->total : old('total') }}" >

    {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('facture') ? 'has-error' : ''}}">
    <label for="facture" class="col-sm-2 col-form-label">{{ 'Facture' }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="facture" type="text" id="facture" value="{{ isset($achat->facture) ? $achat->facture : old('facture') }}" >

    {!! $errors->first('facture', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label class="col-sm-2 col-form-label">Fournisseur</label>

    <div class="col-sm-10">
        <select  class="select2 form-control custom-select" id="user_id" name="user_id" style="width: 100%; height:36px;">
                    <option value="" selected>Selectionnez</option>
                    @if(count($fournisseurs))
                        @foreach($fournisseurs as $obj)
                            <option value="{{ $obj->id }}"  @if(isset($achat->user_id) && $achat->user_id== $obj->id )selected @endif>{{ $obj->nom .' '.$obj->prenom }}</option>
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

