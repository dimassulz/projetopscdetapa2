app.factory("PerfilService", function ($http) {
    const thisPerfilService = {};
    const data = {};

    thisPerfilService.getAll = () => {
        let promise = $http({
            method: 'GET',
            url: 'perfil/get'
           })
            .then((response) => {
                return response.data;
            },
            (response) => {
                return response.data;
            });
        return promise;
    };

    thisPerfilService.entrar = (usuario) => {
        
        let promise = $http({
            method: 'POST',
            url: 'perfil/entrar',
            data: usuario
        })
            .then((response) => {
                return response.data;
            },
            (response) => {
                return response.data;
            });
        return promise;
    };

    thisPerfilService.get = (id) => {
        
        let promise = $http({
            method: 'GET',
            url: 'perfil/get/'+ id
        })
            .then((response) => {
                return response.data;
            },
            (response) => {
                return response.data;
            });
        return promise;
    };

    thisPerfilService.insert = (data) => {
    
        let promise = $http({
            method: 'POST',
            url: 'perfil/insert',
            data: data
        })
        .then((response) => {
            return response.status;
        },
        (response) => {
            return response.status;
        });

        return promise;
    };

    thisPerfilService.update = (id, firstName, lastName, age, active) => {

        let promise = $http({
            method: 'PUT',
            url: 'perfil/update/'+ id,
            data: data
        })
        .then((response) => {
            return response.status;
        },
        (response) => {
            return response.status;
        });

        return promise;
    };

    thisPerfilService.delete = (id) => {
        let promise = $http({
            method: 'DELETE',
            url: 'perfil/delete/' + id
        })
        .then((response) => {
            return response.status;
        },
        (response) => {
            return response.status;
        });

        return promise;
    };

    return thisPerfilService;
});
