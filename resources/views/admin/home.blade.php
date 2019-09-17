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

                            <p><h2><i class="fas fa-list-ol"></i> Subindo a Lista Manualmente</h2></p>
                            <p><h4>1.  Lorem ipsum dolor sit</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi porro vel impedit mollitia ad in voluptate qui ipsum quisquam! Necessitatibus nesciunt aliquam reprehenderit temporibus, est eaque debitis suscipit esse dolorum!</p>
                            <p><h4>2.  Lorem ipsum dolor sit</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi porro vel impedit mollitia ad in voluptate qui ipsum quisquam! Necessitatibus nesciunt aliquam reprehenderit temporibus, est eaque debitis suscipit esse dolorum!</p>
                            <p><h4>3.  Lorem ipsum dolor sit</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi porro vel impedit mollitia ad in voluptate qui ipsum quisquam! Necessitatibus nesciunt aliquam reprehenderit temporibus, est eaque debitis suscipit esse dolorum!</p>

                            <hr/>

                            <p><h2><i class="fas fa-share-alt"></i> Subindo a Ação e Anexando à Lista</h2></p>
                            <p><h4>1.  Lorem ipsum dolor sit</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi porro vel impedit mollitia ad in voluptate qui ipsum quisquam! Necessitatibus nesciunt aliquam reprehenderit temporibus, est eaque debitis suscipit esse dolorum!</p>
                            <p><h4>2.  Lorem ipsum dolor sit</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi porro vel impedit mollitia ad in voluptate qui ipsum quisquam! Necessitatibus nesciunt aliquam reprehenderit temporibus, est eaque debitis suscipit esse dolorum!</p>
                            <p><h4>3.  Lorem ipsum dolor sit</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi porro vel impedit mollitia ad in voluptate qui ipsum quisquam! Necessitatibus nesciunt aliquam reprehenderit temporibus, est eaque debitis suscipit esse dolorum!</p>

                            <hr/>

                            <p><h2><i class="fas fa-upload"></i> Realizando o Processo Automatizado</h2></p>
                            <p><h4>1.  Lorem ipsum dolor sit</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi porro vel impedit mollitia ad in voluptate qui ipsum quisquam! Necessitatibus nesciunt aliquam reprehenderit temporibus, est eaque debitis suscipit esse dolorum!</p>
                            <p><h4>2.  Lorem ipsum dolor sit</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi porro vel impedit mollitia ad in voluptate qui ipsum quisquam! Necessitatibus nesciunt aliquam reprehenderit temporibus, est eaque debitis suscipit esse dolorum!</p>
                            <p><h4>3.  Lorem ipsum dolor sit</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi porro vel impedit mollitia ad in voluptate qui ipsum quisquam! Necessitatibus nesciunt aliquam reprehenderit temporibus, est eaque debitis suscipit esse dolorum!</p>
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
