@extends('layouts.dadmin')

@section('content')

        <!-- Login Page Start -->
        <div class="m-account-w" data-bg-img="{{ url('vendor/dadmin/assets/img/account/wrapper-bg.jpg') }}">
            <div class="m-account">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <!-- Login Content Start -->
                        <div class="m-account--content-w" data-bg-img="{{ url('vendor/dadmin/assets/img/account/content-bg-admin.jpg') }}">
                            <div class="m-account--content">
                                <h2 class="h2">Possui uma conta?</h2>
                                <p>Caso saiba o seu acesso, clique abaixo para efetuar o login.</p>
                                <a href="{{ route('admin.login') }}" class="btn btn-rounded">Acessar</a>
                            </div>
                        </div>
                        <!-- Login Content End -->
                    </div>

                    <div class="col-md-6">
                        <!-- Login Form Start -->
                        <div class="m-account--form-w">
                            <div class="m-account--form">
                                <!-- Logo Start -->
                                <div class="logo">
                                    <img src="{{ url('images/logo-mini-branco.png') }}" alt="#" style="width: 50%;">
                                </div>
                                <!-- Logo End -->

                                <form action="{{ route('admin.password.email') }}" method="POST">
                                    <label class="m-account--title text-admin" style="text-transform: inherit;font-weight: lighter;">
                                    {{ __('Redefinir Senha') }}
                                    </label>
                                    @csrf

                                    <div class="form-group">
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                                <i class="fas fa-envelope"></i>
                                            </div>

                                            <input placeholder="Digite seu e-mail" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="m-account--actions">
                                        <p>
                                                Não lembra seu e-mail? <a href="{{ route('admin.password.request') }}" class="pl-1" style="color:#745faa;">Entre em contato com o suporte.</a>
                                        </p>
                                    </div>
                                    <div class="m-account--actions">
                                            <button type="submit" class="btn btn-block btn-rounded btn-primary">
                                            {{ __('Redefinir Senha') }}
                                            </button>
                                    </div>

                                    <div class="m-account--footer">
                                        <p><a href="https://github.com/educacaometodista" style="color:#745faa;" target="_blank">&copy; 2019 Educação Metodista</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Form End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Page End -->

@endsection
