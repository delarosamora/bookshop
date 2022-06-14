@extends('base')

@section('content')
    @foreach ($books as $book)

        <p>This is book {{ $book->title }}</p>
    @endforeach
@endsection
