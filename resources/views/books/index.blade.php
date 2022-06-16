@extends('base')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Reservar</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->description}}</td>
                <td>
                    <form method="POST" action="{{route('reserves.store')}}">
                        @csrf
                        <input type="hidden" name="book_id" value="{{$book->id}}"/>
                        <button type="submit" class="btn btn-success" type="submit">Reservar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
