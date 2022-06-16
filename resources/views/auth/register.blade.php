@extends('base')

@section('content')
    <form method="POST" action="{{route('register.manage')}}">
        @csrf
        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif
        <form>
            <div class="mb-3">
                <label for="InputName" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" id="InputName" aria-describedby="InputName" required>
            </div>
            <div class="mb-3">
                <label for="InputSurname" class="form-label">Apellidos</label>
                <input type="text" name="surname" class="form-control" id="InputSurname" aria-describedby="InputSurname" required>
            </div>
            <div class="mb-3">
                <label for="InputNif" class="form-label">NIF</label>
                <input type="text" name="nif" class="form-control" id="InputNif" aria-describedby="InputNif" required>
            </div>
            <div class="mb-3">
                <label for="InputEmail" class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" value="{{old('email')}}" required>
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" id="InputPassword" required>
            </div>
            <div class="mb-3">
                <label for="InputPasswordRepeat" class="form-label">Repetir contraseña</label>
                <input type="password" name="password_confirmation" class="form-control" id="InputPasswordRepeat" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="{{route('login')}}">Entrar</a>
    </form>
@endsection
