@extends('layouts.app')


@section('css')

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

       <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Projets</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url(Config::get('constants.ADMIN_PATH')) }}">Tableau de Board</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ url(Config::get('constants.ADMIN_PATH').'projets') }}">Projets</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editer</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
        </div>
    </div>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Projet</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="POST" action="{{ url(Config::get('constants.ADMIN_PATH').'projets/' . $projet->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.projets.form', ['formMode' => 'edit'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

<script type="text/javascript">
            $( ".select2" ).select2({
            maximumInputLength: 20 // only allow terms up to 20 characters long
        });
</script>
@endsection
