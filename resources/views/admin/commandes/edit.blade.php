@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
    .warning{
        background-color: yellow !important

    }
    .error{
        background-color: red !important

    }
    
</style>
@endsection

@section('content')

       <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Commandes</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url(Config::get('constants.ADMIN_PATH')) }}">Tableau de Board</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ url(Config::get('constants.ADMIN_PATH').'commandes') }}">Commandes</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editer</strong>
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
                    <div class="ibox-content">
                        <form method="PATCH" id="myForm" action="{{ url(Config::get('constants.ADMIN_PATH').'commandes/' . $commande->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.commandes.form', ['formMode' => 'edit'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')


 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 <script>
    $( function() {

        var myproduct=[];




        //autocomplete
        $( "#project" ).autocomplete({
          minLength: 0,
          source: function (request, response) {
                $.ajax({
                   headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    data: {
                        term: request.term
                    },
                    url: '{{ url("getProducts") }}',
                })
                  .done(function(data) {
                       response(data);
                })
                  .fail(function() {
                      console.log("error");
                })
                  .always(function() {
                      console.log("complete");
                });
            },
          select: function( event, ui ) {
            var flag=true;

            //Check if product already exict in table
           for (var i in myproduct) {
                 if (myproduct[i].id == ui.item.id) {
                   flag=false;
                 }
            }

            if(flag){
                    var myclass=""
                    var mysrc="{{ asset('storage/') }}/"+ui.item.image

                    if(ui.item.quantite<1){
                        myclass="error"
                         $("#mysubmit").prop("disabled", true);
                    } else if(ui.item.prix != ui.item.Currentprix){
                        myclass="warning"
                    }
                        

                     ui.item.RQtte = 1;
    
                    $( "#products tbody" ).append( '<tr class="'+myclass+'" data-id="'+ui.item.id+'"><td><img src="'+mysrc+'" height="60px" alt=""></td> <td>'+ui.item.nom+'</td><td class="prix">'+ui.item.prix+'</td><td>'+ui.item.Currentprix+'</td><td><input type="number" class="qtte" value="'+ui.item.RQtte+'" min="1"  max="50" /></td><td>'+ui.item.StockQuantite+'</td><td class="total">'+ui.item.prix+'</td><td><button  type="button" class="supprimerRow"> delete </button></td></tr>' );

                    $( "#project-id" ).val( ui.item.nom );
                    $( "#project-description" ).html( ui.item.description );

                    myproduct.push(ui.item);
                    refreshTotal();
                    console.log(myproduct);
                    refreshQtte();
            }
            $( "#project" ).val("");
             return false;

          }
        })
        .autocomplete( "instance" )._renderItem = function( ul, item ) {
          return $( "<li>" )
            .append( "<div>" + item.nom + "<br>" + item.id + "</div>" )
            .appendTo( ul );
        };


        refreshQtte();

        // when submit the form
        var frm = $('#myForm');

        frm.submit(function (e) {

            e.preventDefault();

           $.ajax({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: frm.attr('method'),
                url: frm.attr('action'),
                data:{
                    myproduct : myproduct,
                    mydata:frm.serializeArray()
                } ,
                success: function (data) {
                    window.location.href = "{{ url(Config::get('constants.ADMIN_PATH').'commandes')}}";

                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            });
        });

        //check qtte to disable button when the product off from stock
        function checkProductQtte(){
               for (var i in myproduct) {
                    if (myproduct[i].RQtte > myproduct[i].StockQuantite) {
                       $("#mysubmit").prop("disabled", true);
                        break; //Stop this loop, we found it!
                     }else{
                           $("#mysubmit").prop("disabled", false);
                     } 
                }
        }

        // calculer total
        function refreshTotal(){
            var total=0;
               for (var i in myproduct) {
                total+=myproduct[i].RQtte*myproduct[i].prix;
                }
                 $("#Total").html(total);
        }

        function refreshQtte(){
            //quantite change
            $(".qtte").each(function() {

                $( this ).bind('change', function (e) {
                    var id =$( this ).parent().parent().attr("data-id");
                    var qtte=$( this ).val();

                    for (var i in myproduct) {
                        if (myproduct[i].id == id) {
                             console.log( $( this ).parent().parent().hasClass('error'));
                            if(qtte > myproduct[i].StockQuantite){
                                $( this ).parent().parent().addClass('error');
                                $("#mysubmit").prop("disabled", true);

                            }else if(qtte <= myproduct[i].StockQuantite &&  $( this ).parent().parent().hasClass('error') ){
                                console.log("tets");
                                        $( this ).parent().parent().removeClass( "error" )
                            }
                            myproduct[i].RQtte = qtte;
                            break; //Stop this loop, we found it!
                         }
                    }

                    checkProductQtte();
                    refreshTotal();

                    var prix= $( this ).parent().parent().find(".prix").html();
                    
                    var total=prix*qtte;
                    $( this ).parent().parent().find(".total").html(total);
                     console.log(myproduct);


                });
            });


            //deleteRow of table product  
            $(".supprimerRow").each(function() {

                $( this ).bind('click', function (e) {

                    var id =$( this ).parent().parent().attr("data-id");

                    myproduct =   $.grep(myproduct, function(e){ 
                         return e.id != id; 
                    });
                 
                    $( this ).parent().parent().remove();

                     checkProductQtte();
                     refreshTotal();
                 
                });
            });
        }

        function onEditMode(){

            myproduct = @json($commande_produit);

            for (var i in myproduct) { 
                    var myclass=""
                    var mysrc="{{ asset('storage/') }}/"+myproduct[i].image


                   if(myproduct[i].quantite>myproduct[i].StockQuantite){
                        myclass="error"
                         $("#mysubmit").prop("disabled", true);
                    }
                    else if(myproduct[i].prix != myproduct[i].Currentprix){
                        myclass="warning"
                    }

                    // en V2  u have to check if the quantité change change the class  +  prix
                    myproduct[i].RQtte= myproduct[i].quantite;

           
            $( "#products tbody" ).append( '<tr class="'+myclass+'" data-id="'+myproduct[i].id+'"><td><img src="'+mysrc+'" height="60px" alt=""></td> <td>'+myproduct[i].nom+'</td><td class="prix">'+myproduct[i].prix+'</td><td>'+myproduct[i].Currentprix+'</td><td><input type="number" class="qtte" value="'+myproduct[i].RQtte+'" min="1"  max="50" /></td><td>'+myproduct[i].StockQuantite+'</td><td class="total">'+myproduct[i].prix*myproduct[i].RQtte+'</td><td><button  type="button" class="supprimerRow"> delete </button></td></tr>' );
            }
            console.log(myproduct);
            refreshTotal();
            refreshQtte();
        }

        onEditMode();

    } );
</script>
@endsection
