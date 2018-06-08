app.controller("PostCtrl", [
  "$scope",
  "$sce",
  "$http",
  ($scope, $sce, $http) => {
    $scope.init = () => {
      $http
        .get("getPosts")
        .then(response => {
          $scope.posts = response.data;
        })
        .catch(error => {
          swal({
            text: "Ocorreu um erro ao buscar os posts no sistema",
            type: "error",
            confirmButtonClass: "btn-error",
            confirmButtonText: "OK",
            closeOnConfirm: false,
            closeOnCancel: false
          });
        });
    };

    $scope.buscarPerfil = (id = '5b1604de3472e73b8baf1c7e') => {
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

    $scope.addLike = (id, parentId) => {
      $scope.posts.filter((post) => {
        if (post._id === id) {
          post.likes++;
        }
        post.comentarios.filter((comentario) => {
          if (comentario._parent_id === parentId) {
            comentario.likes++;
          }
        })
      });
    };

    $scope.addDislike = (id, parentId) => {
      $scope.posts.filter((post) => {
        if (post._id === id) {
          post.dislikes++;
        }
        post.comentarios.filter((comentario) => {
          if (comentario._parent_id === parentId) {
            comentario.dislikes++;
          }
        })
      });
    };

    function addZero(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }

    $scope.objPost = (comentario = "") => {
      let date = new Date();
      let post = {
        _id: Math.floor(Math.random() * 3521 + 1),
        nome: $scope.perfil.nome,
        foto: $scope.perfil.foto,
        dtPublicacao: addZero(date.getHours()) +
          ":" +
          addZero(date.getMinutes()) +
          ":" +
          addZero(date.getSeconds()),
        descricao: comentario,
        likes: 0,
        dislikes: 0,
        openComment: false,
        mostrarRespostasOpen: true,
        comentarios: []
      };
      return post;
    };

    $scope.postar = (c = false) => {
      if (!c) {
        $scope.posts.push($scope.objPost($scope.publicacao));
        $scope.publicacao = "";
      } else {
        c.comentarios.push($scope.objPost(c.comentario));
        $scope.mostrarRespostas(c, true);
      }
      swal({
        text: "Publicado com sucesso!",
        type: "success",
        confirmButtonClass: "btn-success",
        confirmButtonText: "OK",
        closeOnConfirm: false,
        closeOnCancel: false
      }).then(result => {
        $('a[href="#activity"]').trigger("click");
      });
    };

    $scope.responder = (id, parentId, open) => {
      $scope.posts.filter((post) => {
        if (post._id === id) {
          post.openComment = open;
        }
        post.comentarios.filter((comentario) => {
          if (comentario._parent_id === parentId) {
            comentario.openComment = open;
          }
        })
      });
    };

    $scope.mostrarRespostas = (id, parentId, open) => {
      $scope.posts.filter((post) => {
        if (post._id === id) {
          post.mostrarRespostasOpen = open;
        }
        post.comentarios.filter((comentario) => {
          if (comentario._parent_id === parentId) {
            comentario.mostrarRespostasOpen = open;
          }
        })
      });
    };
  }
]);