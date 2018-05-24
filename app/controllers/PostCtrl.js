app.controller('PostCtrl', ['$scope', '$sce', ($scope, $sce) => {
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
    $scope.posts = [{
        id: 1,
        idPessoa: 1,
        nome: "João Feliz da Silva Jr.",
        foto: "dist/img/user1-128x128.jpg",
        dtPublicacao: "19:30",
        descricao: "Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.",
        likes: 12,
        dislikes: 0,
        nComentarios: 1,
        openComment: false,
        mostrarRespostas: false,
        comentarios: [{
            id: 3,
            idPessoa: 2,
            nome: "Josefa Cury",
            foto: "dist/img/user7-128x128.jpg",
            dtPublicacao: "19:41",
            tpDescricao: 'text',
            descricao: "Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.",
            likes: 2,
            dislikes: 0,
            nComentarios: 1,
            openComment: false,
            mostrarRespostas: false,
            comentarios: [{
                id: 5,
                idPost: 1,
                nome: "Josefa Bonifacia",
                foto: "dist/img/user3-128x128.jpg",
                dtPublicacao: "19:41",
                tpDescricao: 'text',
                descricao: "Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.",
                likes: 3,
                dislikes: 0,
                nComentarios: 0,
                openComment: false,
                mostrarRespostas: false,
                comentarios: []
            }]
        }]
    },
        {
            id: 2,
            idPessoa: 1,
            nome: "James Jones",
            foto: "dist/img/user6-128x128.jpg",
            dtPublicacao: "21:37",
            tpDescricao: 'photo',
            descricao: '<div class="row mb-12"><div class="col-sm-12"><img class="img-fluid" src="dist/img/photo1.png" alt="Photo"></div></div>',
            likes: 244,
            dislikes: 8,
            nComentarios: 1,
            openComment: false,
            mostrarRespostas: false,
            comentarios: [{
                id: 7,
                idPost: 2,
                nome: "Jurema Clarkson",
                foto: "dist/img/user5-128x128.jpg",
                dtPublicacao: "23:41",
                descricao: "Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.",
                likes: 12,
                dislikes: 1,
                nComentarios: 0,
                openComment: false,
                mostrarRespostas: false,
                comentarios: []
            },
                {
                    id: 8,
                    idPost: 2,
                    nome: "Jurema Clarkson",
                    foto: "dist/img/user5-128x128.jpg",
                    dtPublicacao: "23:41",
                    descricao: "Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.",
                    likes: 12,
                    dislikes: 1,
                    nComentarios: 0,
                    openComment: false,
                    mostrarRespostas: false,
                    comentarios: []
                }]
        }];


    $scope.addLike = (objPost, comentarios = null) => {
        let scopePosts = (comentarios === null) ? angular.copy($scope.posts) : comentarios;
        scopePosts.filter(post => {
            (post.id === objPost.id) ? post.likes++ : $scope.addLike(objPost, post.comentarios)
        });
        $scope.posts = scopePosts;
    };

    $scope.addDislike = (objPost, comentarios = null) => {
        let scopePosts = (comentarios === null) ? angular.copy($scope.posts) : comentarios;
        scopePosts.filter(post => {
            (post.id === objPost.id) ? post.dislikes++ : $scope.addDislike(objPost, post.comentarios)
        });
        $scope.posts = scopePosts;
    };

    function addZero(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    $scope.objPost = (comentario = '') => {
        let date = new Date();
        let post = {
            id: Math.floor((Math.random() * 3521) + 1),
            idPessoa: $scope.perfil.id,
            nome: $scope.perfil.nome,
            foto: $scope.perfil.foto,
            dtPublicacao: addZero(date.getHours()) + ":" + addZero(date.getMinutes()) + ":" + addZero(date.getSeconds()),
            descricao: comentario === '' ? $scope.publicacao : comentario,
            likes: 0,
            dislikes: 0,
            nComentarios: 0,
            openComment: false,
            mostrarRespostas: false,
            comentarios: []
        };
        return post;
    };

    $scope.postar = () => {
        $scope.posts.push($scope.objPost());
        swal({
            title: "Publicação",
            text: "Postagem publicada com sucesso!",
            type: "success",
            confirmButtonClass: "btn-success",
            confirmButtonText: "OK",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            $scope.publicacao = '';
            $('a[href="#activity"]').trigger('click');
        })

    };

    $scope.responder = (objPost, open, comentarios = null) => {
        let scopePosts = (comentarios === null) ? angular.copy($scope.posts) : comentarios;
        scopePosts.filter(post => {
            post.openComment = (post.id === objPost.id ? open : $scope.responder(objPost, open, post.comentarios));
        });
        $scope.posts = scopePosts;
    };

    $scope.mostrarRespostas = (objPost, open, comentarios = null) => {
        let scopePosts = (comentarios === null) ? angular.copy($scope.posts) : comentarios;
        scopePosts.filter(post => {
            post.mostrarRespostas = (post.id === objPost.id ? open : $scope.responder(objPost, open, post.comentarios));
        });
        $scope.posts = scopePosts;
    };
}]);