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
                    <h2 class="page--title h5">Dashboard</h2>
                    <!-- Page Title End -->

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Página Inicial</li>
                    </ul>

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Manual de Uso</h3>
                            <div class="dropdown">
                            </div>
                        </div>
                        <div class="panel-content">

                            <p>
                                <h2><i class="fas fa-list-ol"></i> Envios da régua de relacionamento</h2>
                            </p>
                            <p>
                                <h4>1. Criando a ação</h4>
                                No menu lateral <strong>Ações</strong> e clicando em <a href="{{ route('admin.acoes.create') }}"><strong>Criar Nova</strong></a>, você estará no painel de envios da régua.
                            </p>

                            <p>
                                <h4>2. Campos a serem preenchidos</h4>
                                <ul>
                                    <li><strong>Título:</strong> O nome da ação a ser exibido no Akna;</li>
                                    <li><strong>Tipo de Ação:</strong> O tipo de ação da régua;</li>
                                    <li><strong>Instituições:</strong> A instituição presente na régua (em caso de dúvidas, selecionar todas);</li>
                                    <li><strong>Incluir Data:</strong> Data que estará presente no nome da ação;</li>
                                    <li><strong>Agendamento:</strong> Data e horário a ser enviado;</li>
                                    <li>
                                        <strong>Situação da Lista:</strong> Seleção da base (deve conter os seguintes campos);
                                        <ul>
                                            <li>NOME</li>
                                            <li>DDD <small>(Opcional)</small></li>
                                            <li>CELULAR</li>
                                            <li>INSTITUIÇÃO</li>
                                        </ul>
                                    </li>
                                    <li><strong>Arquivo:</strong> Seleção da base para o envio</li>
                                    <li><strong>Enviar SMS:</strong> Opção para enviar o respectivo SMS daquela ação</li>
                                </ul>
                            </p>

                            <p>
                                <h4>3. Modificação em arquivos já existentes</h4>
                                Todos os arquivos são mantidos e podem ser alterados (incluindo SMS) no campo <a href="{{ route('admin.mensagens.index' ) }}"><strong>mensagens</strong></a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Header End -->

    @include('admin.partials._footer')
</main>
<!-- Main Container End -->
@endsection
