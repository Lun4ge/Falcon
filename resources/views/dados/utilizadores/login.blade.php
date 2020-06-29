@extends('dados.utilizadores.indexutil')
@section('users')
    <div class="container">
    <form action="{{url('/537527')}}" method="POST">
        @csrf
            <input type="text" name="email" id="email" placeholder="Email"><br>
            <input type="password" name="password" id="password" placeholder="Senha"><br>

            <input type="submit" value="Entrar">
        </form>
    </div>
@endsection