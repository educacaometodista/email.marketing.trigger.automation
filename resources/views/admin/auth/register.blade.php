@extends('layouts.dadmin')

@section('content')

        <!-- Login Page Start -->
        <div class="m-account-w" data-bg-img="{{ url('vendor/dadmin/assets/img/account/wrapper-bg.jpg') }}">
            <div class="m-account">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <!-- Login Form Start -->
                        <div class="m-account--form-w">
                            <div class="m-account--form">
                                <!-- Logo Start -->
                                <div class="logo">
                                    <img src="{{ url('images/logo-mini-branco.png') }}" alt="#" style="width: 50%;">
                                </div>
                                <!-- Logo End -->

                                <form action="{{ route('admin.register') }}" method="POST">
                                <label class="m-account--title text-loginarea">REGISTRO DE USUÁRIO</label>
                                    @csrf

                                    <div class="form-group">
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                                <i class="fas fa-user"></i>
                                            </div>

                                            <input placeholder="Digite o nome" id="nome" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus autocomplete="off">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                                <i class="fas fa-images"></i>
                                            </div>

                                            <input placeholder="URL da Foto de Perfil" id="foto_de_perfil" type="text" class="form-control{{ $errors->has('foto_de_perfil') ? ' is-invalid' : '' }}" name="foto_de_perfil" value="{{ old('foto_de_perfil') }}" required autofocus autocomplete="off">
                                            @if ($errors->has('foto_de_perfil'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('foto_de_perfil') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <i class="fas fa-at"></i>
                                            </div>

                                            <input placeholder="Digite o e-mail" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">
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

                                            <input placeholder="Digite a Senha" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autocomplete="off" required>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <i class="fas fa-key"></i>
                                            </div>

                                            <input placeholder="Confirme a Senha" id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" autocomplete="off" required>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="m-account--actions">
                                        <button type="submit" class="btn btn-rounded btn-warning">CADASTRAR</button>
                                    </div>

                                    <div class="m-account--footer">
                                        <p>&copy; 2019 Educação Metodista</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Form End -->
                    </div>
                    <div class="col-md-6">
                        <!-- Login Content Start -->
                        <div class="m-account--content-w" data-bg-img="{{ url('vendor/dadmin/assets/img/account/content-bg-admin.jpg') }}">
                            <div class="m-account--content">
                                <h2 class="h2">Cadastre um novo Administrador!</h2>
                                <p>Automação da régua manual de captação para uso interno da Gerência de Comunicação e Marketing.</p>
                                <a href="{{ route('user.login') }}" class="btn btn-rounded">Acesso de Usuário</a>
                            </div>
                        </div>
                        <!-- Login Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Page End -->

@endsection
