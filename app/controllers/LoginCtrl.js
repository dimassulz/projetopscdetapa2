app.controller('LoginCtrl', ['$scope', 'PerfilService', ($scope, PerfilService) => {
    $scope.usuario = {};
    $scope.usuario.email = 'joana.darc@babiloniasoftware.com.br';
    $scope.usuario.senha = '1234';
    $scope.cadastrarUsuario = (isValid) => {
        if (isValid) {
            $scope.usuario.foto = 'user1-128x128.jpg';
            PerfilService.insert($scope.usuario).then((result) => {
                if (result === 200) {
                    $scope.usuario = {};
                    swal('Usuário cadastrado com sucesso!');
                }

            }).catch(error => {
                swal({
                    text: "Ocorreu um erro ao buscar os posts no sistema",
                    type: "error",
                    confirmButtonClass: "btn-error",
                    confirmButtonText: "OK",
                    closeOnConfirm: false,
                    closeOnCancel: false
                })
            });
        }
    };

    $scope.logar = (isValid) => {
        if (isValid) {
            PerfilService.entrar($scope.usuario).then((result) => {
                sessionStorage.user = JSON.stringify(result);
                window.location = '/home';
            }).catch((error) => {
                swal({
                    text: "Ocorreu um erro ao buscar o perfil no sistema",
                    type: "error",
                    confirmButtonClass: "btn-error",
                    confirmButtonText: "OK",
                    closeOnConfirm: false,
                    closeOnCancel: false
                })
            });
        }
    };
}]);