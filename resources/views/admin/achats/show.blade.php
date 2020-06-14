@extends('layouts.app')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Achats</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url(Config::get('constants.ADMIN_PATH')) }}">Tableau de Board</a>
                </li>
                 <li class="breadcrumb-item">
                    <a href="{{ url(Config::get('constants.ADMIN_PATH').'achats') }}">Achats</a>
                </li>
                  <li class="breadcrumb-item active">
                    <strong>Voir</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Achat</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content  text-center">

                       

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $achat->id }}</td>
                                    </tr>
                                    <tr><th> Date </th><td> {{ $achat->date }} </td></tr><tr><th> Total </th><td> {{ $achat->total }} </td></tr><tr><th> Facture </th><td> {{ $achat->facture }} </td></tr><tr><th> Fournisseur </th><td> {{ $achat->user->nom .' '.$achat->user->prenom }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                         <a href="{{ url('/admin/achats/' . $achat->id . '/edit') }}" title="Edit Achat"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editer</button></a>


                        <div class="table-responsive" style="display:inline">

                        <form method="POST" action="{{ url('admin/achats' . '/' . $achat->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Achat" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
