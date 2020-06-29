@extends('layouts.app')

@section('content')
{{-- <img src="{{asset('/images/login/backgroundlogin.jpg')}}" alt="" style="position:absolute;opacity:0.5;height:100%;width: 100%;"> --}}

<div class="container" style="display: block;margin-left: auto;margin-right: auto;position: absolute;left: 0%;right: 0%;margin-top:6%;">
    <div class="row">
        <div class="col-md-4 offset-md-4" style="background-color: white;padding: 5%;border-radius: 5px;opacity: 0.9;">
            <img src="{{asset('/images/Falcon.png')}}" alt="logo" style="width:100%;height:35%;margin-bottom:15%;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row" style="padding-left: 30px;padding-right: 30px;padding-top: 25px;opacity: 1;">
                                <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row form-group" style="padding-left: 30px;padding-right: 30px;opacity: 1;">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-field" name="password" placeholder="Senha" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        {{-- padding-left: 30px; --}}
                        <div class="form-group row" style="opacity: 1;padding-left: 12%;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" style="" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="color: #111">
                                        {{-- {{ __('Remember Me') }} --}}Lembrar da conta
                                    </label>
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="opacity: 1;margin-top:15%;">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btnentrar">
                                    {{-- <b>{{ __('Login') }}</b> --}}
                                    <b>Entrar</b>
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
        </div>
    </div>
@endsection
