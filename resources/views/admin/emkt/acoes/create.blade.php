



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
                    <h2 class="page--title h5">Ações</h2>
                    <!-- Page Title End -->

                    <ul class="breadcrumb">
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
                    
                        <form action="{{ route('admin.acoes.store') }}" method="POST">
                            @csrf
                            <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Título</span>
                                <div class="col-md-10">
                                    <input type="text" name="titulo" class="form-control" id="titulo" maxlenght="20" value="{{ old('titulo') }}">
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row">
                                <span class="label-text col-md-2 col-form-label text-md-right">Tipo de Ação</span>
                                <div class="col-md-10">
                                    <select name="tipo_de_acao" class="form-control" id="tipo_de_acao">
                                        <option></option>
                                        @foreach($tipos_de_acoes as $tipo_de_acao)
                                            <option value="{{ $tipo_de_acao }}">{{ $tipo_de_acao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Data da Ação</span>
                                <div class="col-md-10">
                                    <input type="date" name="date" class="form-control" id="data">
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row"> <span class="label-text col-md-2 col-form-label text-md-right py-0">Instituições</span>
                                <div class="col-md-5 form-inline">
                                    @foreach($instituicoes as $key => $instituicao)

                                    <label class="form-check mr-3">
                                        <input type="checkbox" name="{{ 'instituicao-'.strtolower($instituicao->prefixo) }}" value="{{ $instituicao->prefixo }}" class="form-check-input"> <span class="form-check-label">{{ $instituicao->nome }}</span>
                                    </label>

                                    @if(round(count($instituicoes)) / 2 == ($key+1))
                                        </div>
                                        <div class="col-md-5 form-inline">
                                    @endif

                                    @endforeach
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Agendamento</span>
                                <div class="col-md-3">
                                    <input type="date" name="data_agendamento" class="form-control" id="data_agendamento">

                                </div>
                                <div class="col-md-3">
                                <input type="time" name="hora_agendamento" class="form-control" id="hora_agendamento">

                                </div>
                            </div>
                            <!-- Form Group End -->




                            <div class="row">
                                <div class="col-lg-10 offset-lg-2">
                                    
                                    <input type="submit" value="Salvar" class="btn btn-sm btn-rounded btn-success">
                                    <button type="button" class="btn btn-sm btn-rounded btn-outline-secondary">Cancelar</button>
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

