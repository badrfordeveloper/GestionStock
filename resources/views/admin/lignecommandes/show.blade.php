@extends('layouts.app')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Lignecommandes</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url(Config::get('constants.ADMIN_PATH')) }}">Tableau de Board</a>
                </li>
                 <li class="breadcrumb-item">
                    <a href="{{ url(Config::get('constants.ADMIN_PATH').'lignecommandes') }}">Lignecommandes</a>
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
                        <h5>Lignecommande</h5>
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
                                        <th>ID</th><td>{{ $lignecommande->id }}</td>
                                    </tr>
                                    <tr><th> Produit Id </th><td> {{ $lignecommande->produit_id }} </td></tr><tr><th> Commande Id </th><td> {{ $lignecommande->commande_id }} </td></tr><tr><th> Quantite </th><td> {{ $lignecommande->quantite }} </td></tr><tr><th> Prix Unite </th><td> {{ $lignecommande->prix_unite }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                         <a href="{{ url('/admin/lignecommandes/' . $lignecommande->id . '/edit') }}" title="Edit Lignecommande"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editer</button></a>


                        <div class="table-responsive" style="display:inline">

                        <form method="POST" action="{{ url('admin/lignecommandes' . '/' . $lignecommande->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Lignecommande" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
