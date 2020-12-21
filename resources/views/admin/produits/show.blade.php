@extends('layouts.app') @section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Produits</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url(Config::get('constants.ADMIN_PATH')) }}">Tableau de Board</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url(Config::get('constants.ADMIN_PATH').'produits') }}">Produits</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Voir</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Produit</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content text-center">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $produit->id }}</td>
                                </tr>
                                <tr>
                                    <th>Nom</th>
                                    <td>{{ $produit->nom }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $produit->description }}</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td>{{ $produit->image }}</td>
                                </tr>
                                 <tr>
                                    <th>P.Achat</th>
                                    <td>{{ $produit->prix_Achat }}</td>
                                </tr>
                                <tr>
                                    <th>Prix</th>
                                    <td>{{ $produit->prix }}</td>
                                </tr>
                                <tr>
                                    <th>Quantite</th>
                                    <td>{{ $produit->quantite }}</td>
                                </tr>
                                <tr>
                                    <th>Categorie Id</th>
                                    <td>{{ $produit->categorie_id }}</td>
                                </tr>

                                  <tr>
                                    <th>Landing page</th>
                                    <td>{{ $produit->landingPage }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <a href="{{ url('/admin/produits/' . $produit->id . '/edit') }}" title="Edit Produit">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editer</button>
                    </a>

                    <div class="table-responsive" style="display: inline;">
                        <form method="POST" action="{{ url('admin/produits' . '/' . $produit->id) }}" accept-charset="UTF-8" style="display: inline;">
                            {{ method_field('DELETE') }} {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Produit" onclick='return confirm("Confirm delete?")'><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
