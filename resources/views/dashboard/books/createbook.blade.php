@extends('base')

@section('content')
    <h3>CREAR LIBRO</h3>
    <form method="POST" action="{{route('adminbooks.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title-book" class="form-label">Titulo</label>
            <input type="text" name="title" class="form-control" id="title-book" aria-describedby="title-book">
        </div>
        <div class="mb-3">
            <label for="description-book" class="form-label">Descripcion</label>
            <input type="text" name="description" class="form-control" id="description-book" aria-describedby="description-book">
        </div>
        <div class="mb-3">
            <label for="image-book" class="form-label">Portada del libro</label>
            <input type="file" name="imagebook" class="form-control" id="image-book" aria-describedby="image-book">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
