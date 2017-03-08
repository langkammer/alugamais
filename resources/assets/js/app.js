'use strict';
require('./bootstrap');

// Declare app level module which depends on views, and components
angular.module('alugamais', [])
.controller('ClienteController', ['$scope',function($scope) {

    console.log("testado");
    $scope.fiador = 'NAO';

    $scope.excluir = function ($id) {
        console.log("excluir",$id);
    };

}])
.controller('AluguelController', [function() {

    console.log("testado")

}])
.controller('FaturaController', [function() {

    console.log("testado")

}]);
// .config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {
//     $locationProvider.hashPrefix('!');
//
//     $routeProvider.otherwise({redirectTo: '/view1'});
// }]);