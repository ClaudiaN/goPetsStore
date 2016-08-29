@extends('layouts.app')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Producto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('producto.index') }}"> Regresar</a>
            </div>
        </div>
    </div>

    <div class="row">

               <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $item->descripcion }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                {{ $item->estado }}
            </div>
        </div>

    </div>

@endsection