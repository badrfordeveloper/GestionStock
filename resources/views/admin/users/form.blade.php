<div class="form-group row {{ $errors->has('nom') ? 'has-error' : ''}}">
    <label for="nom" class="col-sm-2 col-form-label">{{ 'Nom' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="nom" type="text" id="nom" value="{{ isset($user->nom) ? $user->nom : old('nom') }}" >

    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('prenom') ? 'has-error' : ''}}">
    <label for="prenom" class="col-sm-2 col-form-label">{{ 'Prenom' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="prenom" type="text" id="prenom" value="{{ isset($user->prenom) ? $user->prenom : old('prenom') }}" >

    {!! $errors->first('prenom', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-sm-2 col-form-label">{{ 'Email' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="email" type="text" id="email" value="{{ isset($user->email) ? $user->email : old('email') }}" >

    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="col-sm-2 col-form-label">{{ 'Password' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="password" type="text" id="password" value="{{ isset($user->password) ? $user->password : old('password') }}" >

    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('tel') ? 'has-error' : ''}}">
    <label for="tel" class="col-sm-2 col-form-label">{{ 'Tel' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="tel" type="text" id="tel" value="{{ isset($user->tel) ? $user->tel : old('tel') }}" >

    {!! $errors->first('tel', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('adresse') ? 'has-error' : ''}}">
    <label for="adresse" class="col-sm-2 col-form-label">{{ 'Adresse' }}</label>
	<div class="col-sm-10">
    	<textarea class="form-control" rows="5" name="adresse" type="textarea" id="adresse" >{{ isset($user->adresse) ? $user->adresse : old('adresse')}}</textarea>
    {!! $errors->first('adresse', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('societe') ? 'has-error' : ''}}">
    <label for="societe" class="col-sm-2 col-form-label">{{ 'Societe' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="societe" type="text" id="societe" value="{{ isset($user->societe) ? $user->societe : old('societe') }}" >

    {!! $errors->first('societe', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('type_id') ? 'has-error' : ''}}">
    <label for="type_id" class="col-sm-2 col-form-label">{{ 'Type Id' }}</label>
	<div class="col-sm-10">
    	<input class="form-control" name="type_id" type="number" id="type_id" value="{{ isset($user->type_id) ? $user->type_id : old('type_id') }}" >

    {!! $errors->first('type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-primary btn-sm" type="submit">{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}</button>
    </div>
</div>

