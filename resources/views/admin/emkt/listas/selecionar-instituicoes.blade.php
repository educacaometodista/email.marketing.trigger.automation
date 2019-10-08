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
                    <h2 class="page--title h5">Listas</h2>
                    <!-- Page Title End -->

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.instituicoes.index') }}">Lista de Contatos</a></li>
                        <li class="breadcrumb-item active"><span>Importar Lista</span></li>
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
                        <h3 class="panel-title">Importar Listas</h3>
                    </div>

                    <div class="panel-content">
                        <form action="{{ route('admin.listas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <span class="label-text col-md-6 col-form-label text-md-left">Nome do Arquivo</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="label-text col-md-6 col-form-label text-md-left">Instituição</span>
                                    </div>
                                </div>
                            </div>

                            @if($listas)
                                @foreach($listas as $lista)
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <p class="text-md-left">{{ $lista['ClientOriginalName'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select name="{{ $lista['input_instituicao'] }}" class="form-control" id="instituicao_da_lista_1">
                                                    <option></option>
                                                    <option value="todas">Todas</option>
                                                    @foreach($instituicoes as $instituicao)
                                                        <option value="{{ $instituicao->tipos_de_acoes_da_instituicao->first()->tipo_de_acao->first()->id }}">{{ $instituicao->nome }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                            @endif

                            <div class="row">
                                <div class="col-lg-10 offset-lg-2">
                                    <input type="submit" value="Importar" class="btn btn-sm btn-rounded btn-success">
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

