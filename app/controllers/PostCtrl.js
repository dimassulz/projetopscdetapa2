app.controller('PostCtrl', ['$scope', '$sce', ($scope, $sce) => {
    $scope.posts = [{
            id: 1,
            idPessoa:1,
            nome: "João Feliz da Silva Jr.",
            foto: "dist/img/user1-128x128.jpg",
            dtPublicacao: "19:30",
            descricao: "Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.",
            likes: 12,
            dislikes: 0,
            nComentarios: 1,
            openComment:false,
            comentarios: [{
                id:3,
                idPessoa:2,
                nome: "Josefa Cury",
                foto: "dist/img/user7-128x128.jpg",
                dtPublicacao: "19:41",
                tpDescricao: 'text',
                descricao: "Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.",
                likes: 1,
                dislikes: 0,
                nComentarios: 0,
                openComment:false,
                comentarios: [{
                    id:5,
                    idPost:1,
                    nome: "Josefa Cury",
                    foto: "dist/img/user7-128x128.jpg",
                    dtPublicacao: "19:41",
                    tpDescricao: 'text',
                    descricao: "Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.",
                    likes: 1,
                    dislikes: 0,
                    nComentarios: 0,
                    openComment:false,
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
            openComment:false,
            comentarios: [{
                id:4,
                idPost:2,
                nome: "Jurema Clarkson",
                foto: "dist/img/user5-128x128.jpg",
                dtPublicacao: "23:41",
                descricao: "Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.",
                likes: 12,
                dislikes: 1,
                nComentarios: 0,
                openComment:false,
                comentarios: []
            },{
                id:5,
                idPost:2,
                nome: "Jurema Clarkson",
                foto: "dist/img/user5-128x128.jpg",
                dtPublicacao: "23:41",
                descricao: "Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.",
                likes: 12,
                dislikes: 1,
                nComentarios: 0,
                openComment:false,
                comentarios: []
            }]
        }
    ];

    $scope.addLike = (id) => {
        $scope.posts.filter(post => {
            (post.id === id) ? post.likes++: post.comentarios.filter(p => { p.id === id ? p.likes++: p.likes})
        })
    }

    $scope.addDislike = (id) => {
        $scope.posts.filter(post => {
            (post.id === id) ? post.dislikes++: post.comentarios.filter(p => { p.id === id ? p.dislikes++: p.dislikes})
        })
    }

    $scope.addResposta = () => {
        
    }
}]);