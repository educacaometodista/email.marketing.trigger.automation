



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
                                <li class="breadcrumb-item active"><span>Todas</span></li>
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
                            <h3 class="h3">Instituições
                            <!--<a href="#" class="btn btn-sm btn-outline-info">Manage Orders</a>-->
                        
                            </h3>
                            <p>{{ count($instituicoes) == 1 ? count($instituicoes).' Instituição encontrada' : count($instituicoes).' Instituições encontradas' }}</p>
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

                    <div class="records--list" data-title="Lista de instituições">
                        <table id="recordsListView">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Prefixo</th>
                                    <th>Código</th>
                                    <th>Remetente</th>
                                    <th>E-mail</th>
                                    <th>Retorno</th>
                                    <th class="not-sortable">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($instituicoes as $instituicao)

                                <tr id="{{ 'instituicao-'.$instituicao->id }}">
                                    <td>{{ $instituicao->id }}</td>
                                    <td>{{ $instituicao->nome }}</td>
                                    <td>{{ $instituicao->prefixo }}</td>
                                    <td>{{ $instituicao->codigo_da_empresa }}</td>
                                    <td>{{ $instituicao->nome_do_remetente }}</td>
                                    <td>{{ $instituicao->email_do_remetente }}</td>
                                    <td>{{ $instituicao->email_de_retorno }}</td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="{{ route('admin.instituicoes.edit', $instituicao->id ) }}" class="dropdown-item">Editar</a>
                                                <form action="{{ route('admin.instituicoes.destroy', $instituicao->id) }}" method="POST">
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

