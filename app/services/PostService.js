app.factory("PostService", ($http) => {
    const thisPostService = {};
    const data = {};

    thisPostService.getAll = () => {
        let promise = $http({
                method: 'GET',
                url: 'post/get'
            })
            .then((response) => {
                    return response.data;
                },
                (response) => {
                    return response.data;
                });
        return promise;
    };

    thisPostService.getOne = (id) => {

        let promise = $http({
                method: 'GET',
                url: 'post/get/' + id
            })
            .then((response) => {
                    return response.data;
                },
                (response) => {
                    return response.data;
                });
        return promise;
    };

    thisPostService.insert = (post) => {

        let promise = $http({
                method: 'POST',
                url: 'post/insert',
                data: post
            })
            .then((response) => {
                    return response.data;
                },
                (response) => {
                    return response.status;
                });

        return promise;
    };

    thisPostService.update = (id, data) => {
        
        let promise = $http({
                method: 'PUT',
                url: 'post/update/' + id,
                data: data
            })
            .then((response) => {
                    return response.data;
                },
                (response) => {
                    return response.status;
                });

        return promise;
    };

    thisPostService.delete = (id) => {
        let promise = $http({
                method: 'DELETE',
                url: 'post/delete/' + id
            })
            .then((response) => {
                    return response.data;
                },
                (response) => {
                    return response.status;
                });

        return promise;
    };

    return thisPostService;
});