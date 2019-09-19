<!-- Navbar Start -->
<header class="navbar navbar-fixed">
    <!-- Navbar Header Start -->
    <div class="navbar--header">
        <!-- Logo Start -->
        <a href="javascript:void(0)" class="logo" style="text-align:center;">
            <img src="http://portal.metodista.br/msg/institucional/comunicados-2018/imagens/educacao-metodista.png" alt="">
        </a>
        <!-- Logo End -->

        <!-- Sidebar Toggle Button Start -->
        <a href="javascript:void(0)" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
            <i class="fa fa-bars"></i>
        </a>
        <!-- Sidebar Toggle Button End -->
    </div>
    <!-- Navbar Header End -->

    <!-- Sidebar Toggle Button Start -->
    <a href="javascript:void(0)" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
        <i class="fa fa-bars"></i>
    </a>
    <!-- Sidebar Toggle Button End -->

    <!-- Navbar Search Start -->
    <!-- <div class="navbar--search">
        <form action="#">
            <input type="search" name="search" class="form-control" placeholder="Buscar..." required>
            <button class="btn-link"><i class="fa fa-search"></i></button>
        </form>
    </div> -->
    <!-- Navbar Search End -->

    <div class="navbar--nav ml-auto">
        <ul class="nav">
            <!-- <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link">
                    <i class="fa fa-bell"></i>
                    <span class="badge text-white bg-blue">7</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link">
                    <i class="fa fa-envelope"></i>
                    <span class="badge text-white bg-blue">4</span>
                </a>
            </li> -->

            <!-- Nav Language Start -->
            <!--<li class="nav-item dropdown nav-language">
                <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                    <img src="assets/img/flags/us.png" alt="">
                    <span>English</span>
                    <i class="fa fa-angle-down"></i>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="">
                            <img src="assets/img/flags/de.png" alt="">
                            <span>German</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="assets/img/flags/fr.png" alt="">
                            <span>French</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="assets/img/flags/us.png" alt="">
                            <span>English</span>
                        </a>
                    </li>
                </ul>
            </li>-->
            <!-- Nav Language End -->

            <!-- Nav User Start -->
            <li class="nav-item dropdown nav--user online">
                <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                    <img src="{{ Auth::user()->foto_de_perfil }}" alt="" class="rounded-circle">
                    <span>{{ Auth::user()->name }}</span>
                    <i class="fa fa-angle-down"></i>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.edit', Auth::user()->id ) }}"><i class="far fa-user"></i>Minha Conta</a></li>
                    <li><a href="{{ route('user.register')}}"><i class="fas fa-users"></i>Cadastrar Usuário</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-cog"></i>Configurações</a></li>

                    <li class="dropdown-divider"></li>
                    <li><a href="javascript:void(0)">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Entrar') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.register') }}">{{ __('Cadastrar-se') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>Sair</a>
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                    </li>
                </ul>
            </li>
            <!-- Nav User End -->
        </ul>
    </div>
</header>
<!-- Navbar End -->