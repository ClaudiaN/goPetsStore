@extends('layouts.app')
<style type="text/css">
    
    .drop_uploader.drop_zone {
    width: 100%;
    min-height: 100px;
    text-align: center;
    border: 3px dashed #999999;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    margin: 10px 0;
}

.drop_uploader.drop_zone.hover {
    border: 3px dashed #4A90E2;
}

.drop_uploader.drop_zone .text_wrapper {
    margin-top: 30px;
}

.drop_uploader.drop_zone .text_wrapper i {
    font-size: 50px;
    color: #9B9B9B;
    position: relative;
    top: 14px;
    margin-right: 25px;
}

.drop_uploader.drop_zone .text {
    font-family: "Raleway";
    font-size: 24px;
    color: #9B9B9B;
}

.drop_uploader.drop_zone ul.files {
    width: 90%;
    margin: 0 auto;
    text-align: left;
    list-style: none;
    margin: 10px auto 35px;
}

.drop_uploader.drop_zone ul.files li {
    font-family: "Raleway";
    font-size: 18px;
    color: #000000;
    background-color: #f5f5f5;
    border-top: 2px solid #f5f5f5;
    border-bottom: 2px solid #f5f5f5;
    margin: 0;
    padding: 5px;
}

.drop_uploader.drop_zone ul.files.thumb {
    width: 90%;
    text-align: left;
    list-style: none;
    margin-bottom: 35px;
    overflow: auto;
}

.drop_uploader.drop_zone ul.files.thumb li {
    width: 110px;
    display: inline-block;
    float: left;
    font-family: "Raleway";
    font-size: 18px;
    color: #000000;
    background-color: transparent;
    border: none;
    margin: 0;
    padding: 5px 15px;
    text-align: center;
}

.drop_uploader.drop_zone ul.files.thumb li div.thumbnail {
    width: 200px;
    height: 200px;
    border-radius: 8px 8px 8px 8px;
    -moz-border-radius: 8px 8px 8px 8px;
    -webkit-border-radius: 8px 8px 8px 8px;
    background-size: cover;
    margin: 0 auto;
    border: 1px solid #e1e1e1;
}

.drop_uploader.drop_zone ul.files.thumb li div.thumbnail i {
    font-size: 48px;
    position: relative;
    top: calc(50% - 24px);
    color: #999999;
}

.drop_uploader.drop_zone ul.files.thumb li span.title {
    width: 110px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: inline-block;
}

.drop_uploader.drop_zone ul.files li:nth-child(even) {
    background-color: transparent;
}

.drop_uploader.drop_zone ul.files li i {
    font-size: 20px;
    position: relative;
    top: 2px;
    margin: 0px 10px;
}

.drop_uploader.drop_zone .errors p {
    color: #FF0000;
}

.drop_uploader.drop_zone input[type=file] {
    display: none;
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
}
.btn-primary{
   background-color: #B9F700;
    border-color: #2e6da4;
}
</style>
@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h2>Editar producto</h2>
            <hr size="1">
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Hoops!</strong> Hay problemas con los datos que introdujo.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   <div id="notificacionImgArticulo"></div>
   {!! Form::open(array('method'=>'POST','route' => ['producto.update', $item->id],'enctype'=>'multipart/form-data')) !!}
    <div class="row">
      <div class="col-sm-6">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <hidden name="estado" id="estado" value="Activo"/> 
                <strong>Descripción:</strong>
                 {!! Form::text('descripcion', $item->descripcion, array('class' => 'form-control ', 'id'=>'descripcion')) !!}
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Color:</strong>
                    <select id="idColor" name="idColor" class="form-control">
                    <?php foreach($list_colores as $color){  ?>
                    <option value="<?= $color->idColor; ?>" <?php if($color->idColor==$item->idColor) echo 'selected';?>> <?= $color->descriColor; ?> </option>    
                    <?php } ?>           
                    </select>
            </div>                   
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Talla:</strong>
                    <select id="idTalla" name="idTalla" class="form-control">
                    <?php foreach($list_tallas as $talla){  ?>
                    <option value="<?= $talla->idTalla; ?>" <?php if($talla->idTalla==$item->idTalla) echo 'selected';?>> <?= $talla->descriTalla; ?> </option>    
                    <?php } ?>           
                    </select>
            </div>                   
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Peso:</strong>
                 {!! Form::text('peso', $itemDet->peso, array('placeholder' => 'Peso','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio de venta:</strong>
                 {!! Form::text('precioVenta', $itemDet->precioVenta, array('placeholder' => 'Precio de Venta','class' => 'form-control','required'=>'required')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio de Envio:</strong>
                 {!! Form::text('precioEnvio', $itemDet->precioEnvio, array('placeholder' => 'Precio de Envio','class' => 'form-control','required'=>'required')) !!}
            </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class=" col-xs-12" >
            <label for="apellido">Foto del producto (Formato: jpg) </label>
            <input type="file" class="form-control" id="file" name="file" required accept="image/*">
        </div>
       </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <hr size="1">
                <button type="submit" class="btn btn-primary">Enviar</button>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('producto.index') }}"> Regresar</a>
            </div>    
        </div>
        
    </div>
    {!! Form::close() !!}
</div>

@endsection

@section('scripts')
<script src="{{asset('js/drop_uploader.js')}}"></script>
<script type="text/javascript">
 function activarDescripcion()
  {
    if($( "#idProducto" ).val()=='y')
        {
            $("#divDescrip").show();
            $("#descripcion").attr("required", 'required');
            $("#descripcion").focus();
        } 
    else
       $("#divDescrip").hide();  
}
$("#divDescrip").hide();


$(document).ready(function(){
            $('input[type=file]').drop_uploader({
                uploader_text: 'Arrastre la imagen o ',
                browse_text: 'Seleccionela',
                browse_css_class: 'button button-primary',
                browse_css_selector: 'file_browse',
                uploader_icon: '<i class="pe-7s-cloud-upload"></i>',
                file_icon: '<i class="pe-7s-file"></i>',
                time_show_errors: 5,
                layout: 'thumbnails'
            });
        });

</script>
@endsection

