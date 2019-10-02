



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
                            <h2 class="page--title h5">Tipos de Ações</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.tipos-de-acoes.index') }}">Tipos de Ações</a></li>
                                <li class="breadcrumb-item active"><span>Todos</span></li>
                            </ul>
                        </div>

                        <!--<div class="col-lg-6">
                            <div class="summary--widget">
                                <div class="summary--item">
                                    <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#009378">2,9,7,9,11,9,7,5,7,7,9,11</p>

                                    <p class="summary--title">This Month</p>
                                    <p class="summary--stats text-green">2,371,527</p>
                                </div>

                                <div class="summary--item">
                                    <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#e16123">2,3,7,7,9,11,9,7,9,11,9,7</p>

                                    <p class="summary--title">Last Month</p>
                                    <p class="summary--stats text-orange">2,527,371</p>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </section>
            <!-- Page Header End -->

            <!-- Main Content Start -->
            <section class="main--content">
                <div class="panel">
                    <!-- Records Header Start -->
                    <div class="records--header">
                        <div class="title fa-university">
                            <h3 class="h3">Tipos de Ações
                            <!--<a href="#" class="btn btn-sm btn-outline-info">Manage Orders</a>-->
                        
                            </h3>
                            <p>{{ count($tipos_de_acoes) == 1 ? count($tipos_de_acoes).' Tipo de Ação encontrada' : count($tipos_de_acoes).' Tipos de Ações encontradas' }}</p>
                        </div>

                        <!--<div class="actions">
                            <form action="#" class="search">
                                <input type="text" class="form-control" placeholder="Order ID or Customer Name..." required>
                                <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                            </form>
                        </div>-->
                    </div>
                    <!-- Records Header End -->
                </div>

                @include('admin.partials._alert')


                <div class="panel">

                    <div class="records--list" data-title="Lista de tipos de ações">
                        <table id="recordsListView">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Nome de Exibição</th>
                                    <th class="not-sortable">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tipos_de_acoes as $tipo_de_acao)

                                <tr id="{{ 'tipo_de_acao-'.$tipo_de_acao->id }}">
                                    <td>{{ $tipo_de_acao->id }}</td>
                                    <td>{{ $tipo_de_acao->nome }}</td>
                                    <td>{{ $tipo_de_acao->nome_de_exibicao }}</td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="{{ route('admin.tipos-de-acoes.edit', $tipo_de_acao->id ) }}" class="dropdown-item">Editar</a>
                                                <form action="{{ route('admin.tipos-de-acoes.destroy', $tipo_de_acao->id) }}" method="POST">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                    <button class="dropdown-item btn-remove">Excluir</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Records List End -->
                </div>
            </section>
            <!-- Main Content End -->

    @include('admin.partials._footer')
</main>
<!-- Main Container End -->


@endsection

