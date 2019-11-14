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
                <div class="col-lg-12">
                    <!-- Page Title Start -->
                    <h2 class="page--title h5">Criar Ações</h2>
                    <!-- Page Title End -->

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"><span>Importar Listas</span></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.acoes.selecionar-instituicoes') }}">Selecionar Instituições</a></li>
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
                    @include('admin.partials._alert')
                    @include('admin.emkt.listas.partials._alert')
                    @include('admin.emkt.acoes.partials._alert')

                        <form action="{{ route('admin.acoes.upload_lists') }}" method="POST" enctype="multipart/form-data">
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
                                        <option value="{{ $tipo_de_acao->id }}">{{ $tipo_de_acao->nome_de_exibicao }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row"> <span class="label-text col-md-2 col-form-label text-md-right py-0">Instituições</span>
                                <div id="instituicoes" class="col-md-5 form-inline">
                                
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Incluir Data</span>
                                <div class="col-md-10">
                                    <input type="date" name="date" class="form-control" id="data-do-documento">
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

                            <!-- Form Group Start -->
                            <div class="form-group row"> <span class="label-text col-md-2 col-form-label text-md-right py-0">Situação da Lista</span>
                                <div class="col-md-10">
                                <label class="form-radio">
                                        <input type="radio" name="hasList" value="concluido" class="form-radio-input">
                                        <span class="form-radio-label">Já Importado</span>
                                    </label>
                                    <label class="form-radio">
                                        <input type="radio" name="hasList" value="importar-agora" class="form-radio-input" checked>
                                        <span class="form-radio-label">Importar Agora</span>
                                    </label>
                                </div>
                            </div>
                            <!-- Form Group End -->
                            
                            <!-- Form Group Start -->
                            <div id="input-lista" class="form-group row">
                                <span class="label-text col-md-2 col-form-label text-md-right">Arquivo</span>

                                <div class="col-md-10">
                                    <label class="custom-file">
                                        <input type="file" name="import_file[]" class="custom-file-input" id="arquivo" multiple>
                                        <span class="custom-file-label">Selecione um arquivo</span>
                                    </label>
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row">
                                <span class="label-text col-md-2 col-form-label text-md-right py-0"></span>
                                <div class="col-md-10">
                                    <label class="form-check">
                                        <input type="checkbox" name="enviar_sms" value="1" class="form-check-input">
                                        <span class="form-check-label">Enviar SMS</span>
                                    </label>
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <div class="row">
                                <div class="col-lg-10 offset-lg-2">
                                    
                                    <input type="submit" value="Importar" class="btn btn-sm btn-rounded btn-success">
                                    <!--<a href=" route('admin.acoes.index') "><button type="button" class="btn btn-sm btn-rounded btn-outline-secondary">Voltar</button></a> -->
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
@push('js')
<script>
    $('input[name="hasList"]').click(function () {
        if($(this).val() == 'importar-agora')
        {
            $('#input-lista').removeClass('d-none')
        } else {
            $('#input-lista').addClass('d-none')
        }
    });

    $('#formulario').submit(function() {
            $(this).hide();
            $('#progress-bar').removeClass('d-none');
    });

    var tipo_de_acao = null;
    $('select[name="tipo_de_acao"]').on('change', function() {
        tipo_de_acao = $(this).val();
        if(tipo_de_acao != false) {
            $.get( "/admin/instituicoes/"+tipo_de_acao+"/all", function(instituicoes) {
                $('#instituicoes').html('');
                for(let i = 0; i < instituicoes.length; i++) {
                    let innerHtml = $('#instituicoes').html();
                    $('#instituicoes').html(innerHtml+'<label class="form-check mr-3" id="'+instituicoes[i].prefixo+'"><input type="checkbox" name="instituicao-'+instituicoes[i].prefixo.toLowerCase()+'" value="'+instituicoes[i].prefixo+'" class="form-check-input"> <span class="form-check-label">'+instituicoes[i].nome+'</span></label>');
                }
            });
        }
    });

</script>
@endpush

@endsection

