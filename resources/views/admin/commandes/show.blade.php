
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Commande</h5>
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
                                        <th>ID</th><td>{{ $commande->id }}</td>
                                    </tr>
                                    <tr><th> Date </th><td> {{ $commande->date }} </td></tr><tr><th> Total </th><td> {{ $commande->total }} </td></tr><tr><th> Status </th><td> {{ $commande->status }} </td></tr><tr><th> Client </th><td> {{ $commande->user->nom.' '. $commande->user->prenom }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table id="products" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Produit</th>
                                            <th>Prix unitaire</th>
                                            <th>Current Prix</th>
                                            <th>Quantité</th>
                                            <th>Current Quantité</th>
                                            <th>Total</th>
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
                                            <th>Total General</th>
                                            <th id="Total">0</th>
                                       

                                        </tr>
                                        
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                         <a href="{{ url('/admin/commandes/' . $commande->id . '/edit') }}" title="Edit Commande"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editer</button></a>


                    <!--     <div class="table-responsive" style="display:inline">

                        <form method="POST" action="{{ url('admin/commandes' . '/' . $commande->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Commande" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                        </form>

                    </div> -->
                </div>
            </div>
        </div>
    </div>



<script>
   $( function() {

        function refreshTotal(){
            var total=0;
               for (var i in myproduct) {
                total+=myproduct[i].RQtte*myproduct[i].prix;
                }
                 $("#Total").html(total);
        }

           function onEditMode(){

            myproduct = @json($commande_produit);

            for (var i in myproduct) { 
                    var myclass=""
                   if(myproduct[i].quantite>myproduct[i].StockQuantite){
                        myclass="error"
                         $("#mysubmit").prop("disabled", true);
                    }
                    else if(myproduct[i].prix != myproduct[i].Currentprix){
                        myclass="warning"
                    }

                    // en V2  u have to check if the quantité change change the class  +  prix
                    myproduct[i].RQtte= myproduct[i].quantite;

           
            $( "#products tbody" ).append( "<tr class='"+myclass+"' data-id='"+myproduct[i].id+"'> <td>"+myproduct[i].nom+"</td><td class='prix'>"+myproduct[i].prix+"</td><td>"+myproduct[i].Currentprix+"</td><td>"+myproduct[i].RQtte+"</td><td>"+myproduct[i].StockQuantite+"</td><td class='total'>"+myproduct[i].prix*myproduct[i].RQtte+"</td></tr>" );
            }
            console.log(myproduct);
            refreshTotal();
            /*refreshQtte();*/
        }

        onEditMode();

    } );
</script>

