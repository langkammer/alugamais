'use strict';
// require('./bootstrap');

// Declare app level module which depends on views, and components
angular.module('alugamais',[])
.controller('ClienteController', ['$scope',function($scope) {

    console.log("testado ");
    $scope.fiador = 'NAO';

    $scope.excluir = function ($id) {
        console.log("id : ",$id);
        $scope.id = $id;
        $('#modalDeleta').modal('show');
    };


}])
.controller('AluguelController', [function() {

    //
    // setTimeout(function(){
    // }, 3000);
    console.log("testado")

}])
.controller('FaturaController', [function() {

    console.log("testado")

}])
.config(function($interpolateProvider) {
    // To prevent the conflict of `{{` and `}}` symbols
    // between Blade template engine and AngularJS templating we need
    // to use different symbols for AngularJS.

    $interpolateProvider.startSymbol('@{');
    $interpolateProvider.endSymbol('}');
});
// .config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {
//     $locationProvider.hashPrefix('!');
//
//     $routeProvider.otherwise({redirectTo: '/view1'});
// }]);