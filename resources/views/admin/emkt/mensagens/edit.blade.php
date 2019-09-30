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
                    <h2 class="page--title h5">Mensagens</h2>
                    <!-- Page Title End -->

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"><span>Editar</span></li>
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
                        <h3 class="panel-title">Editar</h3>
                    </div>

                    <div class="panel-content">
                    @include('admin.partials._alert')
                    
                        <form action="{{ route('admin.mensagens.update', $mensagem) }}" method="POST">
                            @csrf
                            {{method_field('PUT')}}

                            <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Título</span>
                                <div class="col-md-10">
                                    <input type="text" name="titulo" class="form-control" id="titulo" maxlenght="20" value="{{ $mensagem->titulo }}">
                                </div>
                            </div>
                            <!-- Form Group End -->

                             <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Nome do Arquivo</span>
                                <div class="col-md-10">
                                    <input type="text" name="nome_do_arquivo" class="form-control" id="nome_do_arquivo" maxlenght="30" value="{{ $mensagem->nome_do_arquivo }}">
                                </div>
                            </div>
                            <!-- Form Group End -->
                            
                            <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Assunto</span>
                                <div class="col-md-10">
                                    <input type="text" name="assunto" class="form-control" id="assunto" value="{{ $mensagem->assunto }}">
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
                                            <option value="{{ $tipo_de_acao }}"
                                            @if($mensagem->tipo_de_acao == $tipo_de_acao->nome)
                                                selected
                                            @endif
                                            >{{ $tipo_de_acao->nome_de_exibicao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row">
                                <span class="label-text col-md-2 col-form-label text-md-right">Instituição</span>

                                <div class="col-md-10">
                                    <select name="instituicao" class="form-control" id="instituicao">
                                    <option></option>
                                    @foreach($instituicoes as $instituicao)
                                        <option value="{{ $instituicao->id }}"
                                            @if($instituicao->id == $mensagem->instituicao->id)
                                                selected
                                            @endif
                                            
                                        >{{ $instituicao->nome }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Conteúdo</span>
                                <div class="col-md-10">
                                <textarea style="height:300px; background-color:#1c2324;color:#eee;font-size:12px;" id="conteudo" name="conteudo" class="form-control" data-trigger="summernote">{{ $mensagem->conteudo }}</textarea>
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
@push('js')
<script>
        $('#conteudo').summernote();
</script>
@endpush
@endsection

