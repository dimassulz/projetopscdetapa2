app.controller('ProfileCtrl', ['$scope', '$http', ($scope, $http) => {
    $scope.init = (id = '5b1604de3472e73b8baf1c7e') => {
        $http.get('perfil/'+id).then((response) => {
            $scope.perfil = response.data;
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