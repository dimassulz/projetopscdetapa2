app.controller('ProfileCtrl', ['$scope', ($scope) => {
    $scope.perfil = {
        id: 1,
        nome: "Joana Darc",
        foto: "dist/img/user4-128x128.jpg",
        profissao: "Arquiteta de Software",
        email: "joana.darc@babiloniasoftware.com.br",
        nPost: 4,
        trabalhos: [{
            periodo: "2017 a atual",
            nome: "Babilônia Sistemas"
        },{
            periodo: "2015 a 2017",
            nome: "UFC Sistemas"
        },{
            periodo: "2010 a 2015",
            nome: "Ling Ling Sistemas"
        }],
        estudos: [{
            periodo: "2012 a 2014",
            nome: "FAFIFO Pós Graduações"
        },{
            periodo: "2008 a 2012",
            nome: "FAFIFO Graduações"
        }]
    };

    $scope.buscarPerfilAtivo = (id) => {
        $scope.perfil.filter((p) => {
            return p.id === id ? p : {};
        });
    };
}]);