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
                        <li class="breadcrumb-item"><a href="{{ route('admin.instituicoes.index') }}">Importação de Listas</a></li>
                        <li class="breadcrumb-item active"><span>Selecionar Instituições</span></li>
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
                        <h3 class="panel-title">Selecionar Instituições</h3>
                    </div>

                    <div class="panel-content">
                        <form action="{{ route('admin.listas.store') }}" method="POST" enctype="multipart/form-data" id="formulario">
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

                            @if(session('importacao-de-listas'))
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
                                                    <!--<option value="all">Todas</option>-->
                                                    @foreach($instituicoes as $instituicao)
                                                        <option value="{{ $instituicao['tipo_de_acao_da_instituicao'] }}">{{ $instituicao['nome'] }}</option>
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

                        <div class="col-md-12 mb-5 d-none" id="progress-bar">
                            <h5 class="h5 fw--600 mb-3">Aguarde, isso pode levar alguns minutos...</h5>

                            <div class="progress h-15px">
                                <div id="progresso_do_processo" class="progress-bar progress-bar-striped progress-bar-animated bg-orange">

                                </div>
                            </div>

                        </div>


                        
                    </div>
                </div>
                <!-- Panel End -->
            </div>
        </div>
    </section>

    @include('admin.partials._footer')

    @push('js')
    <script>

    var lista_das_instituicoes = new Object();
    var campos = $('select');

    $('select').change(function() {

        lista_das_instituicoes = new Object();

        campos = $('select');

        for(let i = 0; i < campos.length; i++)
        {
            lista_das_instituicoes[campos[i].name] = campos[i].value;
        }

        lista_das_instituicoes['_token'] = $('input[name="_token"]').val();

    });

    $('#formulario').submit(function(event) {
        $('#progress-bar').removeClass('d-none');
        $('#formulario').addClass('d-none');

        setInterval(function(){
            $.get( "/admin/listas/progresso", function(data) {
                //console.log(JSON.parse(data));
                if(JSON.parse(data).progresso_do_processo == 'Ok'){
                    window.location = '/admin/listas/create';
                } else {
                    $('div#progresso_do_processo').css('width', (JSON.parse(data).progresso_do_processo-1)+'%');
                }
            });

        }, 1000)

    });
    
    </script>
    @endpush

</main>
<!-- Main Container End -->
@endsection

