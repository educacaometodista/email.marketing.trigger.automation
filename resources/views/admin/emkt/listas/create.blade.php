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
                    <h2 class="page--title h5">Importar Listas</h2>
                    <!-- Page Title End -->

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"><span>Importar Listas</span></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.listas.selecionar-instituicoes') }}">Selecionar Instituições</a></li>
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


                        <form action="{{ route('admin.listas.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf

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
                            <div class="form-group row">
                                <span class="label-text col-md-2 col-form-label text-md-right py-0">Instituições</span>
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
                                <span class="label-text col-md-2 col-form-label text-md-right">Arquivos</span>

                                <div class="col-md-10">
                                    <label class="custom-file">
                                        <input type="file" name="import_file[]" class="custom-file-input" id="arquivo" multiple>
                                        <span class="custom-file-label">Selecione um arquivo</span>
                                    </label>
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <div class="row">
                                <div class="col-lg-10 offset-lg-2">
                                    
                                    <input type="submit" value="Importar" class="btn btn-sm btn-rounded btn-success">
                                <a href="{{ route('admin.home') }}"><button type="button" class="btn btn-sm btn-rounded btn-outline-secondary">Cancelar</button></a>
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