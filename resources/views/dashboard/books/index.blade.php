@extends('base')

@section('content')
    <h2 class="text-center">ADMINISTRAR LIBROS</h2>
    @if ($message = Session::get('success'))
        <p>{{$message}}</p>
    @endif
    <a href="{{route('adminbooks.create')}}">Crear libro</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->description}}</td>
                <td><a href="{{route('adminbooks.edit', $book->id)}}" class="btn btn-info">Editar</a></td>
                <td>
                    <form action="{{route('adminbooks.destroy', $book->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger" type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection