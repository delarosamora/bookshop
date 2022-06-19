@extends('base')

@section('content')
    <h2 class="text-center">LIBROS</h2>
    @if ($message = Session::get('success'))
        <div class="alert alert-success w-50 m-auto regular-shadow mb-3" role="alert">
            {{$message}}
        </div>
    @endif
    <a href="{{route('adminbooks.create')}}">Crear libro</a>
    <div class="table-responsive">
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
    </div>
@endsection
