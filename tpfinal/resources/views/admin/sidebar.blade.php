<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        @if(Auth::check()) {
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
              <div class="pull-left image">
                  @if(Auth::user()->foto == NULL)
                      <img src="{{ asset("/bower_components/admin-lte/dist/img/user.jpg") }}" class="img-circle" alt="User Image" />
                  @else
                      <img src="{{ Auth::user()->foto }}" class="img-circle" alt="User Image" />
                  @endif
              </div>
              <div class="pull-left info">
                  <p>{{ Auth::user()->nome }}</p>

                  <!-- Status -->
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
          </div>
        }
        @endif

        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            @if(Auth::check()) {
              <?php
                $id = Auth::user()->id;
                $grupo = Auth::user()->grupo;
              ?>
              @if($grupo == 1)
                  <!-- Administrador do Sistema -->
                  <li class="active"><a href="/ps/"><span>Processos Seletivos</span></a></li>
                  <li class="active"><a href="/p/"><span>Provas</span></a></li>
                  <li class="active"><a href="/turmas/"><span>Turmas</span></a></li>
                  <li class="active"><a href="/usuarios/"><span>Usuarios</span></a></li>
                  <li class="active"><a href="/admin/professores/"><span>Professores</span></a></li>
                  <li class="active"><a href="/admin/candidatos/"><span>Candidatos</span></a></li>


              @endif
              @if($grupo == 2)
                  <!-- Administrativo -->
                  <li class="active"><a href="/ps/"><span>Processos Seletivos</span></a></li>
                  <li class="active"><a href="/p/"><span>Provas</span></a></li>

              @endif
              @if($grupo == 3)
                  <li class="active"><a href="/home"><span>Início</span></a></li>
                  <li class="active"><a href="/chamadas/create"><span>Fazer chamada</span></a></li>

              @endif
              @if($grupo == 4)
                  <!-- Aluno -->
                  <li class="active"><a href="/home"><span>Início</span></a></li>
                  <li class="active"><a href="/gabaritos/index-aluno"><span>Minhas Notas</span></a></li>
                  <li class="active"><a href="/chamadas/index-aluno"><span>Minhas Faltas</span></a></li>


              @endif
              @if($grupo == 5)
                <!-- Candidato -->
                  <li class="active"><a href="/ps/"><span>Processos Seletivos</span></a></li>
                  <li class="active"><a href="/meusprocessos/{$id}"><span>Meus Processos</span></a></li>

              @endif

            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
