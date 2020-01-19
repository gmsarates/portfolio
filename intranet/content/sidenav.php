<header>
  <div id="slide-out" class="side-nav fixed">
    <ul class="custom-scrollbar">    
      <li>
        <div class="logo-wrapper waves-light">
          <a href="index.php"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
        </div>
      </li>
      <li>
        <ul class="collapsible collapsible-accordion">
          <li><a class="collapsible-header waves-effect arrow-r <?=($lc=='projeto')?'active':''?>"><i class="fas fa-chevron-right"></i> Projetos<i class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="list-unstyled">
                <li><a href="index.php?pg=index&lc=projeto" class="waves-effect subitem <?=($pg=='index'&&$lc=='projeto')?'active':''?>">Ver projetos</a></li>
                <li><a href="index.php?pg=novo&lc=projeto" class="waves-effect subitem <?=($pg=='novo'&&$lc=='projeto')?'active':''?>">Novo projeto</a></li>
                <li><a href="index.php?pg=atualizar&lc=projeto" class="waves-effect subitem">Atualizar projeto</a></li>
                <li><a href="index.php?pg=andamento&lc=projeto" class="waves-effect subitem">Andamento</a></li>
              </ul>
            </div>
          </li>
          <li><a class="collapsible-header waves-effect arrow-r <?=($lc=='usuario'||$lc=='grupo')?'active':''?>"><i class="fas fa-hand-pointer"></i> Usuários e grupos<i class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="list-unstyled">
                <li><a href="index.php?pg=index&lc=usuario" class="waves-effect subitem <?=(($pg=='index'||$pg=='novo'||$pg=='alterar')&&$lc=='usuario')?'active':''?>">Gerenciar usuários</a>
                </li>
                <li><a href="index.php?pg=index&lc=grupo" class="waves-effect subitem <?=(($pg=='index'||$pg=='novo'||$pg=='alterar')&&$lc=='grupo')?'active':''?>">Gerenciar grupos</a>
                </li>
              </ul>
            </div>
          </li>
          <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-eye"></i> Configurações<i class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="list-unstyled">
                <li><a href="#" class="waves-effect subitem">Introduction</a>
                </li>
                <li><a href="#" class="waves-effect subitem">Monthly meetings</a>
                </li>
              </ul>
            </div>
          </li>
          <li><a class="collapsible-header waves-effect arrow-r"><i class="far fa-envelope"></i> Suporte<i class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="list-unstyled">
                <li><a href="#" class="waves-effect subitem">FAQ</a>
                </li>
                <li><a href="#" class="waves-effect subitem">Write a message</a>
                </li>
                <li><a href="#" class="waves-effect subitem">FAQ</a>
                </li>
                <li><a href="#" class="waves-effect subitem">Write a message</a>
                </li>
                <li><a href="#" class="waves-effect subitem">FAQ</a>
                </li>
                <li><a href="#" class="waves-effect subitem">Write a message</a>
                </li>
                <li><a href="#" class="waves-effect subitem">FAQ</a>
                </li>
                <li><a href="#" class="waves-effect subitem">Write a message</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
    </ul>
    <div class="sidenav-bg default-color-dark"></div>
  </div>
  
  <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav stylish-color white-text">  
    <div class="float-left">
      <a href="#" data-activates="slide-out" class="button-collapse black-text"><i class="white-text fas fa-bars"></i></a>
    </div>
    <div class="breadcrumb-dn mr-auto">
      <p>Painel de controle</p>
    </div>
    <ul class="nav navbar-nav nav-flex-icons ml-auto">
      <li class="nav-item">
        <a class="nav-link"><i class="fas fa-comments"></i> <span class="clearfix d-none d-sm-inline-block">Support</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"><i class="fas fa-user mr-2"></i><?=$_SESSION['nome']?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Minha conta</a>
          <a class="dropdown-item" href="logout.php">Sair</a>
        </div>
      </li>
    </ul>
  </nav>
</header>