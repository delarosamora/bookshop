@extends('base')

@section('content')
<p>Dashboard</p>
@if ($message = Session::get('success'))
    <p>{{$message}}</p>
@endif
@if(Auth::user()->admin)
    <a href="{{route('adminbooks.index')}}">Ver libros</a>
@endif
@endsection
