<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rede de compartilhamento - RC | Cadastro de usuário</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        .entry:not(:first-of-type) {
            margin-top: 10px;
        }

        .teste {
            font-size: 12px;
        }
    </style>
</head>

<body class="hold-transition register-page" ng-app="redeApp" ng-controller="LoginCtrl">
<div class="register-box">
    <div class="register-logo">
        <a href="index.html">
            <b>Rede de Compartilhamento </b> RC</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Novo usuário</p>

            <form name="cadastro" ng-submit="cadastrarUsuario(cadastro.$valid)" novalidate>
                <div class="form-group has-feedback">
                    <span class="fa fa-user form-control-feedback"></span>
                    <label class="control-label">Nome</label>
                    <input type="text" class="form-control" placeholder="Nome Completo" name="nome" ng-model="usuario.nome" required>
                    <div ng-show="cadastro.nome.$invalid && !cadastro.nome.$pristine" class="invalid-feedback">O campo nome é obrigatório</div>
                </div>
                <div class="form-group has-feedback">
                    <span class="fa fa-envelope form-control-feedback"></span>
                    <label class="control-label">E-mail</label>
                    <input type="email" class="form-control" placeholder="E-mail" name="email" ng-model="usuario.email" required>
                    <div ng-show="cadastro.email.$invalid && !cadastro.email.$pristine" class="invalid-feedback">O campo e-mail é obrigatório</div>
                </div>
                <div class="form-group has-feedback">
                    <span class="fa fa-building form-control-feedback"></span>
                    <label class="control-label">Empresas que já trabalhou </label>
                   
                    <input type="text" class="form-control" placeholder="Período" name="periodo" ng-model="usuario.trabalhos[0].periodo" required>
                    <input type="text" class="form-control" placeholder="Nome Empresa" name="nomeempresa" ng-model="usuario.trabalhos[0].nome" required>
                    <hr>
                    <input type="text" class="form-control" placeholder="Período" name="periodo" ng-model="usuario.trabalhos[1].periodo" >
                    <input type="text" class="form-control" placeholder="Nome Empresa" name="nomeempresa" ng-model="usuario.trabalhos[1].nome" >
                    <hr>
                    <input type="text" class="form-control" placeholder="Período" name="periodo" ng-model="usuario.trabalhos[2].periodo" >
                    <input type="text" class="form-control" placeholder="Nome Empresa" name="nomeempresa" ng-model="usuario.trabalhos[2].nome" >
                </div>
                <div class="form-group has-feedback">
                    <span class="fa fa-book form-control-feedback"></span>
                    <label class="control-label">Formação </label>
                    
                    <input type="text" class="form-control" placeholder="Período" name="periodouni" ng-model="usuario.estudos[0].periodo" required>
                    <input type="text" class="form-control" placeholder="Nome Universidade" name="nomeuni" ng-model="usuario.estudos[0].nome" required>
                    <hr>
                    <input type="text" class="form-control" placeholder="Período" name="periodouni" ng-model="usuario.estudos[1].periodo" >
                    <input type="text" class="form-control" placeholder="Nome Universidade" name="nomeuni" ng-model="usuario.estudos[1].nome" >
                    <hr>
                    <input type="text" class="form-control" placeholder="Período" name="periodouni" ng-model="usuario.estudos[2].periodo" >
                    <input type="text" class="form-control" placeholder="Nome Universidade" name="nomeuni" ng-model="usuario.estudos[2].nome" >
                </div>
                <div class="form-group has-feedback">
                    <span class="fa fa-lock form-control-feedback"></span>
                    <label class="control-label">Senha</label>
                    <input type="password" class="form-control" placeholder="Senha" ng-model="usuario.senha" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" ng-model="usuario.resenha" placeholder="Digite novamente Senha" required>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input required type="checkbox">Concordo com os  <a href="#">termos</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" ng-disabled="cadastro.$invalid">Cadastrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="index.html" class="text-center">Eu já sou cadastrado</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script src="node_modules/angular/angular.min.js"></script>
<script src="node_modules/angular/angular-sanitize.min.js"></script>
<script src="app/app.js"></script>
<script src="app/controllers/LoginCtrl.js"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ng-ckeditor/0.2.1/ng-ckeditor.min.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
<script src="https://unpkg.com/promise-polyfill"></script>
<script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">

</body>

</html>