



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
                                <li class="breadcrumb-item"><a href="{{ route('admin.mensagens.index') }}">Mensagens</a></li>
                                <li class="breadcrumb-item active"><span>Nova Mensagem</span></li>
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
                    
                        <form action="{{ route('admin.mensagens.store') }}" method="POST">
                            @csrf
                            <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Título da Mensagem</span>
                                <div class="col-md-10">
                                    <input type="text" name="titulo" class="form-control" id="titulo" maxlenght="20" value="{{ old('titulo') }}">
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">URL da Mensagem</span>
                                <div class="col-md-10">
                                    <input type="text" name="url_da_imagem" class="form-control" id="url_da_imagem" value="{{ old('url_da_imagem') }}">
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!-- Form Group Start -->
                            <div class="form-group row">
                                    <span class="label-text col-md-2 col-form-label text-md-right">Assunto</span>
                                <div class="col-md-10">
                                    <input type="text" name="assunto" class="form-control" id="assunto" value="{{ old('assunto') }}">
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
                                <span class="label-text col-md-2 col-form-label text-md-right">Instituição</span>

                                <div class="col-md-10">
                                    <select name="instituicao" class="form-control" id="instituicao">
                                    <option></option>
                                    @foreach($instituicoes as $instituicao)
                                        <option value="{{ $instituicao->id }}">{{ $instituicao->nome }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Form Group End -->

                            <!--<input type="hidden" name="conteudo" class="form-control" id="conteudo" maxlenght="16" value="{{ old('conteudo') }}">-->

                            <div class="row">
                                <div class="col-lg-10 offset-lg-2">
                                    <input type="submit" value="Salvar" class="btn btn-sm btn-rounded btn-success">
                                    <button type="button" class="btn btn-sm btn-rounded btn-outline-secondary">Cancelar</button>
                                </div>
                            </div>

                            <div id="render-msg"></div>

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

@push('render-msg')
<!--<script>

    function renderMsg(url)
    {
        function makeHttpObject() {
        try {return new XMLHttpRequest();}
        catch (error) {}
        try {return new ActiveXObject("Msxml2.XMLHTTP");}
        catch (error) {}
        try {return new ActiveXObject("Microsoft.XMLHTTP");}
        catch (error) {}

        throw new Error("Could not create HTTP request object.");
        }
            var request = makeHttpObject(); 
            request.open("GET", url, true);
            request.send(null);
            request.onreadystatechange = function() {
            url = url.replace(/\s/g,'')
            console.log(url)
            if (request.readyState == 4 && url != ""){
                document.getElementById('render-msg').innerHTML = request.responseText;
                document.getElementById('conteudo').value = request.responseText;
                console.log(request.responseText)
            } else {
                document.getElementById('render-msg').innerHTML = '';
                document.getElementById('conteudo').value = '';
            }
        };
    }

    document.getElementById('url_da_imagem').onchange = function() {
        renderMsg(this.value);
    }

</script>-->

@endpush



@endsection

