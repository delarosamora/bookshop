@extends('base')

@section('content')
    <x-index.carousel />
    <x-index.best-sales :bestSales="$bestSales" />
@endsection
