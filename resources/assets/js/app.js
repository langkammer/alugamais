'use strict';
// require('./bootstrap');

// Declare app level module which depends on views, and components
angular.module('alugamais',['ui.bootstrap'])
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
.controller('FaturaController', ['$scope','$http', function($scope,$http) {

    $scope.calcularAluguel = function () {

        console.log("calculando contrato");

        if($scope.tipoContrato != 'mensal'){
            $scope.valorTotal += ($scope.valorAluguelDiario * $scope.dias);
        }
        else{
            $scope.valorTotal += $scope.valorAluguelMensal;
        }


        console.log($scope.valorTotal);
    };

    $scope.selecionaContrato = function () {

        console.log("contrato ", $scope.contrato)

        $http.get('/contrato/getJson/'+$scope.contrato).then(function (data) {
            console.log(data.data);
            $scope.valorAluguelMensal = data.data.aluguels.valorAluguelMensal;
            $scope.valorAluguelDiario = data.data.aluguels.valorAluguelDiario;
            $scope.multaPorcentagemAtraso = data.data.aluguels.multaPorcentagemAtraso;
            $scope.tipoContrato = data.data.tipoContrato;

            $scope.calcularAluguel();
            console.log();

        }, function (err) {
            console.log(err);
        });
    };


    function dateDiferencaEmDias(dataIni, dataFim) {
        // Descartando timezone e horário de verão
        var utc1 = Date.UTC(dataIni.getFullYear(), dataIni.getMonth(), dataIni.getDate());
        var utc2 = Date.UTC(dataFim.getFullYear(), dataFim.getMonth(), dataFim.getDate());

        $scope.dias = Math.floor((utc2 - utc1) / ( 1000 * 60 * 60 * 24) );
    }
    $scope.dataRefAtual = new Date();



    $scope.dateOptions = {
        formatYear: 'yy',
        maxDate: new Date(2020, 5, 22),
        minDate: new Date(),
        startingDay: 1
    };



    $scope.dateRef = function() {
        $scope.dataRef.opened = true;
    };

    $scope.format = 'MM/yyyy';

    $scope.dataRef = {
        opened: false
    };



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