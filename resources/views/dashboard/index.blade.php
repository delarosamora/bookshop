@extends('base')

@section('content')
<h2 class="mt-3 mb-3 text-center">{{Auth::user()->name}} {{Auth::user()->surname}}{{Auth::user()->admin ? " - TRABAJADOR" : ""}}</h2>
@if ($message = Session::get('success'))
    <div class="alert alert-success w-50 m-auto regular-shadow" role="alert">
        {{$message}}
    </div>
@endif

<div class="card w-50 m-auto mb-5 regular-shadow">
    <div class="card-header">
        <h5 class="card-header">Mis reservas</h5>
    </div>
    <div class="card-body reserve-management">
        <p class="card-text">Consulte sus libros reservados y devuelva los libros.</p>
        <a href="{{route('myreserves')}}" class="btn btn-primary">Reservas</a>
    </div>
</div>
@if(Auth::user()->admin)
    <div class="card w-50 m-auto mb-5 regular-shadow p-0">
        <div class="card-header">
            <h5 class="card-header">Libros</h5>
        </div>
        <div class="card-body books-management">
            <p class="card-text">Ver, editar, crear y borrar libros. <b>SOLO TRABAJADORES</b></p>
            <a href="{{route('adminbooks.index')}}" class="btn btn-primary">Libros</a>
        </div>
    </div>
    <div class="card w-50 m-auto mb-5 regular-shadow p-0">
        <div class="card-header">
            <h5 class="card-header">Administra reservas</h5>
        </div>
        <div class="card-body reserve-management">
            <p class="card-text">Reservas de los usuarios, devolver manualmente reservas de los usuarios. <b>SOLO TRABAJADORES</b></p>
            <a href="{{route('reserves.index')}}" class="btn btn-primary">Reservas</a>
        </div>
    </div>
@endif
@endsection
