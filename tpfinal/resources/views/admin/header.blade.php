<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo"><img src="{{URL::asset("/imagens/logo1.png")}}" width="45" height="45"></a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                @if(Auth::check())
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            @if(Auth::user()->foto == NULL)
                                <img src="{{ asset("/bower_components/admin-lte/dist/img/user.jpg") }}" class="user-image" alt="User Image"/>
                            @else
                                <img src="{{ Auth::user()->foto }}" class="user-image" alt="User Image"/>
                            @endif
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->nome }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                @if(Auth::user()->foto == NULL)
                                    <img src="{{ asset("/bower_components/admin-lte/dist/img/user.jpg") }}" class="img-circle" alt="User Image" />
                                @else
                                    <img src="{{ Auth::user()->foto }}" class="img-circle" alt="User Image" />
                                @endif

                                <?php $grupo = Auth::user()->grupo; ?>
                                @if($grupo == 1)
                                    <?php $g = "Administrador do Sistema"; ?>
                                @endif
                                @if($grupo == 2)
                                    <?php $g = "Administrativo"; ?>
                                @endif
                                @if($grupo == 3)
                                    <?php $g = "Professor"; ?>
                                @endif
                                @if($grupo == 4)
                                    <?php $g = "Aluno"; ?>
                                @endif
                                @if($grupo == 5)
                                    <?php $g = "Candidato"; ?>
                                @endif

                                <p>{{ Auth::user()->nome }} - {{ $g }}
                                    <?php $data = date('d/m/Y', strtotime(Auth::user()->datacadastro)); ?>
                                    <small>Membro desde {{ $data }}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </li> -->

                            <!-- Menu Footer-->

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/usuarios/{{ Auth::user()->usuario }}/edit" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                </div>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown messages-menu">
                      <!-- Menu toggle button -->
                      <li><a href="{{ url('/login') }}"><img src="{{ asset("/imagens/login.png") }}" alt="Login" height="20" width="20"/></a></li>
                    </li><!-- /.messages-menu -->
                @endif

            </ul>
        </div>
    </nav>
</header>
