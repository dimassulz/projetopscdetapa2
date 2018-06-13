app.controller('ProfileCtrl', ['$scope', 'PerfilService', ($scope, PerfilService) => {
    $scope.init = (id = '5b1604de3472e73b8baf1c7e') => {
        PerfilService.get(id).then((result) => {
            $scope.perfil = result;
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

    $scope.buscarPerfilAtivo = (id) => {
        $scope.perfil.filter((p) => {
            return p.id === id ? p : {};
        });
    };
}]);