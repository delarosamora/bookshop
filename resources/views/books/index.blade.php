@extends('base')

@section('content')
    <h2 class="text-center">LIBROS DISPONIBLES</h2>
    <div class="row p-5">
        @foreach ($books as $book)
            <x-single-book :book="$book" />
        @endforeach
    </div>
@endsection
