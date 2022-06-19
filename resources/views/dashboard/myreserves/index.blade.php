@extends('base')

@section('content')
    <h2 class="text-center">MIS RESERVAS - {{Auth::user()->name}} {{Auth::user()->surname}}</h2>
    @if ($message = Session::get('success'))
        <div class="alert alert-success w-50 m-auto regular-shadow mb-3" role="alert">
            {{$message}}
        </div>
    @endif
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Libro</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Devuelta</th>
            <th>Devolver</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($reserves as $reserve)
            <tr>
                <td>{{$reserve->book->title ?? "LIBRO NO ENCONTRADO"}}</td>
                <td>{{$reserve->user->name}} {{$reserve->user->surname}}</td>
                <td>{{$reserve->date}}</td>
                <td>{{$reserve->time}}</td>
                <td>{{$reserve->returned ? "SI" : "NO"}}</td>
                <td>
                    @if ($reserve->returned)
                        DEVUELTA
                    @else
                        <form method="POST" action="{{route('reserves.update', $reserve->id)}}">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="reserve_id" value="{{$reserve->id}}">
                            <button type="submit" class="btn btn-danger" type="submit">Devolver</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
