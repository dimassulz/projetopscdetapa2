app.controller("PostCtrl", [
  "$scope",
  "PostService",
  "PerfilService",
  ($scope, PostService, PerfilService) => {
    $scope.init = () => {
      PostService.getAll().then((result) => {
        $scope.posts = result;
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
    };

    $scope.buscarPerfil = (id = '5b1604de3472e73b8baf1c7e') => {

      if (sessionStorage.user === undefined) {
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
      } else {
        $scope.perfil = JSON.parse(sessionStorage.user);
      }

    }
   // console.log(JSON.parse(sessionStorage.user));


    $scope.addLike = (id, parentId) => {
      $scope.posts.filter((post) => {
        // console.log("id: "+post._id);
        // console.log("novoid:"+id );
        if (post._id === id) {
          post.likes++;
          let likeUpdate = {
            likes: post.likes
          };
          PostService.update(post._id, likeUpdate).then((result) => {
            // console.log('ok like');
          })
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
          let likeUpdate = {
            dislikes: post.dislikes
          };
          PostService.update(post._id, likeUpdate).then((result) => {
            console.log('ok dislike');
          })
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
        _parent_id: null,
        perfil: $scope.perfil,
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
      //console.log(c)
      if (!c) {
        PostService.insert($scope.objPost($scope.publicacao)).then((result) => {
          $scope.posts.push($scope.objPost($scope.publicacao));
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

      } else {
        $scope.posts.filter((post) => {
          if (post._id === c._id) {
            let obj = $scope.objPost(c.comentario);
            obj._parent_id = c._id;
            post.comentarios.push(obj)
            PostService.updateComments(c._id, {
              comentarios: post.comentarios
            }).then((result) => {
              $scope.mostrarRespostas(c._id, c._id, true);
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

          };
        })

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
        CKEDITOR.instances.editor1.setData('');
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