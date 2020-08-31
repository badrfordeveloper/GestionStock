<div class="form-group row {{ $errors->has('libelle') ? 'has-error' : ''}}">
    <label for="libelle" class="col-sm-2 col-form-label">{{ 'Libelle' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="libelle" type="text" id="libelle" value="{{ isset($type->libelle) ? $type->libelle : old('libelle') }}" >

    {!! $errors->first('libelle', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<table class="table">
    @foreach($accestable as $at)
    <tr>
        <th>{{ ucfirst($at->table) }}</th>
        @foreach($acces as $ac)
        @if($ac->table == $at->table)
	        @if( @in_array($ac->id,$accesByRole) )
	        <td class="text-center">
	            <div class="custom-control custom-checkbox mr-sm-2">
	                <input type="checkbox" checked name="acces[]" class="custom-control-input" id="customControlAutosizing{{$ac->id}}"  value="{{$ac->id}}"  >
	                <label class="custom-control-label" for="customControlAutosizing{{$ac->id}}"> {{ ucfirst($ac->action) }}</label>
	            </div>
	         </td>
	         @else
	         <td class="text-center">
	            <div class="custom-control custom-checkbox mr-sm-2">
	                <input type="checkbox" name="acces[]" class="custom-control-input" id="customControlAutosizing{{$ac->id}}"  value="{{$ac->id}}"  >
	                <label class="custom-control-label" for="customControlAutosizing{{$ac->id}}"> {{ ucfirst($ac->action) }}</label>
	            </div>
	         </td>
	         @endif

        @endif
        @endforeach
    </tr>
    @endforeach
</table>


<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-primary btn-sm" type="submit">{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}</button>
    </div>
</div>

