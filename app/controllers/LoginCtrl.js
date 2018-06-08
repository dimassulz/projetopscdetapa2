app.controller('LoginCtrl', ['$scope', ($scope) => {
    $scope.user = '';
    $scope.senha = '';

    $scope.cadastrarUsuario = (isValid) => {
        if (isValid) {
            console.log($scope.usuario);
            swal('Usuário cadastrado com sucesso!');
        }
    };

    $scope.login = (isValid) => {
        
    };
}]);