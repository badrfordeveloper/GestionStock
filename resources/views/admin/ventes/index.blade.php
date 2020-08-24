 @extends('layouts.app')

 @section('css')

    <link href="{{ asset('assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    
@endsection

@section('content')


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Ventes</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url(Config::get('constants.ADMIN_PATH')) }}">Tableau de Board</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Ventes</strong>
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
                        <h5>Ventes</h5>
                        <div class="ibox-tools">
                            <a class="" href="{{ url(Config::get('constants.ADMIN_PATH').'ventes'.'/create') }}">
                                <i class="fa fa-plus"></i>
                            </a>

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>#</th><th>Date</th>
            <th>Etat</th>
            <th>Commande Id</th>
            <th><i class="fa fa-wrench"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ventes as $item)
                                    <tr class="gradeX">
                                      <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->date }}</td>
            <td>{{ $item->etat }}</td>
            <td>{{ $item->commande_id }}</td>
            


                                         <td class="text-center">

                                         <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Actions</button>
                                                <ul class="dropdown-menu">

                                                    @if($item->etat != "en retour")

                                                    <li>
                                                        <a class="dropdown-item" href="{{ url(Config::get('constants.ADMIN_PATH').'toRetour/'. $item->id) }}"><i class="fa fa-eye" aria-hidden="true"></i>A retourne</a>
                                                    </li>
                                                    @endif

                                                    <li>
                                                     <!--    <a class="dropdown-item" href="{{ url(Config::get('constants.ADMIN_PATH').'ventes/'. $item->id) }}" title="View Category"><i class="fa fa-eye" aria-hidden="true"></i> Voir</a> -->
                                                      <a class="dropdown-item show"   data-key="{{$item->id}}" href="#" title="View Category"><i class="fa fa-eye" aria-hidden="true"></i> Voir</a>
                                                    </li>

                                                    <li>
                                                        <a class="dropdown-item" href="{{ url(Config::get('constants.ADMIN_PATH').'ventes/' . $item->id . '/edit') }}" title="Edit Category"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editer</a>
                                                    </li>

                                                  <!--   <li>
                                                        <form method="POST" action="{{ url(Config::get('constants.ADMIN_PATH').'ventes' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="dropdown-item" title="Delete Vente" onclick="return confirm('Voulez vous vraiment supprimer ?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                                                        </form>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>   
                                    @endforeach                
                                </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th><th>Date</th>
            <th>Etat</th>
            <th>Commande Id</th>
            <th><i class="fa fa-wrench"></i></th>
                                </tr>
                            </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Model  -->

        <button style="display: none" id="mymodel" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

            </div>
          </div>
        </div>

    <!-- end Model -->

@endsection


@section('script')
    <!-- DataTables -->
    <script src="{{ asset('assets/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {
                        extend: 'excel',
                        text: 'Save current page',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    },
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            // Setup - add a text input to each footer cell
             $('.dataTables-example tfoot th').not('.dataTables-example tfoot th:first').not('.dataTables-example tfoot th:last').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" class="form-control" placeholder="Cherche '+title+'" />' );
            } );
         
            // DataTable
            var table = $('.dataTables-example').DataTable();
         
            // Apply the search
            table.columns().every( function () {
                var that = this;
         
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );

        });

    </script>

       <!-- script model  -->
     <script>
            $(".show").click(function(event) {

                var _key = $(this).attr('data-key');

                $.ajax({
                    url: "{{ url(Config::get('constants.ADMIN_PATH').'ventes/') }}"+'/'+_key,
                })
                .done(function(data) {

                $('.modal-content').html(data);            
                $('#mymodel').trigger('click');
                    console.log(data);
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            });

     </script>
@endsection
