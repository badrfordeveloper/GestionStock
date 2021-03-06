@extends('layouts.app')


@section('css')
<!-- css for Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
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
                    <strong>Nouveau</strong>
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
                        <h5>Produits</h5>
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
                        <form method="POST" action="{{ url(Config::get('constants.ADMIN_PATH').'produits') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.produits.form', ['formMode' => 'create'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<!-- to show name file  in input file (file u selected) -->

<script type="text/javascript">
    $('.custom-file-input').on('change', function() {
       let fileName = $(this).val().split('\\').pop();
       $(this).next('.custom-file-label').addClass("selected").html(fileName);
    }); 
</script>


<!-- script for Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="text/javascript">
            $( ".select2" ).select2({
            maximumInputLength: 20 // only allow terms up to 20 characters long
        });
</script>

<script type="text/javascript">
      $(function() {
        $(".uploadFile").on("change", function() {
          _imgFile = $(this);
          var files = !!this.files ? this.files : [];
          if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

          if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() { // set image data as background of div
              _imgFile.prev().text("").css("background-image", "url(" + this.result + ")").parent().find('.icon-close').show();
            }
          }
        });

        $('.imagePreview').click(function() {
          $(this).next().trigger('click');
        });

        $('a.icon-close').click(function(event) {
          event.preventDefault();
          var _icon_close = $(this);
          var _url="";
          if ($(this).attr('data-img')=="true") {
            _url='{{ url("admin/delete-main-image")."/" }}';
          } else {
             _url='{{ url("admin/delete-image")."/" }}';
          }

          if ($(this).attr('data-img')) 
          {
             var _id_img = $(this).attr('data-img');
             if(confirm("Voulez vous vraiment supprimer cette image") == true)
             {
                $.ajax({
                  url:  _url+_id_img,
                })
                .done(function() {

                  _icon_close.parent().find('.imagePreview').css('background-image', 'none').text('Selectionnez image');
                  var _input = _icon_close.parent().find('.uploadFile');
                  _input.replaceWith(_input.val('').clone(true));
                  _icon_close.hide();

                  alert("Image supprimé avec success !")
                  console.log("success");
                })
                .fail(function() {
                  console.log("error");
                })
                .always(function() {
                  console.log("complete");
                });
                
             }
          } 
          else 
          {
            $(this).parent().find('.imagePreview').css('background-image', 'none').text('Selectionnez image');

            var _input = $(this).parent().find('.uploadFile');
            _input.replaceWith(_input.val('').clone(true));
            $(this).hide();
          }

          });
      });
</script>
@endsection
