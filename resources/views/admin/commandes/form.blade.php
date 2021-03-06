<div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="col-sm-2 col-form-label">{{ 'Date' }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="date" type="datetime-local" id="date" value="{{ isset($commande->date) ?  \Carbon\Carbon::parse($commande->date)->toDatetimelocalString() : ''}}">
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
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
    <label for="project" class="col-sm-2 col-form-label">Produit</label>
    <div class="col-sm-10">
        <input class="form-control"  id="project"  >
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table id="products" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Current Prix</th>
                    <th>Quantité</th>
                    <th>Current Quantité</th>
                    <th>Total</th>
                    <th>supprimer</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                     <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total General</th>
                    <th id="Total">0</th>
                    <th></th>

                </tr>
                
            </tfoot>
        </table>
    </div>
</div>



<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-primary btn-sm" id="mysubmit" type="submit">{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}</button>
    </div>
</div>

