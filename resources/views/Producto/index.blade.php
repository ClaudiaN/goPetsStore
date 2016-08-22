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

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Descripcion</th>
            <th>Peso</th>
            <th>Medida</th>
            <th width="280px">Acción</th>
        </tr>
    @foreach ($productos as $key => $producto)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $producto->descripcion }}</td>
        <td>{{ $producto->peso }}</td>
        <td>{{ $producto->medida }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('producto.show',$producto->id_producto) }}">Ver</a>
            <a class="btn btn-primary" href="{{ route('producto.edit',$producto->id_producto) }}">Editar</a>
            {!! Form::open(['method' => 'DELETE','route' => ['producto.destroy', $producto->id_producto],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!! $productos->render() !!}
</div>
@endsection