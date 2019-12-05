



@extends('layouts.dadmin')

@section('content')

@include('admin.partials._navbar')
@include('admin.partials._sidebar')

<!-- Main Container Start -->
<main class="main--container">
    <!-- Page Header Start -->
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Page Title Start -->
                    <h2 class="page--title h5">Instituições</h2>
                    <!-- Page Title End -->

                    <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.instituicoes.index') }}">Instituições</a></li>
                                <li class="breadcrumb-item active"><span>Novo Cadastro</span></li>
                            </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Header End -->


    <!-- Main Content Start -->
    <section class="main--content">
        <div class="row gutter-20">
            <div class="col-md-12">
                <!-- Panel Start -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Novo Cadastro</h3>
                    </div>

                    <div class="panel-content">
                    @include('admin.partials._alert')
                    
                        <form action="{{ route('admin.instituicoes.store') }}" method="POST">
                            @csrf
                            <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Nome da Instituição</span>
                                <div class="col-md-10">
                                    <input type="text" name="nome" class="form-control" id="nome" maxlenght="20" value="{{ old('nome') }}">
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Prefixo</span>
                                <div class="col-md-10">
                                    <input type="text" name="prefixo" class="form-control" id="prefixo" maxlenght="16" value="{{ old('prefixo') }}">
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Código da Empresa</span>
                                <div class="col-md-10">
                                    <input type="text" name="codigo_da_empresa" class="form-control" id="codigo_da_empresa" maxlenght="5" value="{{ old('codigo_da_empresa') }}">
                                </div>
                            </div>
                            <!-- Form Group End -->

                             <!-- Form Group Start -->
                             <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Remetente do E-mail</span>
                                <div class="col-md-10">
                                    <input type="text" name="remetente_do_email" class="form-control" id="remetente_do_email" maxlenght="16" value="{{ old('remetente_do_email') }}">
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row">
                                <span class="label-text col-md-2 col-form-label text-md-right">Remetente do SMS</span>
                            <div class="col-md-10">
                                <input type="text" name="remetente_do_sms" class="form-control" id="remetente_do_sms" maxlenght="160" value="{{ old('remetente_do_sms') }}">
                            </div>
                        </div>
                        <!-- Form Group End -->


                             <!-- Form Group Start -->
                             <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">E-mail do Remetente</span>
                                <div class="col-md-10">
                                    <input type="text" name="email_do_remetente" class="form-control" id="email_do_remetente" maxlenght="26" value="{{ old('email_do_remetente') }}">
                                </div>
                            </div>
                            <!-- Form Group End -->

                             <!-- Form Group Start -->
                             <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">E-mail de Retorno</span>
                                <div class="col-md-10">
                                    <input type="text" name="email_de_retorno" class="form-control" id="email_de_retorno" maxlenght="26" value="{{ old('email_de_retorno') }}">
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <div class="row">
                                <div class="col-lg-10 offset-lg-2">
                                    <input type="submit" value="Salvar" class="btn btn-sm btn-rounded btn-success">
                                    <a href="{{ route('admin.instituicoes.index') }}"><button type="button" class="btn btn-sm btn-rounded btn-outline-secondary">Cancelar</button></a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- Panel End -->
            </div>
        </div>
    </section>

    @include('admin.partials._footer')
</main>
<!-- Main Container End -->
@endsection

