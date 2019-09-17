@extends('layouts.dadmin')

@section('content')

        <!-- Login Page Start -->
        <div class="m-account-w" data-bg-img="{{ url('vendor/dadmin/assets/img/account/wrapper-bg.jpg') }}">
            <div class="m-account">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <!-- Login Content Start -->
                        <div class="m-account--content-w" data-bg-img="{{ url('vendor/dadmin/assets/img/account/content-bg.jpg') }}">
                            <div class="m-account--content">
                                <h2 class="h2">Seja bem-vindo(a)!</h2>
                                <p>Automação da régua manual de captação para uso interno da Gerência de Comunicação e Marketing.</p>
                                <a href="{{ route('superadmin.login') }}" class="btn btn-rounded">Acessar como Super Administrador</a>
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

                                <form action="{{ route('admin.login') }}" method="POST">
                                    <label class="m-account--title text-loginarea">ÁREA DE LOGIN</label>
                                    @csrf

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <i class="fas fa-admin"></i>
                                            </div>

                                            <input placeholder="Digite seu e-mail" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <i class="fas fa-key"></i>
                                            </div>

                                            <input placeholder="Digite sua senha" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autocomplete="off" required>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="m-account--actions">
                                        @if (Route::has('password.request'))
                                            <a class="btn-link" href="{{ route('admin.password.request') }}">
                                                {{ __('Esqueceu sua senha?') }}
                                            </a>
                                        @endif

                                        <button type="submit" class="btn btn-rounded btn-warning">Login</button>
                                    </div>

                                    <!--<div class="m-account--alt">
                                        <p><span>OR LOGIN WITH</span></p>

                                        <div class="btn-list">
                                            <a href="#" class="btn btn-rounded btn-warning">Facebook</a>
                                            <a href="#" class="btn btn-rounded btn-warning">Google</a>
                                        </div>
                                    </div>-->

                                    <div class="m-account--footer">
                                        <p>&copy; 2019 Educação Metodista</p>
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
