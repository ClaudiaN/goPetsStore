@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Nuevo producto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('producto.index') }}"> Regresar</a>
            </div>
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

   {!! Form::open(array('route' => 'producto.store','method'=>'POST')) !!}
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                 {!! Form::text('descripcion', null, array('placeholder' => 'descripcion','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Peso:</strong>
                 {!! Form::text('peso', null, array('placeholder' => 'peso','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Medida:</strong>
                 {!! Form::text('medida', null, array('placeholder' => 'medida','class' => 'form-control')) !!}
            </div>
        </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                 {!! Form::text('estado', null, array('placeholder' => 'estado','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>

    </div>
    {!! Form::close() !!}

@endsection