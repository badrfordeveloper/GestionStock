
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
                                    <tr><th> Date </th>
                                        <td> {{ $achat->date }} </td>
                                    </tr>
                                   <!--  <tr>
                                        <th> Total </th>
                                        <td> {{ $achat->total }} </td>
                                    </tr>
                                    <tr>
                                        <th> Facture </th>
                                        <td> {{ $achat->facture }} </td>
                                    </tr> -->
                                    <tr>
                                        <th> Fournisseur </th>
                                        <td> {{ $achat->user->nom .' '.$achat->user->prenom }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table id="products" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Produit</th>
                                            <!-- <th>Prix unitaire</th>
                                            <th>Current Prix</th> -->
                                            <th>Quantité</th>
                                          <!--   <th>Current Quantité</th>
                                            <th>Total</th> -->
                                           <!--  <th>supprimer</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                       <!--      <th></th>
                                            <th></th>
                                            <th>Total General</th>
                                            <th id="Total">0</th> -->
                                         <!--    <th></th> -->

                                        </tr>
                                        
                                    </tfoot>
                                </table>
                            </div>
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

<script>      
   $( function() {
     function onEditMode(){

            myproduct = @json($achat_produit);

            for (var i in myproduct) { 
                    var myclass=""
                    var mysrc="{{ asset('storage/') }}/"+myproduct[i].image
                /*   if(myproduct[i].quantite>myproduct[i].StockQuantite){
                        myclass="error"
                         $("#mysubmit").prop("disabled", true);
                    }
                    else if(myproduct[i].prix != myproduct[i].Currentprix){
                        myclass="warning"
                    }*/

                    // en V2  u have to check if the quantité change change the class  +  prix
                   /* myproduct[i].RQtte= myproduct[i].quantite;*/

              

           
            /*$( "#products tbody" ).append( "<tr class='"+myclass+"' data-id='"+myproduct[i].id+"'> <td>"+myproduct[i].nom+"</td><<td><input type='number' class='qtte' value='"+myproduct[i].RQtte+"' min='1'  max='200' /></td><td><button  type='button' class='supprimerRow'> delete </button></td></tr>" );*/
            $( "#products tbody" ).append( '<tr class="'+myclass+'" data-id="'+myproduct[i].id+'"><td><img src="'+mysrc+'" height="60px" alt=""></td>  <td>'+myproduct[i].nom+'</td><<td>'+myproduct[i].RQtte+'</td></tr>' );
            }
            console.log(myproduct);
         /*   refreshTotal();*/
            refreshQtte();
        }

        onEditMode();

    } );
</script>
