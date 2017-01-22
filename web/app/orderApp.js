var app = angular.module("orderApp", []);

app.controller('OrderCtrl', function ($scope, $http) {

    $scope.editing = false;

    $scope.createOrder = function (user, product, quantity) {
        if (!angular.isDefined(user) || user === null) {
            return false;
        }

        if (!angular.isDefined(product) || product === null) {
            return false;
        }

        if (!angular.isDefined(quantity) || quantity === null) {
            return false;
        }

        console.log("Sending Order creation request");

        $http({
            method: 'POST',
            url: '/orders',
            headers: {'Content-Type': 'application/json; charset=utf-8'},
            data: JSON.stringify({user: user, product: product, quantity: quantity})
        })
        .then(function (response) {
            $scope.getOrders();
        }, function (response) {
            if (response.status != 200) {
                console.log(response.status);
            } else {
                console.log(response.status);
            }
        });
    };

    $scope.getOrders = function () {

        $http({
            method: 'GET',
            url: '/orders'
        })
        .then(function (response) {
            $scope.orders = response.data.orders;
            $scope.users = response.data.users;
            $scope.products = response.data.products;
        }, function (response) {
            if (response.status != 200) {
                console.log(response.status);
            } else {
                console.log(response.status);
            }
        });
    };

    $scope.edit = function(order) {
        $scope.editing = false;

        $scope.edit_id = order.id;
        $scope.edit_user = order.user_id;
        $scope.edit_product = order.product_id;
        $scope.edit_quantity = order.quantity;

        $scope.editing = true;
    };

    $scope.update = function(edit_id, edit_user, edit_product, edit_quantity) {
        $http({
            method: 'PUT',
            url: '/orders?id=' + edit_id,
            headers: {'Content-Type': 'application/json; charset=utf-8'},
            data: JSON.stringify({user: edit_user, product: edit_product, quantity: edit_quantity})
        })
        .then(function (response) {
            $scope.editing = false;
            $scope.getOrders();
        }, function (response) {
            if (response.status != 200) {
                console.log(response.status);
            } else {
                console.log(response.status);
            }
        });
    };

    $scope.remove = function(id) {
        $http({
            method: 'DELETE',
            url: '/orders?id=' + id
        })
        .then(function (response) {
            $scope.editing = false;
            $scope.getOrders();
        }, function (response) {
            if (response.status != 200) {
                console.log(response.status);
            } else {
                console.log(response.status);
            }
        });
    };
});
