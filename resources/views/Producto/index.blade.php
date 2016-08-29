@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Productos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('producto.create') }}"> Registrar nuevo producto</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-condensed table-responsive">
        <tr>
            <th>No</th>
            <th>Descripcion</th>
            <th>Color</th>
            <th>Talla</th>
            <th>Estado</th>
            <th></th>
            <th width="220px">Acción</th>
        </tr>
    @foreach ($productos as $key => $producto)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $producto->descripcion }}</td>
        <td>{{ $producto->descriColor }}</td>
        <td>{{ $producto->descriTalla }}</td>
        <td>{{ $producto->estado }}</td>
        <td align="center"><img src="../storage/fotosProductos/<?=$producto->id.$producto->ruta;?>" width="50" height="50" class="img-rounded"></td>
        <td align="center">
            <a class="btn btn-info" href="{{ route('producto.show',$producto->id) }}">Ver</a>
            <a class="btn btn-primary" href="{{ route('producto.edit',$producto->id) }}">Editar</a>
            {!! Form::open(['method' => 'DELETE','route' => ['producto.destroy', $producto->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


</div>
@endsection