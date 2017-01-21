var app = angular.module("orderApp", []);

app.controller('OrderCtrl', function ($scope, $http) {

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

        if (!angular.isNumber(quantity)) {
            $scope.quantityError = true;
            console.log("quantityError " + $scope.quantityError);
            return false;
        }

        console.log("Sending Order creation request");

        $http({
            method: 'POST',
            url: '/orders',
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'},
            data: {user: user, product: product, quantity: quantity}
        })
            .then(function (response) {
                console.log("Data " + response.data);
            }, function (response) {
                if (response.status != 200) {
                    console.log("Error " + response.status);
                } else {
                    console.log("Error " + response.status);
                }
            });
    };

    $scope.getOrders = function () {

        $http({
            method: 'GET',
            url: '/orders'
        })
        .then(function (response) {
            console.log(angular.toJson(response.data, true));
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
});
