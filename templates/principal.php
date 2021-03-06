<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rede Compartilhamento | RC
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
            display: none !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-collapse">
<div class="wrapper"  ng-app="redeApp">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-primary navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <!-- <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a> </li> -->
            <li class="nav-item d-none d-sm-inline-block">
                <a href="principal.html" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Pesquisar"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" 
                                                   data-placement="bottom"
                                                   title="Ver seu usuário" >
          <i class="fa fa-user-circle-o"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" ng-controller="ProfileCtrl" ng-init="init()">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img class="img-size-50 mr-3 img-circle" ng-src="dist/img/{{perfil.foto}}"
                                         alt="{{perfil.nome}}">
              <div class="media-body" style="color:#666;">
                <h3 class="dropdown-item-title" >
                {{perfil.nome}}
                 
                </h3>
                <p class="text-sm">{{perfil.profissao}}</p>
                
              </div>
            </div>
            <!-- Message End -->
          </a>
          
         
        </div>
      </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="tooltip"
                                                   data-placement="bottom"
                                                   title="Sair" href="login">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>

                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2"></div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row" ng-controller="PostCtrl">
                    <div class="col-md-3" ng-init="buscarPerfil()" ng-cloak>

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" ng-src="dist/img/{{perfil.foto}}"
                                         alt="{{perfil.nome}}">
                                </div>

                                <h3 class="profile-username text-center">{{perfil.nome}}</h3>

                                <p class="text-muted text-center">{{perfil.profissao}}
                                    <br>
                                    <a href="mailto:joana.darc@babiloniasoftware.com.br">{{perfil.email}}</a>
                                </p>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Sobre</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong>
                                    <i class="fa fa-building" aria-hidden="true"></i>
                                    Trabalhou em
                                </strong>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item" ng-repeat="p in perfil.trabalhos">
                                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                        {{p.periodo}} - {{p.nome}}
                                    </li>
                                </ul>

                                <strong>
                                    <i class="fa fa-book mr-1"></i>
                                    Estudou em
                                </strong>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item" ng-repeat="e in perfil.estudos">
                                        <i class="fa fa-pencil mr-1" aria-hidden="true"></i>
                                        {{e.periodo}} - {{e.nome}}
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9"  ng-init="init()" ng-cloak>
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#activity" data-toggle="tab">Posts</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#settings" data-toggle="tab">Publicar Conteúdo</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->

                                        <!-- /.post -->
                                        <script type="text/ng-template" id="categoryTree">

                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" ng-src="dist/img/{{post.perfil.foto}}"
                                                     alt="user image">
                                                <span class="username">
                            <a href="#" ng-click="buscarPerfil(post.perfil._id.$oid)">{{post.perfil.nome}}</a>

                          </span>
                                                <span class="description">Publicado às {{post.dtPublicacao}}
                          </span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div ng-bind-html="post.descricao"></div>
                                            <br>
                                            <p>
                                                <a style="cursor:pointer" ng-click="addLike(post._id, post._parent_id)"
                                                   class="link-black text-sm" data-toggle="tooltip"
                                                   data-placement="bottom"
                                                   title="Gostei">{{post.likes}}
                                                    <i class="fa fa-thumbs-o-up mr-1"></i>
                                                </a>
                                                |
                                                <a style="cursor:pointer" ng-click="addDislike(post._id, post._parent_id)"
                                                   class="link-black text-sm" data-toggle="tooltip"
                                                   data-placement="bottom"
                                                   title="Não Gostei">{{post.dislikes}}
                                                    <i class="fa fa-thumbs-o-down mr-1"></i>
                                                </a>
                                                |
                                                <a style="cursor:pointer" ng-click="responder(post._id, post._parent_id, !post.openComment)"
                                                   class="link-black text-sm" data-toggle="tooltip"
                                                   data-placement="bottom" title="Comentar">
                                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                                </a>
                                                <span class="float-right">
                            <a ng-click="mostrarRespostas(post._id, post._parent_id, !post.mostrarRespostasOpen)" style="cursor:pointer;"
                               class="link-black text-sm">
                              <i class="fa fa-comments-o mr-1"></i>
                              {{post.comentarios.length == 0 ? 'Sem comentários': (post.comentarios.length == 1 ) ? post.comentarios.length+' Comentário': post.comentarios.length+' Comentários'}}
                            </a>
                          </span>
                                            </p>
                                            <form class="form-horizontal" ng-show="post.openComment">
                                                <div class="input-group input-group-sm mb-0">
                                                    <input class="form-control form-control-sm" ng-model="post.comentario"
                                                           placeholder="Escreva um comentário...">
                                                    <div class="input-group-append">
                                                        <button type="button" ng-click="postar(post)"
                                                                class="btn btn-danger">
                                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <br>
                                            </form>

                                            <div ng-if="post.comentarios.length > 0" ng-show="post.mostrarRespostasOpen" style="margin-left:2.5%;">
                                            
                                                <div class="post" ng-repeat="post in post.comentarios" 
                                                     ng-include="'categoryTree'">
                                                </div>
                                            </div>
                                        </script>
                                        <div class="post" ng-repeat="post in posts" ng-include="'categoryTree'"></div>

                                    </div>
                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal">

                                            <div class="form-group">
                                                <label for="inputExperience"
                                                       class="col-sm-2 control-label">Conteúdo</label>

                                                <div class="col-sm-10">


                                                    <div class="mb-10">
                                                        <textarea id="editor1" ng-model="publicacao" data-ck-editor
                                                                  style="width: 100%"></textarea>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="button" ng-click="postar()" class="btn btn-success">
                                                        Publicar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Versão</b>
            1.0.0-alpha
        </div>
        <strong>Copyright &copy; 2018
            <a href="http://rededecompartilhamentorc.com">Rede de Compartilhamento - RC
            </a>.</strong>
        Todos os direitos reservados.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="node_modules/angular/angular.min.js"></script>
<script src="node_modules/angular/angular-sanitize.min.js"></script>
<script src="app/app.js"></script>
<script src="app/services/PerfilService.js"></script>
<script src="app/services/PostService.js"></script>
<script src="app/controllers/PostCtrl.js"></script>
<script src="app/controllers/ProfileCtrl.js"></script>

<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ng-ckeditor/0.2.1/ng-ckeditor.min.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
<script src="https://unpkg.com/promise-polyfill"></script>
<script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

</html>