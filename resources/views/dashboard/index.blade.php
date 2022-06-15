@extends('base')

@section('content')
<p>Dashboard</p>
@if(Auth::user()->admin)
    <a href="{{route('adminbooks.index')}}">Ver libros</a>
@endif
@endsection
